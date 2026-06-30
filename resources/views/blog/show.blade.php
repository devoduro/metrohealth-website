<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - Metro Health Hospital</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/ashlocs-custom.css') }}">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .page-hero {
            background: linear-gradient(135deg, rgba(30, 58, 138, 0.9), rgba(59, 130, 246, 0.85)), url('https://images.unsplash.com/photo-1504439468489-c8920d796a29?w=1920') center/cover;
            padding: 120px 0 80px;
            position: relative;
        }

        .article-section {
            padding: 70px 0;
            background: #f8f9fa;
        }

        .article-content {
            background: white;
            border-radius: 20px;
            padding: 50px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }

        .article-featured-image {
            width: 100%;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .article-meta {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            padding: 20px 0;
            border-bottom: 2px solid #e9ecef;
            margin-bottom: 30px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #666;
            font-size: 0.95rem;
        }

        .meta-item i {
            color: #3b82f6;
        }

        .article-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .article-body {
            font-size: 1.1rem;
            line-height: 1.9;
            color: #333;
        }

        .article-body p {
            margin-bottom: 20px;
        }

        .article-body h2, .article-body h3 {
            margin-top: 30px;
            margin-bottom: 15px;
            color: #1a1a1a;
        }

        .category-badge {
            display: inline-block;
            background: linear-gradient(135deg, #3b82f6, #1e3a8a);
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.85rem;
            margin-bottom: 20px;
        }

        .share-section {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 15px;
            margin-top: 40px;
        }

        .share-section h5 {
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 15px;
        }

        .share-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .share-btn {
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .share-btn-facebook {
            background: #1877f2;
            color: white;
        }

        .share-btn-twitter {
            background: #1da1f2;
            color: white;
        }

        .share-btn-linkedin {
            background: #0a66c2;
            color: white;
        }

        .share-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Sidebar Styles */
        .sidebar-widget {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }

        .sidebar-widget h5 {
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 20px;
            font-size: 1.2rem;
            position: relative;
            padding-bottom: 10px;
        }

        .sidebar-widget h5::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: #3b82f6;
        }

        .search-form {
            display: flex;
            gap: 10px;
        }

        .search-form input {
            flex: 1;
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            font-size: 0.95rem;
        }

        .search-form button {
            padding: 12px 20px;
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-form button:hover {
            background: #1e3a8a;
        }

        .category-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 15px;
            margin-bottom: 8px;
            border-radius: 10px;
            background: #f8f9fa;
            text-decoration: none;
            color: #666;
            transition: all 0.3s ease;
        }

        .category-item:hover {
            background: #3b82f6;
            color: white;
            padding-left: 20px;
        }

        .category-count {
            background: white;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .category-item:hover .category-count {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .recent-post-item {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        .recent-post-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .recent-post-thumb {
            flex-shrink: 0;
            width: 70px;
            height: 70px;
            border-radius: 10px;
            overflow: hidden;
        }

        .recent-post-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .recent-post-content h6 {
            font-size: 0.9rem;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 5px;
            line-height: 1.4;
        }

        .recent-post-content h6 a {
            color: #1a1a1a;
            text-decoration: none;
        }

        .recent-post-content h6 a:hover {
            color: #3b82f6;
        }

        .post-date {
            color: #999;
            font-size: 0.8rem;
        }

        .related-articles {
            background: white;
            border-radius: 20px;
            padding: 50px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
        }

        .related-article-card {
            background: #f8f9fa;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
        }

        .related-article-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .related-article-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .related-article-body {
            padding: 25px;
        }

        .related-article-body h5 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 10px;
        }

        .related-article-body h5 a {
            color: #1a1a1a;
            text-decoration: none;
        }

        .related-article-body h5 a:hover {
            color: #3b82f6;
        }

        @media (max-width: 768px) {
            .article-content {
                padding: 30px 20px;
            }

            .article-title {
                font-size: 1.8rem;
            }

            .article-body {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    @include('partials.top_header')
    @include('partials.navigation')

    <!-- Page Hero -->
    <section class="page-hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center text-white" data-aos="fade-up">
                    <h1 style="font-size: 3rem; color: white; font-weight: 800; margin-bottom: 4px; margin-top: 40px;">News & Articles</h1>
                    <p style="font-size: 1.2rem; opacity: 0.95;">Stay informed with the latest health news and medical insights</p>
                    <nav aria-label="breadcrumb" style="margin-top: 20px;">
                        <ol class="breadcrumb justify-content-center" style="background: transparent;">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: white; text-decoration: none;">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('news-articles') }}" style="color: white; text-decoration: none;">News</a></li>
                            <li class="breadcrumb-item active" style="color: rgba(255,255,255,0.8);">{{ Str::limit($post->title, 40) }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Article Section -->
    <section class="article-section">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <article class="article-content" data-aos="fade-up">
                        @if($post->category)
                        <span class="category-badge">{{ strtoupper($post->category) }}</span>
                        @endif

                        <h1 class="article-title">{{ $post->title }}</h1>

                        <div class="article-meta">
                            <div class="meta-item">
                                <i class="fas fa-user"></i>
                                <span>{{ $post->author ?? 'Metro Health Team' }}</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>{{ $post->published_at ? $post->published_at->format('F d, Y') : 'Recent' }}</span>
                            </div>
                            @if($post->category)
                            <div class="meta-item">
                                <i class="fas fa-folder"></i>
                                <span>{{ $post->category }}</span>
                            </div>
                            @endif
                        </div>

                        @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="article-featured-image" onerror="this.src='https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=1200'">
                        @endif

                        <div class="article-body">
                            {!! nl2br(e($post->content)) !!}
                        </div>

                        <!-- Share Section -->
                        <div class="share-section">
                            <h5>Share this article</h5>
                            <div class="share-buttons">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="share-btn share-btn-facebook">
                                    <i class="fab fa-facebook-f"></i> Facebook
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}" target="_blank" class="share-btn share-btn-twitter">
                                    <i class="fab fa-twitter"></i> Twitter
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($post->title) }}" target="_blank" class="share-btn share-btn-linkedin">
                                    <i class="fab fa-linkedin-in"></i> LinkedIn
                                </a>
                            </div>
                        </div>
                    </article>

                    <!-- Related Articles -->
                    @if($relatedPosts && $relatedPosts->count() > 0)
                    <div class="related-articles" data-aos="fade-up">
                        <h3 style="font-size: 2rem; font-weight: 800; color: #1a1a1a; margin-bottom: 30px;">Related Articles</h3>
                        <div class="row g-4">
                            @foreach($relatedPosts as $relatedPost)
                            <div class="col-md-6">
                                <div class="related-article-card">
                                    @if($relatedPost->image)
                                    <img src="{{ asset('storage/' . $relatedPost->image) }}" alt="{{ $relatedPost->title }}" class="related-article-image" onerror="this.src='https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=400'">
                                    @else
                                    <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=400" alt="{{ $relatedPost->title }}" class="related-article-image">
                                    @endif
                                    <div class="related-article-body">
                                        <h5><a href="{{ route('news-update.show', $relatedPost->slug) }}">{{ $relatedPost->title }}</a></h5>
                                        <p style="color: #666; font-size: 0.9rem; margin-bottom: 10px;">{{ Str::limit($relatedPost->excerpt, 100) }}</p>
                                        <div class="meta-item">
                                            <i class="fas fa-calendar"></i>
                                            <span>{{ $relatedPost->published_at ? $relatedPost->published_at->format('M d, Y') : 'Recent' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Search Widget -->
                    <div class="sidebar-widget" data-aos="fade-left">
                        <h5>Search Articles</h5>
                        <form action="{{ route('news-articles') }}" method="GET" class="search-form">
                            <input type="text" name="search" placeholder="Search articles..." value="{{ request('search') }}">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>

                    <!-- Categories Widget -->
                    <div class="sidebar-widget" data-aos="fade-left" data-aos-delay="100">
                        <h5>Categories</h5>
                        <div>
                            <a href="{{ route('news-articles') }}?category=Health Tips" class="category-item">
                                <span>Health Tips</span>
                                <span class="category-count">12</span>
                            </a>
                            <a href="{{ route('news-articles') }}?category=Hospital News" class="category-item">
                                <span>Hospital News</span>
                                <span class="category-count">8</span>
                            </a>
                            <a href="{{ route('news-articles') }}?category=Medical Insights" class="category-item">
                                <span>Medical Insights</span>
                                <span class="category-count">15</span>
                            </a>
                            <a href="{{ route('news-articles') }}?category=Patient Care" class="category-item">
                                <span>Patient Care</span>
                                <span class="category-count">10</span>
                            </a>
                            <a href="{{ route('news-articles') }}?category=Events" class="category-item">
                                <span>Events</span>
                                <span class="category-count">6</span>
                            </a>
                        </div>
                    </div>

                    <!-- Recent Posts Widget -->
                    <div class="sidebar-widget" data-aos="fade-left" data-aos-delay="200">
                        <h5>Recent Posts</h5>
                        <div>
                            @php
                                $recentPosts = \App\Models\BlogPost::where('published', true)
                                    ->where('id', '!=', $post->id)
                                    ->orderBy('published_at', 'desc')
                                    ->take(4)
                                    ->get();
                            @endphp

                            @if($recentPosts->count() > 0)
                                @foreach($recentPosts as $recentPost)
                                <div class="recent-post-item">
                                    <div class="recent-post-thumb">
                                        @if($recentPost->image)
                                            <img src="{{ asset('storage/' . $recentPost->image) }}" alt="{{ $recentPost->title }}" onerror="this.src='https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=200'">
                                        @else
                                            <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=200" alt="{{ $recentPost->title }}">
                                        @endif
                                    </div>
                                    <div class="recent-post-content">
                                        <h6><a href="{{ route('news-update.show', $recentPost->slug) }}">{{ Str::limit($recentPost->title, 50) }}</a></h6>
                                        <span class="post-date">
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
                    <div class="sidebar-widget" style="background: linear-gradient(135deg, #3b82f6, #1e3a8a); color: white;" data-aos="fade-left" data-aos-delay="300">
                        <h5 style="color: white;">Subscribe to Newsletter</h5>
                        <p style="font-size: 0.9rem; margin-bottom: 20px; opacity: 0.95;">Get the latest health tips and news delivered to your inbox.</p>
                        <form action="#" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Your email address" required style="padding: 12px; border-radius: 10px; border: none;">
                            </div>
                            <button type="submit" class="btn btn-light w-100" style="padding: 12px; font-weight: 600; border-radius: 10px;">
                                Subscribe Now <i class="fas fa-arrow-right ms-2"></i>
                            </button>
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
