<?php

namespace App\Http\Controllers;

use App\Models\ClinicAppointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

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
     * Store a new appointment
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:500',
            'service_name' => 'required|string',
            'appointment_day' => 'required|string',
            'appointment_time' => 'required|string',
            'service_fee' => 'required|numeric|min:0',
            'notes' => 'nullable|string|max:1000',
        ]);

        // Create appointment
        $appointment = ClinicAppointment::create($validated);

        // Send confirmation email
        try {
            if (config('mail.default') && config('mail.mailers.' . config('mail.default'))) {
                Mail::to($appointment->email)
                    ->send(new \App\Mail\ClinicAppointmentConfirmation($appointment));
                
                // Notify admin
                Mail::to(['vspoku11@gmail.com', 'stawiah@gmail.com', 'devoduro@gmail.com'])
                    ->send(new \App\Mail\ClinicAppointmentNotification($appointment));
            }
        } catch (\Exception $e) {
            Log::error('Failed to send appointment confirmation email: ' . $e->getMessage());
        }

        return redirect()->route('clinic-appointments.success')
            ->with('appointment', $appointment);
    }

    /**
     * Show appointment success page
     */
    public function success()
    {
        if (!session('appointment')) {
            return redirect()->route('clinic-appointments.index');
        }
        
        return view('clinic-appointments.success');
    }
}
