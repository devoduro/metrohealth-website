<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @include('partials.seo', [
        'title' => 'Our Services - Metro Health Hospital',
        'description' => 'Comprehensive healthcare services at Metro Health Hospital in Kumasi. From general practice to specialized care.',
        'keywords' => 'healthcare services, medical services, hospital kumasi, metro health services'
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
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <h1 class="display-3 fw-bold mb-4" style="color: white; text-shadow: 0 2px 4px rgba(0,0,0,0.1);">Our Services</h1>
                    <p class="lead" style="font-size: 1.3rem; color: rgba(255, 255, 255, 0.95); text-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                        Comprehensive Healthcare Services for You and Your Family
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="section-padding" style="padding: 70px 0;">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-12 text-center" data-aos="fade-up">
                    <h2 class="mb-4" style="font-size: 2.5rem; font-weight: 800; color: #2d3e50;">Expert Medical Care Across All Specialties</h2>
                    <p style="font-size: 1.1rem; line-height: 1.8; color: #666;">At Metro Health Hospital, we provide a comprehensive range of medical services designed to meet all your healthcare needs. Our team of experienced specialists is committed to delivering exceptional care with compassion and expertise.</p>
                </div>
            </div>

            <div class="row">
                <!-- Main Content - Services Grid -->
                <div class="col-lg-8">
                    <div class="row g-4">
                <!-- General Practice -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div class="service-image" style="width: 100%; height: 200px; overflow: hidden;">
                            <img src="{{ asset('images/services/general_p.png') }}"  alt="General Practice" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 25px;">
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">General Practice</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">Comprehensive primary healthcare services for individuals and families of all ages.</p>
                            <a href="{{ route('services.general-practice') }}" class="btn btn-sm" style="background: #84a33f; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- General Surgery -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div class="service-image" style="width: 100%; height: 200px; overflow: hidden;">
                            <img src="{{ asset('images/services/surgery.jpg') }}"  alt="General Surgery" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 25px;">
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">General Surgery</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">Expert surgical care with modern techniques for optimal patient outcomes.</p>
                            <a href="{{ route('services.general-surgery') }}" class="btn btn-sm" style="background: #a8207a; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Obstetrics & Gynaecology -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div class="service-image" style="width: 100%; height: 200px; overflow: hidden;">
                            <img src="{{ asset('images/services/gy2.png') }}"  alt="Obstetrics & Gynaecology" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 25px;">
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">Obstetrics & Gynaecology</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">Comprehensive women's health services from pregnancy to menopause.</p>
                            <a href="{{ route('services.obstetrics-gynaecology') }}" class="btn btn-sm" style="background: #84a33f; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Geriatric Care -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div class="service-image" style="width: 100%; height: 200px; overflow: hidden;">
                            <img src="{{ asset('images/services/prmi-1.png') }}"  alt="Geriatric Care" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 25px;">
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">Geriatric Care</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">Specialized healthcare for older adults with compassion and expertise.</p>
                            <a href="{{ route('services.geriatric-care') }}" class="btn btn-sm" style="background: #a8207a; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Neurology & Neurosurgery -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div class="service-image" style="width: 100%; height: 200px; overflow: hidden;">
                            <img src="{{ asset('images/services/neurology-neurosurgery.jpg') }}"  alt="Neurology & Neurosurgery" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 25px;">
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">Neurology & Neurosurgery</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">Advanced care for neurological conditions and brain health.</p>
                            <a href="{{ route('services.neurology-neurosurgery') }}" class="btn btn-sm" style="background: #84a33f; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Paediatrics -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div class="service-image" style="width: 100%; height: 200px; overflow: hidden;">
                            <img src="{{ asset('images/services/Paediatrics.png') }}"  alt="Paediatrics" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 25px;">
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">Paediatrics</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">Expert care for children from birth to adolescence.</p>
                            <a href="{{ route('services.paediatrics') }}" class="btn btn-sm" style="background: #a8207a; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Urology -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div class="service-image" style="width: 100%; height: 200px; overflow: hidden;">
                            <img src="{{ asset('images/services/Urology-1.jpg') }}"  alt="Urology" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 25px;">
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">Urology</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">Restoring health and confidence through expert urological care.</p>
                            <a href="{{ route('services.urology') }}" class="btn btn-sm" style="background: #84a33f; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Orthopaedic -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div class="service-image" style="width: 100%; height: 200px; overflow: hidden;">
                            <img src="{{ asset('images/services/rehab-736x453.webp') }}"  alt="Orthopaedic" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 25px;">
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">Orthopaedic</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">Restoring motion and rebuilding strength for an active life.</p>
                            <a href="{{ route('services.orthopaedic') }}" class="btn btn-sm" style="background: #a8207a; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- ENT Care -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div class="service-image" style="width: 100%; height: 200px; overflow: hidden;">
                            <img src="{{ asset('images/services/ENT-02.jpg') }}"  alt="ENT Care" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 25px;">
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">ENT Care</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">Expert care for ear, nose, and throat with advanced solutions.</p>
                            <a href="{{ route('services.ent-care') }}" class="btn btn-sm" style="background: #84a33f; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Eye Care -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div class="service-image" style="width: 100%; height: 200px; overflow: hidden;">
                            <img src="{{ asset('images/services/eyecare.png') }}"  alt="Eye Care" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 25px;">
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">Eye Care</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">Advanced ophthalmology for clearer vision and brighter future.</p>
                            <a href="{{ route('services.eye-care') }}" class="btn btn-sm" style="background: #a8207a; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Plastic Surgery -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div class="service-image" style="width: 100%; height: 200px; overflow: hidden;">
                            <img  src="{{ asset('images/services/plastic_surgery1.png') }}"  alt="Plastic Surgery" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 25px;">
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">Plastic Surgery</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">Reconstructive and cosmetic surgery to enhance appearance and restore function.</p>
                            <a href="{{ route('services.plastic-surgery') }}" class="btn btn-sm" style="background: #84a33f; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
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
                            <a href="{{ route('services.eye-care') }}" class="service-link" style="display: flex; align-items: center; padding: 12px 15px; margin-bottom: 8px; border-radius: 10px; text-decoration: none; background: #f8f9fa; transition: all 0.3s ease;">
                                <i class="fas fa-eye me-3" style="color: #666; font-size: 1.1rem;"></i>
                                <span style="color: #666; font-weight: 500;">Eye Care</span>
                            </a>
                            <a href="{{ route('services.plastic-surgery') }}" class="service-link" style="display: flex; align-items: center; padding: 12px 15px; margin-bottom: 8px; border-radius: 10px; text-decoration: none; background: #f8f9fa; transition: all 0.3s ease;">
                                <i class="fas fa-user-md me-3" style="color: #666; font-size: 1.1rem;"></i>
                                <span style="color: #666; font-weight: 500;">Plastic Surgery</span>
                            </a>
                        </div>
                    </div>

                    <!-- Specialist Clinics -->
                    <div class="specialist-clinics mb-4" style="background: white; border-radius: 20px; padding: 30px; box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);">
                        <h4 class="mb-4" style="font-weight: 700; color: #2d3e50;">Specialist Clinics</h4>
                        
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
                        <div class="clinic-item mb-4">
                            <h6 style="font-weight: 600; color: #1a1a1a; margin-bottom: 8px; font-size: 0.95rem;">Orthopedics</h6>
                            <p style="color: #666; font-size: 0.85rem; margin-bottom: 4px;">Tuesday</p>
                            <p style="color: #84a33f; font-weight: 600; font-size: 0.9rem; margin: 0;">2:00 PM - 8:00 PM</p>
                        </div>
                    </div>

                    <!-- Appointment Booking Card -->
                    <div class="contact-card" style="background: #a8207a; border-radius: 12px; padding: 32px; color: white; box-shadow: 0 4px 12px rgba(168, 32, 122, 0.2);">
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
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section-padding" style="background: #f9f9f9; padding: 70px 0;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center" data-aos="fade-up">
                    <h2 class="mb-4" style="font-size: 2.5rem; font-weight: 800; color: #2d3e50;">Ready to Experience Quality Healthcare?</h2>
                    <p class="lead mb-4" style="font-size: 1.1rem; line-height: 1.8; color: #666;">Contact Metro Health Hospital today to schedule your appointment or learn more about our comprehensive medical services.</p>
                    <a href="{{ route('contact') }}" class="btn btn-lg" style="background: #a8207a; color: white; padding: 15px 40px; border-radius: 10px; font-weight: 600; text-decoration: none; display: inline-block; transition: all 0.3s ease;">Contact Us <i class="fas fa-arrow-right ms-2"></i></a>
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

    .service-card {
        transition: all 0.3s ease;
    }

    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15) !important;
    }

    .service-card .btn {
        transition: all 0.3s ease;
    }

    .service-card:hover .btn {
        transform: translateX(5px);
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

        .service-card {
            padding: 25px !important;
        }
    }
    </style>
</body>
</html>
