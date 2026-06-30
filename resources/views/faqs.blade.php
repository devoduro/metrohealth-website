<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs - Metro Health Hospital</title>
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/ashlocs-custom.css') }}">
   <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .page-hero {
            background: linear-gradient(135deg, rgba(30, 58, 138, 0.9), rgba(11, 62, 145, 0.85)), url('images/services/faqs.jpg') center/cover;
            padding: 120px 0 80px;
            position: relative;
        }

        .faq-section {
            padding: 70px 0;
            background: #f8f9fa;
        }

        .faq-item {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .faq-item:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
            transform: translateY(-2px);
        }

        .faq-question {
            width: 100%;
            background: white;
            border: none;
            padding: 25px 30px;
            text-align: left;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
        }

        .faq-question:hover {
            background: #f8f9fa;
        }

        .faq-question-text {
            font-size: 1.1rem;
            font-weight: 600;
            color: #1a1a1a;
            padding-right: 20px;
            line-height: 1.5;
        }

        .faq-arrow {
            font-size: 2rem;
            color: #a8207a;
            font-weight: 300;
            transition: transform 0.3s ease;
            flex-shrink: 0;
        }

        .faq-item.active .faq-arrow {
            transform: rotate(90deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease;
        }

        .faq-item.active .faq-answer {
            max-height: 1000px;
        }

        .faq-answer-content {
            padding: 0 30px 30px 30px;
            color: #666;
            font-size: 1rem;
            line-height: 1.8;
        }

        .faq-answer-content a {
            color: #a8207a;
            text-decoration: none;
            font-weight: 600;
        }

        .faq-answer-content a:hover {
            text-decoration: underline;
        }

        .faq-info-box {
            background: #f8f9fa;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 15px;
            border-left: 4px solid #84a33f;
        }

        .faq-info-box:last-child {
            margin-bottom: 0;
        }

        .faq-insurance-box {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 25px;
            border-radius: 12px;
            border: 2px solid #a8207a;
        }

        .insurance-title {
            font-weight: 700;
            color: #a8207a;
            font-size: 1.1rem;
            margin-bottom: 20px;
        }

        .insurance-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 12px;
            margin-bottom: 20px;
        }

        .insurance-grid div {
            color: #1a1a1a;
            font-weight: 500;
            padding: 8px 0;
        }

        .insurance-note {
            margin: 0;
            padding-top: 15px;
            border-top: 1px solid #ddd;
            color: #666;
            font-size: 0.95rem;
        }

        /* Sidebar Styles */
        .sidebar-widget {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }

        .sidebar-widget h5 {
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 20px;
            font-size: 1.2rem;
            position: relative;
            padding-bottom: 10px;
        }

        .sidebar-widget h5::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: #84a33f;
        }

        .service-link-item {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            margin-bottom: 8px;
            border-radius: 10px;
            text-decoration: none;
            background: #f8f9fa;
            transition: all 0.3s ease;
            color: #666;
            font-weight: 500;
        }

        .service-link-item:hover {
            background: #a8207a;
            color: white;
            padding-left: 20px;
        }

        .service-link-item i {
            margin-right: 12px;
            font-size: 1.1rem;
        }

        .news-item {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        .news-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .news-thumb {
            flex-shrink: 0;
            width: 70px;
            height: 70px;
            border-radius: 10px;
            overflow: hidden;
        }

        .news-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .news-content h6 {
            font-size: 0.9rem;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 5px;
            line-height: 1.4;
        }

        .news-content h6 a {
            color: #1a1a1a;
            text-decoration: none;
        }

        .news-content h6 a:hover {
            color: #a8207a;
        }

        .news-date {
            color: #999;
            font-size: 0.8rem;
        }

        @media (max-width: 768px) {
            .faq-question {
                padding: 20px;
            }

            .faq-question-text {
                font-size: 1rem;
            }

            .faq-answer-content {
                padding: 0 20px 20px 20px;
            }

            .insurance-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Top Header Bar -->
    @include('partials.top_header')
    
    <!-- Main Navbar -->
    @include('partials.navigation')
    
    <!-- Page Hero -->
    <section class="page-hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center text-white" data-aos="fade-up">
                    <h1 style="font-size: 3rem; color:white; font-weight: 800; margin-bottom: 4px;margin-top: 40px;">Frequently Asked Questions</h1>
                    <p style="font-size: 1.2rem; opacity: 0.95;">Find answers to common questions about our services and procedures</p>
                    <nav aria-label="breadcrumb" style="margin-top: 20px;">
                        <ol class="breadcrumb justify-content-center" style="background: transparent;">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: white; text-decoration: none;">Home</a></li>
                            <li class="breadcrumb-item active" style="color: rgba(255,255,255,0.8);">FAQs</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <!-- FAQ 1 -->
                    <div class="faq-item" data-aos="fade-up" data-aos-delay="100">
                        <button class="faq-question" onclick="toggleFaq(this)">
                            <span class="faq-question-text">The doctor has asked me to see a doctor in another department. How should I proceed?</span>
                            <span class="faq-arrow">›</span>
                        </button>
                        <div class="faq-answer">
                            <div class="faq-answer-content">
                                Please approach the front desk team with your hospital number to request an appointment with the referred doctor.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="faq-item" data-aos="fade-up" data-aos-delay="150">
                        <button class="faq-question" onclick="toggleFaq(this)">
                            <span class="faq-question-text">How can I get a medical report?</span>
                            <span class="faq-arrow">›</span>
                        </button>
                        <div class="faq-answer">
                            <div class="faq-answer-content">
                                <div class="faq-info-box">
                                    <strong>For out-patients:</strong> Kindly request your treating doctor to provide you with the required medical report. You will be asked to fill a form at the reception for the report which usually takes 5-7 working days to be ready.
                                </div>
                                <div class="faq-info-box">
                                    <strong>For in-patients:</strong> This request must be made to the attending doctor or specialist before the time of discharge.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                        <button class="faq-question" onclick="toggleFaq(this)">
                            <span class="faq-question-text">I have specific questions. How do I reach out?</span>
                            <span class="faq-arrow">›</span>
                        </button>
                        <div class="faq-answer">
                            <div class="faq-answer-content">
                                Call us on <a href="tel:+233241850091">+233 24 185 0091</a> or send an Email to <a href="mailto:info@metrohealthgh.com">info@metrohealthgh.com</a>.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="faq-item" data-aos="fade-up" data-aos-delay="250">
                        <button class="faq-question" onclick="toggleFaq(this)">
                            <span class="faq-question-text">If I am admitted to the hospital, can a relative stay with me during the night?</span>
                            <span class="faq-arrow">›</span>
                        </button>
                        <div class="faq-answer">
                            <div class="faq-answer-content">
                                Yes, a relative is permitted to stay with the patient. We have designated beds for patients' relatives.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 5 -->
                    <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                        <button class="faq-question" onclick="toggleFaq(this)">
                            <span class="faq-question-text">Will there be a requirement to provide an advance payment at the time of admission?</span>
                            <span class="faq-arrow">›</span>
                        </button>
                        <div class="faq-answer">
                            <div class="faq-answer-content">
                                Advance payment is usually collected at the time of the patient's admission to cover estimated hospital expenses. The amount depends on the type of treatment/surgery and also the type of room selected for stay.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 6 -->
                    <div class="faq-item" data-aos="fade-up" data-aos-delay="350">
                        <button class="faq-question" onclick="toggleFaq(this)">
                            <span class="faq-question-text">I have already made an appointment via Phone/online. Where should I report when I get to the Hospital?</span>
                            <span class="faq-arrow">›</span>
                        </button>
                        <div class="faq-answer">
                            <div class="faq-answer-content">
                                If you are an old client, always bring along your hospital card, provided to you during your first registration; however, if you are a new client, you can come with your Ghana Card. Upon arrival, please approach any front desk personnel for further guidance. If you leave your card at home, you may have to respond to some questions to help retrieve your data. <strong>Do not register again for a new hospital number.</strong>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 7 -->
                    <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                        <button class="faq-question" onclick="toggleFaq(this)">
                            <span class="faq-question-text">Are all the consultants available 24 hours?</span>
                            <span class="faq-arrow">›</span>
                        </button>
                        <div class="faq-answer">
                            <div class="faq-answer-content">
                                General Doctors are available 24 hours a day. Specialists are available only at specified times within the week. You can see more on consultant availability on our <a href="{{ route('services.index') }}">services page</a>.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 8 -->
                    <div class="faq-item" data-aos="fade-up" data-aos-delay="450">
                        <button class="faq-question" onclick="toggleFaq(this)">
                            <span class="faq-question-text">I am visiting a friend but I do not know the admission ward. What do I do?</span>
                            <span class="faq-arrow">›</span>
                        </button>
                        <div class="faq-answer">
                            <div class="faq-answer-content">
                                You can get the details of your friend from the nurse-in-charge or the security desk once you arrive at the hospital.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 9 -->
                    <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
                        <button class="faq-question" onclick="toggleFaq(this)">
                            <span class="faq-question-text">What are the procedures for lab investigations? Will I get a copy of all my lab reports?</span>
                            <span class="faq-arrow">›</span>
                        </button>
                        <div class="faq-answer">
                            <div class="faq-answer-content">
                                For all tests/investigations, prior payment must be made at the cash counter. Once payment is complete, you will be directed by the staff to the phlebotomy. After the tests, all reports will be sent to the doctor. However, if you prefer a hard copy, it will be printed and handed over to you.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 10 -->
                    <div class="faq-item" data-aos="fade-up" data-aos-delay="550">
                        <button class="faq-question" onclick="toggleFaq(this)">
                            <span class="faq-question-text">Do you have a Dental Clinic?</span>
                            <span class="faq-arrow">›</span>
                        </button>
                        <div class="faq-answer">
                            <div class="faq-answer-content">
                                No, we do not currently offer dental services.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 11 -->
                    <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
                        <button class="faq-question" onclick="toggleFaq(this)">
                            <span class="faq-question-text">Do you accept health insurance?</span>
                            <span class="faq-arrow">›</span>
                        </button>
                        <div class="faq-answer">
                            <div class="faq-answer-content">
                                <p style="margin-bottom: 16px;">Yes, we accept various private health insurance providers:</p>
                                <div class="faq-insurance-box">
                                    <p class="insurance-title">Accepted Insurance Companies:</p>
                                    <div class="insurance-grid">
                                        <div>• Ace Medical</div>
                                        <div>• BIMA</div>
                                        <div>• Acacia</div>
                                        <div>• Metropolitan</div>
                                        <div>• Premier Health</div>
                                        <div>• Nationwide Medical</div>
                                        <div>• Equity</div>
                                        <div>• Cosmopolitan</div>
                                        <div>• Apex</div>
                                        <div>• GHIC</div>
                                    </div>
                                    <p class="insurance-note"><strong>Important:</strong> Please bring your insurance card during registration.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- All Services Widget -->
                    <div class="sidebar-widget" data-aos="fade-left">
                        <h5>Our Services</h5>
                        <div>
                            <a href="{{ route('services.general-practice') }}" class="service-link-item">
                                <i class="fas fa-stethoscope"></i>
                                <span>General Practice</span>
                            </a>
                            <a href="{{ route('services.general-surgery') }}" class="service-link-item">
                                <i class="fas fa-user-md"></i>
                                <span>General Surgery</span>
                            </a>
                            <a href="{{ route('services.obstetrics-gynaecology') }}" class="service-link-item">
                                <i class="fas fa-baby"></i>
                                <span>Obstetrics & Gynaecology</span>
                            </a>
                            <a href="{{ route('services.geriatric-care') }}" class="service-link-item">
                                <i class="fas fa-user-friends"></i>
                                <span>Geriatric Care</span>
                            </a>
                            <a href="{{ route('services.neurology-neurosurgery') }}" class="service-link-item">
                                <i class="fas fa-brain"></i>
                                <span>Neurology & Neurosurgery</span>
                            </a>
                            <a href="{{ route('services.paediatrics') }}" class="service-link-item">
                                <i class="fas fa-child"></i>
                                <span>Paediatrics</span>
                            </a>
                            <a href="{{ route('services.urology') }}" class="service-link-item">
                                <i class="fas fa-kidneys"></i>
                                <span>Urology</span>
                            </a>
                            <a href="{{ route('services.orthopaedic') }}" class="service-link-item">
                                <i class="fas fa-bone"></i>
                                <span>Orthopaedic</span>
                            </a>
                            <a href="{{ route('services.ent-care') }}" class="service-link-item">
                                <i class="fas fa-head-side-mask"></i>
                                <span>ENT Care</span>
                            </a>
                            <a href="{{ route('services.eye-care') }}" class="service-link-item">
                                <i class="fas fa-eye"></i>
                                <span>Eye Care</span>
                            </a>
                            <a href="{{ route('services.plastic-surgery') }}" class="service-link-item">
                                <i class="fas fa-user-md"></i>
                                <span>Plastic Surgery</span>
                            </a>
                        </div>
                    </div>

                    <!-- Recent News Widget -->
                    <div class="sidebar-widget" data-aos="fade-left" data-aos-delay="100">
                        <h5>Recent News & Articles</h5>
                        <div>
                            @php
                                $recentPosts = \App\Models\BlogPost::where('published', true)
                                    ->orderBy('published_at', 'desc')
                                    ->take(4)
                                    ->get();
                            @endphp

                            @if($recentPosts->count() > 0)
                                @foreach($recentPosts as $post)
                                <div class="news-item">
                                    <div class="news-thumb">
                                        @if($post->image)
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" onerror="this.src='https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=200'">
                                        @else
                                            <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=200" alt="{{ $post->title }}">
                                        @endif
                                    </div>
                                    <div class="news-content">
                                        <h6><a href="{{ route('news-update.show', $post->slug) }}">{{ Str::limit($post->title, 50) }}</a></h6>
                                        <span class="news-date">
                                            <i class="far fa-calendar me-1"></i>{{ $post->published_at ? $post->published_at->format('M d, Y') : 'Recent' }}
                                        </span>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <p style="color: #666; font-size: 0.9rem; margin: 0;">No recent articles available.</p>
                            @endif
                        </div>
                        <a href="{{ route('news-articles') }}" class="btn btn-sm w-100 mt-3" style="background: #a8207a; color: white; padding: 10px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block; text-align: center;">
                            View All Articles <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>

                    <!-- Contact Widget -->
                    <div class="sidebar-widget" style="background: linear-gradient(135deg, #84a33f, #84a33f); color: white;" data-aos="fade-left" data-aos-delay="200">
                        <h5 style="color: white;">Need Help?</h5>
                        <p style="font-size: 0.9rem; margin-bottom: 20px; opacity: 0.95;">Can't find the answer you're looking for? Contact us directly.</p>
                        <div style="margin-bottom: 15px;">
                            <i class="fas fa-phone me-2"></i>
                            <a href="tel:+233241850091" style="color: white; text-decoration: none; font-weight: 600;">+233 24 185 0091</a>
                        </div>
                        <div style="margin-bottom: 20px;">
                            <i class="fas fa-envelope me-2"></i>
                            <a href="mailto:info@metrohealthgh.com" style="color: white; text-decoration: none; font-weight: 600;">info@metrohealthgh.com</a>
                        </div>
                        <a href="{{ route('contact') }}" class="btn btn-light w-100" style="padding: 12px; font-weight: 600; border-radius: 8px; text-decoration: none; display: inline-block; text-align: center;">
                            Contact Us
                        </a>
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

        function toggleFaq(button) {
            const faqItem = button.closest('.faq-item');
            const isActive = faqItem.classList.contains('active');
            
            // Close all FAQ items
            document.querySelectorAll('.faq-item').forEach(item => {
                item.classList.remove('active');
            });
            
            // Open clicked item if it wasn't active
            if (!isActive) {
                faqItem.classList.add('active');
            }
        }
    </script>
</body>
</html>
