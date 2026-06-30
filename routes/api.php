<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Ministry;
use App\Models\BlogPost;
use App\Models\Sermon;
use App\Models\Gallery;
use App\Models\Video;
use Illuminate\Support\Facades\Cache;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Public API endpoints for frontend AJAX requests
Route::prefix('v1')->group(function () {
    
    // Ministries API
    Route::get('/ministries', function (Request $request) {
        $category = $request->get('category');
        $query = Ministry::where('active', true);
        
        if ($category) {
            $query->where('category', $category);
        }
        
        return response()->json([
            'success' => true,
            'data' => $query->orderBy('featured', 'desc')->orderBy('name')->get()
        ]);
    });
    
    Route::get('/ministries/{slug}', function ($slug) {
        $ministry = Ministry::where('slug', $slug)
            ->where('active', true)
            ->first();
            
        if (!$ministry) {
            return response()->json(['success' => false, 'message' => 'Ministry not found'], 404);
        }
        
        return response()->json(['success' => true, 'data' => $ministry]);
    });
    
    // Blog Posts API
    Route::get('/blog', function (Request $request) {
        $query = BlogPost::where('published', true);
        
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }
        
        if ($request->has('author')) {
            $query->where('author', $request->get('author'));
        }
        
        $posts = $query->latest('published_at')
            ->paginate($request->get('per_page', 12));
            
        return response()->json(['success' => true, 'data' => $posts]);
    });
    
    Route::get('/blog/{slug}', function ($slug) {
        $post = BlogPost::where('slug', $slug)
            ->where('published', true)
            ->first();
            
        if (!$post) {
            return response()->json(['success' => false, 'message' => 'Post not found'], 404);
        }
        
        return response()->json(['success' => true, 'data' => $post]);
    });
    
    // Sermons API
    Route::get('/sermons', function (Request $request) {
        $query = Sermon::published();
        
        if ($request->has('series')) {
            $query->bySeries($request->get('series'));
        }
        
        if ($request->has('featured')) {
            $query->featured();
        }
        
        $sermons = $query->latest('sermon_date')
            ->paginate($request->get('per_page', 12));
            
        return response()->json(['success' => true, 'data' => $sermons]);
    });
    
    Route::get('/sermons/{slug}', function ($slug) {
        $sermon = Sermon::where('slug', $slug)
            ->where('published', true)
            ->first();
            
        if (!$sermon) {
            return response()->json(['success' => false, 'message' => 'Sermon not found'], 404);
        }
        
        return response()->json(['success' => true, 'data' => $sermon]);
    });
    
    // Galleries API
    Route::get('/galleries', function (Request $request) {
        $query = Gallery::with('images');
        
        if ($request->has('category')) {
            $query->where('category', $request->get('category'));
        }
        
        $galleries = $query->latest()
            ->paginate($request->get('per_page', 12));
            
        return response()->json(['success' => true, 'data' => $galleries]);
    });
    
    // Videos API
    Route::get('/videos', function (Request $request) {
        $query = Video::published();
        
        if ($request->has('category')) {
            $query->where('category', $request->get('category'));
        }
        
        $videos = $query->orderBy('featured', 'desc')
            ->latest()
            ->paginate($request->get('per_page', 12));
            
        return response()->json(['success' => true, 'data' => $videos]);
    });
    
    // Search API - Global search across content
    Route::get('/search', function (Request $request) {
        $query = $request->get('q');
        
        if (!$query) {
            return response()->json(['success' => false, 'message' => 'Search query required'], 400);
        }
        
        $results = [
            'ministries' => Ministry::where('active', true)
                ->where(function($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%")
                      ->orWhere('description', 'like', "%{$query}%");
                })
                ->limit(5)
                ->get(),
            'blog_posts' => BlogPost::where('published', true)
                ->where(function($q) use ($query) {
                    $q->where('title', 'like', "%{$query}%")
                      ->orWhere('excerpt', 'like', "%{$query}%");
                })
                ->limit(5)
                ->get(),
            'sermons' => Sermon::published()
                ->where(function($q) use ($query) {
                    $q->where('title', 'like', "%{$query}%")
                      ->orWhere('description', 'like', "%{$query}%");
                })
                ->limit(5)
                ->get(),
        ];
        
        return response()->json(['success' => true, 'data' => $results]);
    });
});
