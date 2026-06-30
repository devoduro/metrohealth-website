<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @include('partials.seo', [
        'title' => 'Our Team - Metro Health Hospital',
        'description' => 'Meet the expert medical team at Metro Health Hospital. Our highly skilled professionals are dedicated to providing exceptional healthcare.',
        'keywords' => 'metro health team, medical doctors kumasi, healthcare professionals, hospital staff ghana'
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
    <section class="team-hero">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8" data-aos="fade-up">
                    </br></br>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Our Team</li>
                        </ol>
                    </nav>
                    <h1 class="hero-title">Our Team</h1>
                    <p class="hero-subtitle">
                        At Metro Health, our mission is to provide patient-centered healthcare marked by empathy, excellence, and a genuine passion for improving the well-being of every individual who walks through our doors. While we are especially recognized for our exceptional care for the elderly, our team of highly skilled and experienced medical professionals spans a wide range of specialties.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section section-padding">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center" data-aos="fade-up">
                    <h2 class="section-title">Meet Our Management Team</h2>
                    <p class="section-description">
                        Dedicated professionals committed to excellence in healthcare
                    </p>
                </div>
            </div>

            <div class="row g-4">
                @php
                    $teamMembers = [
                        [
                            'name' => 'Mr. Stephen Tawiah',
                            'position' => 'Managing Director',
                            'image' => asset('images/team/stephen-tawiah.png'),
                            'specialty' => 'Leading Metro Health Hospital with strategic vision and excellence.',
                            'phone' => '0241850091',
                            'email' => 'md@metrohealthgh.com',
                            'address' => '4 Barekese Road, Kumasi',
                            'bio' => 'Mr. Stephen Tawiah serves as the Managing Director of Metro Health Hospital, providing strategic leadership and overseeing all operations. His vision and dedication ensure the hospital maintains its commitment to excellence in healthcare delivery.'
                        ],
                        [
                            'name' => 'Dr. (Mrs) Phyllis Tawiah',
                            'position' => 'Medical Director',
                            'image' => asset('images/team/Dr(Mrs)-Phyllis-Tawiah.png'),
                            'specialty' => 'Ensuring clinical excellence across all medical departments.',
                            'phone' => '0241850091',
                            'email' => 'medical.director@metrohealthgh.com',
                            'address' => '4 Barekese Road, Kumasi',
                            'bio' => 'Dr. (Mrs) Phyllis Tawiah is the Medical Director of Metro Health Hospital, bringing extensive experience in healthcare management and clinical excellence. She leads our medical team with a commitment to providing world-class patient care.'
                        ],
                        [
                            'name' => 'Veronica Sabeng Poku',
                            'position' => 'Administrator',
                            'image' => asset('images/team/Veronica_Sabeng_Poku.png'),
                            'specialty' => 'Managing hospital operations with efficiency and dedication.',
                            'phone' => '0248555596',
                            'email' => 'admin@metrohealthgh.com',
                            'address' => '4 Barekese Road, Kumasi',
                            'bio' => 'Veronica Sabeng Poku serves as the Administrator of Metro Health Hospital, managing day-to-day operations and ensuring smooth functioning of all hospital departments. Her organizational skills and dedication contribute to excellent patient care.'
                        ],
                        [
                            'name' => 'Dr. Odeefour Ofori Amanfo',
                            'position' => 'Deputy Administrator',
                            'image' => asset('images/team/Dr_Odeefour_Ofori_Amanfo.png'),
                            'specialty' => 'Supporting hospital administration with medical expertise and leadership.',
                            'phone' => '0264840859',
                            'email' => 'deputy.admin@metrohealthgh.com',
                            'address' => '4 Barekese Road, Kumasi',
                            'bio' => 'Dr. Odeefour Ofori Amanfo serves as the Deputy Administrator of Metro Health Hospital, supporting administrative operations and ensuring quality healthcare delivery. His medical expertise and administrative skills make him an invaluable member of the leadership team.'
                        ],
                        [
                            'name' => 'Mary Ann Koomson',
                            'position' => 'Human Resource Manager',
                            'image' => asset('images/team/Mary_Ann_Koomson.png'),
                            'specialty' => 'Building and developing our exceptional healthcare team.',
                            'phone' => '0241850091',
                            'email' => 'hr@metrohealthgh.com',
                            'address' => '4 Barekese Road, Kumasi',
                            'bio' => 'Mary Ann Koomson serves as the Human Resource Manager of Metro Health Hospital, managing recruitment, training, and staff development. She ensures Metro Health attracts and retains top medical talent and maintains a positive work environment.'
                        ]
                    ];
                @endphp

                @foreach($teamMembers as $index => $member)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="team-card">
                        <div class="team-image">
                            <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}">
                            <div class="team-overlay">
                                <a href="{{ route('team.show', ['slug' => Str::slug($member['name'])]) }}" class="view-profile-btn">
                                    <i class="fas fa-user"></i> View Profile
                                </a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h4 class="team-name">{{ $member['name'] }}</h4>
                            <p class="team-position">{{ $member['position'] }}</p>
                            <p class="team-specialty">{{ $member['specialty'] }}</p>
                            <a href="{{ route('team.show', ['slug' => Str::slug($member['name'])]) }}" class="btn-view-profile">
                                View Profile <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
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
    .team-hero {
        background: linear-gradient(135deg, rgba(30, 58, 138, 0.9), rgba(21, 78, 171, 0.85)), url('images/about/work.jpg') center/cover;
        padding: 120px 0 80px;
        margin-top: 44px;
        position: relative;
    }

    .team-hero .breadcrumb {
        background: transparent;
        margin-bottom: 20px;
    }

    .team-hero .breadcrumb-item a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
    }

    .team-hero .breadcrumb-item.active {
        color: white;
    }

    .hero-title {
        color: white;
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 20px;
    }

    .hero-subtitle {
        color: rgba(255, 255, 255, 0.95);
        font-size: 1.1rem;
        line-height: 1.8;
    }

    .team-section {
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

    .team-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .team-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .team-image {
        position: relative;
        overflow: hidden;
        height: 480px;
    }

    .team-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .team-card:hover .team-image img {
        transform: scale(1.1);
    }

    .team-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(14, 116, 36, 0.95) 0%, rgba(123, 164, 40, 0.95) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .team-card:hover .team-overlay {
        opacity: 1;
    }

    .view-profile-btn {
        background: white;
        color: #a8207a;
        padding: 12px 30px;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
    }

    .view-profile-btn:hover {
        background: #7ba428;
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .team-info {
        padding: 25px 20px;
        text-align: center;
    }

    .team-name {
        color: #2d3e50;
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .team-position {
        color: #a8207a;
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .team-specialty {
        color: #666;
        font-size: 0.9rem;
        margin: 0 0 20px 0;
    }

    .btn-view-profile {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #138d29 0%, #7ba428 100%);
        color: white;
        padding: 10px 25px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .btn-view-profile:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(168, 32, 122, 0.3);
        color: white;
    }

    .btn-view-profile i {
        font-size: 0.8rem;
    }

    @media (max-width: 991px) {
        .hero-title {
            font-size: 2.5rem;
        }

        .section-title {
            font-size: 2rem;
        }
    }

    @media (max-width: 767px) {
        .team-hero {
            padding: 100px 0 60px;
        }

        .hero-title {
            font-size: 2rem;
        }

        .hero-subtitle {
            font-size: 1rem;
        }

        .section-title {
            font-size: 1.8rem;
        }

        .team-image {
            height: 250px;
        }
    }
    </style>
</body>
</html>
