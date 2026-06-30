<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @include('partials.seo', [
        'title' => 'Quality Healthcare Services in Ghana',
        'description' => 'Metro Health Hospital provides comprehensive healthcare services including specialist clinics, diagnostic services, and quality medical care. Book your appointment today.',
        'keywords' => 'healthcare Ghana, hospital Accra, medical services, specialist doctors, diagnostic services, health insurance, quality healthcare'
    ])
    
    @include('partials.structured-data')
    
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
    <!-- Hero Slider Section -->
    <section class="hero-slider">
        <!-- Slide 1 -->
        <div class="hero-slide active" style="background-image: url('images/sliders/slider1-11.Jpg');">
            <div class="hero-slide-content">
                <div class="container">
                    <p class="hero-subtitle" style="color: rgba(255,255,255,0.95); font-size: 0.9rem; font-weight: 600; letter-spacing: 2px; margin-bottom: 1rem;">EXCELLENCE IN HEALTHCARE</p>
                    <h1>Your Health, <span class="highlight" style="color: #a8d68f;">Our Priority</span></h1>
                    <p>Delivering world-class healthcare services with compassion, expertise, and state-of-the-art facilities since 2011.</p>
                    <div class="hero-slide-buttons">
                        <a href="/about" class="btn btn-primary-custom btn-lg">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="hero-slide" style="background-image: url('images/sliders/slider1-1.png');">
            <div class="hero-slide-content">
                <div class="container">
                    <p class="hero-subtitle" style="color: #a8d68f; font-size: 0.9rem; font-weight: 600; letter-spacing: 2px; margin-bottom: 1rem; background: rgba(168, 214, 143, 0.2); padding: 8px 20px; border-radius: 25px; display: inline-block; border: 1px solid #a8d68f;">SPECIALIZED MEDICAL CARE</p>
                    <h1>Expert Care Across <span class="highlight" style="color: #d946a6;">All Specialties</span></h1>
                    <p>From geriatrics to neurosurgery, our team of highly skilled professionals provides comprehensive care tailored to your needs.</p>
                    <div class="hero-slide-buttons">
                        <a href="{{ route('services.index') }}" class="btn btn-primary-custom btn-lg">
                            Our Services
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="hero-slide" style="background-image: url('images/sliders/slider1-2.png');">
            <div class="hero-slide-content">
                <div class="container">
                    <p class="hero-subtitle" style="color: rgba(255,255,255,0.95); font-size: 0.9rem; font-weight: 600; letter-spacing: 2px; margin-bottom: 1rem;">24/7 EMERGENCY SERVICES</p>
                    <h1>Always Here <span class="highlight" style="color: #a8d68f;">When You Need Us</span></h1>
                    <p>Round-the-clock emergency care with advanced life support systems and experienced emergency physicians ready to serve you.</p>
                    <div class="hero-slide-buttons">
                        <a href="/contact-us" class="btn btn-primary-custom btn-lg">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slider Navigation Arrows -->
        <div class="slider-arrow prev" onclick="changeSlide(-1)">
            <i class="fas fa-chevron-left"></i>
        </div>
        <div class="slider-arrow next" onclick="changeSlide(1)">
            <i class="fas fa-chevron-right"></i>
        </div>

        <!-- Slider Dots -->
        <div class="slider-nav">
            <span class="slider-dot active" onclick="currentSlide(0)"></span>
            <span class="slider-dot" onclick="currentSlide(1)"></span>
            <span class="slider-dot" onclick="currentSlide(2)"></span>
        </div>
    </section>

    <!-- Welcome to Metro Health Section -->
    <section class="welcome-section section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-4 mb-lg-0" data-aos="fade-right">
                    <div class="welcome-image-wrapper">
          
                        <img src="{{ asset('images/about/welcome1.png') }}" alt="Metro Health Hospital Reception" class="welcome-main-image">
                     
                    </div>
                </div>
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="welcome-content">
                        <h2 class="welcome-title">Welcome to Metro Health Hospital</h2>
                        <p class="welcome-description">
                            Since 2011, Metro Health Hospital has been a trusted partner in the Kumasi Metropolis. Located at Abrepo Junction, we pride ourselves on blending advanced medical innovation with the kind of personal, compassionate care that makes you feel like family, not just a patient.
                        </p>
                        <div class="welcome-features-wrapper">
                            <ul class="welcome-features">
                                <li>
                                    <div class="feature-icon-circle">
                                        <i class="fas fa-user-md"></i>
                                    </div>
                                    <span class="feature-text">Patient-Centered Care</span>
                                </li>
                                <li>
                                    <div class="feature-icon-circle">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <span class="feature-text">Expert Medical Team</span>
                                </li>
                                <li>
                                    <div class="feature-icon-circle">
                                        <i class="fas fa-building"></i>
                                    </div>
                                    <span class="feature-text">Modern Facilities</span>
                                </li>
                            </ul>
                            <div class="team-image-small">
                                <img src="{{ asset('images/gallery/resized/IMG_6937.jpg') }}" alt="Medical Team">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Counter Animation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const counters = document.querySelectorAll('.stat-number-modern');
            let animated = false;

            const animateCounters = () => {
                if (animated) return;
                
                counters.forEach(counter => {
                    const dataCount = counter.getAttribute('data-count');
                    
                    // Skip animation for non-numeric values like "UK-Wide"
                    if (!dataCount || isNaN(parseFloat(dataCount))) {
                        return;
                    }
                    
                    const target = parseFloat(dataCount);
                    const isDecimal = target % 1 !== 0;
                    const duration = 2000;
                    const increment = target / (duration / 16);
                    let current = 0;

                    const updateCounter = () => {
                        current += increment;
                        if (current < target) {
                            if (isDecimal) {
                                counter.textContent = current.toFixed(1);
                            } else {
                                counter.textContent = Math.floor(current) + '+';
                            }
                            requestAnimationFrame(updateCounter);
                        } else {
                            if (isDecimal) {
                                counter.textContent = target.toFixed(1);
                            } else {
                                counter.textContent = target + '+';
                            }
                        }
                    };
                    updateCounter();
                });
                animated = true;
            };

            // Trigger animation when section is in view
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounters();
                    }
                });
            }, { threshold: 0.5 });

            const statsSection = document.querySelector('.stats-section-redesigned');
            if (statsSection) {
                observer.observe(statsSection);
            }
        });
    </script>

    <!-- Comprehensive Medical Services Section -->
    <section class="medical-services-section section-padding" style="background: #f8f9fa;">
        <div class="container">
            <!-- Section Header -->
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="services-badge">SPECIALIZED CARE</span>
                <h2 class="services-main-title">Comprehensive Medical Services</h2>
                <p class="services-subtitle">
                    We provide world-class medical services across all specialties. Whether you need a routine consultation or a complex surgical intervention, our expert multidisciplinary team delivers seamless, high-quality care under one roof.
                </p>
            </div>

            <!-- Services Grid -->
            <div class="row g-4 mb-5">
                <!-- Service 1: General Practice -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="medical-service-card">
                        <div class="service-number-badge">01</div>
                        <div class="service-card-image">
                            <img src="{{ asset('images/services/general_p.png') }}" alt="General Practice">
                        </div>
                        <div class="service-card-body">
                            <h3 class="service-card-title">General Practice</h3>
                            <p class="service-card-text">Comprehensive primary healthcare services for individuals and families of all ages.</p>
                            <a href="{{ route('services.index') }}" class="service-explore-link">
                                Explore Service <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 2: General Surgery -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="medical-service-card">
                        <div class="service-number-badge">02</div>
                        <div class="service-card-image">
                            <img src="{{ asset('images/services/surgery.jpg') }}" alt="General Surgery">
                        </div>
                        <div class="service-card-body">
                            <h3 class="service-card-title">General Surgery Department</h3>
                            <p class="service-card-text">Expert surgical care for a wide range of conditions requiring operative treatment.</p>
                            <a href="{{ route('services.index') }}" class="service-explore-link">
                                Explore Service <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 3: Obstetrics & Gynaecology -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="medical-service-card">
                        <div class="service-number-badge">03</div>
                        <div class="service-card-image">
                            <img src="{{ asset('images/services/maternity.jpg') }}" alt="Obstetrics & Gynaecology">
                        </div>
                        <div class="service-card-body">
                            <h3 class="service-card-title">Obstetrics & Gynaecology</h3>
                            <p class="service-card-text">Comprehensive women's health services including maternity and gynecological care.</p>
                            <a href="{{ route('services.index') }}" class="service-explore-link">
                                Explore Service <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 4: Geriatric Care -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="medical-service-card">
                        <div class="service-number-badge">04</div>
                        <div class="service-card-image">
                            <img src="{{ asset('images/services/prmi-1-1.png') }}" alt="Geriatric Care">
                        </div>
                        <div class="service-card-body">
                            <h3 class="service-card-title">Geriatric Care</h3>
                            <p class="service-card-text">Specialized healthcare services tailored for the elderly with compassion and expertise.</p>
                            <a href="{{ route('services.index') }}" class="service-explore-link">
                                Explore Service <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 5: Neurology & Neurosurgery -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="medical-service-card">
                        <div class="service-number-badge">05</div>
                        <div class="service-card-image">
                            <img src="{{ asset('images/services/neurology-neurosurgery.jpg') }}" alt="Neurology & Neurosurgery">
                        </div>
                        <div class="service-card-body">
                            <h3 class="service-card-title">Neurology & Neurosurgery</h3>
                            <p class="service-card-text">Advanced neurological care and surgical interventions for brain and nervous system conditions.</p>
                            <a href="{{ route('services.index') }}" class="service-explore-link">
                                Explore Service <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 6: Paediatrics -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="medical-service-card">
                        <div class="service-number-badge">06</div>
                        <div class="service-card-image">
                            <img src="{{ asset('images/services/1.webp') }}" alt="Paediatrics">
                        </div>
                        <div class="service-card-body">
                            <h3 class="service-card-title">Paediatrics</h3>
                            <p class="service-card-text">Comprehensive healthcare for infants, children, and adolescents with expert pediatric care.</p>
                            <a href="{{ route('services.index') }}" class="service-explore-link">
                                Explore Service <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- View All Services Button -->
            <div class="text-center" data-aos="fade-up">
                <a href="{{ route('services.index') }}" class="btn-view-all-services">
                    View All Services <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- News & Articles Section -->
    <section class="news-articles-section section-padding">
        <div class="container">
            <!-- Section Header -->
            <div class="text-center mb-5" data-aos="fade-up">
              
                <h2 class="news-main-title">News & Articles</h2>
                <p class="news-subtitle">
                    Stay informed with the latest health news, medical breakthroughs, and wellness tips from our expert team.
                </p>
            </div>

            <!-- Articles Grid -->
            @if(isset($blogPosts) && $blogPosts->count() > 0)
            <div class="row g-4 mb-5">
                @foreach($blogPosts as $index => $post)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                    <article class="news-article-card">
                        <div class="article-image">
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                            @else
                                <img src="{{ asset('images/blog/default.jpg') }}" alt="{{ $post->title }}">
                            @endif
                            <div class="article-category-badge">{{ $post->category ?? 'Health News' }}</div>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-date">
                                    <i class="far fa-calendar"></i> {{ $post->published_at ? $post->published_at->format('M d, Y') : 'Recent' }}
                                </span>
                                <span class="article-author">
                                    <i class="far fa-user"></i> {{ $post->author }}
                                </span>
                            </div>
                            <h3 class="article-title">{{ $post->title }}</h3>
                            <p class="article-excerpt">{{ Str::limit($post->excerpt, 120) }}</p>
                            <a href="{{ route('news-update.show', $post->slug) }}" class="article-read-more">
                                Read More <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>

            <!-- View All Articles Button -->
            <div class="text-center" data-aos="fade-up">
                <a href="{{ route('news-articles') }}" class="btn-view-all-articles">
                    View All Articles <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
            @else
            <div class="text-center py-5">
                <p class="text-muted">No articles available at the moment. Check back soon!</p>
            </div>
            @endif
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta-section">
        <div class="cta-overlay"></div>
        <div class="container position-relative">
            <div class="row g-4">
                <div class="col-12">
                    <!-- CTA Images -->
                    <div class="cta-images-wrapper">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="cta-image-card" data-aos="fade-up" data-aos-delay="100" onclick="openCtaLightbox(0)" style="cursor: pointer;">
                                    <img src="{{ asset('images/gallery/services.jpeg') }}" alt="Elder Care at Metro Health" class="cta-image">
                                    <div class="cta-image-overlay">
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"> 

                                <a href="{{ route('faqs') }}" class="cta-button-card" data-aos="fade-up" data-aos-delay="200" style="background-image: url('{{ asset('images/services/serv9.jpg') }}'); background-size: cover; background-position: center; position: relative;">
                                    <div class="cta-button-content" style="background: linear-gradient(135deg, rgba(14, 37, 112, 0.85) 0%, rgba(17, 84, 178, 0.85) 100%); position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; flex-direction: column; justify-content: center; padding: 40px;">
                                        <div class="cta-button-icon">
                                            <i class="fas fa-question-circle"></i>
                                        </div>
                                        <h3 class="cta-button-title">Have Questions?</h3>
                                        <p class="cta-button-text">Visit our FAQs page for answers to common questions about our services and care</p>
                                        <div class="cta-button-arrow">
                                            <i class="fas fa-arrow-right"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Lightbox Modal -->
    <div id="ctaLightboxModal" class="cta-lightbox-modal" onclick="closeCtaLightbox()">
        <span class="cta-lightbox-close" onclick="closeCtaLightbox()">&times;</span>
        <span class="cta-lightbox-prev" onclick="event.stopPropagation(); changeCtaImage(-1)">&#10094;</span>
        <span class="cta-lightbox-next" onclick="event.stopPropagation(); changeCtaImage(1)">&#10095;</span>
        <div class="cta-lightbox-content" onclick="event.stopPropagation()">
            <img id="ctaLightboxImage" src="" alt="">
            <div id="ctaLightboxCaption"></div>
        </div>
        <div class="cta-lightbox-counter" id="ctaLightboxCounter"></div>
    </div>

    <style>
    .cta-images-wrapper {
        margin: 0;
    }

    .cta-image-card {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
        transition: all 0.4s ease;
    }

    .cta-image-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
    }

    .cta-image {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.4s ease;
    }

    .cta-image-card:hover .cta-image {
        transform: scale(1.05);
    }

    .cta-image-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, transparent 100%);
        padding: 25px;
        opacity: 1;
        transition: all 0.4s ease;
    }

    .cta-image-card:hover .cta-image-overlay {
        background: linear-gradient(to top, rgba(132, 163, 63, 0.9) 0%, transparent 100%);
    }

    .cta-image-label {
        color: white;
        font-weight: 700;
        font-size: 1.2rem;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
    }

    /* CTA Button Card Styles */
    .cta-button-card {
        display: block;
        position: relative;
        background: linear-gradient(135deg, rgba(132, 163, 63, 0.95), rgba(107, 130, 48, 0.95));
        border-radius: 20px;
        padding: 60px 40px;
        text-decoration: none;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
        transition: all 0.4s ease;
        height: 100%;
        min-height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .cta-button-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
        background: linear-gradient(135deg, rgba(132, 163, 63, 1), rgba(107, 130, 48, 1));
    }

    .cta-button-content {
        text-align: center;
        color: white;
    }

    .cta-button-icon {
        width: 100px;
        height: 100px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 30px;
        transition: all 0.4s ease;
    }

    .cta-button-card:hover .cta-button-icon {
        background: white;
        transform: scale(1.1);
    }

    .cta-button-icon i {
        font-size: 3rem;
        color: white;
        transition: color 0.4s ease;
    }

    .cta-button-card:hover .cta-button-icon i {
        color: #84a33f;
    }

    .cta-button-title {
        font-size: 2rem;
        font-weight: 800;
        color: white;
        margin-bottom: 20px;
        letter-spacing: 0.5px;
    }

    .cta-button-text {
        font-size: 1.1rem;
        color: rgba(255, 255, 255, 0.95);
        line-height: 1.8;
        margin-bottom: 30px;
    }

    .cta-button-arrow {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        transition: all 0.4s ease;
    }

    .cta-button-card:hover .cta-button-arrow {
        background: white;
        transform: translateX(10px);
    }

    .cta-button-arrow i {
        color: white;
        font-size: 1.2rem;
        transition: color 0.4s ease;
    }

    .cta-button-card:hover .cta-button-arrow i {
        color: #84a33f;
    }

    /* CTA Lightbox Styles */
    .cta-lightbox-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.95);
        align-items: center;
        justify-content: center;
    }

    .cta-lightbox-content {
        position: relative;
        max-width: 90%;
        max-height: 90%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .cta-lightbox-content img {
        max-width: 100%;
        max-height: 85vh;
        object-fit: contain;
        border-radius: 10px;
        box-shadow: 0 10px 50px rgba(0, 0, 0, 0.5);
    }

    #ctaLightboxCaption {
        color: white;
        text-align: center;
        padding: 20px;
        font-size: 1.3rem;
        font-weight: 600;
    }

    .cta-lightbox-close {
        position: absolute;
        top: 30px;
        right: 50px;
        color: white;
        font-size: 50px;
        font-weight: bold;
        cursor: pointer;
        z-index: 10000;
        transition: all 0.3s ease;
    }

    .cta-lightbox-close:hover {
        color: #84a33f;
        transform: scale(1.2);
    }

    .cta-lightbox-prev,
    .cta-lightbox-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        color: white;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
        padding: 20px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        z-index: 10000;
    }

    .cta-lightbox-prev:hover,
    .cta-lightbox-next:hover {
        background: rgba(132, 163, 63, 0.8);
        transform: translateY(-50%) scale(1.1);
    }

    .cta-lightbox-prev {
        left: 30px;
    }

    .cta-lightbox-next {
        right: 30px;
    }

    .cta-lightbox-counter {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        color: white;
        font-size: 1.1rem;
        font-weight: 600;
        background: rgba(0, 0, 0, 0.5);
        padding: 10px 25px;
        border-radius: 25px;
    }

    @media (max-width: 767px) {
        .cta-lightbox-close {
            top: 20px;
            right: 20px;
            font-size: 40px;
        }

        .cta-lightbox-prev,
        .cta-lightbox-next {
            width: 50px;
            height: 50px;
            font-size: 30px;
        }

        .cta-lightbox-prev {
            left: 10px;
        }

        .cta-lightbox-next {
            right: 10px;
        }
    }
    </style>

    <script>
        // CTA Lightbox functionality
        const ctaImages = [
            {
                image: '{{ asset('images/gallery/services.jpeg') }}',
                title: 'Elder Care at Metro Health'
            }
            
        ];
        let currentCtaImageIndex = 0;

        function openCtaLightbox(index) {
            currentCtaImageIndex = index;
            const modal = document.getElementById('ctaLightboxModal');
            const img = document.getElementById('ctaLightboxImage');
            const caption = document.getElementById('ctaLightboxCaption');
            const counter = document.getElementById('ctaLightboxCounter');
            
            modal.style.display = 'flex';
            img.src = ctaImages[index].image;
            caption.textContent = ctaImages[index].title;
            counter.textContent = `${index + 1} / ${ctaImages.length}`;
            document.body.style.overflow = 'hidden';
        }

        function closeCtaLightbox() {
            document.getElementById('ctaLightboxModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        function changeCtaImage(direction) {
            currentCtaImageIndex += direction;
            if (currentCtaImageIndex >= ctaImages.length) {
                currentCtaImageIndex = 0;
            } else if (currentCtaImageIndex < 0) {
                currentCtaImageIndex = ctaImages.length - 1;
            }
            openCtaLightbox(currentCtaImageIndex);
        }

        // Keyboard navigation for CTA lightbox
        document.addEventListener('keydown', function(e) {
            const modal = document.getElementById('ctaLightboxModal');
            if (modal && modal.style.display === 'flex') {
                if (e.key === 'ArrowLeft') changeCtaImage(-1);
                if (e.key === 'ArrowRight') changeCtaImage(1);
                if (e.key === 'Escape') closeCtaLightbox();
            }
        });
    </script>

    <!-- Insurance Partners Section -->
    <section class="partners-section section-padding">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="partners-title">We Accept Insurance From Leading Providers</h2>
                <p class="partners-subtitle">We work with all major Ghanaian health insurance providers for seamless coverage</p>
            </div>
            
            <div class="row g-4 align-items-center">
                <!-- Left Column: Elder Care Image -->
                <div class="col-lg-4" data-aos="fade-right">
                    <div class="partners-image-card">
                        <img src="{{ asset('images/gallery/eldercare.jpeg') }}" alt="Elder Care at Metro Health" class="partners-feature-image">
                    </div>
                </div>

                <!-- Right Column: Insurance Logos -->
                <div class="col-lg-8" data-aos="fade-left">
                    <div class="partners-grid">
                        <div class="partner-card">
                            <img src="{{ asset('images/brands/apex-logo2.png') }}" alt="APEX Insurance" class="partner-logo">
                        </div>
                        <div class="partner-card">
                            <img src="{{ asset('images/brands/acacia-logo.png') }}" alt="Acacia Insurance" class="partner-logo">
                        </div>
                        <div class="partner-card">
                            <img src="{{ asset('images/brands/ace-medical-insurance.png') }}" alt="ACE Medical Insurance" class="partner-logo">
                        </div>
                        <div class="partner-card">
                            <img src="{{ asset('images/brands/ghic.png') }}" alt="GHIC" class="partner-logo">
                        </div>
                        <div class="partner-card">
                            <img src="{{ asset('images/brands/cosmopolitan-logo.png') }}" alt="Cosmopolitan Insurance" class="partner-logo">
                        </div>
                        <div class="partner-card">
                            <img src="{{ asset('images/brands/metropolitan.png') }}" alt="Metropolitan Insurance" class="partner-logo">
                        </div>
                        <div class="partner-card">
                            <img src="{{ asset('images/brands/premier-logo1.png') }}" alt="Premier Insurance" class="partner-logo">
                        </div>
                        <div class="partner-card">
                            <img src="{{ asset('images/brands/equity.png') }}" alt="Equity Health Insurance" class="partner-logo">
                        </div>
                        <div class="partner-card">
                            <img src="{{ asset('images/brands/bim-logo.png') }}" alt="BIMA Insurance" class="partner-logo">
                        </div>
                        <div class="partner-card">
                            <img src="{{ asset('images/brands/nmi-logo-green.webp') }}" alt="NMI Insurance" class="partner-logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Specialist Clinic Schedule Section -->
    <section class="clinic-schedule-section section-padding">
        <div class="container">
            <div class="row align-items-center g-5">
                <!-- Left Column: Clinic Schedules -->
                <div class="col-lg-7" data-aos="fade-right">
                    <div class="schedule-header mb-4">
                        <h2 class="schedule-main-title">Specialist Clinic Days & Time</h2>
                        <p class="schedule-subtitle">Walk in during clinic hours or book an appointment with our specialist doctors</p>
                    </div>

                    <div class="clinic-schedules-grid">
                        <!-- Obstetrics and Gynaecology -->
                        <div class="schedule-item">
                            <div class="schedule-icon">
                                <i class="fas fa-baby"></i>
                            </div>
                            <div class="schedule-details">
                                <h4 class="clinic-name">Obstetrics and Gynaecology</h4>
                                <div class="schedule-time">
                                    <span class="days"><i class="fas fa-calendar-alt"></i> Wednesday, Friday & Saturday</span>
                                    <span class="time"><i class="fas fa-clock"></i> 8:00 AM - 2:00 PM</span>
                                </div>
                            </div>
                        </div>

                        <!-- Pediatric Clinic -->
                        <div class="schedule-item">
                            <div class="schedule-icon">
                                <i class="fas fa-child"></i>
                            </div>
                            <div class="schedule-details">
                                <h4 class="clinic-name">Pediatric Clinic</h4>
                                <div class="schedule-time">
                                    <span class="days"><i class="fas fa-calendar-alt"></i> Saturday</span>
                                    <span class="time"><i class="fas fa-clock"></i> 8:00 AM - 2:00 PM</span>
                                </div>
                            </div>
                        </div>

                        <!-- Ear, Nose & Throat -->
                        <div class="schedule-item">
                            <div class="schedule-icon">
                                <i class="fas fa-head-side-mask"></i>
                            </div>
                            <div class="schedule-details">
                                <h4 class="clinic-name">Ear, Nose & Throat</h4>
                                <div class="schedule-time">
                                    <span class="days"><i class="fas fa-calendar-alt"></i> Wednesday</span>
                                    <span class="time"><i class="fas fa-clock"></i> 4:00 PM - 6:00 PM</span>
                                </div>
                            </div>
                        </div>

                        <!-- Urology -->
                        <div class="schedule-item">
                            <div class="schedule-icon">
                                <i class="fas fa-user-md"></i>
                            </div>
                            <div class="schedule-details">
                                <h4 class="clinic-name">Urology</h4>
                                <div class="schedule-time">
                                    <span class="days"><i class="fas fa-phone-alt"></i> By Appointment Only</span>
                                    <span class="time"><i class="fas fa-phone"></i> Call: +233 24 571 7681</span>
                                </div>
                            </div>
                        </div>

                        <!-- Geriatric / Elderly Care -->
                        <div class="schedule-item">
                            <div class="schedule-icon">
                                <i class="fas fa-walking"></i>
                            </div>
                            <div class="schedule-details">
                                <h4 class="clinic-name">Geriatric / Elderly Care</h4>
                                <div class="schedule-time">
                                    <span class="days"><i class="fas fa-calendar-alt"></i> Tuesday & Thursday</span>
                                    <span class="time"><i class="fas fa-clock"></i> Tue: 2:00 PM - 5:00 PM | Thu: 8:00 AM - 4:00 PM</span>
                                </div>
                            </div>
                        </div>

                        <!-- Orthopedics -->
                        <div class="schedule-item">
                            <div class="schedule-icon">
                                <i class="fas fa-bone"></i>
                            </div>
                            <div class="schedule-details">
                                <h4 class="clinic-name">Orthopedics</h4>
                                <div class="schedule-time">
                                    <span class="days"><i class="fas fa-calendar-alt"></i> Tuesday</span>
                                    <span class="time"><i class="fas fa-clock"></i> 2:00 PM - 8:00 PM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Consult Now CTA -->
                <div class="col-lg-5" data-aos="fade-left">
                    <div class="consult-cta-card">
                        <div class="cta-icon-wrapper">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h3 class="cta-title">Ready to See a Specialist?</h3>
                        <p class="cta-description">Book your appointment with our expert doctors through Microsoft Outlook and get priority service with reduced waiting time.</p>
                        
                        <div class="cta-features">
                            <div class="feature-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Instant Confirmation</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Priority Service</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Reduced Wait Time</span>
                            </div>
                        </div>

                        <a href="https://outlook.office365.com/owa/calendar/MetroHealthHospital@metrohealth.com.gh/bookings/" 
                           target="_blank" 
                           class="btn-consult-now">
                            <i class="fas fa-calendar-check"></i>
                            <span>Consult Now</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>

                        <div class="cta-contact-info">
                            <p class="or-text">Or call us directly</p>
                            <a href="tel:+233241850091" class="phone-cta">
                                <i class="fas fa-phone-alt"></i>
                                +233 24 185 0091
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

 
    <!-- Testimonials Section -->
    <section class="testimonials-section section-padding">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="testimonials-title">What Our Customers Say</h2>
                <p class="testimonials-subtitle">Real experiences from our valued patients</p>
            </div>

            <div class="row g-4">
                @php
                    $testimonials = [
                        [
                            'name' => 'Sarah Frimpong',
                            'role' => 'Patient',
                            'rating' => 5,
                            'text' => 'The care I received at Metro Health Hospital was exceptional. The staff was professional, compassionate, and truly dedicated to my recovery. I couldn\'t have asked for better treatment.',
                            'image' => 'SJ'
                        ],
                        [
                            'name' => 'Michael Osei',
                            'role' => 'Patient',
                            'rating' => 5,
                            'text' => 'From the moment I walked in, I felt welcomed and cared for. The medical team was knowledgeable and took the time to explain everything. Highly recommend Metro Health Hospital!',
                            'image' => 'MO'
                        ],
                        [
                            'name' => 'Grace Mensah',
                            'role' => 'Patient',
                            'rating' => 5,
                            'text' => 'Outstanding healthcare services! The facilities are modern, clean, and the doctors are top-notch. Metro Health Hospital has earned my trust and I will definitely return for future medical needs.',
                            'image' => 'GM'
                        ]
                    ];
                @endphp

                @foreach($testimonials as $index => $testimonial)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="testimonial-card">
                        <div class="testimonial-rating">
                            @for($i = 0; $i < $testimonial['rating']; $i++)
                            <i class="fas fa-star"></i>
                            @endfor
                        </div>
                        <p class="testimonial-text">"{{ $testimonial['text'] }}"</p>
                        <div class="testimonial-author">
                            <div class="author-avatar">{{ $testimonial['image'] }}</div>
                            <div class="author-info">
                                <h5 class="author-name">{{ $testimonial['name'] }}</h5>
                                <p class="author-role">{{ $testimonial['role'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
   
    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10" data-aos="fade-up">
                    <div class="text-center mb-5">
                        <h2 class="cta-heading mb-3">Your Health, Our Priority</h2>
                        <p class="cta-subheading">Experience compassionate care from our team of specialist doctors. Book your appointment today and take the first step towards better health.</p>
                    </div>
                    <div class="row g-4 justify-content-center">
                        <div class="col-lg-5 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <a href="{{ route('clinic-appointments.index') }}" class="cta-card">
                                <div class="cta-card-icon">
                                    <i class="fas fa-calendar-check"></i>
                                </div>
                                <h4>Book Appointment</h4>
                                <p>Schedule a consultation with our specialist doctors at your convenience</p>
                                <span class="cta-card-arrow">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                            </a>
                        </div>
                        <div class="col-lg-5 col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <a href="{{ route('contact') }}" class="cta-card">
                                <div class="cta-card-icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <h4>Contact Us</h4>
                                <p>Have questions? Our team is ready to assist you with any inquiries</p>
                                <span class="cta-card-arrow">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="text-center mt-4" data-aos="fade-up" data-aos-delay="300">
                        <p class="cta-info">
                            <i class="fas fa-clock me-2"></i>Available 24/7 for emergencies | 
                            <i class="fas fa-phone ms-3 me-2"></i>Call: <a href="tel:+233322020345" style="color: white; text-decoration: underline;">+233 32 202 0345</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
    .cta-heading {
        font-size: 2.5rem;
        font-weight: 800;
        color: white;
        margin-bottom: 1rem;
    }

    .cta-subheading {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.95);
        line-height: 1.8;
        max-width: 700px;
        margin: 0 auto;
    }

    .cta-card {
        display: block;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        padding: 40px 30px;
        text-align: center;
        text-decoration: none;
        color: white;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .cta-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        transition: left 0.5s ease;
    }

    .cta-card:hover::before {
        left: 100%;
    }

    .cta-card:hover {
        background: rgba(255, 255, 255, 0.25);
        border-color: rgba(255, 255, 255, 0.4);
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }

    .cta-card-icon {
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        transition: all 0.4s ease;
    }

    .cta-card-icon i {
        font-size: 2rem;
        color: white;
    }

    .cta-card:hover .cta-card-icon {
        background: white;
        transform: scale(1.1);
    }

    .cta-card:hover .cta-card-icon i {
        color: #84a33f;
    }

    .cta-card h4 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: white;
    }

    .cta-card p {
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 20px;
        line-height: 1.6;
    }

    .cta-card-arrow {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        transition: all 0.4s ease;
    }

    .cta-card:hover .cta-card-arrow {
        background: white;
        transform: translateX(5px);
    }

    .cta-card:hover .cta-card-arrow i {
        color: #84a33f;
    }

    .cta-info {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1rem;
        margin: 0;
    }

    @media (max-width: 767px) {
        .cta-heading {
            font-size: 1.8rem;
        }

        .cta-subheading {
            font-size: 1rem;
        }

        .cta-card {
            padding: 30px 20px;
        }

        .cta-info {
            font-size: 0.9rem;
        }
    }
    </style>

    <!-- Footer -->
   
    @include('partials.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script async src="https://www.tiktok.com/embed.js"></script>
    <script>
        // Init AOS
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 50
        });

        // Update year
        document.getElementById('year').textContent = new Date().getFullYear();

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.boxShadow = '0 2px 30px rgba(0, 0, 0, 0.15)';
            } else {
                navbar.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.08)';
            }
        });

        // Hero Slider Functionality
        let currentSlideIndex = 0;
        let slideInterval;

        function showSlide(index) {
            const slides = document.querySelectorAll('.hero-slide');
            const dots = document.querySelectorAll('.slider-dot');
            
            if (index >= slides.length) {
                currentSlideIndex = 0;
            } else if (index < 0) {
                currentSlideIndex = slides.length - 1;
            } else {
                currentSlideIndex = index;
            }
            
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));
            
            slides[currentSlideIndex].classList.add('active');
            dots[currentSlideIndex].classList.add('active');
        }

        function changeSlide(direction) {
            showSlide(currentSlideIndex + direction);
            resetSlideInterval();
        }

        function currentSlide(index) {
            showSlide(index);
            resetSlideInterval();
        }

        function autoSlide() {
            showSlide(currentSlideIndex + 1);
        }

        function resetSlideInterval() {
            clearInterval(slideInterval);
            slideInterval = setInterval(autoSlide, 5000);
        }

        // Start auto-sliding
        slideInterval = setInterval(autoSlide, 5000);

        // Pause on hover
        const heroSlider = document.querySelector('.hero-slider');
        heroSlider.addEventListener('mouseenter', () => {
            clearInterval(slideInterval);
        });
        heroSlider.addEventListener('mouseleave', () => {
            slideInterval = setInterval(autoSlide, 5000);
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                changeSlide(-1);
            } else if (e.key === 'ArrowRight') {
                changeSlide(1);
            }
        });
    </script>
    
    <!-- Instagram Embed Script -->
    <script async src="//www.instagram.com/embed.js"></script>

    <!-- Review Modal -->
    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 20px; border: none;">
                <div class="modal-header" style="border-bottom: 2px solid var(--ashlocs-light);">
                    <h5 class="modal-title" id="reviewModalLabel" style="font-weight: 700; color: var(--ashlocs-dark);">
                        <i class="fas fa-star me-2" style="color: var(--ashlocs-orange);"></i>Leave a Review
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="padding: 2rem;">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('reviews.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 600;">Your Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                   value="{{ old('name') }}" required 
                                   style="border-radius: 10px; padding: 12px;">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 600;">Email (Optional)</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                   value="{{ old('email') }}" 
                                   style="border-radius: 10px; padding: 12px;">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 600;">Rating <span class="text-danger">*</span></label>
                            <div class="star-rating" style="font-size: 2rem;">
                                <input type="radio" name="rating" value="5" id="star5" required>
                                <label for="star5"><i class="fas fa-star"></i></label>
                                <input type="radio" name="rating" value="4" id="star4">
                                <label for="star4"><i class="fas fa-star"></i></label>
                                <input type="radio" name="rating" value="3" id="star3">
                                <label for="star3"><i class="fas fa-star"></i></label>
                                <input type="radio" name="rating" value="2" id="star2">
                                <label for="star2"><i class="fas fa-star"></i></label>
                                <input type="radio" name="rating" value="1" id="star1">
                                <label for="star1"><i class="fas fa-star"></i></label>
                            </div>
                            @error('rating')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label" style="font-weight: 600;">Your Review <span class="text-danger">*</span></label>
                            <textarea name="review" rows="4" class="form-control @error('review') is-invalid @enderror" 
                                      required style="border-radius: 10px; padding: 12px;">{{ old('review') }}</textarea>
                            @error('review')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary-custom w-100" style="padding: 12px;">
                            <i class="fas fa-paper-plane me-2"></i>Submit Review
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
            gap: 5px;
        }
        .star-rating input {
            display: none;
        }
        .star-rating label {
            cursor: pointer;
            color: #ddd;
            transition: color 0.2s;
        }
        .star-rating label:hover,
        .star-rating label:hover ~ label,
        .star-rating input:checked ~ label {
            color: var(--ashlocs-orange);
        }
    </style>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/233546036501" 
       class="whatsapp-float" 
       target="_blank" 
       rel="noopener noreferrer"
       aria-label="Chat on WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <style>
        .whatsapp-float {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: #25D366;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
            z-index: 9999;
            transition: all 0.3s ease;
            text-decoration: none;
            animation: pulse-whatsapp 2s infinite;
        }

        .whatsapp-float:hover {
            background: #128C7E;
            transform: scale(1.1);
            box-shadow: 0 6px 30px rgba(37, 211, 102, 0.6);
            color: white;
        }

        @keyframes pulse-whatsapp {
            0% {
                box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
            }
            50% {
                box-shadow: 0 4px 30px rgba(37, 211, 102, 0.7);
            }
            100% {
                box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
            }
        }

        @media (max-width: 768px) {
            .whatsapp-float {
                width: 50px;
                height: 50px;
                font-size: 26px;
                bottom: 20px;
                right: 20px;
            }
        }

        /* Call to Action Section */
        .cta-section {
            position: relative;
            background: linear-gradient(to right, rgba(30, 50, 90, 0.85), rgba(20, 40, 70, 0.75)),
                        url('images/sliders/slider1-11.jpg') center/cover;
            padding: 80px 0;
            margin-top: 0;
            overflow: hidden;
        }

        .cta-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(20, 35, 60, 0.3);
            z-index: 1;
        }

        .cta-section .container {
            z-index: 2;
        }

        .cta-title {
            color: white;
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 0;
            line-height: 1.2;
        }

        .cta-actions {
            display: flex;
            align-items: center;
            gap: 30px;
            justify-content: center;
        }

        .btn-contact-now {
            display: inline-flex;
            align-items: center;
            background: #7ba428;
            color: white;
            padding: 18px 35px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(123, 164, 40, 0.4);
        }

        .btn-contact-now:hover {
            background: #93c03a;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(123, 164, 40, 0.5);
            color: white;
        }

        .cta-phone-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .cta-phone-info i {
            font-size: 2.5rem;
            color: #a8207a;
            background: white;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .phone-details {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .phone-label {
            color: white;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .phone-number {
            color: white;
            font-size: 1.6rem;
            font-weight: 800;
            text-decoration: none;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .phone-number:hover {
            color: #7ba428;
        }

        /* Responsive Design for CTA */
        @media (max-width: 991px) {
            .cta-title {
                font-size: 2.2rem;
                margin-bottom: 30px;
            }
            
            .cta-actions {
                flex-direction: column;
                gap: 25px;
            }
        }

        @media (max-width: 767px) {
            .cta-section {
                padding: 60px 0;
            }
            
            .cta-title {
                font-size: 1.8rem;
                margin-bottom: 25px;
            }
            
            .cta-actions {
                flex-direction: column;
                gap: 20px;
            }
            
            .btn-contact-now {
                width: 100%;
                justify-content: center;
                padding: 16px 30px;
            }
            
            .cta-phone-info {
                width: 100%;
                justify-content: center;
            }
            
            .phone-number {
                font-size: 1.4rem;
            }
        }

        /* Insurance Partners Section */
        .partners-section {
            background: #f8f9fa;
            padding: 80px 0;
        }

        .partners-title {
            color: #2d3e50;
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .partners-subtitle {
            color: #666;
            font-size: 1.1rem;
            font-weight: 400;
            max-width: 700px;
            margin: 0 auto;
        }

        .partners-image-card {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            height: 100%;
            min-height: 550px;
        }

        .partners-feature-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .partners-image-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.9), transparent);
            padding: 30px;
            color: white;
        }

        .partners-image-overlay h4 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .partners-image-overlay p {
            font-size: 1rem;
            opacity: 0.95;
            margin: 0;
        }

        .partners-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .partner-card {
            background: white;
            border-radius: 15px;
            padding: 35px 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            min-height: 140px;
        }

        .partner-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .partner-logo {
            max-width: 100%;
            max-height: 70px;
            width: auto;
            height: auto;
            object-fit: contain;
            transition: all 0.3s ease;
        }

        .partner-card:hover .partner-logo {
            transform: scale(1.05);
        }

        /* Responsive Design for Partners */
        @media (max-width: 1200px) {
            .partners-grid {
                grid-template-columns: repeat(4, 1fr);
                gap: 20px;
            }
        }

        @media (max-width: 991px) {
            .partners-title {
                font-size: 2rem;
            }

            .partners-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 20px;
            }
        }

        @media (max-width: 767px) {
            .partners-section {
                padding: 60px 0;
            }

            .partners-title {
                font-size: 1.8rem;
            }

            .partners-subtitle {
                font-size: 1rem;
            }

            .partners-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
                margin-top: 35px;
            }

            .partner-card {
                padding: 25px 20px;
                min-height: 120px;
            }

            .partner-logo {
                max-height: 60px;
            }
        }

        @media (max-width: 480px) {
            .partners-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }

            .partner-card {
                padding: 20px 15px;
                min-height: 100px;
            }

            .partner-logo {
                max-height: 50px;
            }
        }

        /* Statistics Section */
        .stats-section {
            padding: 0;
            margin: 0;
        }

        .stat-card {
            padding: 60px 30px;
            text-align: center;
            position: relative;
            transition: all 0.3s ease;
        }

        .stat-card-blue {
            background: #1976D2;
        }

        .stat-card-dark-blue {
            background: #1565C0;
        }

        .stat-card-teal {
            background: #00ACC1;
        }

        .stat-card-purple {
            background: #5E35B1;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 20px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-icon i {
            font-size: 2rem;
            color: white;
        }

        .stat-number {
            color: white;
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 10px;
            line-height: 1;
        }

        .stat-label {
            color: rgba(255, 255, 255, 0.95);
            font-size: 1.1rem;
            font-weight: 500;
            margin: 0;
        }

        /* Testimonials Section */
        .testimonials-section {
            background: #f8f9fa;
            padding: 80px 0;
        }

        .testimonials-title {
            color: #2d3e50;
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .testimonials-subtitle {
            color: #666;
            font-size: 1.1rem;
            font-weight: 400;
        }

        .testimonial-card {
            background: white;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
        }

        .testimonial-rating {
            margin-bottom: 20px;
        }

        .testimonial-rating i {
            color: #FFA500;
            font-size: 1.1rem;
            margin-right: 3px;
        }

        .testimonial-text {
            color: #555;
            font-size: 1rem;
            line-height: 1.7;
            margin-bottom: 25px;
            flex: 1;
            font-style: italic;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 15px;
            padding-top: 20px;
            border-top: 2px solid #f0f0f0;
        }

        .author-avatar {
            width: 55px;
            height: 55px;
            background: #a8207a;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .author-info {
            flex: 1;
        }

        .author-name {
            color: #2d3e50;
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 3px;
        }

        .author-role {
            color: #999;
            font-size: 0.9rem;
            margin: 0;
        }

        /* Counter Animation */
        @keyframes countUp {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Responsive Design for Stats and Testimonials */
        @media (max-width: 991px) {
            .stat-card {
                padding: 50px 25px;
            }

            .stat-number {
                font-size: 3rem;
            }

            .testimonials-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 767px) {
            .stat-card {
                padding: 40px 20px;
            }

            .stat-number {
                font-size: 2.5rem;
            }

            .stat-label {
                font-size: 1rem;
            }

            .testimonials-section {
                padding: 60px 0;
            }

            .testimonials-title {
                font-size: 1.8rem;
            }

            .testimonial-card {
                padding: 25px;
            }
        }

        /* Clinic Schedule Section */
        .clinic-schedule-section {
            position: relative;
            background: linear-gradient(to right, rgba(30, 50, 90, 0.85), rgba(20, 40, 70, 0.75)),
                        url('images/sliders/slider1-1.png') center/cover;
            padding: 80px 0;
            margin-top: 0;
            overflow: hidden;
        }

        .schedule-header {
            margin-bottom: 30px;
        }

        .schedule-main-title {
            color: white;
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 15px;
            line-height: 1.3;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .schedule-subtitle {
            color: rgba(255, 255, 255, 0.95);
            font-size: 1.1rem;
            font-weight: 400;
        }

        .clinic-schedules-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .schedule-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            background: rgba(255, 255, 255, 0.95);
            padding: 20px;
            border-radius: 15px;
            border-left: 4px solid #a8207a;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .schedule-item:hover {
            background: white;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        .schedule-icon {
            width: 50px;
            height: 50px;
            background: #a8207a;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .schedule-icon i {
            font-size: 1.3rem;
            color: white;
        }

        .schedule-details {
            flex: 1;
        }

        .clinic-name {
            color: #2d3e50;
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .schedule-time {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .schedule-time span {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #555;
            font-size: 0.85rem;
        }

        .schedule-time i {
            color: #a8207a;
            font-size: 0.85rem;
        }

        /* Consult CTA Card */
        .consult-cta-card {
            background: #a8207a;
            border-radius: 25px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 10px 40px rgba(168, 32, 122, 0.4);
            position: relative;
            overflow: hidden;
        }

        .consult-cta-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        .cta-icon-wrapper {
            width: 90px;
            height: 90px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            position: relative;
            z-index: 1;
        }

        .cta-icon-wrapper i {
            font-size: 3rem;
            color: white;
        }

        .consult-cta-card .cta-title {
            color: white;
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
        }

        .cta-description {
            color: rgba(255, 255, 255, 0.95);
            font-size: 1.05rem;
            line-height: 1.7;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
        }

        .cta-features {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 35px;
            position: relative;
            z-index: 1;
        }

        .feature-item {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            color: white;
            font-size: 1rem;
            font-weight: 500;
        }

        .feature-item i {
            color: #fff;
            font-size: 1.2rem;
        }

        .btn-consult-now {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            background: white;
            color: #a8207a;
            padding: 18px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.15rem;
            transition: all 0.4s ease;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 1;
            margin-bottom: 25px;
        }

        .btn-consult-now:hover {
            background: #f8f9fa;
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
            color: #a8207a;
        }

        .btn-consult-now i.fab {
            font-size: 1.3rem;
        }

        .btn-consult-now i.fa-arrow-right {
            font-size: 1rem;
            transition: transform 0.3s ease;
        }

        .btn-consult-now:hover i.fa-arrow-right {
            transform: translateX(5px);
        }

        .cta-contact-info {
            position: relative;
            z-index: 1;
        }

        .or-text {
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .phone-cta {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: white;
            font-size: 1.3rem;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .phone-cta:hover {
            color: #fff;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        .phone-cta i {
            font-size: 1.2rem;
        }

        /* Responsive Design for Clinic Schedule */
        @media (max-width: 991px) {
            .schedule-main-title {
                font-size: 2rem;
            }

            .clinic-schedules-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .consult-cta-card .cta-title {
                font-size: 1.7rem;
            }

            .cta-description {
                font-size: 1rem;
            }
        }

        @media (max-width: 767px) {
            .clinic-schedule-section {
                padding: 60px 0;
            }

            .schedule-main-title {
                font-size: 1.8rem;
            }

            .schedule-subtitle {
                font-size: 1rem;
            }

            .clinic-schedules-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .schedule-item {
                padding: 18px;
            }

            .schedule-icon {
                width: 45px;
                height: 45px;
            }

            .schedule-icon i {
                font-size: 1.1rem;
            }

            .clinic-name {
                font-size: 1rem;
            }

            .schedule-time span {
                font-size: 0.8rem;
            }

            .consult-cta-card {
                padding: 35px 25px;
                margin-top: 30px;
            }

            .consult-cta-card .cta-title {
                font-size: 1.5rem;
            }

            .cta-description {
                font-size: 0.95rem;
            }

            .btn-consult-now {
                width: 100%;
                padding: 16px 30px;
                font-size: 1.05rem;
            }

            .phone-cta {
                font-size: 1.1rem;
            }
        }
    </style>

    <script>
        // Counter Animation for Statistics
        document.addEventListener('DOMContentLoaded', function() {
            const counters = document.querySelectorAll('.counter');
            const speed = 200;

            const runCounter = (counter) => {
                const target = +counter.getAttribute('data-count');
                const count = +counter.innerText;
                const inc = target / speed;

                if (count < target) {
                    counter.innerText = Math.ceil(count + inc);
                    setTimeout(() => runCounter(counter), 1);
                } else {
                    counter.innerText = target;
                }
            };

            // Intersection Observer for triggering animation when in view
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target;
                        runCounter(counter);
                        observer.unobserve(counter);
                    }
                });
            }, { threshold: 0.5 });

            counters.forEach(counter => {
                observer.observe(counter);
            });
        });
    </script>
</body>
</html>
