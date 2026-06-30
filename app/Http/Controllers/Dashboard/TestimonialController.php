<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('order')->get();
        return view('dashboard.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('dashboard.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string',
            'client_name' => 'required|string|max:255',
            'client_position' => 'required|string|max:255',
            'client_organization' => 'required|string|max:255',
            'client_image' => 'nullable|image|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('client_image')) {
            $validated['client_image'] = $request->file('client_image')->store('testimonials', 'public');
        }

        Testimonial::create($validated);

        return redirect()->route('dashboard.testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('dashboard.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'content' => 'required|string',
            'client_name' => 'required|string|max:255',
            'client_position' => 'required|string|max:255',
            'client_organization' => 'required|string|max:255',
            'client_image' => 'nullable|image|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('client_image')) {
            if ($testimonial->client_image) {
                Storage::disk('public')->delete($testimonial->client_image);
            }
            $validated['client_image'] = $request->file('client_image')->store('testimonials', 'public');
        }

        $testimonial->update($validated);

        return redirect()->route('dashboard.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->client_image) {
            Storage::disk('public')->delete($testimonial->client_image);
        }

        $testimonial->delete();

        return redirect()->route('dashboard.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }

    public function toggleActive(Testimonial $testimonial)
    {
        $testimonial->update(['is_active' => !$testimonial->is_active]);

        return back()->with('success', 'Testimonial status updated.');
    }
}
