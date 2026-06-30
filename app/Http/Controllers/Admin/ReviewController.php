<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::latest()->paginate(20);
        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'nullable|email|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:1000',
            'is_approved' => 'boolean',
        ]);

        $validated['is_approved'] = $request->has('is_approved') ? 1 : 0;

        Review::create($validated);

        return redirect()->route('admin.reviews.index')->with('success', 'Review created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        return view('admin.reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        return view('admin.reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'nullable|email|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:1000',
            'is_approved' => 'boolean',
        ]);

        $validated['is_approved'] = $request->has('is_approved') ? 1 : 0;

        $review->update($validated);

        return redirect()->route('admin.reviews.index')->with('success', 'Review updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully!');
    }

    /**
     * Toggle approval status
     */
    public function toggleApproval(Review $review)
    {
        $review->update(['is_approved' => !$review->is_approved]);

        $status = $review->is_approved ? 'approved' : 'unapproved';
        return redirect()->back()->with('success', "Review {$status} successfully!");
    }
}
