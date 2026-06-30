<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Businesses & Organizations - Metro Health Hospital</title>
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
            background: linear-gradient(135deg, rgba(30, 58, 138, 0.9), rgba(59, 130, 246, 0.85)), url('images/sliders/slider1-11.jpg') center/cover;
            padding: 120px 0 80px;
            position: relative;
        }

        .section-padding {
            padding: 80px 0;
        }

        .feature-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #3b82f6, #1e3a8a);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
        }

        .feature-icon i {
            font-size: 2.5rem;
            color: white;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 15px;
        }

        .feature-card p {
            color: #666;
            line-height: 1.8;
            margin: 0;
        }

        .partners-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .partners-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 15px;
        }

        .partners-subtitle {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 50px;
        }

        .partners-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .partner-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            min-height: 150px;
        }

        .partner-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
        }

        .partner-logo {
            max-width: 100%;
            max-height: 80px;
            object-fit: contain;
            filter: grayscale(100%);
            transition: filter 0.3s ease;
        }

        .partner-card:hover .partner-logo {
            filter: grayscale(0%);
        }

        .benefits-section {
            background: white;
        }

        .benefit-item {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
            padding: 25px;
            background: #f8f9fa;
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .benefit-item:hover {
            background: #e9ecef;
            transform: translateX(10px);
        }

        .benefit-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #84a33f, #6b8230);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .benefit-icon i {
            font-size: 1.8rem;
            color: white;
        }

        .benefit-content h4 {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 8px;
        }

        .benefit-content p {
            color: #666;
            margin: 0;
            line-height: 1.6;
        }

        .cta-section {
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            color: white;
            padding: 80px 0;
        }

        .cta-section h2 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .cta-section p {
            font-size: 1.2rem;
            opacity: 0.95;
            margin-bottom: 30px;
        }

        .btn-cta {
            background: white;
            color: #1e3a8a;
            padding: 15px 40px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1.1rem;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .btn-cta:hover {
            background: #84a33f;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .partners-title {
                font-size: 2rem;
            }

            .partners-grid {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                gap: 20px;
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
                    <h1 style="font-size: 3rem; color: white; font-weight: 800; margin-bottom: 4px; margin-top: 40px;">Businesses & Organizations</h1>
                    <p style="font-size: 1.2rem; opacity: 0.95;">Comprehensive healthcare solutions for your workforce</p>
                    <nav aria-label="breadcrumb" style="margin-top: 20px;">
                        <ol class="breadcrumb justify-content-center" style="background: transparent;">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: white; text-decoration: none;">Home</a></li>
                            <li class="breadcrumb-item active" style="color: rgba(255,255,255,0.8);">Businesses & Organizations</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="section-padding">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 style="font-size: 2.5rem; font-weight: 800; color: #1a1a1a; margin-bottom: 15px;">Corporate Healthcare Solutions</h2>
                <p style="font-size: 1.2rem; color: #666;">Tailored medical services designed for businesses and organizations</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-briefcase-medical"></i>
                        </div>
                        <h3>Corporate Health Plans</h3>
                        <p>Customized health packages designed to meet the unique needs of your organization and employees.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <h3>On-Site Medical Services</h3>
                        <p>Bring healthcare to your workplace with our mobile medical team for regular check-ups and emergencies.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <h3>Preventive Care Programs</h3>
                        <p>Comprehensive wellness programs including health screenings, vaccinations, and lifestyle counseling.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-ambulance"></i>
                        </div>
                        <h3>24/7 Emergency Support</h3>
                        <p>Round-the-clock emergency medical services and ambulance support for your employees.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-file-medical-alt"></i>
                        </div>
                        <h3>Health Records Management</h3>
                        <p>Secure digital health records system for easy tracking and management of employee health data.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Health Analytics & Reporting</h3>
                        <p>Detailed health analytics and reports to help you make informed decisions about employee wellness.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Insurance Partners Section -->
    <section class="partners-section section-padding">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="partners-title">We Accept Insurance From Leading Providers</h2>
                <p class="partners-subtitle">We work with all major Ghanaian health insurance providers for seamless coverage</p>
            </div>
            
            <div class="partners-grid">
                <div class="partner-card" data-aos="zoom-in" data-aos-delay="100">
                    <img src="{{ asset('images/brands/apex-logo2.png') }}" alt="APEX Insurance" class="partner-logo">
                </div>
                <div class="partner-card" data-aos="zoom-in" data-aos-delay="150">
                    <img src="{{ asset('images/brands/acacia-logo.png') }}" alt="Acacia Insurance" class="partner-logo">
                </div>
                <div class="partner-card" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('images/brands/ace-medical-insurance.png') }}" alt="ACE Medical Insurance" class="partner-logo">
                </div>
                <div class="partner-card" data-aos="zoom-in" data-aos-delay="250">
                    <img src="{{ asset('images/brands/ghic.png') }}" alt="GHIC" class="partner-logo">
                </div>
                <div class="partner-card" data-aos="zoom-in" data-aos-delay="300">
                    <img src="{{ asset('images/brands/cosmopolitan-logo.png') }}" alt="Cosmopolitan Insurance" class="partner-logo">
                </div>
                <div class="partner-card" data-aos="zoom-in" data-aos-delay="350">
                    <img src="{{ asset('images/brands/metropolitan.png') }}" alt="Metropolitan Insurance" class="partner-logo">
                </div>
                <div class="partner-card" data-aos="zoom-in" data-aos-delay="400">
                    <img src="{{ asset('images/brands/premier-logo1.png') }}" alt="Premier Insurance" class="partner-logo">
                </div>
                <div class="partner-card" data-aos="zoom-in" data-aos-delay="450">
                    <img src="{{ asset('images/brands/equity.png') }}" alt="Equity Health Insurance" class="partner-logo">
                </div>
                <div class="partner-card" data-aos="zoom-in" data-aos-delay="500">
                    <img src="{{ asset('images/brands/bim-logo.png') }}" alt="BIMA Insurance" class="partner-logo">
                </div>
                <div class="partner-card" data-aos="zoom-in" data-aos-delay="550">
                    <img src="{{ asset('images/brands/nmi-logo-green.webp') }}" alt="NMI Insurance" class="partner-logo">
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="benefits-section section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2 style="font-size: 2.5rem; font-weight: 800; color: #1a1a1a; margin-bottom: 30px;">Why Partner With Metro Health?</h2>
                    
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="benefit-content">
                            <h4>Cost-Effective Solutions</h4>
                            <p>Competitive pricing with flexible payment plans tailored to your budget.</p>
                        </div>
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="benefit-content">
                            <h4>Experienced Medical Team</h4>
                            <p>Access to our team of highly qualified specialists and healthcare professionals.</p>
                        </div>
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-hospital"></i>
                        </div>
                        <div class="benefit-content">
                            <h4>Modern Facilities</h4>
                            <p>State-of-the-art medical equipment and comfortable treatment environments.</p>
                        </div>
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="benefit-content">
                            <h4>Flexible Scheduling</h4>
                            <p>Convenient appointment times that work around your business operations.</p>
                        </div>
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="benefit-content">
                            <h4>Comprehensive Coverage</h4>
                            <p>Wide range of medical services from preventive care to specialized treatments.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <img src="{{ asset('images/about/IMG_6849.jpg') }}" alt="Business Healthcare" style="width: 100%; border-radius: 2px; box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);">
                
                   <img src="{{ asset('images/sliders/slider1-11.jpg') }}" alt="Business Healthcare" style="width: 100%; border-radius: 2px; box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);">
