<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment | Metro Health</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/it-styles.css') }}">
</head>
<body>
    <!-- Top Header Bar -->
    @include('partials.top_header')
    
    <!-- Main Navbar -->
    @include('partials.navigation')

    <!-- Page Hero -->
    <section class="page-hero">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <nav aria-label="breadcrumb" style="margin-bottom: 20px;">
                        <ol class="breadcrumb justify-content-center" style="background: transparent;">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: rgba(255,255,255,0.8); text-decoration: none;">Home</a></li>
                            <li class="breadcrumb-item active" style="color: white;">Book Appointment</li>
                        </ol>
                    </nav>
                    <h1 class="hero-title">Book Your Appointment</h1>
                    <p class="hero-subtitle">Schedule your appointment with our expert medical professionals</p>
                </div>
            </div>
        </div>
    </section>

    <style>
        .page-hero {
            background: linear-gradient(135deg, rgba(30, 58, 138, 0.9), rgba(59, 130, 246, 0.85)), url('https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=1920') center/cover;
            padding: 120px 0 80px;
            margin-top: 44px;
            position: relative;
        }

        .hero-title {
            color: white;
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .hero-subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.2rem;
            margin: 0;
        }

        @media (max-width: 767px) {
            .page-hero {
                padding: 100px 0 60px;
            }

            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }
        }
    </style>

    <!-- Booking Form -->
    <section class="section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="glass-card" data-aos="fade-up">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('booking.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Full Name *</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Email Address *</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Phone Number *</label>
                                    <input type="tel" name="phone" class="form-control" value="{{ old('phone') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Select Service *</label>
                                    <select name="service_id" class="form-control" required>
                                        <option value="">Choose a service...</option>
                                        @foreach($services as $service)
                                        <option value="{{ $service->id }}" {{ old('service_id') == $service->id || request('service') == $service->id ? 'selected' : '' }}>
                                            {{ $service->title }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Preferred Date *</label>
                                    <input type="date" name="preferred_date" class="form-control" value="{{ old('preferred_date') }}" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Preferred Time *</label>
                                    <select name="preferred_time" class="form-control" required>
                                        <option value="">Choose a time...</option>
                                        <option value="09:00 AM" {{ old('preferred_time') == '09:00 AM' ? 'selected' : '' }}>09:00 AM</option>
                                        <option value="10:00 AM" {{ old('preferred_time') == '10:00 AM' ? 'selected' : '' }}>10:00 AM</option>
                                        <option value="11:00 AM" {{ old('preferred_time') == '11:00 AM' ? 'selected' : '' }}>11:00 AM</option>
                                        <option value="12:00 PM" {{ old('preferred_time') == '12:00 PM' ? 'selected' : '' }}>12:00 PM</option>
                                        <option value="01:00 PM" {{ old('preferred_time') == '01:00 PM' ? 'selected' : '' }}>01:00 PM</option>
                                        <option value="02:00 PM" {{ old('preferred_time') == '02:00 PM' ? 'selected' : '' }}>02:00 PM</option>
                                        <option value="03:00 PM" {{ old('preferred_time') == '03:00 PM' ? 'selected' : '' }}>03:00 PM</option>
                                        <option value="04:00 PM" {{ old('preferred_time') == '04:00 PM' ? 'selected' : '' }}>04:00 PM</option>
                                        <option value="05:00 PM" {{ old('preferred_time') == '05:00 PM' ? 'selected' : '' }}>05:00 PM</option>
                                        <option value="06:00 PM" {{ old('preferred_time') == '06:00 PM' ? 'selected' : '' }}>06:00 PM</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Additional Message (Optional)</label>
                                <textarea name="message" class="form-control" rows="4" placeholder="Any special requests or information we should know...">{{ old('message') }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary-custom w-100">
                                <i class="fas fa-calendar-check me-2"></i>Submit Booking Request
                            </button>
                        </form>
                    </div>

                    <div class="mt-4 text-center" data-aos="fade-up">
                        <p class="small opacity-75">
                            <i class="fas fa-info-circle me-2"></i>
                            We'll contact you within 24 hours to confirm your appointment.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('js/it-scripts.js') }}"></script>
</body>
</html>
