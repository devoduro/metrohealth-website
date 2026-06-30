<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactSubmission::latest()->paginate(20);
        $newCount = ContactSubmission::where('status', 'new')->count();
        
        return view('admin.contact-messages.index', compact('messages', 'newCount'));
    }

    public function show(ContactSubmission $message)
    {
        // Mark as read if it's new
        if ($message->status === 'new') {
            $message->update(['status' => 'read']);
        }
        
        return view('admin.contact-messages.show', compact('message'));
    }

    public function updateStatus(Request $request, ContactSubmission $message)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,read,resolved',
            'admin_notes' => 'nullable|string',
        ]);

        $message->update($validated);

        if ($validated['status'] === 'resolved') {
            $message->update(['replied_at' => now()]);
        }

        return redirect()->route('admin.contact-messages.index')
            ->with('success', 'Message status updated successfully!');
    }

    public function destroy(ContactSubmission $message)
    {
        $message->delete();
        
        return redirect()->route('admin.contact-messages.index')
            ->with('success', 'Message deleted successfully!');
    }
}