</div>
                
            </div>
        </div>
    </section>

    <!-- Independent Partnering Company Section -->
    <section class="section-padding" style="background: #f8f9fa;">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 style="font-size: 2.5rem; font-weight: 800; color: #1a1a1a; margin-bottom: 15px;">Independent Partnering Company</h2>
                <p style="font-size: 1.2rem; color: #666;">We proudly partner with leading financial institutions to provide comprehensive healthcare solutions</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="partner-showcase" style="background: white; border-radius: 20px; padding: 50px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);" data-aos="zoom-in">
                        <div class="row align-items-center">
                            <div class="col-md-4 text-center mb-4 mb-md-0">
                                <div style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);">
                                    <img src="{{ asset('images/brands/stanbic-bank-logo.png') }}" alt="Stanbic Bank" style="max-width: 100%; height: auto;" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                                    <div style="display: none;">
                                        <i class="fas fa-university" style="font-size: 4rem; color: #1e3a8a;"></i>
                                        <h4 style="margin-top: 15px; color: #1e3a8a; font-weight: 700;">Stanbic Bank</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h3 style="font-size: 1.8rem; font-weight: 700; color: #d946ef; margin-bottom: 20px;">Stanbic Bank</h3>
                                <p style="font-size: 1.1rem; color: #666; line-height: 1.8; margin: 0;">
                                    Strategic healthcare partner providing comprehensive medical services for employees and their families
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center" data-aos="fade-up">
                    <h2>Ready to Enhance Your Employee Healthcare?</h2>
                    <p>Contact us today to discuss a customized healthcare solution for your organization</p>
                    <div class="d-flex gap-3 justify-content-center flex-wrap">
                        <a href="{{ route('contact') }}" class="btn-cta">
                            <i class="fas fa-envelope me-2"></i>Get In Touch
                        </a>
                        <a href="tel:+233241850091" class="btn-cta">
                            <i class="fas fa-phone me-2"></i>Call Us Now
                        </a>
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
