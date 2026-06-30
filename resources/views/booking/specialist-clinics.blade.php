@extends('layouts.app')

@section('title', 'Specialist Clinic Booking - Metro Health Hospital')

@section('content')
<!-- Hero Section -->
<section class="specialist-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title">Specialist Clinic Appointments</h1>
                <p class="hero-subtitle">Walk in during clinic hours or book an appointment with our specialist doctors</p>
            </div>
        </div>
    </div>
</section>

<!-- Specialist Clinics Section -->
<section class="clinics-section section-padding">
    <div class="container">
        <div class="row g-4">
            <!-- Obstetrics and Gynaecology -->
            <div class="col-lg-6">
                <div class="clinic-card" data-aos="fade-up">
                    <div class="clinic-header">
                        <div class="clinic-icon">
                            <i class="fas fa-baby"></i>
                        </div>
                        <div class="clinic-title-wrapper">
                            <h3 class="clinic-title">Obstetrics and Gynaecology</h3>
                            <span class="clinic-badge">Walk-in Available</span>
                        </div>
                    </div>
                    <div class="clinic-body">
                        <div class="clinic-schedule">
                            <div class="schedule-item">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Wednesday, Friday & Saturday</span>
                            </div>
                            <div class="schedule-item">
                                <i class="fas fa-clock"></i>
                                <span>8:00 AM - 2:00 PM</span>
                            </div>
                        </div>
                        <div class="clinic-actions">
                            <a href="https://outlook.office365.com/owa/calendar/MetroHealthHospital@metrohealth.com.gh/bookings/" 
                               target="_blank" 
                               class="btn-book-outlook">
                                <i class="fab fa-microsoft"></i>
                                Book with Outlook
                            </a>
                            <a href="tel:+233245717681" class="btn-call">
                                <i class="fas fa-phone"></i>
                                Call Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pediatric Clinic -->
            <div class="col-lg-6">
                <div class="clinic-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="clinic-header">
                        <div class="clinic-icon">
                            <i class="fas fa-child"></i>
                        </div>
                        <div class="clinic-title-wrapper">
                            <h3 class="clinic-title">Pediatric Clinic</h3>
                            <span class="clinic-badge">Walk-in Available</span>
                        </div>
                    </div>
                    <div class="clinic-body">
                        <div class="clinic-schedule">
                            <div class="schedule-item">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Saturday</span>
                            </div>
                            <div class="schedule-item">
                                <i class="fas fa-clock"></i>
                                <span>8:00 AM - 2:00 PM</span>
                            </div>
                        </div>
                        <div class="clinic-actions">
                            <a href="https://outlook.office365.com/owa/calendar/MetroHealthHospital@metrohealth.com.gh/bookings/" 
                               target="_blank" 
                               class="btn-book-outlook">
                                <i class="fab fa-microsoft"></i>
                                Book with Outlook
                            </a>
                            <a href="tel:+233245717681" class="btn-call">
                                <i class="fas fa-phone"></i>
                                Call Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ear, Nose & Throat -->
            <div class="col-lg-6">
                <div class="clinic-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="clinic-header">
                        <div class="clinic-icon">
                            <i class="fas fa-head-side-mask"></i>
                        </div>
                        <div class="clinic-title-wrapper">
                            <h3 class="clinic-title">Ear, Nose & Throat</h3>
                            <span class="clinic-badge">Walk-in Available</span>
                        </div>
                    </div>
                    <div class="clinic-body">
                        <div class="clinic-schedule">
                            <div class="schedule-item">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Wednesday</span>
                            </div>
                            <div class="schedule-item">
                                <i class="fas fa-clock"></i>
                                <span>4:00 PM - 6:00 PM</span>
                            </div>
                        </div>
                        <div class="clinic-actions">
                            <a href="https://outlook.office365.com/owa/calendar/MetroHealthHospital@metrohealth.com.gh/bookings/" 
                               target="_blank" 
                               class="btn-book-outlook">
                                <i class="fab fa-microsoft"></i>
                                Book with Outlook
                            </a>
                            <a href="tel:+233245717681" class="btn-call">
                                <i class="fas fa-phone"></i>
                                Call Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Urology -->
            <div class="col-lg-6">
                <div class="clinic-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="clinic-header">
                        <div class="clinic-icon">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <div class="clinic-title-wrapper">
                            <h3 class="clinic-title">Urology</h3>
                            <span class="clinic-badge appointment-only">Appointment Only</span>
                        </div>
                    </div>
                    <div class="clinic-body">
                        <div class="clinic-schedule">
                            <div class="schedule-item">
                                <i class="fas fa-calendar-check"></i>
                                <span>By Appointment Only</span>
                            </div>
                            <div class="schedule-item">
                                <i class="fas fa-phone-alt"></i>
                                <span>Call: +233 24 571 7681</span>
                            </div>
                        </div>
                        <div class="clinic-actions">
                            <a href="https://outlook.office365.com/owa/calendar/MetroHealthHospital@metrohealth.com.gh/bookings/" 
                               target="_blank" 
                               class="btn-book-outlook">
                                <i class="fab fa-microsoft"></i>
                                Book with Outlook
                            </a>
                            <a href="tel:+233245717681" class="btn-call">
                                <i class="fas fa-phone"></i>
                                Call: +233 24 571 7681
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Geriatric / Elderly Care -->
            <div class="col-lg-6">
                <div class="clinic-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="clinic-header">
                        <div class="clinic-icon">
                            <i class="fas fa-walking"></i>
                        </div>
                        <div class="clinic-title-wrapper">
                            <h3 class="clinic-title">Geriatric / Elderly Care</h3>
                            <span class="clinic-badge">Walk-in Available</span>
                        </div>
                    </div>
                    <div class="clinic-body">
                        <div class="clinic-schedule">
                            <div class="schedule-item">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Tuesday & Thursday</span>
                            </div>
                            <div class="schedule-item">
                                <i class="fas fa-clock"></i>
                                <span>Tue: 2:00 PM - 5:00 PM</span>
                            </div>
                            <div class="schedule-item">
                                <i class="fas fa-clock"></i>
                                <span>Thu: 8:00 AM - 4:00 PM</span>
                            </div>
                        </div>
                        <div class="clinic-actions">
                            <a href="https://outlook.office365.com/owa/calendar/MetroHealthHospital@metrohealth.com.gh/bookings/" 
                               target="_blank" 
                               class="btn-book-outlook">
                                <i class="fab fa-microsoft"></i>
                                Book with Outlook
                            </a>
                            <a href="tel:+233245717681" class="btn-call">
                                <i class="fas fa-phone"></i>
                                Call Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orthopedics -->
            <div class="col-lg-6">
                <div class="clinic-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="clinic-header">
                        <div class="clinic-icon">
                            <i class="fas fa-bone"></i>
                        </div>
                        <div class="clinic-title-wrapper">
                            <h3 class="clinic-title">Orthopedics</h3>
                            <span class="clinic-badge">Walk-in Available</span>
                        </div>
                    </div>
                    <div class="clinic-body">
                        <div class="clinic-schedule">
                            <div class="schedule-item">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Tuesday</span>
                            </div>
                            <div class="schedule-item">
                                <i class="fas fa-clock"></i>
                                <span>2:00 PM - 8:00 PM</span>
                            </div>
                        </div>
                        <div class="clinic-actions">
                            <a href="https://outlook.office365.com/owa/calendar/MetroHealthHospital@metrohealth.com.gh/bookings/" 
                               target="_blank" 
                               class="btn-book-outlook">
                                <i class="fab fa-microsoft"></i>
                                Book with Outlook
                            </a>
                            <a href="tel:+233245717681" class="btn-call">
                                <i class="fas fa-phone"></i>
                                Call Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Info Box -->
        <div class="info-box mt-5" data-aos="fade-up">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h4><i class="fas fa-info-circle"></i> Important Information</h4>
                    <ul>
                        <li>Walk-in patients are welcome during clinic hours on a first-come, first-served basis</li>
                        <li>Booking an appointment ensures priority service and reduced waiting time</li>
                        <li>Please arrive 15 minutes before your scheduled appointment</li>
                        <li>Bring your insurance card and any relevant medical records</li>
                        <li>For urgent medical concerns, please visit our Emergency Department</li>
                    </ul>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="contact-info">
                        <p class="mb-2"><strong>General Inquiries:</strong></p>
                        <a href="tel:+233241850091" class="phone-link">
                            <i class="fas fa-phone-alt"></i> +233 24 185 0091
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
/* Specialist Hero Section */
.specialist-hero {
    background: linear-gradient(135deg, #a8207a 0%, #7ba428 100%);
    padding: 120px 0 80px;
    margin-top: 0;
}

.hero-title {
    color: white;
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: 20px;
}

.hero-subtitle {
    color: rgba(255, 255, 255, 0.95);
    font-size: 1.3rem;
    font-weight: 400;
}

/* Clinics Section */
.clinics-section {
    padding: 80px 0;
    background: #f8f9fa;
}

.clinic-card {
    background: white;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    height: 100%;
}

.clinic-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}

