<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ClinicAppointment;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->get();
        
        // Get clinic appointment statistics
        $serviceSchedules = ClinicAppointment::getServiceSchedules();
        $appointmentStats = [];
        $totalRevenue = 0;
        $totalAppointments = 0;
        
        foreach ($serviceSchedules as $serviceName => $schedule) {
            $count = ClinicAppointment::where('service_name', $serviceName)->count();
            $revenue = ClinicAppointment::where('service_name', $serviceName)->sum('service_fee');
            
            $appointmentStats[$serviceName] = [
                'count' => $count,
                'revenue' => $revenue,
                'fee' => $schedule['fee'],
            ];
            
            $totalRevenue += $revenue;
            $totalAppointments += $count;
        }
        
        $stats = [
            'total_services' => count($serviceSchedules),
            'total_appointments' => $totalAppointments,
            'total_revenue' => $totalRevenue,
        ];
        
        return view('admin.services.index', compact('services', 'serviceSchedules', 'appointmentStats', 'stats'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price_min' => 'nullable|numeric|min:0',
            'price_max' => 'nullable|numeric|min:0|gte:price_min',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|integer|min:0',
        ]);

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        $validated['order'] = $validated['order'] ?? 0;

        Service::create($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully!');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price_min' => 'nullable|numeric|min:0',
            'price_max' => 'nullable|numeric|min:0|gte:price_min',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|integer|min:0',
        ]);

        // Handle checkbox separately
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        
        // Set default order if not provided
        if (!isset($validated['order'])) {
            $validated['order'] = $service->order ?? 0;
        }

        $service->update($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully!');
    }
}
