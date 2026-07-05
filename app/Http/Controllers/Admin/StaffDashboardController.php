<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Patient;
use App\Services\PastechSmsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StaffDashboardController extends Controller
{
    /**
     * The doctor/nurse's own mini dashboard: pick a service (if assigned to
     * more than one), see its upcoming appointments, and quick-add a patient.
     */
    public function dashboard(Request $request)
    {
        $user = Auth::user();
        $services = $user->clinicServices;

        $selectedServiceId = $request->integer('service_id') ?: null;
        if (!$selectedServiceId || !$services->pluck('id')->contains($selectedServiceId)) {
            $selectedServiceId = $services->first()?->id;
        }

        $upcomingAppointments = collect();
        if ($selectedServiceId) {
            $upcomingAppointments = Appointment::with('patient')
                ->where('clinic_service_id', $selectedServiceId)
                ->where('status', '!=', 'cancelled')
                ->orderBy('appointment_date')
                ->orderBy('appointment_time')
                ->take(20)
                ->get();
        }

        return view('admin.staff-dashboard', compact('user', 'services', 'selectedServiceId', 'upcomingAppointments'));
    }

    /**
     * Add a patient + appointment for the staff member's own (selected) service.
     */
    public function quickAdd(Request $request, PastechSmsService $sms)
    {
        $user = Auth::user();
        $assignedServiceIds = $user->clinicServices->pluck('id');

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:1000',
            'clinic_service_id' => ['required', Rule::in($assignedServiceIds)],
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
            'notes' => 'nullable|string|max:1000',
        ]);

        $normalizedPhone = PastechSmsService::normalizePhone($validated['phone']);

        $patient = Patient::where('phone', $normalizedPhone)->first();
        if ($patient) {
            $patient->update([
                'full_name' => $validated['full_name'],
                'address' => $validated['address'] ?? $patient->address,
            ]);
        } else {
            $patient = Patient::create([
                'full_name' => $validated['full_name'],
                'phone' => $normalizedPhone,
                'address' => $validated['address'] ?? null,
            ]);
        }

        $appointment = Appointment::create([
            'patient_id' => $patient->id,
            'clinic_service_id' => $validated['clinic_service_id'],
            'doctor_id' => $user->doctor_id,
            'appointment_date' => $validated['appointment_date'],
            'appointment_time' => $validated['appointment_time'],
            'notes' => $validated['notes'] ?? null,
            'created_by' => $user->id,
        ]);

        $serviceName = $appointment->clinicService->name ?? 'your appointment';
        $when = \Carbon\Carbon::parse($validated['appointment_date'])->format('D, M j')
            . ' at ' . \Carbon\Carbon::parse($validated['appointment_time'])->format('g:i A');
        $message = "Hi {$patient->full_name}, your appointment at Metro Health Hospital, {$serviceName} is confirmed for {$when}. Call 0241850091 for changes.";

        $result = $sms->send($patient->phone, $message, $patient->id, 'confirmation');
        $appointment->update(['sms_status' => $result['success'] ? 'sent' : 'failed']);

        $redirect = redirect()->route('admin.staff-dashboard', ['service_id' => $validated['clinic_service_id']]);

        if (!$result['success']) {
            return $redirect->with('success', 'Appointment booked successfully!')
                ->with('warning', 'However, the SMS confirmation to the patient could not be sent.');
        }

        return $redirect->with('success', 'Appointment booked successfully! SMS confirmation sent to patient.');
    }
}