.clinic-header {
    display: flex;
    align-items: flex-start;
    gap: 20px;
    margin-bottom: 25px;
    padding-bottom: 20px;
    border-bottom: 2px solid #f0f0f0;
}

.clinic-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, #a8207a 0%, #7ba428 100%);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.clinic-icon i {
    font-size: 2rem;
    color: white;
}

.clinic-title-wrapper {
    flex: 1;
}

.clinic-title {
    color: #2d3e50;
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 10px;
}

.clinic-badge {
    display: inline-block;
    background: #7ba428;
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
}

.clinic-badge.appointment-only {
    background: #a8207a;
}

.clinic-body {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

.clinic-schedule {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.schedule-item {
    display: flex;
    align-items: center;
    gap: 12px;
    color: #555;
    font-size: 1rem;
}

.schedule-item i {
    color: #a8207a;
    font-size: 1.1rem;
    width: 20px;
}

.clinic-actions {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.btn-book-outlook {
    flex: 1;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    background: #0078D4;
    color: white;
    padding: 14px 25px;
    border-radius: 10px;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    min-width: 200px;
}

.btn-book-outlook:hover {
    background: #005a9e;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 120, 212, 0.3);
    color: white;
}

.btn-call {
    flex: 1;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    background: #7ba428;
    color: white;
    padding: 14px 25px;
    border-radius: 10px;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    min-width: 150px;
}

.btn-call:hover {
    background: #93c03a;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(123, 164, 40, 0.3);
    color: white;
}

/* Info Box */
.info-box {
    background: white;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    border-left: 5px solid #a8207a;
}

.info-box h4 {
    color: #2d3e50;
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 20px;
}

.info-box h4 i {
    color: #a8207a;
    margin-right: 10px;
}

.info-box ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.info-box ul li {
    padding: 10px 0;
    padding-left: 30px;
    position: relative;
    color: #555;
    line-height: 1.6;
}

.info-box ul li:before {
    content: "✓";
    position: absolute;
    left: 0;
    color: #7ba428;
    font-weight: 700;
    font-size: 1.2rem;
}

.contact-info {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 15px;
}

.phone-link {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    color: #a8207a;
    font-size: 1.3rem;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
}

.phone-link:hover {
    color: #7ba428;
}

/* Responsive Design */
@media (max-width: 991px) {
    .hero-title {
        font-size: 2.5rem;
    }

    .hero-subtitle {
        font-size: 1.1rem;
    }

    .clinic-title {
        font-size: 1.3rem;
    }
}

@media (max-width: 767px) {
    .specialist-hero {
        padding: 100px 0 60px;
    }

    .hero-title {
        font-size: 2rem;
    }

    .hero-subtitle {
        font-size: 1rem;
    }

    .clinics-section {
        padding: 60px 0;
    }

    .clinic-card {
        padding: 25px;
    }

    .clinic-header {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .clinic-actions {
        flex-direction: column;
    }

    .btn-book-outlook,
    .btn-call {
        width: 100%;
    }

    .info-box {
        padding: 25px;
    }

    .contact-info {
        margin-top: 20px;
    }
}
</style>
@endpush
