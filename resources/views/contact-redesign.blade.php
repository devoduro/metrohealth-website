<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @include('partials.seo', [
        'title' => 'Contact Us - Metro Health Hospital',
        'description' => 'Get in touch with Metro Health Hospital. Call +233 24 185 0091 or visit us at 4 Barekese Road, Abrepo Junction, Kumasi. We are here to help you 24/7.',
        'keywords' => 'contact metro health, hospital contact, medical appointments, emergency services, healthcare contact kumasi'
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
    <section class="page-hero" style="background: linear-gradient(135deg, rgba(30, 58, 138, 0.9), rgba(9, 54, 126, 0.85)), url('images/services/faqs.jpg') center/cover; padding: 120px 0 80px; position: relative;">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <h1 class="display-3 fw-bold mb-4" style="color: white; margin-top: 40px;">Contact Us</h1>
                    <p class="lead" style="font-size: 1.5rem; color: white; opacity: 0.95;">
                        We're here to help. Reach out to book an appointment or ask any questions about our services.
                    </p>
                    <nav aria-label="breadcrumb" style="margin-top: 20px;">
                        <ol class="breadcrumb justify-content-center" style="background: transparent;">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: white; text-decoration: none;">Home</a></li>
                            <li class="breadcrumb-item active" style="color: rgba(255,255,255,0.8);">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Info Cards -->
    <section class="section-padding" style="margin-top: -50px;">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-info-card">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h4>Call Us</h4>
                        <p><a href="tel:+233241850091">+233 24 185 0091</a></p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="contact-info-card">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h4>Email</h4>
                        <p><a href="mailto:info@metrohealth.com">info@metrohealth.com</a></p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="contact-info-card">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h4>Location</h4>
                        <p><a href="https://maps.app.goo.gl/6QVxXSQyTEZJD48cA" target="_blank">4 Barekese Road<br>Abrepo Junction, Kumasi</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form & Info -->
    <section class="section-padding">
        <div class="container">
            <div class="row g-5">
                <!-- Contact Form -->
                <div class="col-lg-7" data-aos="fade-right">
                    <div class="contact-form-wrapper">
                        <h2 class="mb-4" style="font-size: 2.5rem; font-weight: 800;">Send Us a Message</h2>
                        <p class="mb-5" style="font-size: 1.1rem; color: var(--ashlocs-gray);">
                            Fill out the form below and our team will respond within 24 hours. We're committed to providing you with prompt and professional service.
                        </p>

                        @if(session('success'))
                        <div class="alert alert-success" style="background: #d4edda; border: 2px solid #28a745; border-radius: 15px; padding: 1.5rem; margin-bottom: 2rem;">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle me-3" style="font-size: 2rem; color: #28a745;"></i>
                                <div>
                                    <strong>Success!</strong> {{ session('success') }}
                                </div>
                            </div>
                        </div>
                        @endif

                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label" style="font-weight: 600; color: var(--ashlocs-dark);">Name *</label>
                                    <input type="text" name="name" class="form-control form-control-lg" required style="border-radius: 15px; border: 2px solid #e0e0e0; padding: 1rem 1.5rem;">
                                    @error('name')<span class="text-danger small">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" style="font-weight: 600; color: var(--ashlocs-dark);">Email *</label>
                                    <input type="email" name="email" class="form-control form-control-lg" required style="border-radius: 15px; border: 2px solid #e0e0e0; padding: 1rem 1.5rem;">
                                    @error('email')<span class="text-danger small">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" style="font-weight: 600; color: var(--ashlocs-dark);">Phone</label>
                                    <input type="tel" name="phone" class="form-control form-control-lg" style="border-radius: 15px; border: 2px solid #e0e0e0; padding: 1rem 1.5rem;">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" style="font-weight: 600; color: var(--ashlocs-dark);">Subject *</label>
                                    <input type="text" name="subject" class="form-control form-control-lg" required style="border-radius: 15px; border: 2px solid #e0e0e0; padding: 1rem 1.5rem;">
                                    @error('subject')<span class="text-danger small">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label" style="font-weight: 600; color: var(--ashlocs-dark);">Message *</label>
                                    <textarea name="message" rows="6" class="form-control form-control-lg" required style="border-radius: 15px; border: 2px solid #e0e0e0; padding: 1rem 1.5rem;"></textarea>
                                    @error('message')<span class="text-danger small">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary-custom btn-lg">
                                        <i class="fas fa-paper-plane me-2"></i>Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="col-lg-5" data-aos="fade-left">
                    <div class="contact-sidebar">
                        <h3 class="mb-4" style="font-size: 2rem; font-weight: 800;">Contact Information</h3>
                        
                        <div class="contact-detail-item">
                            <div class="contact-detail-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h5>Visit Our Hospital</h5>
                                <p>4 Barekese Road, Abrepo Junction<br>Near Angel Fm, Kumasi<br>Ghana</p>
                            </div>
                        </div>

                        <div class="contact-detail-item">
                            <div class="contact-detail-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <h5>Call Us Anytime</h5>
                                <p>
                                    <a href="tel:+233241850091">+233 24 185 0091</a><br>
                                    <a href="tel:+233248555596">+233 24 855 5596</a><br>
                                    <a href="tel:+233264840859">+233 26 484 0859</a><br>
                                    <a href="tel:+233501637303">+233 50 163 7303</a>
                                </p>
                            </div>
                        </div>

                        <div class="contact-detail-item">
                            <div class="contact-detail-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h5>Email</h5>
                                <p><a href="mailto:info@metrohealth.com">info@metrohealth.com</a></p>
                            </div>
                        </div>

                        <div class="contact-detail-item">
                            <div class="contact-detail-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <h5>Working Hours</h5>
                                <p>24/7 Emergency Services Available<br>Outpatient: Mon - Sat: 8:00 AM - 6:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="section-padding" style="background: var(--ashlocs-light); padding: 0;">
        <div class="container-fluid p-0">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.498227593439!2d-1.640205425293234!3d6.708884020981882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdb97ab4dfd3633%3A0xef7c88c025fe79c5!2sMetro%20Health%20Hospital!5e0!3m2!1sen!2sgh!4v1773636626229!5m2!1sen!2sgh" 
                width="100%" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center" data-aos="fade-up">
                    <h2>Ready to Book Your Appointment?</h2>
                    <p>Experience quality healthcare with compassion and excellence. Book your appointment today!</p>
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
