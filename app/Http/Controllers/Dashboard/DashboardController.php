<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Product;
use App\Models\Client;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show dashboard home with statistics
     */
    public function index()
    {
        $stats = [
            'services' => Service::count(),
            'products' => Product::count(),
            'clients' => Client::count(),
            'projects' => Project::count(),
            'testimonials' => Testimonial::count(),
            'active_services' => Service::where('is_active', true)->count(),
            'active_products' => Product::where('is_active', true)->count(),
            'active_clients' => Client::where('is_active', true)->count(),
            'active_users' => User::where('is_active', true)->count(),
        ];

        return view('dashboard.index', compact('stats'));
    }

    /**
     * Show dashboard profile
     */
    public function profile()
    {
        $user = Auth::user();
        return view('dashboard.profile', compact('user'));
    }

    /**
     * Update user profile
     */
    public function updateProfile(\Illuminate\Http\Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
        ]);

        $user->update($validated);
        return back()->with('success', 'Profile updated successfully.');
    }

    /**
     * Change password
     */
    public function changePassword(\Illuminate\Http\Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->password = $validated['password'];
        $user->save();

        return back()->with('success', 'Password changed successfully.');
    }
}
