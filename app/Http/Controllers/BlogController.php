<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = BlogPost::where('published', true);
            
            // Search functionality
            if ($request->has('search') && $request->search) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('excerpt', 'like', "%{$search}%")
                      ->orWhere('content', 'like', "%{$search}%");
                });
            }
            
            // Author filter
            if ($request->has('author') && $request->author) {
                $query->where('author', $request->author);
            }
            
            // Get posts with pagination
            $posts = $query->latest('published_at')->paginate(12);
            
            // Get all unique authors for filter
            $authors = Cache::remember('blog_authors', 3600, function () {
                return BlogPost::where('published', true)
                    ->distinct()
                    ->pluck('author')
                    ->filter()
                    ->sort()
                    ->values();
            });
            
            return view('blog.index', compact('posts', 'authors'));
        } catch (\Exception $e) {
            Log::error('Error loading blog posts: ' . $e->getMessage());
            return view('blog.index', [
                'posts' => new \Illuminate\Pagination\LengthAwarePaginator([], 0, 12),
                'authors' => collect([])
            ])->with('error', 'Unable to load blog posts at this time.');
        }
    }

    public function show($slug)
    {
        try {
            // Cache individual blog post for 30 minutes
            $post = Cache::remember("blog_post_{$slug}", 1800, function () use ($slug) {
                return BlogPost::where('slug', $slug)
                    ->where('published', true)
                    ->firstOrFail();
            });
            
            // Get related posts by same author or recent posts
            $relatedPosts = Cache::remember("blog_related_{$slug}", 1800, function () use ($post) {
                return BlogPost::where('published', true)
                    ->where('id', '!=', $post->id)
                    ->where(function($query) use ($post) {
                        $query->where('author', $post->author)
                              ->orWhereRaw('1=1'); // Fallback to any posts
                    })
                    ->latest('published_at')
                    ->take(4)
                    ->get();
            });
            
            return view('blog.show', compact('post', 'relatedPosts'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::warning("Blog post not found: {$slug}");
            abort(404, 'Blog post not found');
        } catch (\Exception $e) {
            Log::error('Error loading blog post: ' . $e->getMessage());
            abort(500, 'Unable to load blog post at this time.');
        }
    }
    
    // Keep old hardcoded data as fallback/example
    private function getOldHardcodedData()
    {
        return $posts = [
            [
                'id' => 1,
                'title' => 'YAF Donates Stationery to VRA Presby School',
                'slug' => 'yaf-donates-stationery-vra-presby-school',
                'excerpt' => 'The Young Adults\' Fellowship (YAF) of the Presbyterian Church of Ghana, Monninger Congregation, Akosombo, led by its President Brother Stephen Addo and Fellowship Coordinator Mr Moses Teye Tetteh...',
                'content' => 'The Young Adults\' Fellowship (YAF) of the Presbyterian Church of Ghana, Monninger Congregation, Akosombo, led by its President Brother Stephen Addo and Fellowship Coordinator Mr Moses Teye Tetteh, District Minister and Resident Minister, Rev George Kwabi visited VRA Presby School to present stationery to final-year students.',
                'image' => 'https://img.youtube.com/vi/default/maxresdefault.jpg',
                'video_url' => 'https://web.facebook.com/DamcityTv/videos/995266299298362',
                'date' => 'May 26, 2025',
                'author' => 'YAF Coordinator',
                'category' => 'YAF OUTREACH'
            ],
            [
                'id' => 2,
                'title' => 'Ecumenical Visit to Akosombo Muslim Community',
                'slug' => 'ecumenical-visit-akosombo-muslim-community',
                'excerpt' => 'Our congregation participated in an ecumenical visit to the Akosombo Muslim Community, fostering interfaith dialogue and building bridges of understanding...',
                'content' => 'Our congregation participated in an ecumenical visit to the Akosombo Muslim Community, fostering interfaith dialogue and building bridges of understanding and peace in our community.',
                'image' => 'https://img.youtube.com/vi/default/maxresdefault.jpg',
                'video_url' => 'https://web.facebook.com/100070341725574/videos/2488763854790787',
                'date' => '2025',
                'author' => 'Church Secretary',
                'category' => 'ECUMENICAL'
            ],
            [
                'id' => 3,
                'title' => 'Unlocking Ewe Culture Through Food',
                'slug' => 'unlocking-ewe-culture-through-food',
                'excerpt' => 'Experience the rich traditions of Ewe culture through our celebration of Ghanaian delights. Discover the heritage and flavors that make our cultural celebrations special.',
                'content' => 'Experience the rich traditions of Ewe culture through our celebration of Ghanaian delights. Discover the heritage and flavors that make our cultural celebrations special.',
                'image' => 'https://img.youtube.com/vi/qsg6vwHZcDE/maxresdefault.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=qsg6vwHZcDE',
                'date' => '2024',
                'author' => 'Cultural Committee',
                'category' => 'CULTURAL'
            ],
            [
                'id' => 4,
                'title' => '90% Score for COVID-19 Protocol Adherence',
                'slug' => 'covid-19-protocol-adherence',
                'excerpt' => 'Monninger Presby Church scored 90% at first service after the lifting of ban on churches. Damcity TV visited to fellowship and observe adherence to all government protocols...',
                'content' => 'Monninger Presby Church scored 90% at first service after the lifting of ban on churches. Damcity TV visited to fellowship and observe adherence to all government protocols. Kudos to Monninger Presby, Akosombo for outstanding performance!',
                'image' => 'https://img.youtube.com/vi/bbT06TR1tlA/maxresdefault.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=bbT06TR1tlA',
                'date' => '2020',
                'author' => 'Health & Safety Team',
                'category' => 'HEALTH & SAFETY'
            ],
        ];
    }
}
