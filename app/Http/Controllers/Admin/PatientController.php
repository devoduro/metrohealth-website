<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClinicAppointment;
use App\Models\Patient;
use App\Services\PastechSmsService;
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

        // Registered patients (internal appointment system's own patient records)
        $registeredQuery = Patient::withCount('appointments')->latest();

        if ($request->filled('registered_search')) {
            $search = $request->registered_search;
            $registeredQuery->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%");
            });
        }

        $registeredPatients = $registeredQuery->paginate(20, ['*'], 'registered_page');

        return view('admin.patients.index', compact('patients', 'stats', 'registeredPatients'));
    }

    /**
     * Show the bulk import form for registered patients.
     */
    public function importForm()
    {
        return view('admin.patients.import');
    }

    /**
     * Download a CSV template for the bulk import.
     */
    public function importTemplate()
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="patients_import_template.csv"',
        ];

        $callback = function () {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Full Name', 'Phone', 'Address']);
            fputcsv($file, ['Ama Mensah', '0241234567', '12 Ridge Road, Kumasi']);
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Process the uploaded CSV/Excel file and upsert Patient records.
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt|max:5120',
        ]);

        $handle = fopen($request->file('file')->getRealPath(), 'r');
        if ($handle === false) {
            return back()->with('error', 'Could not read the uploaded file.');
        }

        $firstRow = fgetcsv($handle);
        $startsWithHeader = $firstRow && strtolower(trim($firstRow[0] ?? '')) === 'full name';
        if (!$startsWithHeader) {
            rewind($handle);
        }

        $created = 0;
        $updated = 0;
        $skipped = 0;

        while (($row = fgetcsv($handle)) !== false) {
            $fullName = trim($row[0] ?? '');
            $phone = trim($row[1] ?? '');
            $address = trim($row[2] ?? '') ?: null;

            if ($fullName === '' || $phone === '') {
                $skipped++;
                continue;
            }

            $normalizedPhone = PastechSmsService::normalizePhone($phone);

            $patient = Patient::where('phone', $normalizedPhone)->first();
            if ($patient) {
                $patient->update([
                    'full_name' => $fullName,
                    'address' => $address ?? $patient->address,
                ]);
                $updated++;
            } else {
                Patient::create([
                    'full_name' => $fullName,
                    'phone' => $normalizedPhone,
                    'address' => $address,
                ]);
                $created++;
            }
        }

        fclose($handle);

        return redirect()->route('admin.patients.index')
            ->with('success', "Import complete! Created: {$created}, Updated: {$updated}, Skipped (missing name/phone): {$skipped}.");
    }

    /**
     * Show a registered patient's full internal appointment history.
     */
    public function showRegistered(Patient $patient)
    {
        $appointments = $patient->appointments()
            ->with(['clinicService', 'doctor'])
            ->orderByDesc('appointment_date')
            ->orderByDesc('appointment_time')
            ->get();

        $stats = [
            'total' => $appointments->count(),
            'scheduled' => $appointments->where('status', 'scheduled')->count(),
            'completed' => $appointments->where('status', 'completed')->count(),
            'cancelled' => $appointments->where('status', 'cancelled')->count(),
        ];

        return view('admin.patients.show-registered', compact('patient', 'appointments', 'stats'));
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
