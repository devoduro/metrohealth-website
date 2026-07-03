<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Product;
use App\Models\Client;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\CompanySetting;
use App\Models\Review;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        try {
            // Cache homepage data for 30 minutes
            $services = Cache::remember('homepage_services', 1800, function () {
                return Service::active()->ordered()->get();
            });
            
            $products = Cache::remember('homepage_products', 1800, function () {
                return Product::active()->ordered()->get();
            });
            
            $clients = Cache::remember('homepage_clients', 1800, function () {
                return Client::active()->ordered()->get();
            });
            
            $projects = Cache::remember('homepage_projects', 1800, function () {
                return Project::active()->ordered()->get();
            });
            
            $testimonials = Cache::remember('homepage_testimonials', 1800, function () {
                return Testimonial::active()->ordered()->get();
            });
            
            // Get live reviews (not cached for real-time display)
            $reviews = Review::approved()->latest()->take(10)->get();
            
            // Get latest blog posts for homepage
            $blogPosts = Cache::remember('homepage_blog_posts', 1800, function () {
                return BlogPost::published()->latest('published_at')->take(6)->get();
            });
            
            // Cache company settings for 1 hour
            $settings = Cache::remember('company_settings', 3600, function () {
                return [
                    'company_name' => CompanySetting::get('company_name', 'HiCliQs Ghana'),
                    'tagline' => CompanySetting::get('tagline', 'Empowering Ghana with Digital Innovation'),
                    'about_title' => CompanySetting::get('about_title', 'Decade of Excellence in IT Solutions'),
                    'about_description' => CompanySetting::get('about_description', 'With over a decade of experience and more than 150+ successful projects, HiCliQs is a trusted partner in delivering customized IT solutions across Ghana.'),
                    'years_experience' => CompanySetting::get('years_experience', '10'),
                    'total_projects' => CompanySetting::get('total_projects', '150'),
                    'success_rate' => CompanySetting::get('success_rate', '98'),
                    'phone' => CompanySetting::get('phone', '0242724849'),
                    'email' => CompanySetting::get('email', 'info@hicliqs.com'),
                    'location' => CompanySetting::get('location', 'Kumasi, Ghana'),
                    'facebook' => CompanySetting::get('facebook', 'https://web.facebook.com/hicliqsgh'),
                    'instagram' => CompanySetting::get('instagram', 'https://www.instagram.com/hicliqsgh/'),
                    'tiktok' => CompanySetting::get('tiktok', 'https://www.tiktok.com/@hicliqsgh'),
                ];
            });

            return view('home-redesign', compact('services', 'products', 'clients', 'projects', 'testimonials', 'reviews', 'blogPosts', 'settings'));
        } catch (\Exception $e) {
            Log::error('Error loading homepage: ' . $e->getMessage());
            // Still attempt to load blog posts even during partial failure
            $blogPostsFallback = collect([]);
            $reviewsFallback = collect([]);
            try {
                $blogPostsFallback = BlogPost::published()->latest('published_at')->take(6)->get();
                $reviewsFallback = Review::approved()->latest()->take(10)->get();
            } catch (\Exception $innerE) {
                Log::error('Error loading blog posts in fallback: ' . $innerE->getMessage());
            }

            return view('home-redesign', [
                'services' => collect([]),
                'products' => collect([]),
                'clients' => collect([]),
                'projects' => collect([]),
                'testimonials' => collect([]),
                'reviews' => $reviewsFallback,
                'blogPosts' => $blogPostsFallback,
                'settings' => [
                    'company_name' => 'HiCliQs Ghana',
                    'tagline' => 'Empowering Ghana with Digital Innovation',
                    'phone' => '0242724849',
                    'email' => 'info@hicliqs.com',
                ]
            ])->with('error', 'Some content may not be available at this time.');
        }
    }
}
