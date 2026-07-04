<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClinicService;
use App\Models\Doctor;
use Illuminate\Http\Request;

class ClinicServiceController extends Controller
{
    public function index()
    {
        $clinicServices = ClinicService::orderBy('order')->withCount('doctors')->get();

        return view('admin.clinic-services.index', compact('clinicServices'));
    }

    public function create()
    {
        $allDoctors = Doctor::with('clinicService')->orderBy('name')->get();

        return view('admin.clinic-services.create', compact('allDoctors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'order' => 'nullable|integer|min:0',
            'doctor_ids' => 'nullable|array',
            'doctor_ids.*' => 'exists:doctors,id',
        ]);

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        $validated['has_multiple_doctors'] = $request->has('has_multiple_doctors') ? 1 : 0;
        $validated['order'] = $validated['order'] ?? 0;
        $doctorIds = $validated['doctor_ids'] ?? [];
        unset($validated['doctor_ids']);

        $clinicService = ClinicService::create($validated);

        if (!empty($doctorIds)) {
            Doctor::whereIn('id', $doctorIds)->update(['clinic_service_id' => $clinicService->id]);
        }

        return redirect()->route('admin.clinic-services.index')->with('success', 'Clinic service created successfully!');
    }

    public function edit(ClinicService $clinicService)
    {
        $allDoctors = Doctor::with('clinicService')->orderBy('name')->get();

        return view('admin.clinic-services.edit', compact('clinicService', 'allDoctors'));
    }

    public function update(Request $request, ClinicService $clinicService)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'order' => 'nullable|integer|min:0',
            'doctor_ids' => 'nullable|array',
            'doctor_ids.*' => 'exists:doctors,id',
        ]);

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        $validated['has_multiple_doctors'] = $request->has('has_multiple_doctors') ? 1 : 0;
        $validated['order'] = $validated['order'] ?? $clinicService->order ?? 0;
        $doctorIds = $validated['doctor_ids'] ?? [];
        unset($validated['doctor_ids']);

        $clinicService->update($validated);

        // Ticking a doctor here assigns (or reassigns) them to this service.
        // Unticking does NOT remove a doctor — that's done from the doctor's own
        // edit page by choosing a different service, since every doctor must
        // always belong to exactly one service.
        if (!empty($doctorIds)) {
            Doctor::whereIn('id', $doctorIds)->update(['clinic_service_id' => $clinicService->id]);
        }

        return redirect()->route('admin.clinic-services.index')->with('success', 'Clinic service updated successfully!');
    }

    public function destroy(ClinicService $clinicService)
    {
        $clinicService->delete();

        return redirect()->route('admin.clinic-services.index')->with('success', 'Clinic service deleted successfully!');
    }
}
