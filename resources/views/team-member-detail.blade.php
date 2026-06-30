<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @include('partials.seo', [
        'title' => $member['name'] . ' - ' . $member['position'] . ' - Metro Health Hospital',
        'description' => $member['bio'] ?? 'Meet ' . $member['name'] . ', ' . $member['position'] . ' at Metro Health Hospital.',
        'keywords' => 'metro health team, ' . $member['name'] . ', ' . $member['position'] . ', healthcare professionals'
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
    <section class="member-hero">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8" data-aos="fade-up">
                    </br></br>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('team') }}">Our Team</a></li>
                            <li class="breadcrumb-item active">{{ $member['name'] }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Member Detail Section -->
    <section class="member-detail-section section-padding">
        <div class="container">
            <div class="row g-5">
                <!-- Left Column: Image and Contact -->
                <div class="col-lg-4" data-aos="fade-right">
                    <div class="member-profile-card">
                        <div class="member-profile-image">
                            <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}">
                        </div>
                        <div class="member-profile-info">
                            <h2 class="member-profile-name">{{ $member['name'] }}</h2>
                            <p class="member-profile-position">{{ $member['position'] }}</p>
                            
                            @if($member['phone'] || $member['email'] || $member['address'])
                            <div class="member-contact-info">
                                <h4 class="contact-heading">Contact Information</h4>
                                @if($member['phone'])
                                <div class="contact-detail">
                                    <i class="fas fa-phone"></i>
                                    <a href="tel:{{ $member['phone'] }}">{{ $member['phone'] }}</a>
                                </div>
                                @endif
                                @if($member['email'])
                                <div class="contact-detail">
                                    <i class="fas fa-envelope"></i>
                                    <a href="mailto:{{ $member['email'] }}">{{ $member['email'] }}</a>
                                </div>
                                @endif
                                @if($member['address'])
                                <div class="contact-detail">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>{{ $member['address'] }}</span>
                                </div>
                                @endif
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Right Column: Bio and Details -->
                <div class="col-lg-8" data-aos="fade-left">
                    <div class="member-bio-section">
                        <h3 class="bio-title">About {{ explode(' ', $member['name'])[0] }}</h3>
                        <p class="bio-specialty">{{ $member['specialty'] }}</p>
                        
                        @if($member['bio'])
                        <div class="bio-content">
                            <p>{{ $member['bio'] }}</p>
                        </div>
                        @endif

                        <div class="member-cta">
                            <a href="{{ route('contact') }}" class="btn-schedule">
                                <i class="fas fa-calendar-check"></i> Schedule Appointment
                            </a>
                            <a href="{{ route('team') }}" class="btn-back">
                                <i class="fas fa-arrow-left"></i> Back to Team
                            </a>
                        </div>
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
    .member-hero {
        background: linear-gradient(135deg, rgba(30, 58, 138, 0.9), rgba(63, 109, 182, 0.85)), url('https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=1920') center/cover;
        padding: 120px 0 80px;
        margin-top: 44px;
        position: relative;
    }

    .member-hero .breadcrumb {
        background: transparent;
        margin-bottom: 20px;
    }

    .member-hero .breadcrumb-item a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
    }

    .member-hero .breadcrumb-item.active {
        color: white;
    }

    .member-detail-section {
        padding: 80px 0;
    }

    .member-profile-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        position: sticky;
        top: 100px;
    }

    .member-profile-image {
        width: 100%;
        height: 480px;
        overflow: hidden;
    }

    .member-profile-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .member-profile-info {
        padding: 30px;
    }

    .member-profile-name {
        color: #2d3e50;
        font-size: 1.8rem;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .member-profile-position {
        color: #a8207a;
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 25px;
    }

    .member-contact-info {
        margin-top: 25px;
        padding-top: 25px;
        border-top: 2px solid #f0f0f0;
    }

    .contact-heading {
        color: #2d3e50;
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .contact-detail {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 15px;
        color: #666;
    }

    .contact-detail i {
        width: 20px;
        color: #a8207a;
        font-size: 1rem;
    }

    .contact-detail a {
        color: #666;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .contact-detail a:hover {
        color: #a8207a;
    }

    .member-bio-section {
        background: white;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    }

    .bio-title {
        color: #2d3e50;
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 15px;
    }

    .bio-specialty {
        color: #7ba428;
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 30px;
    }

    .bio-content {
        color: #666;
        font-size: 1.1rem;
        line-height: 1.8;
        margin-bottom: 40px;
    }

    .member-cta {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .btn-schedule {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: linear-gradient(135deg, #109b3c 0%, #7ba428 100%);
        color: white;
        padding: 15px 30px;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .btn-schedule:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(168, 32, 122, 0.3);
        color: white;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: white;
        color: #a8207a;
        padding: 15px 30px;
        border-radius: 30px;
        border: 2px solid #a8207a;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .btn-back:hover {
        background: #a8207a;
        color: white;
        transform: translateY(-3px);
    }

    @media (max-width: 991px) {
        .member-profile-card {
            position: relative;
            top: 0;
        }

        .member-profile-image {
            height: 350px;
        }

        .bio-title {
            font-size: 2rem;
        }

        .member-cta {
            flex-direction: column;
        }

        .btn-schedule, .btn-back {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 767px) {
        .member-hero {
            padding: 100px 0 60px;
        }

        .member-profile-image {
            height: 300px;
        }

        .member-profile-name {
            font-size: 1.5rem;
        }

        .bio-title {
            font-size: 1.8rem;
        }

        .member-bio-section {
            padding: 25px;
        }
    }
    </style>
</body>
</html>
