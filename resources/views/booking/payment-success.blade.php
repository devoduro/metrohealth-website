<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful | Metro Health</title>
    
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
                        <div class="success-icon mb-4" style="width: 100px; height: 100px; margin: 0 auto; background: linear-gradient(135deg, #28a745 0%, #20c997 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; animation: scaleIn 0.5s ease-out;">
                            <i class="fas fa-check" style="font-size: 3rem; color: white;"></i>
                        </div>
                        <h1 class="display-4 fw-bold mb-3" style="color: var(--ashlocs-dark);">Payment Successful!</h1>
                        <p class="lead text-muted mb-4">Your booking has been confirmed and deposit payment received.</p>
                    </div>

                    <div class="card shadow-lg" style="border-radius: 20px; border: none;">
                        <div class="card-body p-5">
                            <h3 class="mb-4" style="font-weight: 700; color: var(--ashlocs-dark);">
                                <i class="fas fa-calendar-check me-2" style="color: var(--ashlocs-orange);"></i>Booking Details
                            </h3>
                            
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <label class="text-muted small mb-1">Booking ID</label>
                                        <p class="mb-0 fw-bold">#{{ $booking->id }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <label class="text-muted small mb-1">Customer Name</label>
                                        <p class="mb-0 fw-bold">{{ $booking->name }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <label class="text-muted small mb-1">Email</label>
                                        <p class="mb-0">{{ $booking->email }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <label class="text-muted small mb-1">Phone</label>
                                        <p class="mb-0">{{ $booking->phone }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <label class="text-muted small mb-1">Service</label>
                                        <p class="mb-0 fw-bold">{{ $booking->service->title }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <label class="text-muted small mb-1">Customer Type</label>
                                        <p class="mb-0">{{ ucfirst(str_replace('-', ' ', $booking->customer_category)) }}</p>
                                    </div>
                                </div>
                                @if($booking->service_location)
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <label class="text-muted small mb-1">Service Location</label>
                                        <p class="mb-0">{{ ucfirst(str_replace('-', ' ', $booking->service_location)) }}</p>
                                    </div>
                                </div>
                                @endif
                                @if($booking->street_address)
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <label class="text-muted small mb-1">Street Address</label>
                                        <p class="mb-0">{{ $booking->street_address }}</p>
                                    </div>
                                </div>
                                @endif
                                @if($booking->postcode)
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <label class="text-muted small mb-1">Postcode</label>
                                        <p class="mb-0">{{ strtoupper($booking->postcode) }}</p>
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <label class="text-muted small mb-1">Preferred Date</label>
                                        <p class="mb-0 fw-bold">{{ $booking->preferred_date->format('l, F j, Y') }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <label class="text-muted small mb-1">Preferred Time</label>
                                        <p class="mb-0">{{ $booking->preferred_time }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <label class="text-muted small mb-1">Deposit Paid</label>
                                        <p class="mb-0 fw-bold" style="color: #28a745; font-size: 1.2rem;">£{{ number_format($booking->deposit_amount, 2) }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="alert alert-info mt-4" style="border-radius: 15px; border-left: 5px solid #17a2b8;">
                                <h5 class="alert-heading"><i class="fas fa-info-circle me-2"></i>What's Next?</h5>
                                <ul class="mb-0">
                                    <li>You will receive a confirmation email shortly at <strong>{{ $booking->email }}</strong></li>
                                    <li>Our team will contact you within 24 hours to confirm your appointment</li>
                                    <li>Please arrive 10 minutes early for your appointment</li>
                                    <li>The remaining balance will be due after your service</li>
                                </ul>
                            </div>

                            <div class="text-center mt-4">
                                <a href="{{ route('home') }}" class="btn btn-primary-custom btn-lg me-2">
                                    <i class="fas fa-home me-2"></i>Back to Home
                                </a>
                                <a href="{{ route('services.index') }}" class="btn btn-outline-secondary btn-lg">
                                    <i class="fas fa-cut me-2"></i>View Services
                                </a>
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
        
        .detail-item {
            padding: 15px;
            background: #f8f9fa;
            border-radius: 10px;
        }
    </style>
</body>
</html>
