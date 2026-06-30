<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $service->title }} | Metro Health</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/it-styles.css') }}">
</head>
<body>
    @include('partials.navigation')

    <!-- Page Header -->
    <section class="hero-section" style="min-height: 50vh;">
        <div class="hero-bg"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center text-center" style="min-height: 50vh;">
                <div class="col-lg-8" data-aos="fade-up">
                    <div class="service-icon mx-auto mb-4" style="width: 100px; height: 100px; font-size: 3rem;">
                        <i class="{{ $service->icon }}"></i>
                    </div>
                    <h1 class="display-4 mb-4">{{ $service->title }}</h1>
                    <p class="lead">{{ $service->description }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Details -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="glass-card" data-aos="fade-up">
                        <div class="mb-4">
                            {!! nl2br(e($service->full_description ?? $service->description)) !!}
                        </div>
                        
                        @if($service->price)
                        <div class="mb-4">
                            <h4>Pricing</h4>
                            <p class="text-primary-custom fs-3 fw-bold">{{ $service->price }}</p>
                        </div>
                        @endif

                        <div class="d-flex gap-3">
                            <a href="{{ route('clinic-appointments.index') }}" class="btn btn-primary-custom">
                                <i class="fas fa-calendar-check me-2"></i>Book Appointment
                            </a>
                            <a href="{{ route('contact') }}" class="btn btn-outline-primary">
                                <i class="fas fa-envelope me-2"></i>Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Services -->
    @if($relatedServices->count() > 0)
    <section class="section-padding bg-light-custom">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2>Other Services You Might Like</h2>
            </div>
            <div class="row g-4">
                @foreach($relatedServices as $index => $relatedService)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="glass-card text-center h-100">
                        <div class="service-icon mx-auto"><i class="{{ $relatedService->icon }}"></i></div>
                        <h4 class="service-title">{{ $relatedService->title }}</h4>
                        <p class="small opacity-75 mb-4">{{ Str::limit($relatedService->description, 100) }}</p>
                        @if($relatedService->slug)
                        <a href="{{ route('services.show', $relatedService->slug) }}" class="btn btn-outline-primary btn-sm">Learn More</a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('js/it-scripts.js') }}"></script>
</body>
</html>
