<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClinicAppointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    /**
     * Display a listing of patients
     */
    public function index(Request $request)
    {
        $query = ClinicAppointment::select('full_name', 'email', 'phone', DB::raw('COUNT(*) as total_appointments'), DB::raw('MAX(created_at) as last_visit'))
            ->groupBy('email', 'full_name', 'phone');

        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $patients = $query->orderBy('last_visit', 'desc')->paginate(20);

        $stats = [
            'total_patients' => ClinicAppointment::distinct('email')->count('email'),
            'new_this_month' => ClinicAppointment::whereMonth('created_at', now()->month)->distinct('email')->count('email'),
            'active_patients' => ClinicAppointment::where('created_at', '>=', now()->subMonths(3))->distinct('email')->count('email'),
        ];

        return view('admin.patients.index', compact('patients', 'stats'));
    }

    /**
     * Display patient details
     */
    public function show($email)
    {
        $patient = ClinicAppointment::where('email', $email)->firstOrFail();
        
        $appointments = ClinicAppointment::where('email', $email)
            ->orderBy('created_at', 'desc')
            ->get();

        $stats = [
            'total_appointments' => $appointments->count(),
            'completed' => $appointments->where('status', 'completed')->count(),
            'cancelled' => $appointments->where('status', 'cancelled')->count(),
            'pending' => $appointments->whereIn('status', ['pending', null])->count(),
        ];

        return view('admin.patients.show', compact('patient', 'appointments', 'stats'));
    }

    /**
     * Export patients to CSV
     */
    public function export()
    {
        $patients = ClinicAppointment::select('full_name', 'email', 'phone', DB::raw('COUNT(*) as total_appointments'))
            ->groupBy('email', 'full_name', 'phone')
            ->get();

        $filename = 'patients_' . date('Y-m-d') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function() use ($patients) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Name', 'Email', 'Phone', 'Total Appointments']);

            foreach ($patients as $patient) {
                fputcsv($file, [
                    $patient->full_name,
                    $patient->email,
                    $patient->phone,
                    $patient->total_appointments,
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
