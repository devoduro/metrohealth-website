<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClinicService;
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
        return view('admin.clinic-services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'order' => 'nullable|integer|min:0',
        ]);

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        $validated['order'] = $validated['order'] ?? 0;

        ClinicService::create($validated);

        return redirect()->route('admin.clinic-services.index')->with('success', 'Clinic service created successfully!');
    }

    public function edit(ClinicService $clinicService)
    {
        return view('admin.clinic-services.edit', compact('clinicService'));
    }

    public function update(Request $request, ClinicService $clinicService)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'order' => 'nullable|integer|min:0',
        ]);

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        $validated['order'] = $validated['order'] ?? $clinicService->order ?? 0;

        $clinicService->update($validated);

        return redirect()->route('admin.clinic-services.index')->with('success', 'Clinic service updated successfully!');
    }

    public function destroy(ClinicService $clinicService)
    {
        $clinicService->delete();

        return redirect()->route('admin.clinic-services.index')->with('success', 'Clinic service deleted successfully!');
    }
}
