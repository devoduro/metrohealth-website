<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Sermon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class SermonController extends Controller
{
    public function index()
    {
        $sermons = Sermon::latest('sermon_date')->paginate(15);
        return view('dashboard.sermons.index', compact('sermons'));
    }

    public function create()
    {
        return view('dashboard.sermons.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'preacher' => 'required|string|max:255',
            'scripture_reference' => 'nullable|string|max:255',
            'sermon_date' => 'required|date',
            'description' => 'nullable|string',
            'audio_url' => 'nullable|url',
            'video_url' => 'nullable|url',
            'transcript' => 'nullable|string',
            'series' => 'nullable|string|max:255',
            'tags' => 'nullable|string',
            'featured' => 'boolean',
            'published' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        
        if (isset($validated['tags'])) {
            $validated['tags'] = array_map('trim', explode(',', $validated['tags']));
        }

        Sermon::create($validated);
        
        Cache::forget('sermons_featured');
        Cache::forget('sermons_latest');

        return redirect()->route('dashboard.sermons.index')
            ->with('success', 'Sermon created successfully.');
    }

    public function show(Sermon $sermon)
    {
        return view('dashboard.sermons.show', compact('sermon'));
    }

    public function edit(Sermon $sermon)
    {
        return view('dashboard.sermons.edit', compact('sermon'));
    }

    public function update(Request $request, Sermon $sermon)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'preacher' => 'required|string|max:255',
            'scripture_reference' => 'nullable|string|max:255',
            'sermon_date' => 'required|date',
            'description' => 'nullable|string',
            'audio_url' => 'nullable|url',
            'video_url' => 'nullable|url',
            'transcript' => 'nullable|string',
            'series' => 'nullable|string|max:255',
            'tags' => 'nullable|string',
            'featured' => 'boolean',
            'published' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        
        if (isset($validated['tags'])) {
            $validated['tags'] = array_map('trim', explode(',', $validated['tags']));
        }

        $sermon->update($validated);
        
        Cache::forget('sermons_featured');
        Cache::forget('sermons_latest');

        return redirect()->route('dashboard.sermons.index')
            ->with('success', 'Sermon updated successfully.');
    }

    public function destroy(Sermon $sermon)
    {
        $sermon->delete();
        
        Cache::forget('sermons_featured');
        Cache::forget('sermons_latest');

        return redirect()->route('dashboard.sermons.index')
            ->with('success', 'Sermon deleted successfully.');
    }

    public function toggleFeatured(Sermon $sermon)
    {
        $sermon->update(['featured' => !$sermon->featured]);
        
        Cache::forget('sermons_featured');
        
        return back()->with('success', 'Sermon featured status updated.');
    }
}
