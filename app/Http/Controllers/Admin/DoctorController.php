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

        $this->enableMultipleDoctorsIfNeeded($validated['clinic_service_id']);

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

        $this->enableMultipleDoctorsIfNeeded($validated['clinic_service_id']);

        return redirect()->route('admin.doctors.index')->with('success', 'Doctor updated successfully!');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()->route('admin.doctors.index')->with('success', 'Doctor removed successfully!');
    }

    /**
     * A service with 2+ doctors needs has_multiple_doctors=true, otherwise the
     * booking pages' doctor picker silently hides every doctor for that service.
     * Only ever auto-enables — never disables — so an admin's explicit choice
     * to keep the picker on (e.g. temporarily down to one doctor) is preserved.
     */
    private function enableMultipleDoctorsIfNeeded(int $clinicServiceId): void
    {
        $doctorCount = Doctor::where('clinic_service_id', $clinicServiceId)->count();

        if ($doctorCount > 1) {
            ClinicService::where('id', $clinicServiceId)
                ->where('has_multiple_doctors', false)
                ->update(['has_multiple_doctors' => true]);
        }
    }
}
