<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClinicAppointment;
use App\Mail\BulkCampaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailCampaignController extends Controller
{
    /**
     * Display email campaign dashboard
     */
    public function index()
    {
        $stats = [
            'total_patients' => ClinicAppointment::distinct('email')->count('email'),
            'total_services' => count(ClinicAppointment::getServiceSchedules()),
        ];

        return view('admin.emails.index', compact('stats'));
    }

    /**
     * Show create email campaign form
     */
    public function create()
    {
        $services = ClinicAppointment::getServiceSchedules();
        $serviceNames = array_keys($services);
        
        $stats = [
            'total_patients' => ClinicAppointment::distinct('email')->count('email'),
            'total_services' => count($services),
        ];
        
        return view('admin.emails.create', compact('serviceNames', 'stats'));
    }

    /**
     * Send bulk email campaign
     */
    public function send(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'recipient_type' => 'required|in:all,service,custom',
            'service_name' => 'required_if:recipient_type,service|string',
            'custom_emails' => 'required_if:recipient_type,custom|string',
        ]);

        // Get recipients based on type
        $recipients = $this->getRecipients($validated);

        if ($recipients->isEmpty()) {
            return back()->with('error', 'No recipients found for the selected criteria.');
        }

        $sent = 0;
        $failed = 0;

        foreach ($recipients as $recipient) {
            try {
                Mail::to($recipient->email)->send(new BulkCampaign(
                    $recipient->full_name,
                    $validated['subject'],
                    $validated['message']
                ));
                $sent++;
            } catch (\Exception $e) {
                $failed++;
                \Log::error('Email send failed: ' . $e->getMessage());
            }
        }

        return redirect()->route('admin.emails.index')
            ->with('success', "Email campaign sent successfully! Sent: {$sent}, Failed: {$failed}");
    }

    /**
     * Get recipient count for a service
     */
    public function getRecipientCount(Request $request)
    {
        $serviceName = $request->input('service_name');
        
        if (!$serviceName) {
            return response()->json(['count' => 0]);
        }

        $count = ClinicAppointment::where('service_name', $serviceName)
            ->distinct('email')
            ->count('email');

        return response()->json(['count' => $count]);
    }

    /**
     * Preview email campaign
     */
    public function preview(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        return response()->json([
            'subject' => $validated['subject'],
            'message' => nl2br(e($validated['message'])),
        ]);
    }

    /**
     * Get recipients based on filter
     */
    private function getRecipients($validated)
    {
        $query = ClinicAppointment::select('full_name', 'email')->distinct('email');

        if ($validated['recipient_type'] === 'service') {
            $query->where('service_name', $validated['service_name']);
        } elseif ($validated['recipient_type'] === 'custom') {
            $emails = array_map('trim', explode(',', $validated['custom_emails']));
            $query->whereIn('email', $emails);
        }

        return $query->get();
    }
}
