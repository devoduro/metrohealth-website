<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmed | Metro Health</title>
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

    <!-- Success Message -->
    <section style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); padding: 120px 0 80px; min-height: 100vh; display: flex; align-items: center;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <!-- Success Icon -->
                    <div class="text-center mb-4">
                        <div class="success-icon-wrapper" style="display: inline-block; position: relative;">
                            <div style="width: 120px; height: 120px; background: linear-gradient(135deg, #28a745 0%, #20c997 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 40px rgba(40, 167, 69, 0.3); animation: scaleIn 0.5s ease-out;">
                                <i class="fas fa-check" style="font-size: 4rem; color: white;"></i>
                            </div>
                            <div style="position: absolute; top: -10px; right: -10px; width: 40px; height: 40px; background: var(--ashlocs-orange); border-radius: 50%; display: flex; align-items: center; justify-content: center; animation: bounceIn 0.8s ease-out 0.3s both;">
                                <i class="fas fa-calendar-check" style="font-size: 1.2rem; color: white;"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Main Message -->
                    <div class="text-center mb-5">
                        <h1 class="display-4 fw-bold mb-3" style="color: var(--ashlocs-dark);" data-aos="fade-up" data-aos-delay="100">
                            Booking Request Received!
                        </h1>
                        <p class="lead" style="font-size: 1.3rem; color: var(--ashlocs-gray); max-width: 600px; margin: 0 auto;" data-aos="fade-up" data-aos-delay="200">
                            Thank you for choosing <strong style="color: var(--ashlocs-orange);">Ashlocs Professional Hair Care</strong>. Your appointment request has been successfully submitted.
                        </p>
                    </div>

                    <!-- Confirmation Card -->
                    <div class="card border-0 shadow-lg mb-4" style="border-radius: 20px; overflow: hidden;" data-aos="fade-up" data-aos-delay="300">
                        <div class="card-body p-4 p-md-5">
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="d-flex align-items-center mb-4">
                                        <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--ashlocs-orange) 0%, #ff8c42 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                            <i class="fas fa-clock" style="font-size: 1.5rem; color: white;"></i>
                                        </div>
                                        <div>
                                            <h5 class="mb-1" style="color: var(--ashlocs-dark);">What Happens Next?</h5>
                                            <p class="mb-0 text-muted">We'll be in touch soon</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="d-flex align-items-start mb-3">
                                        <div style="width: 40px; height: 40px; background: #e8f5e9; border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                            <i class="fas fa-envelope-open-text" style="color: #28a745; font-size: 1.2rem;"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1" style="color: var(--ashlocs-dark);">Email Confirmation</h6>
                                            <p class="mb-0 small text-muted">Check your inbox for booking details</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="d-flex align-items-start mb-3">
                                        <div style="width: 40px; height: 40px; background: #fff3e0; border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                            <i class="fas fa-phone-alt" style="color: var(--ashlocs-orange); font-size: 1.2rem;"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1" style="color: var(--ashlocs-dark);">Confirmation Call</h6>
                                            <p class="mb-0 small text-muted">We'll call within 24 hours</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="d-flex align-items-start mb-3">
                                        <div style="width: 40px; height: 40px; background: #e3f2fd; border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                            <i class="fas fa-calendar-check" style="color: #2196f3; font-size: 1.2rem;"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1" style="color: var(--ashlocs-dark);">Appointment Confirmed</h6>
                                            <p class="mb-0 small text-muted">Final details will be confirmed</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="d-flex align-items-start mb-3">
                                        <div style="width: 40px; height: 40px; background: #f3e5f5; border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 15px;">
                                            <i class="fas fa-star" style="color: #9c27b0; font-size: 1.2rem;"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1" style="color: var(--ashlocs-dark);">Your Transformation</h6>
                                            <p class="mb-0 small text-muted">Get ready for amazing results!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Important Info -->
                    <div class="alert" style="background: linear-gradient(135deg, #fff9e6 0%, #fff 100%); border: 2px solid var(--ashlocs-orange); border-radius: 15px; padding: 20px;" data-aos="fade-up" data-aos-delay="400">
                        <div class="d-flex align-items-start">
                            <i class="fas fa-info-circle" style="color: var(--ashlocs-orange); font-size: 1.5rem; margin-right: 15px; margin-top: 3px;"></i>
                            <div>
                                <h6 class="mb-2" style="color: var(--ashlocs-dark);">Important Information</h6>
                                <p class="mb-2 small" style="color: var(--ashlocs-gray);">• Please ensure your phone is available for our confirmation call</p>
                                <p class="mb-2 small" style="color: var(--ashlocs-gray);">• Check your email (including spam folder) for booking details</p>
                                <p class="mb-0 small" style="color: var(--ashlocs-gray);">• If you need to make changes, please contact us as soon as possible</p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="500">
                        <div class="d-flex gap-3 justify-content-center flex-wrap">
                            <a href="{{ route('home') }}" class="btn btn-primary-custom btn-lg px-5" style="border-radius: 50px;">
                                <i class="fas fa-home me-2"></i>Back to Home
                            </a>
                            <a href="{{ route('services.index') }}" class="btn btn-outline-secondary btn-lg px-5" style="border-radius: 50px; border-width: 2px;">
                                <i class="fas fa-cut me-2"></i>View All Services
                            </a>
                        </div>
                        <p class="mt-4 text-muted small">
                            Need help? <a href="{{ route('contact') }}" style="color: var(--ashlocs-orange); text-decoration: none; font-weight: 600;">Contact Us</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        @keyframes scaleIn {
            from {
                transform: scale(0);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes bounceIn {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 107, 0, 0.3);
        }

        .btn-outline-secondary:hover {
            background: var(--ashlocs-dark);
            color: white;
            border-color: var(--ashlocs-dark);
        }
    </style>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 50
        });
    </script>
</body>
</html>
