<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php echo $__env->make('partials.seo', [
        'title' => 'Our Services - Metro Health Hospital',
        'description' => 'Comprehensive healthcare services at Metro Health Hospital in Kumasi. From general practice to specialized care.',
        'keywords' => 'healthcare services, medical services, hospital kumasi, metro health services'
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/ashlocs-custom.css')); ?>">
</head>
<body>
    <!-- Top Header Bar -->
    <?php echo $__env->make('partials.top_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <!-- Main Navbar -->
    <?php echo $__env->make('partials.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Page Hero -->
    <section class="page-hero" style="background: linear-gradient(135deg, rgba(9, 58, 91, 0.9) 0%, rgba(0, 82, 136, 0.85) 100%), url('<?php echo e(asset('images/services/page-bg-slider-02.png')); ?>') center/cover; padding: 120px 0 80px; margin-top: 44px; position: relative;">
        <div class="container" style="position: relative; z-index: 2;">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <div class="service-icon-large mx-auto mb-4" style="width: 120px; height: 120px; background: rgba(255, 255, 255, 0.95); border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 3.5rem; color: #2980b9; box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <h1 class="display-3 fw-bold mb-4" style="color: white; text-shadow: 0 2px 4px rgba(0,0,0,0.1);">Our Services</h1>
                    <p class="lead" style="font-size: 1.3rem; color: rgba(255, 255, 255, 0.95); text-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                        Comprehensive Healthcare Services for You and Your Family
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="section-padding" style="padding: 70px 0;">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-12 text-center" data-aos="fade-up">
                    <h2 class="mb-4" style="font-size: 2.5rem; font-weight: 800; color: #2d3e50;">Expert Medical Care Across All Specialties</h2>
                    <p style="font-size: 1.1rem; line-height: 1.8; color: #666;">At Metro Health Hospital, we provide a comprehensive range of medical services designed to meet all your healthcare needs. Our team of experienced specialists is committed to delivering exceptional care with compassion and expertise.</p>
                </div>
            </div>

            <div class="row">
                <!-- Main Content - Services Grid -->
                <div class="col-lg-8">
                    <div class="row g-4">
                <!-- General Practice -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div class="service-image" style="width: 100%; height: 200px; overflow: hidden;">
                            <img src="<?php echo e(asset('images/services/general_p.png')); ?>"  alt="General Practice" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 25px;">
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">General Practice</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">Comprehensive primary healthcare services for individuals and families of all ages.</p>
                            <a href="<?php echo e(route('services.general-practice')); ?>" class="btn btn-sm" style="background: #84a33f; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- General Surgery -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div class="service-image" style="width: 100%; height: 200px; overflow: hidden;">
                            <img src="<?php echo e(asset('images/services/surgery.jpg')); ?>"  alt="General Surgery" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 25px;">
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">General Surgery</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">Expert surgical care with modern techniques for optimal patient outcomes.</p>
                            <a href="<?php echo e(route('services.general-surgery')); ?>" class="btn btn-sm" style="background: #a8207a; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Obstetrics & Gynaecology -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div class="service-image" style="width: 100%; height: 200px; overflow: hidden;">
                            <img src="<?php echo e(asset('images/services/gy2.png')); ?>"  alt="Obstetrics & Gynaecology" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 25px;">
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">Obstetrics & Gynaecology</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">Comprehensive women's health services from pregnancy to menopause.</p>
                            <a href="<?php echo e(route('services.obstetrics-gynaecology')); ?>" class="btn btn-sm" style="background: #84a33f; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Geriatric Care -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div class="service-image" style="width: 100%; height: 200px; overflow: hidden;">
                            <img src="<?php echo e(asset('images/services/prmi-1.png')); ?>"  alt="Geriatric Care" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 25px;">
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">Geriatric Care</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">Specialized healthcare for older adults with compassion and expertise.</p>
                            <a href="<?php echo e(route('services.geriatric-care')); ?>" class="btn btn-sm" style="background: #a8207a; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>


                <!-- Paediatrics -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div class="service-image" style="width: 100%; height: 200px; overflow: hidden;">
                            <img src="<?php echo e(asset('images/services/Paediatrics.png')); ?>"  alt="Paediatrics" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 25px;">
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">Paediatrics</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">Expert care for children from birth to adolescence.</p>
                            <a href="<?php echo e(route('services.paediatrics')); ?>" class="btn btn-sm" style="background: #a8207a; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Urology -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div class="service-image" style="width: 100%; height: 200px; overflow: hidden;">
                            <img src="<?php echo e(asset('images/services/Urology-1.jpg')); ?>"  alt="Urology" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 25px;">
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">Urology</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">Restoring health and confidence through expert urological care.</p>
                            <a href="<?php echo e(route('services.urology')); ?>" class="btn btn-sm" style="background: #84a33f; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Orthopaedic -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div class="service-image" style="width: 100%; height: 200px; overflow: hidden;">
                            <img src="<?php echo e(asset('images/services/rehab-736x453.webp')); ?>"  alt="Orthopaedic" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 25px;">
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">Orthopaedic</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">Restoring motion and rebuilding strength for an active life.</p>
                            <a href="<?php echo e(route('services.orthopaedic')); ?>" class="btn btn-sm" style="background: #a8207a; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- ENT Care -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div class="service-image" style="width: 100%; height: 200px; overflow: hidden;">
                            <img src="<?php echo e(asset('images/services/ENT-02.jpg')); ?>"  alt="ENT Care" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 25px;">
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">ENT Care</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">Expert care for ear, nose, and throat with advanced solutions.</p>
                            <a href="<?php echo e(route('services.ent-care')); ?>" class="btn btn-sm" style="background: #84a33f; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Eye Care -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div class="service-image" style="width: 100%; height: 200px; overflow: hidden;">
                            <img src="<?php echo e(asset('images/services/eyecare.png')); ?>"  alt="Eye Care" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 25px;">
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">Eye Care</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">Advanced ophthalmology for clearer vision and brighter future.</p>
                            <a href="<?php echo e(route('services.eye-care')); ?>" class="btn btn-sm" style="background: #a8207a; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Plastic Surgery -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div class="service-image" style="width: 100%; height: 200px; overflow: hidden;">
                            <img  src="<?php echo e(asset('images/services/plastic_surgery1.png')); ?>"  alt="Plastic Surgery" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 25px;">
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">Plastic Surgery</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">Reconstructive and cosmetic surgery to enhance appearance and restore function.</p>
                            <a href="<?php echo e(route('services.plastic-surgery')); ?>" class="btn btn-sm" style="background: #84a33f; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Pharmacy -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div class="service-image" style="width: 100%; height: 200px; overflow: hidden;">
                            <img src="<?php echo e(asset('images/services/pharmacy.png')); ?>" alt="Pharmacy" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 25px;">
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">Pharmacy</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">A fully stocked, in-house pharmacy dispensing genuine medications with expert advice.</p>
                            <a href="<?php echo e(route('services.pharmacy')); ?>" class="btn btn-sm" style="background: #a8207a; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- General Lab -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div class="service-image" style="width: 100%; height: 200px; overflow: hidden;">
                            <img src="<?php echo e(asset('images/services/serv9.jpg')); ?>" alt="General Lab" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 25px;">
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">General Lab</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">State-of-the-art laboratory diagnostics manned by experienced laboratory scientists.</p>
                            <a href="<?php echo e(route('services.laboratory')); ?>" class="btn btn-sm" style="background: #84a33f; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Physician's Clinic -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div class="service-image" style="width: 100%; height: 200px; overflow: hidden;">
                            <img src="<?php echo e(asset('images/services/general_p2.png')); ?>" alt="Physician's Clinic" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 25px;">
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">Physician's Clinic</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">Consultant-led physician care for the diagnosis and management of adult medical conditions.</p>
                            <a href="<?php echo e(route('services.physician-clinic')); ?>" class="btn btn-sm" style="background: #a8207a; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Dietetics -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div class="service-image" style="width: 100%; height: 200px; overflow: hidden;">
                            <img src="<?php echo e(asset('images/services/se.png')); ?>" alt="Dietetics" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 25px;">
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">Dietetics</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">Personalized nutrition counselling and medical diet therapy from qualified dietitians.</p>
                            <a href="<?php echo e(route('services.dietetics')); ?>" class="btn btn-sm" style="background: #84a33f; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Endoscopy -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div style="padding: 25px; padding-top: 40px;">
                            <div class="service-icon-large mb-3" style="width: 70px; height: 70px; background: #f3e5f5; border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; color: #a8207a;">
                                <i class="fas fa-microscope"></i>
                            </div>
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">Endoscopy</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">Minimally invasive scope procedures for accurate diagnosis of the digestive tract.</p>
                            <a href="<?php echo e(route('services.endoscopy')); ?>" class="btn btn-sm" style="background: #a8207a; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Radiology & Medical Imaging -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div style="padding: 25px; padding-top: 40px;">
                            <div class="service-icon-large mb-3" style="width: 70px; height: 70px; background: #f3e5f5; border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; color: #a8207a;">
                                <i class="fas fa-x-ray"></i>
                            </div>
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">Radiology & Medical Imaging</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">X-Ray and CT imaging that turns radiation and sound waves into clear answers.</p>
                            <a href="<?php echo e(route('services.radiology')); ?>" class="btn btn-sm" style="background: #84a33f; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Ambulance Service -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; height: 100%; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease;">
                        <div style="padding: 25px; padding-top: 40px;">
                            <div class="service-icon-large mb-3" style="width: 70px; height: 70px; background: #f3e5f5; border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; color: #a8207a;">
                                <i class="fas fa-ambulance"></i>
                            </div>
                            <h3 class="mb-3" style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">Ambulance Service</h3>
                            <p class="mb-4" style="color: #666; font-size: 0.95rem; line-height: 1.6;">Rapid emergency response and safe patient transport, day or night.</p>
                            <a href="<?php echo e(route('services.ambulance-service')); ?>" class="btn btn-sm" style="background: #a8207a; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4" data-aos="fade-left">
                    <?php echo $__env->make('partials.services-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <!-- Specialist Clinics -->
                    <div class="specialist-clinics mb-4" style="background: white; border-radius: 20px; padding: 30px; box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);">
                        <h4 class="mb-4" style="font-weight: 700; color: #2d3e50;">Specialist Clinics</h4>
                        
                        <!-- Obstetrics and Gynaecology -->
                        <div class="clinic-item mb-4 pb-3" style="border-bottom: 1px solid #eee;">
                            <h6 style="font-weight: 600; color: #1a1a1a; margin-bottom: 8px; font-size: 0.95rem;">Obstetrics and Gynaecology</h6>
                            <p style="color: #666; font-size: 0.85rem; margin-bottom: 4px;">Wednesday, Friday & Saturday</p>
                            <p style="color: #84a33f; font-weight: 600; font-size: 0.9rem; margin: 0;">8:00 AM - 2:00 PM</p>
                        </div>

                        <!-- Pediatric Clinic -->
                        <div class="clinic-item mb-4 pb-3" style="border-bottom: 1px solid #eee;">
                            <h6 style="font-weight: 600; color: #1a1a1a; margin-bottom: 8px; font-size: 0.95rem;">Pediatric Clinic</h6>
                            <p style="color: #666; font-size: 0.85rem; margin-bottom: 4px;">Saturday</p>
                            <p style="color: #84a33f; font-weight: 600; font-size: 0.9rem; margin: 0;">8:00 AM - 2:00 PM</p>
                        </div>

                        <!-- Ear, Nose & Throat -->
                        <div class="clinic-item mb-4 pb-3" style="border-bottom: 1px solid #eee;">
                            <h6 style="font-weight: 600; color: #1a1a1a; margin-bottom: 8px; font-size: 0.95rem;">Ear, Nose & Throat</h6>
                            <p style="color: #666; font-size: 0.85rem; margin-bottom: 4px;">Wednesday</p>
                            <p style="color: #84a33f; font-weight: 600; font-size: 0.9rem; margin: 0;">4:00 PM - 6:00 PM</p>
                        </div>

                        <!-- Urology -->
                        <div class="clinic-item mb-4 pb-3" style="border-bottom: 1px solid #eee;">
                            <h6 style="font-weight: 600; color: #1a1a1a; margin-bottom: 8px; font-size: 0.95rem;">Urology</h6>
                            <p style="color: #666; font-size: 0.85rem; margin-bottom: 4px;">By Appointment Only</p>
                            <p style="color: #84a33f; font-weight: 600; font-size: 0.9rem; margin: 0;">Call: +233 24 571 7681</p>
                        </div>

                        <!-- Geriatric / Elderly Care -->
                        <div class="clinic-item mb-4 pb-3" style="border-bottom: 1px solid #eee;">
                            <h6 style="font-weight: 600; color: #1a1a1a; margin-bottom: 8px; font-size: 0.95rem;">Geriatric / Elderly Care</h6>
                            <p style="color: #666; font-size: 0.85rem; margin-bottom: 4px;">Tuesday & Thursday</p>
                            <p style="color: #84a33f; font-weight: 600; font-size: 0.9rem; margin: 0;">Tue: 2:00 PM - 5:00 PM | Thu: 8:00 AM - 4:00 PM</p>
                        </div>

                        <!-- Orthopedics -->
                        <div class="clinic-item mb-4">
                            <h6 style="font-weight: 600; color: #1a1a1a; margin-bottom: 8px; font-size: 0.95rem;">Orthopedics</h6>
                            <p style="color: #666; font-size: 0.85rem; margin-bottom: 4px;">Tuesday</p>
                            <p style="color: #84a33f; font-weight: 600; font-size: 0.9rem; margin: 0;">2:00 PM - 8:00 PM</p>
                        </div>
                    </div>

                    <!-- Appointment Booking Card -->
                    <div class="contact-card" style="background: #a8207a; border-radius: 12px; padding: 32px; color: white; box-shadow: 0 4px 12px rgba(168, 32, 122, 0.2);">
                        <h4 class="mb-3" style="font-weight: 700; color: white;">Book an Appointment</h4>
                        <p class="mb-4" style="opacity: 0.95;">Ready to schedule your consultation? Contact us today.</p>
                        <div class="contact-info mb-3">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-phone me-3" style="font-size: 1.2rem;"></i>
                                <div>
                                    <small style="opacity: 0.8;">Call Us</small>
                                    <p class="mb-0" style="font-weight: 600;">0241850091</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-envelope me-3" style="font-size: 1.2rem;"></i>
                                <div>
                                    <small style="opacity: 0.8;">Email</small>
                                    <p class="mb-0" style="font-weight: 600;">admin@metrohealthgh.com</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-map-marker-alt me-3" style="font-size: 1.2rem;"></i>
                                <div>
                                    <small style="opacity: 0.8;">Location</small>
                                    <p class="mb-0" style="font-weight: 600;">4 Barekese Road, Kumasi</p>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo e(route('contact')); ?>" class="btn btn-light w-100" style="padding: 13px; font-weight: 600; border-radius: 8px; transition: all 0.3s ease;">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section-padding" style="background: #f9f9f9; padding: 70px 0;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center" data-aos="fade-up">
                    <h2 class="mb-4" style="font-size: 2.5rem; font-weight: 800; color: #2d3e50;">Ready to Experience Quality Healthcare?</h2>
                    <p class="lead mb-4" style="font-size: 1.1rem; line-height: 1.8; color: #666;">Contact Metro Health Hospital today to schedule your appointment or learn more about our comprehensive medical services.</p>
                    <a href="<?php echo e(route('contact')); ?>" class="btn btn-lg" style="background: #a8207a; color: white; padding: 15px 40px; border-radius: 10px; font-weight: 600; text-decoration: none; display: inline-block; transition: all 0.3s ease;">Contact Us <i class="fas fa-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
    </section>

    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
    .section-padding {
        padding: 70px 0;
    }

    .service-card {
        transition: all 0.3s ease;
    }

    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15) !important;
    }

    .service-card .btn {
        transition: all 0.3s ease;
    }

    .service-card:hover .btn {
        transform: translateX(5px);
    }

    h1, h2, h3, h4, h5 {
        letter-spacing: -0.02em;
    }

    @media (max-width: 991px) {
        .page-hero {
            padding: 90px 0 60px !important;
        }

        .page-hero h1 {
            font-size: 2.3rem !important;
        }

        .service-icon-large {
            width: 100px !important;
            height: 100px !important;
            font-size: 3rem !important;
        }

        .section-padding {
            padding: 50px 0;
        }
    }

    @media (max-width: 767px) {
        .page-hero h1 {
            font-size: 1.9rem !important;
        }

        .service-card {
            padding: 25px !important;
        }
    }
    </style>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\metrohealth-web\resources\views/services/index-redesign.blade.php ENDPATH**/ ?>