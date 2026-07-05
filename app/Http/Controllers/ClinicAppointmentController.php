<?php

namespace App\Http\Controllers;

use App\Models\ClinicAppointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class ClinicAppointmentController extends Controller
{
    /**
     * Display the appointment booking form
     */
    public function index()
    {
        $services = ClinicAppointment::getServiceSchedules();
        return view('clinic-appointments.index', compact('services'));
    }

    /**
     * Get available days and time slots for a service (AJAX)
     */
    public function getServiceSchedule(Request $request)
    {
        $serviceName = $request->input('service');
        $day = $request->input('day');
        
        $schedules = ClinicAppointment::getServiceSchedules();
        
        if (!isset($schedules[$serviceName])) {
            return response()->json(['error' => 'Service not found'], 404);
        }
        
        $schedule = $schedules[$serviceName];
        
        // Get time slots
        $timeSlots = ClinicAppointment::getTimeSlotsForService($serviceName, $day);
        
        return response()->json([
            'days' => $schedule['days'],
            'time_range' => $schedule['time_range'],
            'slots' => $timeSlots,
            'fee' => $schedule['fee'],
        ]);
    }

    /**
     * Store one or more appointments — a patient may book several services
     * at once, each with its own day and time slot.
     */
    public function store(Request $request)
    {
        $schedules = ClinicAppointment::getServiceSchedules();

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:500',
            'notes' => 'nullable|string|max:1000',
            'services' => 'required|array|min:1',
            'services.*.service_name' => ['required', 'string', Rule::in(array_keys($schedules))],
            'services.*.appointment_day' => 'required|string',
            'services.*.appointment_time' => 'required|string',
        ]);

        $appointments = collect();

        foreach ($validated['services'] as $service) {
            $appointments->push(ClinicAppointment::create([
                'full_name' => $validated['full_name'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'address' => $validated['address'],
                'notes' => $validated['notes'] ?? null,
                'service_name' => $service['service_name'],
                'appointment_day' => $service['appointment_day'],
                'appointment_time' => $service['appointment_time'],
                'service_fee' => $schedules[$service['service_name']]['fee'] ?? 0,
            ]));
        }

        // Send a confirmation email per booked service, and notify the admin team once per booking.
        try {
            if (config('mail.default') && config('mail.mailers.' . config('mail.default'))) {
                foreach ($appointments as $appointment) {
                    Mail::to($appointment->email)
                        ->send(new \App\Mail\ClinicAppointmentConfirmation($appointment));

                    Mail::to(['vspoku11@gmail.com', 'stawiah@gmail.com', 'devoduro@gmail.com'])
                        ->send(new \App\Mail\ClinicAppointmentNotification($appointment));
                }
            }
        } catch (\Exception $e) {
            Log::error('Failed to send appointment confirmation email: ' . $e->getMessage());
        }

        return redirect()->route('clinic-appointments.success')
            ->with('appointments', $appointments);
    }

    /**
     * Show appointment success page
     */
    public function success()
    {
        if (!session('appointments')) {
            return redirect()->route('clinic-appointments.index');
        }

        return view('clinic-appointments.success');
    }
}
