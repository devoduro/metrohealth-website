<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @include('partials.seo', [
        'title' => 'Our Team - Metro Health Hospital',
        'description' => 'Meet the expert medical team at Metro Health Hospital. Our highly skilled professionals are dedicated to providing exceptional healthcare.',
        'keywords' => 'metro health team, medical doctors kumasi, healthcare professionals, hospital staff ghana'
    ])
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/ashlocs-custom.css') }}">
</head>
<body>
    <!-- Top Header Bar -->
    @include('partials.top_header')
    
    <!-- Main Navbar -->
    @include('partials.navigation')
    
    <!-- Page Hero -->
    <section class="page-hero" style="background: linear-gradient(135deg, rgba(30, 58, 138, 0.9), rgba(63, 109, 182, 0.85)), url('images/services/1693305863314.jpeg') center/cover; padding: 120px 0 80px; margin-top: 44px; position: relative;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center text-white" data-aos="fade-up">
                    <nav aria-label="breadcrumb" style="margin-bottom: 20px;">
                        <ol class="breadcrumb justify-content-center" style="background: transparent;">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: rgba(255,255,255,0.8); text-decoration: none;">Home</a></li>
                            <li class="breadcrumb-item active" style="color: white;">News & Articles</li>
                        </ol>
                    </nav>
                    <h1 style="font-size: 3rem; font-weight: 800; margin-bottom: 15px; color: white;">News & Articles</h1>
                    <p style="font-size: 1.2rem; opacity: 0.9;">Stay informed with the latest health news, medical insights, and hospital updates</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="section-padding" style="padding: 70px 0; background: #f9f9f9;">
        <div class="container">
            <div class="row">
                <!-- Main Content - Blog Posts -->
                <div class="col-lg-8">
                    <!-- Featured Article -->
                    @if(isset($posts) && $posts->isNotEmpty())
                    @php $featuredPost = $posts->first(); @endphp
                    <article class="featured-article mb-5" data-aos="fade-up">
                        <div style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);">
                            <div class="row g-0">
                                <div class="col-md-6">
                                    <div style="position: relative; height: 100%; min-height: 350px;">
                                        @if($featuredPost->image)
                                            <img src="{{ asset('storage/' . $featuredPost->image) }}" alt="{{ $featuredPost->title }}" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=800'">
                                        @else
                                            <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=800" alt="{{ $featuredPost->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                        @endif
                                        <div style="position: absolute; top: 20px; left: 20px;">
                                            <span style="background: #a8207a; color: white; padding: 8px 20px; border-radius: 25px; font-weight: 600; font-size: 0.85rem;">Featured</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div style="padding: 35px;">
                                        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                                            <span style="color: #84a33f; font-weight: 600; font-size: 0.9rem;">
                                                <i class="far fa-calendar me-2"></i>{{ $featuredPost->published_at ? $featuredPost->published_at->format('M d, Y') : 'Recent' }}
                                            </span>
                                            <span style="color: #999;">•</span>
                                            <span style="color: #666; font-size: 0.9rem;">
                                                <i class="far fa-user me-2"></i>{{ $featuredPost->author ?? 'Admin' }}
                                            </span>
                                        </div>
                                        <h2 style="font-size: 1.8rem; font-weight: 700; color: #1a1a1a; margin-bottom: 15px; line-height: 1.3;">{{ $featuredPost->title }}</h2>
                                        <p style="color: #666; font-size: 0.95rem; line-height: 1.7; margin-bottom: 20px;">{{ Str::limit($featuredPost->excerpt ?? $featuredPost->content, 150) }}</p>
                                        <a href="{{ route('news-update.show', $featuredPost->slug) }}" class="btn" style="background: #a8207a; color: white; padding: 12px 30px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">
                                            Read Full Article <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    @endif

                    <!-- Recent Articles Grid -->
                    <div class="recent-articles">
                        <h3 style="font-size: 1.8rem; font-weight: 700; color: #1a1a1a; margin-bottom: 30px;" data-aos="fade-up">Recent Articles</h3>
                        <div class="row g-4">
                            @if(isset($posts) && $posts->count() > 1)
                                @foreach($posts->skip(1) as $post)
                                <div class="col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                                    <article style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease; height: 100%;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 25px rgba(0, 0, 0, 0.12)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 3px 15px rgba(0, 0, 0, 0.08)'">
                                        <div style="position: relative; height: 220px; overflow: hidden;">
                                            @if($post->image)
                                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1505751172876-fa1923c5c528?w=800'">
                                            @else
                                                <img src="https://images.unsplash.com/photo-{{ ['1505751172876-fa1923c5c528', '1576091160399-112ba8d25d1d', '1519494026892-80bbd2d6fd0d', '1584820927498-cfe5211fd8bf'][$loop->index % 4] }}?w=800" alt="{{ $post->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                            @endif
                                            <div style="position: absolute; bottom: 15px; left: 15px;">
                                                <span style="background: rgba(255, 255, 255, 0.95); color: #a8207a; padding: 6px 15px; border-radius: 20px; font-weight: 600; font-size: 0.8rem;">
                                                    {{ $post->published_at ? $post->published_at->format('M d, Y') : 'Recent' }}
                                                </span>
                                            </div>
                                        </div>
                                        <div style="padding: 25px;">
                                            <h4 style="font-size: 1.2rem; font-weight: 700; color: #1a1a1a; margin-bottom: 12px; line-height: 1.4;">{{ Str::limit($post->title, 60) }}</h4>
                                            <p style="color: #666; font-size: 0.9rem; line-height: 1.6; margin-bottom: 15px;">{{ Str::limit($post->excerpt ?? $post->content, 100) }}</p>
                                            <div style="display: flex; align-items: center; justify-content: space-between; padding-top: 15px; border-top: 1px solid #eee;">
                                                <span style="color: #999; font-size: 0.85rem;">
                                                    <i class="far fa-user me-1"></i>{{ $post->author ?? 'Admin' }}
                                                </span>
                                                <a href="{{ route('news-update.show', $post->slug) }}" style="color: #a8207a; font-weight: 600; text-decoration: none; font-size: 0.9rem;">
                                                    Read More <i class="fas fa-arrow-right ms-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                @endforeach
                            @else
                                <!-- Sample Articles if no posts exist -->
                                <div class="col-md-6" data-aos="fade-up">
                                    <article style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);">
                                        <div style="position: relative; height: 220px; overflow: hidden;">
                                            <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=800" alt="Health Article" style="width: 100%; height: 100%; object-fit: cover;">
                                            <div style="position: absolute; bottom: 15px; left: 15px;">
                                                <span style="background: rgba(255, 255, 255, 0.95); color: #a8207a; padding: 6px 15px; border-radius: 20px; font-weight: 600; font-size: 0.8rem;">Coming Soon</span>
                                            </div>
                                        </div>
                                        <div style="padding: 25px;">
                                            <h4 style="font-size: 1.2rem; font-weight: 700; color: #1a1a1a; margin-bottom: 12px;">New Articles Coming Soon</h4>
                                            <p style="color: #666; font-size: 0.9rem; line-height: 1.6; margin-bottom: 15px;">Stay tuned for the latest health news and medical insights from Metro Health Hospital.</p>
                                        </div>
                                    </article>
                                </div>
                            @endif
                        </div>

                        <!-- Pagination -->
                        @if(isset($posts) && $posts->hasPages())
                        <div class="mt-5 d-flex justify-content-center">
                            {{ $posts->links() }}
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4" data-aos="fade-left">
                    <!-- Search Widget -->
                    <div class="sidebar-widget mb-4" style="background: white; border-radius: 15px; padding: 30px; box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);">
                        <h5 style="font-weight: 700; color: #1a1a1a; margin-bottom: 20px; font-size: 1.2rem;">Search Articles</h5>
                        <form action="{{ route('news-update.index') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search articles..." style="border: 2px solid #eee; padding: 12px 15px; border-radius: 8px 0 0 8px;">
                                <button class="btn" type="submit" style="background: #a8207a; color: white; border-radius: 0 8px 8px 0; padding: 12px 20px;">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Categories Widget -->
                    <div class="sidebar-widget mb-4" style="background: white; border-radius: 15px; padding: 30px; box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);">
                        <h5 style="font-weight: 700; color: #1a1a1a; margin-bottom: 20px; font-size: 1.2rem; position: relative; padding-bottom: 10px;">
                            Categories
                            <span style="position: absolute; bottom: 0; left: 0; width: 40px; height: 3px; background: #84a33f;"></span>
                        </h5>
                        <div style="display: flex; flex-direction: column; gap: 10px;">
                            <a href="#" style="display: flex; align-items: center; justify-content: space-between; padding: 12px 15px; background: #f8f9fa; border-radius: 8px; text-decoration: none; color: #666; transition: all 0.3s ease;" onmouseover="this.style.background='#a8207a'; this.style.color='white'" onmouseout="this.style.background='#f8f9fa'; this.style.color='#666'">
                                <span><i class="fas fa-heartbeat me-2"></i>Health Tips</span>
                                <span style="background: white; color: #a8207a; padding: 3px 10px; border-radius: 12px; font-size: 0.8rem; font-weight: 600;">12</span>
                            </a>
                            <a href="#" style="display: flex; align-items: center; justify-content: space-between; padding: 12px 15px; background: #f8f9fa; border-radius: 8px; text-decoration: none; color: #666; transition: all 0.3s ease;" onmouseover="this.style.background='#a8207a'; this.style.color='white'" onmouseout="this.style.background='#f8f9fa'; this.style.color='#666'">
                                <span><i class="fas fa-hospital me-2"></i>Hospital News</span>
                                <span style="background: white; color: #a8207a; padding: 3px 10px; border-radius: 12px; font-size: 0.8rem; font-weight: 600;">8</span>
                            </a>
                            <a href="#" style="display: flex; align-items: center; justify-content: space-between; padding: 12px 15px; background: #f8f9fa; border-radius: 8px; text-decoration: none; color: #666; transition: all 0.3s ease;" onmouseover="this.style.background='#a8207a'; this.style.color='white'" onmouseout="this.style.background='#f8f9fa'; this.style.color='#666'">
                                <span><i class="fas fa-user-md me-2"></i>Medical Insights</span>
                                <span style="background: white; color: #a8207a; padding: 3px 10px; border-radius: 12px; font-size: 0.8rem; font-weight: 600;">15</span>
                            </a>
                            <a href="#" style="display: flex; align-items: center; justify-content: space-between; padding: 12px 15px; background: #f8f9fa; border-radius: 8px; text-decoration: none; color: #666; transition: all 0.3s ease;" onmouseover="this.style.background='#a8207a'; this.style.color='white'" onmouseout="this.style.background='#f8f9fa'; this.style.color='#666'">
                                <span><i class="fas fa-stethoscope me-2"></i>Patient Care</span>
                                <span style="background: white; color: #a8207a; padding: 3px 10px; border-radius: 12px; font-size: 0.8rem; font-weight: 600;">10</span>
                            </a>
                            <a href="#" style="display: flex; align-items: center; justify-content: space-between; padding: 12px 15px; background: #f8f9fa; border-radius: 8px; text-decoration: none; color: #666; transition: all 0.3s ease;" onmouseover="this.style.background='#a8207a'; this.style.color='white'" onmouseout="this.style.background='#f8f9fa'; this.style.color='#666'">
                                <span><i class="fas fa-calendar-check me-2"></i>Events</span>
                                <span style="background: white; color: #a8207a; padding: 3px 10px; border-radius: 12px; font-size: 0.8rem; font-weight: 600;">6</span>
                            </a>
                        </div>
                    </div>

                    <!-- Recent Posts Widget -->
                    <div class="sidebar-widget mb-4" style="background: white; border-radius: 15px; padding: 30px; box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);">
                        <h5 style="font-weight: 700; color: #1a1a1a; margin-bottom: 20px; font-size: 1.2rem; position: relative; padding-bottom: 10px;">
                            Recent Posts
                            <span style="position: absolute; bottom: 0; left: 0; width: 40px; height: 3px; background: #84a33f;"></span>
                        </h5>
                        <div style="display: flex; flex-direction: column; gap: 20px;">
                            @if(isset($posts) && $posts->count() > 0)
                                @foreach($posts->take(4) as $recentPost)
                                <div style="display: flex; gap: 15px;">
                                    <div style="flex-shrink: 0; width: 70px; height: 70px; border-radius: 10px; overflow: hidden;">
                                        @if($recentPost->image)
                                            <img src="{{ asset('storage/' . $recentPost->image) }}" alt="{{ $recentPost->title }}" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=200'">
                                        @else
                                            <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=200" alt="{{ $recentPost->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                        @endif
                                    </div>
                                    <div style="flex: 1;">
                                        <a href="{{ route('news-update.show', $recentPost->slug) }}" style="color: #1a1a1a; text-decoration: none; font-weight: 600; font-size: 0.9rem; line-height: 1.4; display: block; margin-bottom: 5px;">{{ Str::limit($recentPost->title, 50) }}</a>
                                        <span style="color: #999; font-size: 0.8rem;">
                                            <i class="far fa-calendar me-1"></i>{{ $recentPost->published_at ? $recentPost->published_at->format('M d, Y') : 'Recent' }}
                                        </span>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <p style="color: #666; font-size: 0.9rem; margin: 0;">No recent posts available.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Newsletter Widget -->
                    <div class="sidebar-widget" style="background: linear-gradient(135deg, #33970f, #84a33f); border-radius: 15px; padding: 30px; box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08); color: white;">
                        <h5 style="font-weight: 700; margin-bottom: 15px; font-size: 1.2rem; color: white;">Stay Updated</h5>
                        <p style="font-size: 0.9rem; margin-bottom: 20px; opacity: 0.95;">Subscribe to our newsletter for health tips and updates.</p>
                        <form>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Your email address" style="border: none; padding: 12px 15px; border-radius: 8px;">
                            </div>
                            <button type="submit" class="btn btn-light w-100" style="padding: 12px; font-weight: 600; border-radius: 8px;">Subscribe Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 50
        });
    </script>
</body>
</html>
