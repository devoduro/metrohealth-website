<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @include('partials.seo', [
        'title' => 'Who We Are - Metro Health Hospital',
        'description' => 'Learn about Metro Health Hospital - our mission, vision, values, and commitment to excellence in healthcare since 2011.',
        'keywords' => 'metro health hospital, who we are, healthcare kumasi, hospital abrepo junction, medical services ghana'
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
    <section class="about-hero">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8" data-aos="fade-up">
                    </br></br>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Who We Are</li>
                        </ol>
                    </nav>
                    <h1 class="hero-title">Who We Are</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Brief History Section -->
    <section class="history-section section-padding">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10 text-center" data-aos="fade-up">
                    <h2 class="section-title">Our Brief History</h2>
                    <p class="section-description">
                        Established in 2011, Metro Health Hospital is a premier healthcare facility located at Abrepo Junction in Kumasi Metropolis. We combine cutting-edge medical technology with compassionate care.
                    </p>
                </div>
            </div>

            <!-- Mission, Vision, Values -->
            <div class="row g-4 mb-5">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h3 class="value-title">Our Mission</h3>
                        <p class="value-text">
                            To provide quality and comprehensive care for our patients, with a passion for excellence
                        </p>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h3 class="value-title">Our Vision</h3>
                        <p class="value-text">
                            To become the Region's most trusted healthcare provider, known for clinical excellence, compassionate and comprehensive care, and a Premier destination for the care of older adults.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3 class="value-title">Core Values</h3>
                        <p class="value-text">
                            <strong>P</strong>–Passion<br>
                            <strong>E</strong>–Excellence<br>
                            <strong>A</strong>–Accountability<br>
                            <strong>C</strong>–Commitment<br>
                            <strong>E</strong>-Empathy
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Content Section -->
    <section class="about-content-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <img src="images/about/IMG_6849.jpg" alt="Metro Health Hospital" class="about-image">
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <h2 class="content-title">Patient-Centered Healthcare</h2>
                    <p class="content-text">
                        At Metro Health, our mission is to provide patient-centered healthcare marked by empathy, excellence, and a genuine passion for improving the well-being of every individual who walks through our doors.
                    </p>
                    <p class="content-text">
                        While we are especially recognized for our exceptional care for the elderly, our team of highly skilled and experienced medical professionals spans a wide range of specialties.
                    </p>
                </div>
            </div>
        </div>
    </section>
 
    <!-- Why Choose Us Section -->
    <section class="why-choose-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center" data-aos="fade-up">
                    <h2 class="section-title">Why Choose Metro Health Hospital</h2>
                    <p class="section-description">
                        We are committed to providing exceptional healthcare services with a focus on patient satisfaction and clinical excellence.
                    </p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-hospital"></i>
                        </div>
                        <h4 class="feature-title">Modern Facilities</h4>
                        <p class="feature-text">
                            State-of-the-art medical equipment and comfortable patient rooms designed for optimal care and recovery.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-user-nurse"></i>
                        </div>
                        <h4 class="feature-title">Expert Medical Team</h4>
                        <p class="feature-text">
                            Highly qualified doctors, nurses, and healthcare professionals dedicated to your well-being.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h4 class="feature-title">24/7 Emergency Care</h4>
                        <p class="feature-text">
                            Round-the-clock emergency services ensuring immediate medical attention when you need it most.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4 class="feature-title">Insurance Accepted</h4>
                        <p class="feature-text">
                            We work with all major Ghanaian health insurance providers for seamless coverage and billing.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-hand-holding-heart"></i>
                        </div>
                        <h4 class="feature-title">Compassionate Care</h4>
                        <p class="feature-text">
                            Patient-centered approach with empathy and respect for every individual we serve.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-microscope"></i>
                        </div>
                        <h4 class="feature-title">Advanced Diagnostics</h4>
                        <p class="feature-text">
                            Comprehensive laboratory and imaging services for accurate diagnosis and treatment planning.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Specialties Section -->
    <section class="specialties-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center" data-aos="fade-up">
                    <h2 class="section-title" style="color: white;">Our Areas of Expertise</h2>
                    <p class="section-description" style="color: rgba(255,255,255,0.9);">
                        Comprehensive medical services across multiple specialties to meet all your healthcare needs.
                    </p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="specialty-badge">
                        <i class="fas fa-stethoscope"></i>
                        <span>General Practice</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="150">
                    <div class="specialty-badge">
                        <i class="fas fa-user-md"></i>
                        <span>General Surgery</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="specialty-badge">
                        <i class="fas fa-female"></i>
                        <span>Obstetrics & Gynaecology</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="250">
                    <div class="specialty-badge">
                        <i class="fas fa-user-injured"></i>
                        <span>Geriatric Care</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="specialty-badge">
                        <i class="fas fa-brain"></i>
                        <span>Neurology & Neurosurgery</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="350">
                    <div class="specialty-badge">
                        <i class="fas fa-baby"></i>
                        <span>Paediatrics</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="specialty-badge">
                        <i class="fas fa-procedures"></i>
                        <span>Urology</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="450">
                    <div class="specialty-badge">
                        <i class="fas fa-bone"></i>
                        <span>Orthopaedic</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="500">
                    <div class="specialty-badge">
                        <i class="fas fa-ear-listen"></i>
                        <span>ENT Care</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="550">
                    <div class="specialty-badge">
                        <i class="fas fa-eye"></i>
                        <span>Eye Care</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="600">
                    <div class="specialty-badge">
                        <i class="fas fa-hand-sparkles"></i>
                        <span>Plastic Surgery</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center" data-aos="zoom-in">
                    <h2 class="cta-title">Ready to Experience Quality Healthcare?</h2>
                    <p class="cta-text">
                        Book an appointment with our specialist doctors today and take the first step towards better health.
                    </p>
                    <div class="cta-buttons">
                        <a href="{{ route('clinic-appointments.index') }}" class="btn btn-cta-primary">
                            <i class="fas fa-calendar-check me-2"></i>Book Appointment
                        </a>
                        <a href="{{ route('contact') }}" class="btn btn-cta-secondary">
                            <i class="fas fa-phone me-2"></i>Contact Us
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

    <style>
    .about-hero {
        background: linear-gradient(135deg, rgba(30, 58, 138, 0.9), rgba(20, 63, 133, 0.85)), url('images/about/work.jpg') center/cover;
        padding: 120px 0 80px;
        margin-top: 44px;
        position: relative;
    }

    .about-hero .breadcrumb {
        background: transparent;
        margin-bottom: 20px;
    }

    .about-hero .breadcrumb-item a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
    }

    .about-hero .breadcrumb-item.active {
        color: white;
    }

    .hero-title {
        color: white;
        font-size: 3rem;
        font-weight: 800;
    }

    .history-section {
        padding: 80px 0;
        background: #f8f9fa;
    }

    .section-title {
        color: #2d3e50;
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 20px;
    }

    .section-description {
        color: #666;
        font-size: 1.2rem;
        line-height: 1.8;
    }

    .value-card {
        background: white;
        padding: 40px 30px;
        border-radius: 20px;
        text-align: center;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        height: 100%;
    }

    .value-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .value-icon {
        width: 80px;
        height: 80px;
        background: #3b82f6;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
    }

    .value-icon i {
        font-size: 2.5rem;
        color: white;
    }

    .value-title {
        color: #2d3e50;
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .value-text {
        color: #666;
        font-size: 1rem;
        line-height: 1.7;
    }

    .about-content-section {
        padding: 80px 0;
    }

    .about-image {
        width: 100%;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    }

    .content-title {
        color: #2d3e50;
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 25px;
    }

    .content-text {
        color: #666;
        font-size: 1.1rem;
        line-height: 1.8;
        margin-bottom: 20px;
    }

    /* Statistics Section */
    .stats-section {
        padding: 80px 0;
        background: linear-gradient(135deg, #1e3a8a, #3b82f6);
        position: relative;
    }

    .stat-card {
        text-align: center;
        padding: 30px 20px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-10px);
        background: rgba(255, 255, 255, 0.15);
    }

    .stat-icon {
        font-size: 3rem;
        color: #84a33f;
        margin-bottom: 15px;
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 800;
        color: white;
        margin-bottom: 10px;
    }

    .stat-label {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1rem;
        font-weight: 500;
    }

    /* Why Choose Us Section */
    .why-choose-section {
        padding: 80px 0;
        background: white;
    }

    .feature-card {
        background: #f8f9fa;
        padding: 35px 25px;
        border-radius: 15px;
        text-align: center;
        transition: all 0.3s ease;
        height: 100%;
        border: 2px solid transparent;
    }

    .feature-card:hover {
        border-color: #3b82f6;
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(59, 130, 246, 0.15);
    }

    .feature-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #3b82f6, #1e3a8a);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
    }

    .feature-icon i {
        font-size: 2rem;
        color: white;
    }

    .feature-title {
        color: #1a1a1a;
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .feature-text {
        color: #666;
        font-size: 0.95rem;
        line-height: 1.7;
        margin: 0;
    }

    /* Specialties Section */
    .specialties-section {
        padding: 80px 0;
        background: linear-gradient(135deg, #84a33f, #6b8230);
        position: relative;
    }

    .specialty-badge {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 15px;
        padding: 25px 15px;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .specialty-badge:hover {
        background: rgba(255, 255, 255, 0.25);
        transform: scale(1.05);
        border-color: white;
    }

    .specialty-badge i {
        font-size: 2.5rem;
        color: white;
        margin-bottom: 12px;
        display: block;
    }

    .specialty-badge span {
        color: white;
        font-weight: 600;
        font-size: 0.95rem;
        display: block;
    }

    /* Call to Action Section */
    .cta-section {
        padding: 100px 0;
        background: linear-gradient(135deg, rgba(14, 52, 134, 0.9), rgba(44, 49, 173, 0.85)), url('images/about/work.jpg') center/cover;
        position: relative;
    }

    .cta-title {
        color: white;
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 20px;
    }

    .cta-text {
        color: rgba(255, 255, 255, 0.95);
        font-size: 1.2rem;
        margin-bottom: 35px;
        line-height: 1.7;
    }

    .cta-buttons {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn-cta-primary {
        background: white;
        color: #84a33f;
        padding: 15px 40px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1.1rem;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 2px solid white;
    }

    .btn-cta-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(255, 255, 255, 0.4);
        background: rgba(255, 255, 255, 0.95);
        color: #a8207a;
    }

    .btn-cta-secondary {
        background: transparent;
        color: white;
        padding: 15px 40px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1.1rem;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 2px solid white;
    }

    .btn-cta-secondary:hover {
        background: white;
        color: #a8207a;
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(255, 255, 255, 0.4);
    }

    @media (max-width: 991px) {
        .hero-title {
            font-size: 2.5rem;
        }

        .section-title {
            font-size: 2rem;
        }

        .content-title {
            font-size: 2rem;
        }
    }

    @media (max-width: 767px) {
        .about-hero {
            padding: 100px 0 60px;
        }

        .hero-title {
            font-size: 2rem;
        }

        .section-title {
            font-size: 1.8rem;
        }

        .value-card {
            padding: 30px 20px;
        }

        .stat-number {
            font-size: 2.5rem;
        }

        .stat-icon {
            font-size: 2.5rem;
        }

        .cta-title {
            font-size: 2rem;
        }

        .cta-buttons {
            flex-direction: column;
            align-items: center;
        }

        .btn-cta-primary,
        .btn-cta-secondary {
            width: 100%;
            max-width: 300px;
        }

        .specialty-badge {
            padding: 20px 10px;
        }

        .specialty-badge i {
            font-size: 2rem;
        }

        .specialty-badge span {
            font-size: 0.85rem;
        }
    }
    </style>
</body>
</html>
