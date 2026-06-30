<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Cancelled | Metro Health</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/ashlocs-custom.css') }}">
</head>
<body>
    @include('partials.navigation')

    <section class="section-padding" style="min-height: 80vh; display: flex; align-items: center;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-5">
                        <div class="cancel-icon mb-4" style="width: 100px; height: 100px; margin: 0 auto; background: linear-gradient(135deg, #dc3545 0%, #c82333 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; animation: scaleIn 0.5s ease-out;">
                            <i class="fas fa-times" style="font-size: 3rem; color: white;"></i>
                        </div>
                        <h1 class="display-4 fw-bold mb-3" style="color: var(--ashlocs-dark);">Payment Cancelled</h1>
                        <p class="lead text-muted mb-4">Your booking was not completed. No charges have been made.</p>
                    </div>

                    <div class="card shadow-lg" style="border-radius: 20px; border: none;">
                        <div class="card-body p-5 text-center">
                            <i class="fas fa-info-circle mb-4" style="font-size: 4rem; color: #ffc107;"></i>
                            <h3 class="mb-4" style="font-weight: 700; color: var(--ashlocs-dark);">What Happened?</h3>
                            <p class="text-muted mb-4">
                                You cancelled the payment process before completing your booking. 
                                Your booking has not been saved and no payment has been processed.
                            </p>

                            <div class="alert alert-warning" style="border-radius: 15px; border-left: 5px solid #ffc107;">
                                <h5 class="alert-heading"><i class="fas fa-exclamation-triangle me-2"></i>No Booking Created</h5>
                                <p class="mb-0">
                                    To secure your appointment, you'll need to complete the booking process including the deposit payment.
                                </p>
                            </div>

                            <div class="mt-5">
                                <h5 class="mb-3">Would you like to try again?</h5>
                                <a href="{{ route('clinic-appointments.index') }}" class="btn btn-primary-custom btn-lg me-2">
                                    <i class="fas fa-redo me-2"></i>Try Again
                                </a>
                                <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-lg">
                                    <i class="fas fa-home me-2"></i>Back to Home
                                </a>
                            </div>

                            <div class="mt-5 pt-4" style="border-top: 1px solid #dee2e6;">
                                <h5 class="mb-3">Need Help?</h5>
                                <p class="text-muted mb-3">If you're experiencing issues with payment or have questions about our services:</p>
                                <div class="d-flex justify-content-center gap-3 flex-wrap">
                                    <a href="{{ route('contact') }}" class="btn btn-outline-primary">
                                        <i class="fas fa-envelope me-2"></i>Contact Us
                                    </a>
                                    <a href="tel:+447724500349" class="btn btn-outline-success">
                                        <i class="fas fa-phone me-2"></i>Call Us
                                    </a>
                                    <a href="https://wa.me/447724500349" class="btn btn-outline-success" target="_blank">
                                        <i class="fab fa-whatsapp me-2"></i>WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
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
    </style>
</body>
</html>
