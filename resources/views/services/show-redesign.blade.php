<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @include('partials.seo', [
        'title' => $service->title,
        'description' => Str::limit(strip_tags($service->description), 155),
        'keywords' => $service->title . ', ' . $service->slug . ', medical services, healthcare Ghana, Metro Health',
        'image' => $service->image ?? 'images/2026-01-12-J8o94jxc.png'
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
    @include('partials.navigation')

    <!-- Page Hero -->
    <section class="page-hero" style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); padding: 120px 0 80px;">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <div class="service-icon-large mx-auto mb-4" style="width: 120px; height: 120px; background: var(--ashlocs-gradient); border-radius: 30px; display: flex; align-items: center; justify-content: center; font-size: 4rem; color: white; box-shadow: 0 20px 50px rgba(242, 101, 34, 0.3);">
                        <i class="{{ $service->icon }}"></i>
                    </div>
                    <h1 class="display-3 fw-bold mb-4" style="color: var(--ashlocs-dark);">{{ $service->title }}</h1>
                    <p class="lead" style="font-size: 1.3rem; color: var(--ashlocs-gray);">
                        {{ $service->description }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Details -->
    <section class="section-padding">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8" data-aos="fade-right">
                    <div class="service-detail-content">
                        @php
                            $slug = strtolower($service->slug ?? '');
                            $showImage = false;
                            $imagePath = '';
                            $imageTitle = '';
                            $imageSubtitle = '';
                            
                            if(str_contains($slug, 'training') || str_contains($slug, 'workshop')) {
                                $showImage = true;
                                $imagePath = 'images/services/2026-01-20-U9IWPQ4K.jpeg';
                                $imageTitle = 'Professional Training & Workshops';
                                $imageSubtitle = 'Learn from industry experts and master advanced hair care techniques';
                            } elseif(str_contains($slug, 'dreadlock') || str_contains($slug, 'loc')) {
                                $showImage = true;
                                $imagePath = 'images/services/dreadlocks.jpg';
                                $imageTitle = 'Expert Dreadlock Services';
                                $imageSubtitle = 'Professional installation, maintenance and styling for beautiful locs';
                            } elseif(str_contains($slug, 'haircut') || str_contains($slug, 'cut')) {
                                $showImage = true;
                                $imagePath = 'images/services/Short-Hair-with-Low-Temp-Fade-and-Line-Up.jpg.webp';
                                $imageTitle = 'Professional Haircut Services';
                                $imageSubtitle = 'Expert cuts and styling for men, women and children';
                            } elseif(str_contains($slug, 'braid') || str_contains($slug, 'cornrow')) {
                                $showImage = true;
                                $imagePath = 'images/services/cornrow.jpeg';
                                $imageTitle = 'Expert Braiding Services';
                                $imageSubtitle = 'Beautiful braids and protective styles for all hair types';
                            }
                        @endphp

                        @if($showImage)
                        <!-- Service Image -->
                        <div class="service-image mb-5" style="border-radius: 25px; overflow: hidden; box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15); position: relative;">
                            <img src="{{ asset($imagePath) }}" 
                                 alt="{{ $imageTitle }}" 
                                 class="w-100" 
                                 style="height: 450px; object-fit: cover;">
                            <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 100%); padding: 30px; color: white;">
                                <h3 style="font-size: 1.8rem; font-weight: 700; margin-bottom: 10px; color: white;">{{ $imageTitle }}</h3>
                                <p style="font-size: 1.1rem; margin: 0; opacity: 0.9;">{{ $imageSubtitle }}</p>
                            </div>
                        </div>
                        @endif

                        <h2 class="mb-4" style="font-size: 2.5rem; font-weight: 800;">About This Service</h2>
                        <div class="content-text" style="font-size: 1.1rem; line-height: 1.8; color: var(--ashlocs-gray);">
                            {!! nl2br(e($service->full_description ?? $service->description)) !!}
                        </div>

                        @if(str_contains($slug, 'training') || str_contains($slug, 'workshop'))
                        <!-- Training Workshop Service Types -->
                        <div class="training-services mt-5">
                            <h3 class="mb-4" style="font-size: 2rem; font-weight: 700; color: var(--ashlocs-dark);">Our Training Programs</h3>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); border-radius: 15px; padding: 25px; height: 100%; border-left: 4px solid var(--ashlocs-orange);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 50px; height: 50px; background: var(--ashlocs-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                                <i class="fas fa-graduation-cap" style="color: white; font-size: 1.3rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 700; color: var(--ashlocs-dark);">Dreadlocks Training</h5>
                                                <p class="mb-0 small" style="color: var(--ashlocs-gray);">Master loc installation, maintenance and styling techniques from experts</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); border-radius: 15px; padding: 25px; height: 100%; border-left: 4px solid var(--ashlocs-orange);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 50px; height: 50px; background: var(--ashlocs-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                                <i class="fas fa-hands" style="color: white; font-size: 1.3rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 700; color: var(--ashlocs-dark);">Braid Training</h5>
                                                <p class="mb-0 small" style="color: var(--ashlocs-gray);">Learn professional braiding techniques including box braids, cornrows and more</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); border-radius: 15px; padding: 25px; height: 100%; border-left: 4px solid var(--ashlocs-orange);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 50px; height: 50px; background: var(--ashlocs-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                                <i class="fas fa-cut" style="color: white; font-size: 1.3rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 700; color: var(--ashlocs-dark);">Haircut Training (Textured Hair)</h5>
                                                <p class="mb-0 small" style="color: var(--ashlocs-gray);">Specialized training for cutting and styling textured and natural hair</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); border-radius: 15px; padding: 25px; height: 100%; border-left: 4px solid var(--ashlocs-orange);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 50px; height: 50px; background: var(--ashlocs-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                                <i class="fas fa-users" style="color: white; font-size: 1.3rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 700; color: var(--ashlocs-dark);">Group & 1:1 Pro Sessions</h5>
                                                <p class="mb-0 small" style="color: var(--ashlocs-gray);">Flexible training options with group workshops or personalized one-on-one sessions</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(str_contains($slug, 'dreadlock') || str_contains($slug, 'loc'))
                        <!-- Dreadlock Service Types -->
                        <div class="dreadlock-services mt-5">
                            <h3 class="mb-4" style="font-size: 2rem; font-weight: 700; color: var(--ashlocs-dark);">Our Dreadlock Services</h3>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); border-radius: 15px; padding: 25px; height: 100%; border-left: 4px solid var(--ashlocs-orange);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 50px; height: 50px; background: var(--ashlocs-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                                <i class="fas fa-star" style="color: white; font-size: 1.3rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 700; color: var(--ashlocs-dark);">Starter Locs (Crochet)</h5>
                                                <p class="mb-0 small" style="color: var(--ashlocs-gray);">Begin your loc journey with our professional crochet method for instant, neat locs</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); border-radius: 15px; padding: 25px; height: 100%; border-left: 4px solid var(--ashlocs-orange);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 50px; height: 50px; background: var(--ashlocs-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                                <i class="fas fa-crown" style="color: white; font-size: 1.3rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 700; color: var(--ashlocs-dark);">Traditional Locs (Full-head)</h5>
                                                <p class="mb-0 small" style="color: var(--ashlocs-gray);">Complete full-head traditional loc installation with expert techniques</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); border-radius: 15px; padding: 25px; height: 100%; border-left: 4px solid var(--ashlocs-orange);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 50px; height: 50px; background: var(--ashlocs-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                                <i class="fas fa-layer-group" style="color: white; font-size: 1.3rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 700; color: var(--ashlocs-dark);">Partial / Top Locs</h5>
                                                <p class="mb-0 small" style="color: var(--ashlocs-gray);">Stylish partial loc installation for a unique, customized look</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); border-radius: 15px; padding: 25px; height: 100%; border-left: 4px solid var(--ashlocs-orange);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 50px; height: 50px; background: var(--ashlocs-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                                <i class="fas fa-gem" style="color: white; font-size: 1.3rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 700; color: var(--ashlocs-dark);">Sisterlocks / Micro Locs</h5>
                                                <p class="mb-0 small" style="color: var(--ashlocs-gray);">Delicate, precision micro locs for a refined and elegant appearance</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); border-radius: 15px; padding: 25px; height: 100%; border-left: 4px solid var(--ashlocs-orange);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 50px; height: 50px; background: var(--ashlocs-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                                <i class="fas fa-sync-alt" style="color: white; font-size: 1.3rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 700; color: var(--ashlocs-dark);">Re-locking / Maintenance</h5>
                                                <p class="mb-0 small" style="color: var(--ashlocs-gray);">Root work, tightening & neatening to keep your locs looking fresh</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); border-radius: 15px; padding: 25px; height: 100%; border-left: 4px solid var(--ashlocs-orange);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 50px; height: 50px; background: var(--ashlocs-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                                <i class="fas fa-plus-circle" style="color: white; font-size: 1.3rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 700; color: var(--ashlocs-dark);">Extensions (Loc Extensions)</h5>
                                                <p class="mb-0 small" style="color: var(--ashlocs-gray);">Add length and volume with seamless loc extensions</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); border-radius: 15px; padding: 25px; height: 100%; border-left: 4px solid var(--ashlocs-orange);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 50px; height: 50px; background: var(--ashlocs-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                                <i class="fas fa-magic" style="color: white; font-size: 1.3rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 700; color: var(--ashlocs-dark);">Styling</h5>
                                                <p class="mb-0 small" style="color: var(--ashlocs-gray);">Creative loc styling for any occasion or personal preference</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); border-radius: 15px; padding: 25px; height: 100%; border-left: 4px solid var(--ashlocs-orange);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 50px; height: 50px; background: var(--ashlocs-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                                <i class="fas fa-palette" style="color: white; font-size: 1.3rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 700; color: var(--ashlocs-dark);">Coloring</h5>
                                                <p class="mb-0 small" style="color: var(--ashlocs-gray);">Professional loc coloring services for vibrant, healthy locs</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); border-radius: 15px; padding: 25px; height: 100%; border-left: 4px solid var(--ashlocs-orange);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 50px; height: 50px; background: var(--ashlocs-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                                <i class="fas fa-spa" style="color: white; font-size: 1.3rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 700; color: var(--ashlocs-dark);">Washing / Treatments</h5>
                                                <p class="mb-0 small" style="color: var(--ashlocs-gray);">Deep cleansing and nourishing treatments for healthy, clean locs</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(str_contains($slug, 'haircut') || str_contains($slug, 'cut'))
                        <!-- Haircut Service Types -->
                        <div class="haircut-services mt-5">
                            <h3 class="mb-4" style="font-size: 2rem; font-weight: 700; color: var(--ashlocs-dark);">Our Haircut Services</h3>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); border-radius: 15px; padding: 25px; height: 100%; border-left: 4px solid var(--ashlocs-orange);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 50px; height: 50px; background: var(--ashlocs-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                                <i class="fas fa-male" style="color: white; font-size: 1.3rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 700; color: var(--ashlocs-dark);">Men's Haircuts</h5>
                                                <p class="mb-0 small" style="color: var(--ashlocs-gray);">Professional cuts tailored to your style and personality</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); border-radius: 15px; padding: 25px; height: 100%; border-left: 4px solid var(--ashlocs-orange);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 50px; height: 50px; background: var(--ashlocs-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                                <i class="fas fa-female" style="color: white; font-size: 1.3rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 700; color: var(--ashlocs-dark);">Women's Haircuts</h5>
                                                <p class="mb-0 small" style="color: var(--ashlocs-gray);">Expert styling and precision cuts for beautiful results</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); border-radius: 15px; padding: 25px; height: 100%; border-left: 4px solid var(--ashlocs-orange);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 50px; height: 50px; background: var(--ashlocs-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                                <i class="fas fa-cut" style="color: white; font-size: 1.3rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 700; color: var(--ashlocs-dark);">Fades & Shape-ups</h5>
                                                <p class="mb-0 small" style="color: var(--ashlocs-gray);">Clean, sharp fades and precise line-ups for a fresh look</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); border-radius: 15px; padding: 25px; height: 100%; border-left: 4px solid var(--ashlocs-orange);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 50px; height: 50px; background: var(--ashlocs-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                                <i class="fas fa-scissors" style="color: white; font-size: 1.3rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 700; color: var(--ashlocs-dark);">Loc Trimming & Shaping</h5>
                                                <p class="mb-0 small" style="color: var(--ashlocs-gray);">Specialized trimming and shaping for well-maintained locs</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); border-radius: 15px; padding: 25px; height: 100%; border-left: 4px solid var(--ashlocs-orange);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 50px; height: 50px; background: var(--ashlocs-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                                <i class="fas fa-child" style="color: white; font-size: 1.3rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 700; color: var(--ashlocs-dark);">Children's Haircuts</h5>
                                                <p class="mb-0 small" style="color: var(--ashlocs-gray);">Gentle, patient cuts for kids in a comfortable environment</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(str_contains($slug, 'braid') || str_contains($slug, 'cornrow'))
                        <!-- Braiding Service Types -->
                        <div class="braiding-services mt-5">
                            <h3 class="mb-4" style="font-size: 2rem; font-weight: 700; color: var(--ashlocs-dark);">Our Braiding Services</h3>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); border-radius: 15px; padding: 25px; height: 100%; border-left: 4px solid var(--ashlocs-orange);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 50px; height: 50px; background: var(--ashlocs-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                                <i class="fas fa-grip-lines" style="color: white; font-size: 1.3rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 700; color: var(--ashlocs-dark);">Box Braids</h5>
                                                <p class="mb-0 small" style="color: var(--ashlocs-gray);">Classic protective style with individual box-sectioned braids</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); border-radius: 15px; padding: 25px; height: 100%; border-left: 4px solid var(--ashlocs-orange);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 50px; height: 50px; background: var(--ashlocs-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                                <i class="fas fa-star" style="color: white; font-size: 1.3rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 700; color: var(--ashlocs-dark);">Knotless Braids</h5>
                                                <p class="mb-0 small" style="color: var(--ashlocs-gray);">Gentle, natural-looking braids without tension at the roots</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); border-radius: 15px; padding: 25px; height: 100%; border-left: 4px solid var(--ashlocs-orange);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 50px; height: 50px; background: var(--ashlocs-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                                <i class="fas fa-stream" style="color: white; font-size: 1.3rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 700; color: var(--ashlocs-dark);">Cornrows / Feed-in Braids</h5>
                                                <p class="mb-0 small" style="color: var(--ashlocs-gray);">Sleek, close-to-scalp braids with seamless feed-in technique</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); border-radius: 15px; padding: 25px; height: 100%; border-left: 4px solid var(--ashlocs-orange);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 50px; height: 50px; background: var(--ashlocs-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                                <i class="fas fa-crown" style="color: white; font-size: 1.3rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 700; color: var(--ashlocs-dark);">Goddess Braids</h5>
                                                <p class="mb-0 small" style="color: var(--ashlocs-gray);">Thick, elegant braids with curly or wavy hair extensions</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); border-radius: 15px; padding: 25px; height: 100%; border-left: 4px solid var(--ashlocs-orange);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 50px; height: 50px; background: var(--ashlocs-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                                <i class="fas fa-infinity" style="color: white; font-size: 1.3rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 700; color: var(--ashlocs-dark);">Senegalese Twists / Protective Twists</h5>
                                                <p class="mb-0 small" style="color: var(--ashlocs-gray);">Rope-like twists for a stylish, low-maintenance protective style</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); border-radius: 15px; padding: 25px; height: 100%; border-left: 4px solid var(--ashlocs-orange);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 50px; height: 50px; background: var(--ashlocs-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                                <i class="fas fa-tools" style="color: white; font-size: 1.3rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 700; color: var(--ashlocs-dark);">Braid Repair & Take-down</h5>
                                                <p class="mb-0 small" style="color: var(--ashlocs-gray);">Gentle removal and repair services for existing braids</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($service->price)
                        <div class="pricing-section mt-5 p-4" style="background: var(--ashlocs-light); border-radius: 20px; border-left: 5px solid var(--ashlocs-orange);">
                            <h4 class="mb-3" style="color: var(--ashlocs-dark); font-weight: 700;">Pricing</h4>
                            <p class="mb-0" style="font-size: 2.5rem; font-weight: 800; color: var(--ashlocs-orange);">{{ $service->price }}</p>
                        </div>
                        @endif

                        <div class="service-features mt-5">
                            <h4 class="mb-4" style="font-weight: 700;">What's Included</h4>
                            <ul class="feature-list" style="list-style: none; padding: 0;">
                                <li style="padding: 0.75rem 0; display: flex; align-items: center; font-size: 1.1rem;">
                                    <i class="fas fa-check-circle me-3" style="color: var(--ashlocs-orange); font-size: 1.3rem;"></i>
                                    Professional consultation
                                </li>
                                <li style="padding: 0.75rem 0; display: flex; align-items: center; font-size: 1.1rem;">
                                    <i class="fas fa-check-circle me-3" style="color: var(--ashlocs-orange); font-size: 1.3rem;"></i>
                                    Expert styling and care
                                </li>
                                <li style="padding: 0.75rem 0; display: flex; align-items: center; font-size: 1.1rem;">
                                    <i class="fas fa-check-circle me-3" style="color: var(--ashlocs-orange); font-size: 1.3rem;"></i>
                                    Premium products used
                                </li>
                                <li style="padding: 0.75rem 0; display: flex; align-items: center; font-size: 1.1rem;">
                                    <i class="fas fa-check-circle me-3" style="color: var(--ashlocs-orange); font-size: 1.3rem;"></i>
                                    Aftercare advice
                                </li>
                                <li style="padding: 0.75rem 0; display: flex; align-items: center; font-size: 1.1rem;">
                                    <i class="fas fa-check-circle me-3" style="color: var(--ashlocs-orange); font-size: 1.3rem;"></i>
                                    Follow-up support
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-left">
                    <!-- Booking Card -->
                    <div class="booking-card" style="background: white; border-radius: 25px; padding: 2.5rem; box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1); position: sticky; top: 100px;">
                        <h3 class="mb-4" style="font-weight: 800; color: var(--ashlocs-dark);">Book This Service</h3>
                        
                        <div class="mb-4 pb-4" style="border-bottom: 2px solid var(--ashlocs-light);">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-clock me-3" style="color: var(--ashlocs-orange); font-size: 1.5rem;"></i>
                                <div>
                                    <p class="mb-0" style="font-size: 0.9rem; color: var(--ashlocs-gray);">Duration</p>
                                    <p class="mb-0" style="font-weight: 600; color: var(--ashlocs-dark);">Varies by style</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-map-marker-alt me-3" style="color: var(--ashlocs-orange); font-size: 1.5rem;"></i>
                                <div>
                                    <p class="mb-0" style="font-size: 0.9rem; color: var(--ashlocs-gray);">Location</p>
                                    <p class="mb-0" style="font-weight: 600; color: var(--ashlocs-dark);">UK-Wide Home Service</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-star me-3" style="color: var(--ashlocs-orange); font-size: 1.5rem;"></i>
                                <div>
                                    <p class="mb-0" style="font-size: 0.9rem; color: var(--ashlocs-gray);">Rating</p>
                                    <p class="mb-0" style="font-weight: 600; color: var(--ashlocs-dark);">4.9/5.0</p>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('clinic-appointments.index') }}" class="btn btn-primary-custom btn-lg w-100 mb-3">
                            <i class="fas fa-calendar-check me-2"></i>Book an Appointment
                        </a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-custom btn-lg w-100">
                            <i class="fas fa-envelope me-2"></i>Contact Us
                        </a>

                        <div class="mt-4 pt-4" style="border-top: 2px solid var(--ashlocs-light);">
                            <p class="mb-2" style="font-size: 0.9rem; color: var(--ashlocs-gray);">
                                <i class="fas fa-phone me-2" style="color: var(--ashlocs-orange);"></i>
                                <a href="tel:+447724500349" style="color: var(--ashlocs-dark); text-decoration: none;">+44 7724 500349</a>
                            </p>
                            <p class="mb-0" style="font-size: 0.9rem; color: var(--ashlocs-gray);">
                                <i class="fas fa-envelope me-2" style="color: var(--ashlocs-orange);"></i>
                                <a href="mailto:bookings@ashlocs.co.uk" style="color: var(--ashlocs-dark); text-decoration: none;">bookings@ashlocs.co.uk</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Services -->
    @if($relatedServices->count() > 0)
    <section class="section-padding" style="background: var(--ashlocs-light);">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center" data-aos="fade-up">
                    <h2 class="section-title">Other Services You Might Like</h2>
                </div>
            </div>
            <div class="row g-4">
                @foreach($relatedServices as $index => $relatedService)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="{{ $relatedService->icon }}"></i>
                        </div>
                        <h3 class="service-title">{{ $relatedService->title }}</h3>
                        <p class="service-description">{{ Str::limit($relatedService->description, 100) }}</p>
                        @if($relatedService->slug)
                        <a href="{{ route('services.show', $relatedService->slug) }}" class="btn btn-outline-custom btn-sm">Learn More</a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center" data-aos="fade-up">
                    <h2>Ready to Book Your {{ $service->title }} Service?</h2>
                    <p>Experience professional hair care that elevates your crown. Book your appointment today!</p>
                    <a href="{{ route('clinic-appointments.index') }}" class="btn btn-white-custom btn-lg">
                        <i class="fas fa-calendar-check me-2"></i>Book an Appointment
                    </a>
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
