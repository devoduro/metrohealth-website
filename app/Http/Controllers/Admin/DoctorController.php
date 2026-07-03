<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClinicService;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('clinicService')->orderBy('name')->get();

        return view('admin.doctors.index', compact('doctors'));
    }

    public function create()
    {
        $clinicServices = ClinicService::active()->ordered()->get();

        return view('admin.doctors.create', compact('clinicServices'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'clinic_service_id' => 'required|exists:clinic_services,id',
            'days' => 'nullable|array',
            'days.*' => 'in:' . implode(',', Doctor::weekdays()),
        ]);

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        $validated['days'] = $validated['days'] ?? [];

        Doctor::create($validated);

        return redirect()->route('admin.doctors.index')->with('success', 'Doctor registered successfully!');
    }

    public function edit(Doctor $doctor)
    {
        $clinicServices = ClinicService::active()->ordered()->get();

        return view('admin.doctors.edit', compact('doctor', 'clinicServices'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'clinic_service_id' => 'required|exists:clinic_services,id',
            'days' => 'nullable|array',
            'days.*' => 'in:' . implode(',', Doctor::weekdays()),
        ]);

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        $validated['days'] = $validated['days'] ?? [];

        $doctor->update($validated);

        return redirect()->route('admin.doctors.index')->with('success', 'Doctor updated successfully!');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()->route('admin.doctors.index')->with('success', 'Doctor removed successfully!');
    }
}
