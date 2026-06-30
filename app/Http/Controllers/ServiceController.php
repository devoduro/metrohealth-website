<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ServiceController extends Controller
{
    public function index()
    {
        try {
            $services = Service::active()->ordered()->get();
            
            return view('services.index-redesign', compact('services'));
        } catch (\Exception $e) {
            Log::error('Error loading services: ' . $e->getMessage());
            return view('services.index-redesign', ['services' => collect([])]);
        }
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $relatedServices = Service::active()
            ->where('id', '!=', $service->id)
            ->ordered()
            ->limit(3)
            ->get();
        
        return view('services.show-redesign', compact('service', 'relatedServices'));
    }
}
