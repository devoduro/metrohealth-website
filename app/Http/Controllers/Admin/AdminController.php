<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Order;
use App\Models\Service;
use App\Models\Product;
use App\Models\Appointment;
use App\Models\ClinicAppointment;
use App\Models\ContactSubmission;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        if (Auth::user()->isDoctor()) {
            return redirect()->route('admin.staff-dashboard');
        }

        $stats = [
            'total_appointments' => ClinicAppointment::count(),
            'pending_appointments' => ClinicAppointment::where('status', 'pending')->count(),
            'confirmed_appointments' => ClinicAppointment::where('status', 'confirmed')->count(),
            'completed_appointments' => ClinicAppointment::where('status', 'completed')->count(),
            'total_patients' => ClinicAppointment::distinct('email')->count('email'),
            'new_patients_month' => ClinicAppointment::whereMonth('created_at', now()->month)->distinct('email')->count('email'),
            'total_registered_patients' => Patient::count(),
            'new_registered_patients_month' => Patient::whereMonth('created_at', now()->month)->count(),
            'total_messages' => ContactSubmission::count(),
        ];

        $recent_appointments = Appointment::with(['patient', 'clinicService'])
            ->latest()
            ->take(10)
            ->get();

        $upcoming_appointments = ClinicAppointment::where('status', 'confirmed')
            ->whereDate('created_at', '>=', now())
            ->orderBy('created_at', 'asc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_appointments', 'upcoming_appointments'));
    }

    public function bookings()
    {
        $appointments = ClinicAppointment::latest()
            ->paginate(20);

        $stats = [
            'total' => ClinicAppointment::count(),
            'pending' => ClinicAppointment::where('status', 'pending')->count(),
            'confirmed' => ClinicAppointment::where('status', 'confirmed')->count(),
            'completed' => ClinicAppointment::where('status', 'completed')->count(),
            'cancelled' => ClinicAppointment::where('status', 'cancelled')->count(),
        ];

        return view('admin.bookings', compact('appointments', 'stats'));
    }

    public function updateBookingStatus(Request $request, $id)
    {
        $appointment = ClinicAppointment::findOrFail($id);
        $oldStatus = $appointment->status ?? 'pending';
        
        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $appointment->update([
            'status' => $request->status,
        ]);

        // Send email notification to patient
        try {
            \Mail::to($appointment->email)->send(new \App\Mail\AppointmentStatusUpdate($appointment, $oldStatus));
            $emailSent = true;
        } catch (\Exception $e) {
            \Log::error('Failed to send appointment update email: ' . $e->getMessage());
            $emailSent = false;
        }

        $message = 'Appointment status updated successfully!';
        if ($emailSent) {
            $message .= ' Patient has been notified via email.';
        }

        return redirect()->back()->with('success', $message);
    }

    public function orders()
    {
        $orders = Order::with('items.product')
            ->latest()
            ->paginate(20);

        return view('admin.orders', compact('orders'));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled',
            'payment_status' => 'nullable|in:pending,paid,failed',
        ]);

        $order->update([
            'status' => $request->status,
            'payment_status' => $request->payment_status ?? $order->payment_status,
        ]);

        return redirect()->back()->with('success', 'Order status updated successfully!');
    }
}
