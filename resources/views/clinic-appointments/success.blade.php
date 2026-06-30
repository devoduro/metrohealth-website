<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Confirmed - Metro Health Hospital</title>
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
            background: #f8f9fa;
        }

        .success-section {
            padding: 100px 0;
            min-height: 80vh;
            display: flex;
            align-items: center;
        }

        .success-card {
            background: white;
            border-radius: 20px;
            padding: 60px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .success-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #28a745, #20c997);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            animation: scaleIn 0.5s ease-out;
        }

        .success-icon i {
            font-size: 3rem;
            color: white;
        }

        @keyframes scaleIn {
            from {
                transform: scale(0);
            }
            to {
                transform: scale(1);
            }
        }

        .appointment-summary {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 30px;
            margin: 30px 0;
            text-align: left;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #e9ecef;
        }

        .summary-row:last-child {
            border-bottom: none;
        }

        .summary-label {
            font-weight: 600;
            color: #666;
        }

        .summary-value {
            font-weight: 700;
            color: #1a1a1a;
        }

        .btn-home {
            background: linear-gradient(135deg, #b62ad9, #8f0986);
            color: white;
            padding: 15px 40px;
            border-radius: 50px;
            font-weight: 700;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            transition: all 0.3s ease;
        }

        .btn-home:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
            color: white;
        }
    </style>
</head>
<body>
    @include('partials.top_header')
    @include('partials.navigation')

    <section class="success-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="success-card" data-aos="zoom-in">
                        <div class="success-icon">
                            <i class="fas fa-check"></i>
                        </div>

                        <h1 style="font-size: 2.5rem; font-weight: 800; color: #28a745; margin-bottom: 15px;">Appointment Confirmed!</h1>
                        <p style="font-size: 1.2rem; color: #666; margin-bottom: 30px;">Your appointment has been successfully scheduled</p>

                        @if(session('appointment'))
                        @php $appointment = session('appointment'); @endphp
                        
                        <div class="appointment-summary">
                            <h4 style="font-weight: 700; color: #1a1a1a; margin-bottom: 20px; text-align: center;">Appointment Details</h4>
                            
                            <div class="summary-row">
                                <span class="summary-label">Booking Reference:</span>
                                <span class="summary-value">#{{ str_pad($appointment->id, 6, '0', STR_PAD_LEFT) }}</span>
                            </div>
                            
                            <div class="summary-row">
                                <span class="summary-label">Service:</span>
                                <span class="summary-value">{{ $appointment->service_name }}</span>
                            </div>
                            
                            <div class="summary-row">
                                <span class="summary-label">Day:</span>
                                <span class="summary-value">{{ $appointment->appointment_day }}</span>
                            </div>
                            
                            <div class="summary-row">
                                <span class="summary-label">Time:</span>
                                <span class="summary-value">{{ $appointment->appointment_time }}</span>
                            </div>
                            
                            <div class="summary-row">
                                <span class="summary-label">Service Fee:</span>
                                <span class="summary-value">GH₵ {{ number_format($appointment->service_fee, 2) }}</span>
                            </div>
                            
                            <div class="summary-row">
                                <span class="summary-label">Patient Name:</span>
                                <span class="summary-value">{{ $appointment->full_name }}</span>
                            </div>
                        </div>

                        <div style="background: #e8f4f8; padding: 20px; border-radius: 15px; margin-top: 30px;">
                            <p style="margin: 0; color: #0b814c;">
                                <i class="fas fa-envelope me-2"></i>
                                A confirmation email has been sent to <strong>{{ $appointment->email }}</strong>
                            </p>
                        </div>

                        <div style="margin-top: 30px; padding: 20px; background: #fff3cd; border-radius: 15px;">
                            <p style="margin: 0; color: #856404;">
                                <i class="fas fa-info-circle me-2"></i>
                                <strong>Important:</strong> Please arrive 15 minutes before your scheduled time. Bring a valid ID and any relevant medical records.
                            </p>
                        </div>
                        @endif

                        <div style="margin-top: 40px;">
                            <a href="{{ route('home') }}" class="btn-home">
                                <i class="fas fa-home me-2"></i>Return to Home
                            </a>
                        </div>

                        <p style="margin-top: 30px; color: #666; font-size: 0.9rem;">
                            Need to make changes? Contact us at <strong>+233 24 185 0091</strong>
                        </p>
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
