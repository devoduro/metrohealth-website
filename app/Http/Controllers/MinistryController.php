<?php

namespace App\Http\Controllers;

use App\Models\Ministry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class MinistryController extends Controller
{
    public function interGenerational()
    {
        try {
            // Cache inter-generational ministries for 1 hour
            $ministries = Cache::remember('ministries_inter_generational', 3600, function () {
                return Ministry::where('active', true)
                    ->where('category', 'inter-generational')
                    ->orderBy('featured', 'desc')
                    ->orderBy('name')
                    ->get();
            });
            
            // Cache generational ministries for 1 hour
            $generationalMinistries = Cache::remember('ministries_generational', 3600, function () {
                return Ministry::where('active', true)
                    ->where('category', 'generational')
                    ->get();
            });
        
        // Custom order: Children's Ministry, Youth Ministry, Young Adults, Women's Fellowship, Men's Fellowship
        $order = [
            "Children's Service (CS)" => 1,
            "Junior Youth (JY)" => 2,
            "Young People’s Guild (YPG)" => 3,
            "Young Adult Fellowship (YAF)" => 4,
            "Women's Fellowship" => 5,
            "Men's Fellowship" => 6,
     
        ];
        
            $generationalMinistries = $generationalMinistries->sortBy(function($ministry) use ($order) {
                return $order[$ministry->name] ?? 999;
            })->values();
                
            return view('ministries.inter-generational', compact('ministries', 'generationalMinistries'));
        } catch (\Exception $e) {
            Log::error('Error loading inter-generational ministries: ' . $e->getMessage());
            return view('ministries.inter-generational', [
                'ministries' => collect([]),
                'generationalMinistries' => collect([])
            ])->with('error', 'Unable to load ministries at this time.');
        }
    }

    public function generational()
    {
        try {
            // Cache generational ministries for 1 hour
            $ministries = Cache::remember('ministries_generational_page', 3600, function () {
                return Ministry::where('active', true)
                    ->where('category', 'generational')
                    ->get();
            });
        
        // Custom order: CS, JY, YPG, YAF, Women's Fellowship, Men's Fellowship
        $order = [
            "Children's Service (CS)" => 1,
            "Junior Youth (JY)" => 2,
            "Young People's Guild (YPG)" => 3,
            "Young Adult Fellowship (YAF)" => 4,
            "Women's Fellowship" => 5,
            "Men's Fellowship" => 6,
            "Senior Citizens Ministry" => 7,
        ];
        
            $ministries = $ministries->sortBy(function($ministry) use ($order) {
                return $order[$ministry->name] ?? 999;
            })->values();
                
            return view('ministries.generational', compact('ministries'));
        } catch (\Exception $e) {
            Log::error('Error loading generational ministries: ' . $e->getMessage());
            return view('ministries.generational', ['ministries' => collect([])])
                ->with('error', 'Unable to load ministries at this time.');
        }
    }
    
    public function index()
    {
        try {
            // Cache all ministries for 1 hour
            $ministries = Cache::remember('ministries_all', 3600, function () {
                return Ministry::where('active', true)
                    ->orderBy('featured', 'desc')
                    ->orderBy('name')
                    ->get();
            });
                
            return view('ministries.index', compact('ministries'));
        } catch (\Exception $e) {
            Log::error('Error loading ministries index: ' . $e->getMessage());
            return view('ministries.index', ['ministries' => collect([])])
                ->with('error', 'Unable to load ministries at this time.');
        }
    }
    
    public function show($slug)
    {
        try {
            // Cache individual ministry for 1 hour
            $ministry = Cache::remember("ministry_{$slug}", 3600, function () use ($slug) {
                return Ministry::where('slug', $slug)
                    ->where('active', true)
                    ->firstOrFail();
            });
                
            return view('ministries.show', compact('ministry'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::warning("Ministry not found: {$slug}");
            abort(404, 'Ministry not found');
        } catch (\Exception $e) {
            Log::error('Error loading ministry: ' . $e->getMessage());
            abort(500, 'Unable to load ministry at this time.');
        }
    }
}
