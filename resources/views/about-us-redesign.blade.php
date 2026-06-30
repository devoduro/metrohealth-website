<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @include('partials.seo', [
        'title' => 'About Us - Metro Health Hospital',
        'description' => 'Learn about Metro Health Hospital - our mission, vision, values, and commitment to excellence in healthcare since 2011.',
        'keywords' => 'metro health hospital, about metro health, healthcare kumasi, hospital abrepo junction, medical services ghana'
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
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">About</li>
                        </ol>
                    </nav>
                    <h1 class="hero-title">About Metro Health Hospital</h1>
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
                    <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=800" alt="Metro Health Hospital" class="about-image">
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
    <section class="why-choose-section section-padding" style="background: #f8f9fa;">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center" data-aos="fade-up">
                    <h2 class="section-title">Why Choose Metro Health Hospital</h2>
                    <p class="section-description">
                        Excellence in healthcare with compassion and dedication
                    </p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <h4 class="feature-title">Expert Medical Team</h4>
                        <p class="feature-text">Highly skilled and experienced healthcare professionals</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-hospital"></i>
                        </div>
                        <h4 class="feature-title">Modern Facilities</h4>
                        <p class="feature-text">State-of-the-art medical equipment and technology</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <h4 class="feature-title">Compassionate Care</h4>
                        <p class="feature-text">Patient-centered approach with empathy and dedication</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h4 class="feature-title">24/7 Emergency</h4>
                        <p class="feature-text">Round-the-clock emergency services available</p>
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
        background: linear-gradient(135deg, #a8207a 0%, #7ba428 100%);
        padding: 120px 0 80px;
        margin-top: 44px;
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
        background: linear-gradient(135deg, #a8207a 0%, #7ba428 100%);
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

    .why-choose-section {
        padding: 80px 0;
    }

    .feature-box {
        text-align: center;
        padding: 30px 20px;
    }

    .feature-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #a8207a 0%, #7ba428 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        transition: all 0.3s ease;
    }

    .feature-box:hover .feature-icon {
        transform: scale(1.1);
    }

    .feature-icon i {
        font-size: 2rem;
        color: white;
    }

    .feature-title {
        color: #2d3e50;
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .feature-text {
        color: #666;
        font-size: 0.95rem;
        line-height: 1.6;
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
    }
    </style>
</body>
</html>
