<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @include('partials.seo', [
        'title' => 'Eye Care - Metro Health Hospital',
        'description' => 'Advanced ophthalmology services at Metro Health Hospital. Comprehensive eye care from routine screenings to complex surgical interventions in Kumasi.',
        'keywords' => 'eye care, ophthalmology, vision care, cataract surgery, glaucoma treatment, metro health kumasi'
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
    <section class="page-hero" style="background: linear-gradient(135deg, rgba(9, 58, 91, 0.9) 0%, rgba(0, 82, 136, 0.85) 100%), url('{{ asset('images/services/page-bg-slider-02.png') }}') center/cover; padding: 120px 0 80px; margin-top: 44px; position: relative;">
        <div class="container" style="position: relative; z-index: 2;">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <div class="service-icon-large mx-auto mb-4" style="width: 120px; height: 120px; background: rgba(255, 255, 255, 0.95); border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 3.5rem; color: #2980b9; box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h1 class="display-3 fw-bold mb-4" style="color: white; text-shadow: 0 2px 4px rgba(0,0,0,0.1);">Eye Care</h1>
                    <p class="lead" style="font-size: 1.3rem; color: rgba(255, 255, 255, 0.95); text-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                        Clearer Vision. Brighter Future.
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
                        <!-- Service Image -->
                        <div class="service-image mb-5" style="border-radius: 25px; box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);">
                            <img src="{{ asset('images/services/eye1.jpg') }}" 
                                 alt="Eye Care at Metro Health" 
                                 style="width: 100%; height: auto; display: block; border-radius: 25px;">
                        </div>

                        <h2 class="mb-4" style="font-size: 2.5rem; font-weight: 800;">Advanced Ophthalmology at Abrepo Junction</h2>
                        <div class="content-text" style="font-size: 1.1rem; line-height: 1.8; color: #666;">
                            <p>Since 2011, Metro Health Hospital has been a trusted name for clinical excellence in the Kumasi Metropolis. Our Eye Care department provides a full spectrum of ophthalmology services, from routine vision screenings to complex surgical interventions. Utilizing cutting-edge equipment and evidence-based treatments, our expert team is committed to the highest standards of ocular health and vision preservation.</p>
                        </div>

                        <!-- Vision Focus -->
                        <div class="mt-4 mb-4" style="background: #f9f9f9; border-radius: 12px; padding: 30px; border-left: 4px solid #a8207a;">
                            <p style="font-size: 1.1rem; line-height: 1.8; color: #666; margin-bottom: 20px;">Protect your most vital sense with premier eye care at Metro Health Hospital. Our specialized Ophthalmology team focuses on:</p>
                            <ul style="margin: 0; padding-left: 20px;">
                                <li style="margin-bottom: 10px; color: #555;"><strong>Diagnostic Precision:</strong> High-tech imaging for early detection of eye conditions.</li>
                                <li style="margin-bottom: 10px; color: #555;"><strong>Clinical Expertise:</strong> Experienced specialists managing everything from cataracts to glaucoma.</li>
                                <li style="margin-bottom: 10px; color: #555;"><strong>Vision Preservation:</strong> Comprehensive care designed to keep your world in focus.</li>
                            </ul>
                        </div>

                        <!-- Eye Care Services -->
                        <div class="gp-services mt-5">
                            <h3 class="mb-4" style="font-size: 2rem; font-weight: 700; color: #2d3e50;">Our Eye Care Services Include:</h3>
                            
                            <h4 class="mb-3 mt-4" style="font-size: 1.5rem; font-weight: 600; color: #1a1a1a;">Advanced Diagnostics & Technology</h4>
                            
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: white; border-radius: 12px; padding: 28px; height: 100%; border-left: 3px solid #a8207a; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 48px; height: 48px; background: #84a33f; border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 18px;">
                                                <i class="fas fa-microscope" style="color: white; font-size: 1.2rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 600; color: #1a1a1a; font-size: 1.05rem;">OCT Imaging (Optical Coherence Tomography)</h5>
                                                <p class="mb-0" style="color: #666; font-size: 0.9rem; line-height: 1.5;">State-of-the-art retinal imaging for the earliest possible detection of glaucoma, macular degeneration, and diabetic eye disease.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: white; border-radius: 12px; padding: 28px; height: 100%; border-left: 3px solid #84a33f; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 48px; height: 48px; background: #84a33f; border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 18px;">
                                                <i class="fas fa-eye" style="color: white; font-size: 1.2rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 600; color: #1a1a1a; font-size: 1.05rem;">Comprehensive Eye Examinations</h5>
                                                <p class="mb-0" style="color: #666; font-size: 0.9rem; line-height: 1.5;">Thorough health assessments that go beyond simple vision testing to ensure the long-term vitality of your eyes.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="service-type-card" style="background: white; border-radius: 12px; padding: 28px; height: 100%; border-left: 3px solid #84a33f; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
                                        <div class="d-flex align-items-start">
                                            <div style="width: 48px; height: 48px; background: #84a33f; border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 18px;">
                                                <i class="fas fa-car" style="color: white; font-size: 1.2rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-2" style="font-weight: 600; color: #1a1a1a; font-size: 1.05rem;">DVLA Eye Testing</h5>
                                                <p class="mb-0" style="color: #666; font-size: 0.9rem; line-height: 1.5;">Official, accredited eye examinations required for driving license applications and renewals.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                         <div class="service-image mt-5 mb-5" style="border-radius: 25px; box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);">
                            <img src="{{ asset('images/services/eye3.jpg') }}" 
                                 alt="General Practice Services at Metro Health" 
                                 style="width: 100%; height: 100%; display: block; border-radius: 25px;">
                        </div>
                        <!-- Our Approach Section -->
                        <div class="expertise-section mt-5" style="background: #f9f9f9; border-radius: 12px; padding: 35px; border-left: 4px solid #a8207a;">
                            <h3 class="mb-3" style="font-size: 1.85rem; font-weight: 600; color: #1a1a1a;">Trusted Eye Care Since 2011</h3>
                            <p style="font-size: 1.05rem; line-height: 1.7; color: #555; margin: 0;">At Metro Health Hospital, we understand that your vision is precious. Our ophthalmology team combines years of clinical experience with the latest diagnostic technology to provide comprehensive eye care services. From routine examinations to advanced imaging and treatment, we are dedicated to preserving and protecting your sight for years to come.</p>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4" data-aos="fade-left">
                    <!-- All Services Menu -->
                    <div class="services-menu mb-4" style="background: white; border-radius: 20px; padding: 30px; box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);">
                        <h4 class="mb-4" style="font-weight: 700; color: #2d3e50;">All Services</h4>
                        <div class="services-list">
                            <a href="{{ route('services.general-practice') }}" class="service-link" style="display: flex; align-items: center; padding: 12px 15px; margin-bottom: 8px; border-radius: 10px; text-decoration: none; background: #f8f9fa; transition: all 0.3s ease;">
                                <i class="fas fa-stethoscope me-3" style="color: #666; font-size: 1.1rem;"></i>
                                <span style="color: #666; font-weight: 500;">General Practice</span>
                            </a>
                            <a href="{{ route('services.general-surgery') }}" class="service-link" style="display: flex; align-items: center; padding: 12px 15px; margin-bottom: 8px; border-radius: 10px; text-decoration: none; background: #f8f9fa; transition: all 0.3s ease;">
                                <i class="fas fa-user-md me-3" style="color: #666; font-size: 1.1rem;"></i>
                                <span style="color: #666; font-weight: 500;">General Surgery</span>
                            </a>
                            <a href="{{ route('services.obstetrics-gynaecology') }}" class="service-link" style="display: flex; align-items: center; padding: 12px 15px; margin-bottom: 8px; border-radius: 10px; text-decoration: none; background: #f8f9fa; transition: all 0.3s ease;">
                                <i class="fas fa-baby me-3" style="color: #666; font-size: 1.1rem;"></i>
                                <span style="color: #666; font-weight: 500;">Obstetrics & Gynaecology</span>
                            </a>
                            <a href="{{ route('services.geriatric-care') }}" class="service-link" style="display: flex; align-items: center; padding: 12px 15px; margin-bottom: 8px; border-radius: 10px; text-decoration: none; background: #f8f9fa; transition: all 0.3s ease;">
                                <i class="fas fa-user-friends me-3" style="color: #666; font-size: 1.1rem;"></i>
                                <span style="color: #666; font-weight: 500;">Geriatric Care</span>
                            </a>
                            <a href="{{ route('services.neurology-neurosurgery') }}" class="service-link" style="display: flex; align-items: center; padding: 12px 15px; margin-bottom: 8px; border-radius: 10px; text-decoration: none; background: #f8f9fa; transition: all 0.3s ease;">
                                <i class="fas fa-brain me-3" style="color: #666; font-size: 1.1rem;"></i>
                                <span style="color: #666; font-weight: 500;">Neurology & Neurosurgery</span>
                            </a>
                            <a href="{{ route('services.paediatrics') }}" class="service-link" style="display: flex; align-items: center; padding: 12px 15px; margin-bottom: 8px; border-radius: 10px; text-decoration: none; background: #f8f9fa; transition: all 0.3s ease;">
                                <i class="fas fa-child me-3" style="color: #666; font-size: 1.1rem;"></i>
                                <span style="color: #666; font-weight: 500;">Paediatrics</span>
                            </a>
                            <a href="{{ route('services.urology') }}" class="service-link" style="display: flex; align-items: center; padding: 12px 15px; margin-bottom: 8px; border-radius: 10px; text-decoration: none; background: #f8f9fa; transition: all 0.3s ease;">
                                <i class="fas fa-kidneys me-3" style="color: #666; font-size: 1.1rem;"></i>
                                <span style="color: #666; font-weight: 500;">Urology</span>
                            </a>
                            <a href="{{ route('services.orthopaedic') }}" class="service-link" style="display: flex; align-items: center; padding: 12px 15px; margin-bottom: 8px; border-radius: 10px; text-decoration: none; background: #f8f9fa; transition: all 0.3s ease;">
                                <i class="fas fa-bone me-3" style="color: #666; font-size: 1.1rem;"></i>
                                <span style="color: #666; font-weight: 500;">Orthopaedic</span>
                            </a>
                            <a href="{{ route('services.ent-care') }}" class="service-link" style="display: flex; align-items: center; padding: 12px 15px; margin-bottom: 8px; border-radius: 10px; text-decoration: none; background: #f8f9fa; transition: all 0.3s ease;">
                                <i class="fas fa-head-side-mask me-3" style="color: #666; font-size: 1.1rem;"></i>
                                <span style="color: #666; font-weight: 500;">ENT Care</span>
                            </a>
                            <a href="{{ route('services.eye-care') }}" class="service-link active" style="display: flex; align-items: center; padding: 12px 15px; margin-bottom: 8px; border-radius: 10px; text-decoration: none; background: #f3e5f5; border-left: 3px solid #a8207a; transition: all 0.3s ease;">
                                <i class="fas fa-eye me-3" style="color: #a8207a; font-size: 1.1rem;"></i>
                                <span style="color: #2d3e50; font-weight: 600;">Eye Care</span>
                            </a>
                            @php
                                $sidebarServices = \App\Models\Service::active()->ordered()->get();
                            @endphp
                            @foreach($sidebarServices as $service)
                                @if($service->slug)
                                <a href="{{ route('services.show', $service->slug) }}" class="service-link" style="display: flex; align-items: center; padding: 12px 15px; margin-bottom: 8px; border-radius: 10px; text-decoration: none; background: #f8f9fa; transition: all 0.3s ease;">
                                    <i class="{{ $service->icon ?? 'fas fa-heartbeat' }} me-3" style="color: #666; font-size: 1.1rem;"></i>
                                    <span style="color: #666; font-weight: 500;">{{ $service->title }}</span>
                                </a>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Contact Card -->
                    <div class="contact-card mb-4" style="background: #a8207a; border-radius: 12px; padding: 32px; color: white; box-shadow: 0 4px 12px rgba(168, 32, 122, 0.2);">
                        <h4 class="mb-3" style="font-weight: 700; color: white;">Book an Appointment</h4>
                        <p class="mb-4" style="opacity: 0.95;">Ready to schedule your consultation? Contact us today.</p>
                        <div class="contact-info mb-3">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-phone me-3" style="font-size: 1.2rem;"></i>
                                <div>
                                    <small style="opacity: 0.8;">Call Us</small>
                                    <p class="mb-0" style="font-weight: 600;">0241850091</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-envelope me-3" style="font-size: 1.2rem;"></i>
                                <div>
                                    <small style="opacity: 0.8;">Email</small>
                                    <p class="mb-0" style="font-weight: 600;">info@metrohealthgh.com</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-map-marker-alt me-3" style="font-size: 1.2rem;"></i>
                                <div>
                                    <small style="opacity: 0.8;">Location</small>
                                    <p class="mb-0" style="font-weight: 600;">4 Barekese Road, Kumasi</p>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('contact') }}" class="btn btn-light w-100" style="padding: 13px; font-weight: 600; border-radius: 8px; transition: all 0.3s ease;">Contact Us</a>
                    </div>

                    <!-- Specialist Clinics Card -->
                    <div class="hours-card" style="background: white; border-radius: 12px; padding: 32px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);">
                        <h4 class="mb-4" style="font-weight: 600; color: #1a1a1a; font-size: 1.3rem;">Specialist Clinics</h4>
                        <div class="clinic-list">
                            <!-- Obstetrics and Gynaecology -->
                            <div class="clinic-item mb-4 pb-3" style="border-bottom: 1px solid #eee;">
                                <h6 style="font-weight: 600; color: #1a1a1a; margin-bottom: 8px; font-size: 0.95rem;">Obstetrics and Gynaecology</h6>
                                <p style="color: #666; font-size: 0.85rem; margin-bottom: 4px;">Wednesday, Friday & Saturday</p>
                                <p style="color: #84a33f; font-weight: 600; font-size: 0.9rem; margin: 0;">8:00 AM - 2:00 PM</p>
                            </div>

                            <!-- Pediatric Clinic -->
                            <div class="clinic-item mb-4 pb-3" style="border-bottom: 1px solid #eee;">
                                <h6 style="font-weight: 600; color: #1a1a1a; margin-bottom: 8px; font-size: 0.95rem;">Pediatric Clinic</h6>
                                <p style="color: #666; font-size: 0.85rem; margin-bottom: 4px;">Saturday</p>
                                <p style="color: #84a33f; font-weight: 600; font-size: 0.9rem; margin: 0;">8:00 AM - 2:00 PM</p>
                            </div>

                            <!-- Ear, Nose & Throat -->
                            <div class="clinic-item mb-4 pb-3" style="border-bottom: 1px solid #eee;">
                                <h6 style="font-weight: 600; color: #1a1a1a; margin-bottom: 8px; font-size: 0.95rem;">Ear, Nose & Throat</h6>
                                <p style="color: #666; font-size: 0.85rem; margin-bottom: 4px;">Wednesday</p>
                                <p style="color: #84a33f; font-weight: 600; font-size: 0.9rem; margin: 0;">4:00 PM - 6:00 PM</p>
                            </div>

                            <!-- Urology -->
                            <div class="clinic-item mb-4 pb-3" style="border-bottom: 1px solid #eee;">
                                <h6 style="font-weight: 600; color: #1a1a1a; margin-bottom: 8px; font-size: 0.95rem;">Urology</h6>
                                <p style="color: #666; font-size: 0.85rem; margin-bottom: 4px;">By Appointment Only</p>
                                <p style="color: #84a33f; font-weight: 600; font-size: 0.9rem; margin: 0;">Call: +233 24 571 7681</p>
                            </div>

                            <!-- Geriatric / Elderly Care -->
                            <div class="clinic-item mb-4 pb-3" style="border-bottom: 1px solid #eee;">
                                <h6 style="font-weight: 600; color: #1a1a1a; margin-bottom: 8px; font-size: 0.95rem;">Geriatric / Elderly Care</h6>
                                <p style="color: #666; font-size: 0.85rem; margin-bottom: 4px;">Tuesday & Thursday</p>
                                <p style="color: #84a33f; font-weight: 600; font-size: 0.9rem; margin: 0;">Tue: 2:00 PM - 5:00 PM | Thu: 8:00 AM - 4:00 PM</p>
                            </div>

                            <!-- Orthopedics -->
                            <div class="clinic-item">
                                <h6 style="font-weight: 600; color: #1a1a1a; margin-bottom: 8px; font-size: 0.95rem;">Orthopedics</h6>
                                <p style="color: #666; font-size: 0.85rem; margin-bottom: 4px;">Tuesday</p>
                                <p style="color: #84a33f; font-weight: 600; font-size: 0.9rem; margin: 0;">2:00 PM - 8:00 PM</p>
                            </div>
                        </div>
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

    <style>
    .section-padding {
        padding: 70px 0;
    }

    .service-type-card {
        transition: all 0.25s ease;
    }

    .service-type-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
    }

    .service-link {
        transition: all 0.25s ease;
    }

    .service-link:hover {
        background: #f9f9f9 !important;
        border-left: 3px solid #a8207a !important;
        transform: translateX(3px);
    }

    .service-link:hover i {
        color: #a8207a !important;
    }

    .service-link:hover span {
        color: #1a1a1a !important;
    }

    .service-link.active {
        background: #f3e5f5 !important;
        border-left: 3px solid #a8207a !important;
    }

    .service-link.active i {
        color: #a8207a !important;
    }

    .service-link.active span {
        color: #1a1a1a !important;
        font-weight: 600 !important;
    }

    .btn-light:hover {
        background: white !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }

    .contact-info i {
        opacity: 0.95;
    }

    h1, h2, h3, h4, h5 {
        letter-spacing: -0.02em;
    }

    @media (max-width: 991px) {
        .page-hero {
            padding: 90px 0 60px !important;
        }

        .page-hero h1 {
            font-size: 2.3rem !important;
        }

        .service-icon-large {
            width: 100px !important;
            height: 100px !important;
            font-size: 3rem !important;
        }

        .section-padding {
            padding: 50px 0;
        }
    }

    @media (max-width: 767px) {
        .page-hero h1 {
            font-size: 1.9rem !important;
        }

        .service-image {
            height: 280px !important;
        }

        .service-type-card {
            padding: 24px !important;
        }
    }
    </style>
</body>
</html>
