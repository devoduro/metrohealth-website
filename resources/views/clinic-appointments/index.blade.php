<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Specialist Clinic Appointment - Metro Health Hospital</title>
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
            background: linear-gradient(135deg, rgba(30, 58, 138, 0.9), rgba(20, 66, 141, 0.85)), url('https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=1920') center/cover;
            padding: 120px 0 80px;
            position: relative;
        }

        .booking-section {
            padding: 70px 0;
            background: #f8f9fa;
        }

        .booking-form-container {
            background: white;
            border-radius: 20px;
            padding: 50px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 8px;
        }

        .form-control, .form-select {
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.15);
        }

        .service-info-box {
            background: #e8f4f8;
            border-left: 4px solid #3b82f6;
            padding: 20px;
            border-radius: 10px;
            margin-top: 15px;
            display: none;
        }

        .service-info-box.active {
            display: block;
        }

        .fee-display {
            background: linear-gradient(135deg, #84a33f, #6b8230);
            color: white;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            margin-top: 20px;
        }

        .fee-display h4 {
            margin: 0;
            font-size: 1.2rem;
            font-weight: 600;
        }

        .fee-display .amount {
            font-size: 2.5rem;
            font-weight: 800;
            margin-top: 10px;
        }

        .btn-submit {
            background: linear-gradient(135deg, #ba0caec4, #830a93);
            color: white;
            padding: 15px 50px;
            border: none;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
        }

        .info-cards {
            margin-bottom: 50px;
        }

        .info-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            height: 100%;
        }

        .info-card i {
            font-size: 3rem;
            color: #3b82f6;
            margin-bottom: 15px;
        }

        .info-card h5 {
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 10px;
        }

        .info-card p {
            color: #666;
            margin: 0;
        }

        .required-field::after {
            content: ' *';
            color: #dc3545;
        }

        @media (max-width: 768px) {
            .booking-form-container {
                padding: 30px 20px;
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
                    <h1 style="font-size: 3rem; color: white; font-weight: 800; margin-bottom: 4px; margin-top: 40px;">Book Specialist Clinic Appointment</h1>
                    <p style="font-size: 1.2rem; opacity: 0.95;">Schedule your appointment with our specialist doctors</p>
                    <nav aria-label="breadcrumb" style="margin-top: 20px;">
                        <ol class="breadcrumb justify-content-center" style="background: transparent;">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: white; text-decoration: none;">Home</a></li>
                            <li class="breadcrumb-item active" style="color: rgba(255,255,255,0.8);">Book Appointment</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Cards -->
    <section style="padding: 50px 0; background: #f8f9fa; margin-top: -30px;">
        <div class="container">
            <div class="row g-4 info-cards">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="info-card">
                        <i class="fas fa-calendar-check"></i>
                        <h5>Easy Scheduling</h5>
                        <p>Select your preferred day and time slot</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="info-card">
                        <i class="fas fa-user-md"></i>
                        <h5>Expert Specialists</h5>
                        <p>Experienced doctors in various specialties</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="info-card">
                        <i class="fas fa-clock"></i>
                        <h5>Flexible Hours</h5>
                        <p>Multiple time slots available</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Booking Form Section -->
    <section class="booking-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="booking-form-container" data-aos="fade-up">
                        <h2 style="font-size: 2.5rem; font-weight: 800; color: #1a1a1a; margin-bottom: 10px; text-align: center;">Schedule Your Appointment</h2>
                        <p style="text-align: center; color: #666; margin-bottom: 40px;">Fill out the form below and we'll confirm your appointment shortly</p>

                        @if($errors->any())
                        <div class="alert alert-danger" style="border-radius: 15px; margin-bottom: 30px;">
                            <h5><i class="fas fa-exclamation-circle me-2"></i>Please correct the following errors:</h5>
                            <ul style="margin-bottom: 0;">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('clinic-appointments.store') }}" method="POST" id="appointmentForm">
                            @csrf

                            <!-- Service Selection -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label for="service_name" class="form-label required-field">Select Specialist Service</label>
                                    <select class="form-select" id="service_name" name="service_name" required>
                                        <option value="">-- Choose a Service --</option>
                                        @foreach($services as $serviceName => $schedule)
                                        <option value="{{ $serviceName }}" data-days="{{ json_encode($schedule['days']) }}" data-fee="{{ $schedule['fee'] }}" data-time-range="{{ $schedule['time_range'] }}">
                                            {{ $serviceName }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <div class="service-info-box" id="serviceInfoBox">
                                        <div class="d-flex align-items-start gap-3">
                                            <i class="fas fa-info-circle" style="color: #3b82f6; font-size: 1.5rem; margin-top: 3px;"></i>
                                            <div>
                                                <strong style="color: #1e3a8a;">Clinic Hours:</strong>
                                                <p id="serviceTimeRange" style="margin: 5px 0 0 0; color: #666;"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Day and Time Selection -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="appointment_day" class="form-label required-field">Select Day</label>
                                    <select class="form-select" id="appointment_day" name="appointment_day" required disabled>
                                        <option value="">-- Select Service First --</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="appointment_time" class="form-label required-field">Select Time Slot</label>
                                    <select class="form-select" id="appointment_time" name="appointment_time" required disabled>
                                        <option value="">-- Select Day First --</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Service Fee Display -->
                            <div class="fee-display" id="feeDisplay" style="display: none;">
                                <h4 style="color: white;">Service Fee</h4>
                                <div class="amount">GH₵ <span id="feeAmount">0.00</span></div>
                                <input type="hidden" name="service_fee" id="service_fee" value="0">
                            </div>

                            <hr style="margin: 40px 0; border-color: #e9ecef;">

                            <!-- Personal Information -->
                            <h4 style="font-weight: 700; color: #1a1a1a; margin-bottom: 25px;">Your Information</h4>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="full_name" class="form-label required-field">Full Name</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter your full name" value="{{ old('full_name') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label required-field">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="+233 XX XXX XXXX" value="{{ old('phone') }}" required>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="email" class="form-label required-field">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="your.email@example.com" value="{{ old('email') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="address" class="form-label required-field">Location Address</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Your address" value="{{ old('address') }}" required>
                                </div>
                            </div>

                            <!-- Additional Notes -->
                            <div class="mb-4">
                                <label for="notes" class="form-label">Additional Notes (Optional)</label>
                                <textarea class="form-control" id="notes" name="notes" rows="4" placeholder="Any special requirements or information we should know...">{{ old('notes') }}</textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center mt-5">
                                <button type="submit" class="btn-submit">
                                    <i class="fas fa-calendar-check me-2"></i>Book Appointment
                                </button>
                                <p style="margin-top: 15px; color: #666; font-size: 0.9rem;">
                                    <i class="fas fa-lock me-1"></i>Your information is secure and confidential
                                </p>
                            </div>
                        </form>
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

        // Service schedules data
        const serviceSchedules = @json($services);

        // DOM elements
        const serviceSelect = document.getElementById('service_name');
        const daySelect = document.getElementById('appointment_day');
        const timeSelect = document.getElementById('appointment_time');
        const serviceInfoBox = document.getElementById('serviceInfoBox');
        const serviceTimeRange = document.getElementById('serviceTimeRange');
        const feeDisplay = document.getElementById('feeDisplay');
        const feeAmount = document.getElementById('feeAmount');
        const serviceFeeInput = document.getElementById('service_fee');

        // Handle service selection
        serviceSelect.addEventListener('change', function() {
            const serviceName = this.value;
            
            if (!serviceName) {
                resetForm();
                return;
            }

            const schedule = serviceSchedules[serviceName];
            
            // Show service info
            serviceInfoBox.classList.add('active');
            serviceTimeRange.textContent = schedule.time_range;

            // Populate days
            daySelect.innerHTML = '<option value="">-- Select a Day --</option>';
            schedule.days.forEach(day => {
                const option = document.createElement('option');
                option.value = day;
                option.textContent = day;
                daySelect.appendChild(option);
            });
            daySelect.disabled = false;

            // Show fee
            feeAmount.textContent = parseFloat(schedule.fee).toFixed(2);
            serviceFeeInput.value = schedule.fee;
            feeDisplay.style.display = 'block';

            // Reset time selection
            timeSelect.innerHTML = '<option value="">-- Select Day First --</option>';
            timeSelect.disabled = true;
        });

        // Handle day selection
        daySelect.addEventListener('change', function() {
            const serviceName = serviceSelect.value;
            const selectedDay = this.value;
            
            if (!selectedDay) {
                timeSelect.innerHTML = '<option value="">-- Select Day First --</option>';
                timeSelect.disabled = true;
                return;
            }

            const schedule = serviceSchedules[serviceName];
            let slots = [];

            // Handle Geriatric care with different slots per day
            if (serviceName === 'Geriatric / Elderly Care') {
                slots = schedule.slots[selectedDay] || [];
            } else {
                slots = schedule.slots || [];
            }

            // Populate time slots
            timeSelect.innerHTML = '<option value="">-- Select a Time --</option>';
            slots.forEach(slot => {
                const option = document.createElement('option');
                option.value = slot;
                option.textContent = slot;
                timeSelect.appendChild(option);
            });
            timeSelect.disabled = false;
        });

        function resetForm() {
            serviceInfoBox.classList.remove('active');
            daySelect.innerHTML = '<option value="">-- Select Service First --</option>';
            daySelect.disabled = true;
            timeSelect.innerHTML = '<option value="">-- Select Day First --</option>';
            timeSelect.disabled = true;
            feeDisplay.style.display = 'none';
        }

        // Form validation
        document.getElementById('appointmentForm').addEventListener('submit', function(e) {
            const serviceName = serviceSelect.value;
            const day = daySelect.value;
            const time = timeSelect.value;

            if (!serviceName || !day || !time) {
                e.preventDefault();
                alert('Please select a service, day, and time slot before submitting.');
                return false;
            }
        });
    </script>
</body>
</html>
