<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact-redesign');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Save contact submission to database
        $contact = ContactSubmission::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'status' => 'new',
        ]);

        // Send email notifications
        try {
            if (config('mail.default') && config('mail.mailers.' . config('mail.default'))) {
                \Mail::to(['vspoku11@gmail.com', 'stawiah@gmail.com', 'devoduro@gmail.com'])
                    ->send(new \App\Mail\ContactFormNotification($contact));
            }
        } catch (\Exception $e) {
            \Log::error('Failed to send contact form notification email: ' . $e->getMessage());
        }

        return redirect()->route('contact')->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }
}
