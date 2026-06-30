<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:1000',
        ]);

        // Map form fields to database columns
        Review::create([
            'customer_name' => $validated['name'],
            'customer_email' => $validated['email'] ?? null,
            'rating' => $validated['rating'],
            'review' => $validated['review'],
            'is_approved' => true, // Auto-approve for live reviews
        ]);

        return redirect()->back()->with('success', 'Thank you for your review! It has been posted.');
    }
}
