<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\ClinicService;
use App\Models\SmsLog;
use App\Services\PastechSmsService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BulkSmsController extends Controller
{
    public function index(PastechSmsService $sms)
    {
        $balance = $sms->getBalance();

        $stats = [
            'sent' => SmsLog::where('status', 'sent')->count(),
            'failed' => SmsLog::where('status', 'failed')->count(),
        ];

        $recentLogs = SmsLog::with('patient')->latest()->take(10)->get();

        return view('admin.sms.index', compact('balance', 'stats', 'recentLogs'));
    }

    public function create()
    {
        $clinicServices = ClinicService::active()->ordered()->get();

        return view('admin.sms.create', compact('clinicServices'));
    }

    /**
     * AJAX: count recipients matching the current filter selection.
     */
    public function recipientCount(Request $request)
    {
        $count = $this->getRecipients($request)->count();

        return response()->json(['count' => $count]);
    }

    public function send(Request $request, PastechSmsService $sms)
    {
        $validated = $request->validate([
            'filter_type' => 'nullable|in:any,date,week,month,days_left',
            'date' => 'required_if:filter_type,date|nullable|date',
            'week_start' => 'required_if:filter_type,week|nullable|date',
            'week_end' => 'required_if:filter_type,week|nullable|date',
            'month' => 'required_if:filter_type,month|nullable|date_format:Y-m',
            'days' => 'required_if:filter_type,days_left|nullable|integer|min:0',
            'clinic_service_id' => 'required_if:filter_type,days_left|nullable|exists:clinic_services,id',
            'status' => 'nullable|in:scheduled,completed,cancelled',
            'message' => 'required|string|max:480',
        ]);

        $patients = $this->getRecipients($request);

        if ($patients->isEmpty()) {
            return back()->with('error', 'No recipients found for the selected criteria.');
        }

        $sentCount = 0;
        $failedCount = 0;

        foreach ($patients as $patient) {
            $result = $sms->send($patient->phone, $validated['message'], $patient->id, 'bulk');
            if ($result['success']) {
                $sentCount++;
            } else {
                $failedCount++;
            }
        }

        return redirect()->route('admin.sms.index')
            ->with('success', "Bulk SMS sent! Sent: {$sentCount}, Failed: {$failedCount}");
    }

    public function testSms(Request $request, PastechSmsService $sms)
    {
        $validated = $request->validate([
            'test_phone' => 'required|string|max:20',
            'test_message' => 'required|string|max:480',
        ]);

        $result = $sms->send($validated['test_phone'], $validated['test_message'], null, 'test');

        if ($result['success']) {
            return back()->with('success', 'Test SMS sent successfully!');
        }

        return back()->with('error', 'Test SMS failed: ' . ($result['response'] ?? 'Unknown error'));
    }

    public function logs()
    {
        $logs = SmsLog::with('patient')->latest()->paginate(30);

        return view('admin.sms.logs', compact('logs'));
    }

    /**
     * Resolve the distinct list of patients matching the request's combined filters.
     * Service, date, and status filters are independent and combine with AND —
     * e.g. "scheduled" + a specific service + a specific date narrows to that intersection.
     */
    private function getRecipients(Request $request)
    {
        $query = Appointment::with('patient');

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        } else {
            // Default: never message cancelled appointments unless explicitly requested.
            $query->where('status', '!=', 'cancelled');
        }

        if ($request->filled('clinic_service_id')) {
            $query->where('clinic_service_id', $request->input('clinic_service_id'));
        }

        switch ($request->input('filter_type')) {
            case 'date':
                $query->whereDate('appointment_date', $request->input('date'));
                break;

            case 'week':
                $query->whereBetween('appointment_date', [
                    $request->input('week_start'),
                    $request->input('week_end'),
                ]);
                break;

            case 'month':
                $month = Carbon::createFromFormat('Y-m', $request->input('month'));
                $query->whereYear('appointment_date', $month->year)
                    ->whereMonth('appointment_date', $month->month);
                break;

            case 'days_left':
                $targetDate = now()->addDays((int) $request->input('days'))->toDateString();
                $query->whereDate('appointment_date', $targetDate);
                break;

            case 'any':
            default:
                // No date constraint — service and/or status filters (if any) still apply.
                break;
        }

        return $query->get()->pluck('patient')->filter()->unique('id')->values();
    }
}
