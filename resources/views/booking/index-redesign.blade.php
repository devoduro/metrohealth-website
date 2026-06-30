<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @include('partials.seo', [
        'title' => 'Book Appointment',
        'description' => 'Book your hair care appointment with Ashlocs. Professional dreadlocks, braiding and haircut services. Easy online booking with flexible scheduling.',
        'keywords' => 'book appointment, hair appointment, online booking, schedule hair service, ashlocs booking, UK hair salon appointment'
    ])
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('css/ashlocs-custom.css') }}">
</head>
<body>
    @include('partials.navigation')

    <!-- Page Hero -->
    <section class="page-hero" style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); padding: 120px 0 80px;">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <h1 class="display-3 fw-bold mb-4" style="color: var(--ashlocs-dark);">Book Your Appointment</h1>
                    <p class="lead" style="font-size: 1.5rem; color: var(--ashlocs-gray);">
                        Schedule your professional hair care session with our expert stylists
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Booking Form -->
    <section class="section-padding">
        <div class="container">
            <div class="row g-5">
                <!-- Booking Form -->
                <div class="col-lg-8" data-aos="fade-right">
                    <div class="booking-form-wrapper">
                        <h2 class="mb-4" style="font-size: 2rem; font-weight: 800;">Complete Your Booking</h2>
                        
                        @if($errors->any())
                        <div class="alert alert-danger" style="border-radius: 15px; border-left: 5px solid #dc3545;">
                            <h5 class="alert-heading"><i class="fas fa-exclamation-triangle me-2"></i>Please fix the following errors:</h5>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('stripe.checkout') }}" method="POST" id="bookingForm">
                            @csrf
                            
                            <!-- Personal Information -->
                            <div class="form-section">
                                <h4 class="form-section-title"><i class="fas fa-user me-2"></i>Personal Information</h4>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Full Name *</label>
                                        <input type="text" name="name" class="form-control form-control-lg" value="{{ old('name') }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Email Address *</label>
                                        <input type="email" name="email" class="form-control form-control-lg" value="{{ old('email') }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Phone Number *</label>
                                        <input type="tel" name="phone" class="form-control form-control-lg" value="{{ old('phone') }}" required placeholder="+44">
                                    </div>
                                </div>
                            </div>

                            <!-- Customer Category -->
                            <div class="form-section">
                                <h4 class="form-section-title"><i class="fas fa-map-marker-alt me-2"></i>Service Type & Location</h4>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Customer Category *</label>
                                        <select name="customer_category" id="customerCategory" class="form-control form-control-lg" required>
                                            <option value="">Select category...</option>
                                            <option value="walk-in" {{ old('customer_category') == 'walk-in' ? 'selected' : '' }}>Walk-in Customer (£20 deposit)</option>
                                            <option value="home-service" {{ old('customer_category') == 'home-service' ? 'selected' : '' }}>Home Service</option>
                                        </select>
                                    </div>

                                    <div class="col-12" id="locationField" style="display: none;">
                                        <label class="form-label">Service Location *</label>
                                        <select name="service_location" id="serviceLocation" class="form-control form-control-lg">
                                            <option value="">Select location...</option>
                                            <option value="within-reading" {{ old('service_location') == 'within-reading' ? 'selected' : '' }}>Within Reading (£50 deposit)</option>
                                            <option value="outside-reading" {{ old('service_location') == 'outside-reading' ? 'selected' : '' }}>Outside Reading (£70 deposit)</option>
                                        </select>
                                    </div>

                                    <div class="col-12" id="addressField" style="display: none;">
                                        <label class="form-label">Street Address *</label>
                                        <input type="text" name="street_address" id="streetAddress" class="form-control form-control-lg" 
                                               value="{{ old('street_address') }}" 
                                               placeholder="Enter your full street address...">
                                    </div>

                                    <div class="col-md-6" id="postcodeField" style="display: none;">
                                        <label class="form-label">Postcode *</label>
                                        <input type="text" name="postcode" id="postcode" class="form-control form-control-lg" 
                                               value="{{ old('postcode') }}" 
                                               placeholder="e.g., RG1 1AA">
                                    </div>

                                    <div class="col-12" id="depositDisplay" style="display: none;">
                                        <div class="alert alert-info" style="border-radius: 15px; border-left: 5px solid #17a2b8;">
                                            <h5 class="alert-heading mb-2"><i class="fas fa-pound-sign me-2"></i>Deposit Required</h5>
                                            <p class="mb-0" style="font-size: 1.8rem; font-weight: 700; color: var(--ashlocs-orange);">
                                                £<span id="depositAmount">0</span>
                                            </p>
                                            <small class="text-muted">A deposit is required to confirm your booking. You'll be redirected to secure payment.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Service Selection -->
                            <div class="form-section">
                                <h4 class="form-section-title"><i class="fas fa-cut me-2"></i>Service Selection</h4>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Select Service *</label>
                                        <select name="service_id" id="serviceSelect" class="form-control form-control-lg" required>
                                            <option value="">Choose a service...</option>
                                            @foreach($services as $service)
                                            <option value="{{ $service->id }}" 
                                                    data-price-range="{{ $service->getPriceRange() }}"
                                                    {{ old('service_id') == $service->id || request('service') == $service->id ? 'selected' : '' }}>
                                                {{ $service->title }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="col-12" id="priceRangeDisplay" style="display: none;">
                                        <div class="alert alert-success" style="border-radius: 15px; border-left: 5px solid #28a745;">
                                            <h5 class="alert-heading mb-2"><i class="fas fa-tag me-2"></i>Price Range</h5>
                                            <p class="mb-0" style="font-size: 1.5rem; font-weight: 700; color: var(--ashlocs-orange);">
                                                <span id="priceRangeValue">-</span>
                                            </p>
                                            <small class="text-muted">Final price will be confirmed by our team based on your specific requirements</small>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Additional Details</label>
                                        <input type="text" name="hair_type" class="form-control form-control-lg" value="{{ old('hair_type') }}" placeholder="e.g., Short hair, Long locs, Medium braids">
                                        <small class="text-muted">Optional: Describe your hair type/length for better service preparation</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Date & Time -->
                            <div class="form-section">
                                <h4 class="form-section-title"><i class="fas fa-calendar-alt me-2"></i>Date & Time</h4>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Preferred Date *</label>
                                        <input type="text" id="bookingDate" name="preferred_date" class="form-control form-control-lg" 
                                               value="{{ old('preferred_date') }}" 
                                               placeholder="Select a date..." 
                                               required readonly>
                                        <small class="text-muted">Minimum 24 hours advance booking</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Preferred Time *</label>
                                        <select name="preferred_time" class="form-control form-control-lg" required>
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
                                            <option value="07:00 PM" {{ old('preferred_time') == '07:00 PM' ? 'selected' : '' }}>07:00 PM</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Information -->
                            <div class="form-section">
                                <h4 class="form-section-title"><i class="fas fa-comment me-2"></i>Additional Information</h4>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Special Requests or Notes (Optional)</label>
                                        <textarea name="message" class="form-control form-control-lg" rows="4" 
                                                  placeholder="Any special requests, allergies, or information we should know...">{{ old('message') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary-custom btn-lg w-100">
                                <i class="fas fa-lock me-2"></i>Proceed to Secure Payment
                            </button>
                            <p class="text-center mt-3 text-muted">
                                <i class="fas fa-shield-alt me-1"></i> Secure payment powered by Stripe
                            </p>
                        </form>
                    </div>
                </div>

                <!-- Booking Info Sidebar -->
                <div class="col-lg-4" data-aos="fade-left">
                    <div class="booking-info-sidebar">
                        <h3 class="mb-4" style="font-weight: 800;">Booking Information</h3>
                        
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <h5>Response Time</h5>
                                <p>We'll confirm within 24 hours</p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h5>Service Location</h5>
                                <p>UK-Wide Home Service<br>9 Union St RG1 1EU</p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <h5>Contact Us</h5>
                                <p><a href="tel:+447724500349">+44 7724 500349</a><br>
                                <a href="mailto:bookings@ashlocs.co.uk">bookings@ashlocs.co.uk</a></p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <div>
                                <h5>Cancellation Policy</h5>
                                <p>Free cancellation up to 24 hours before appointment</p>
                            </div>
                        </div>

                        <div class="booking-tips">
                            <h5><i class="fas fa-lightbulb me-2"></i>Booking Tips</h5>
                            <ul>
                                <li>Book at least 24 hours in advance</li>
                                <li>Specify your hair type for accurate service</li>
                                <li>Mention any allergies or concerns</li>
                                <li>Check your email for confirmation</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 50
        });

        // Price ranges for services and hair types
        const priceRanges = {
            'Dreadlocks': {
                'Natural Hair': '£80 - £150',
                'Relaxed Hair': '£90 - £160',
                'Transitioning Hair': '£85 - £155',
                'Locs/Dreadlocks': '£40 - £80 (Maintenance)',
                'Short Hair': '£60 - £100',
                'Medium Length': '£90 - £140',
                'Long Hair': '£120 - £200',
                'Children\'s Hair': '£50 - £90',
                'Other': 'Contact for quote'
            },
            'Braids': {
                'Natural Hair': '£100 - £180',
                'Relaxed Hair': '£110 - £190',
                'Transitioning Hair': '£105 - £185',
                'Short Hair': '£80 - £130',
                'Medium Length': '£120 - £170',
                'Long Hair': '£150 - £250',
                'Children\'s Hair': '£60 - £110',
                'Other': 'Contact for quote'
            },
            'Haircut': {
                'Natural Hair': '£30 - £50',
                'Relaxed Hair': '£30 - £50',
                'Short Hair': '£25 - £40',
                'Medium Length': '£30 - £50',
                'Long Hair': '£35 - £60',
                'Locs/Dreadlocks': '£35 - £55 (Trimming)',
                'Children\'s Hair': '£20 - £35',
                'Other': 'Contact for quote'
            },
            'Loc Maintenance': {
                'Locs/Dreadlocks': '£40 - £80',
                'Short Hair': '£35 - £60',
                'Medium Length': '£50 - £90',
                'Long Hair': '£70 - £120',
                'Other': 'Contact for quote'
            },
            'Loc Extensions': {
                'Locs/Dreadlocks': '£150 - £300',
                'Medium Length': '£180 - £320',
                'Long Hair': '£200 - £400',
                'Other': 'Contact for quote'
            },
            'Coloring': {
                'Natural Hair': '£60 - £120',
                'Relaxed Hair': '£60 - £120',
                'Short Hair': '£50 - £90',
                'Medium Length': '£70 - £130',
                'Long Hair': '£90 - £180',
                'Locs/Dreadlocks': '£80 - £150',
                'Other': 'Contact for quote'
            },
            'Hair Treatment': {
                'Natural Hair': '£40 - £80',
                'Relaxed Hair': '£40 - £80',
                'Transitioning Hair': '£45 - £85',
                'Short Hair': '£30 - £60',
                'Medium Length': '£45 - £85',
                'Long Hair': '£60 - £110',
                'Locs/Dreadlocks': '£50 - £90',
                'Children\'s Hair': '£25 - £50',
                'Other': 'Contact for quote'
            },
            'Workshops': {
                'default': '£150 - £500 (Group sessions)',
                'Other': '£200 - £800 (1:1 Pro Sessions)'
            }
        };

        // Service selection and price range display
        const serviceSelect = document.getElementById('serviceSelect');
        const priceRangeDisplay = document.getElementById('priceRangeDisplay');
        const priceRangeValue = document.getElementById('priceRangeValue');

        function updatePriceRange() {
            const selectedOption = serviceSelect?.options[serviceSelect.selectedIndex];
            const priceRange = selectedOption?.getAttribute('data-price-range');

            if (priceRange && serviceSelect?.value) {
                priceRangeValue.textContent = priceRange;
                priceRangeDisplay.style.display = 'block';
            } else {
                priceRangeDisplay.style.display = 'none';
            }
        }

        if (serviceSelect) {
            serviceSelect.addEventListener('change', updatePriceRange);
            
            // Trigger on page load if service is pre-selected
            if (serviceSelect.value) {
                updatePriceRange();
            }
        }

        // Customer category and deposit calculation
        const customerCategory = document.getElementById('customerCategory');
        const locationField = document.getElementById('locationField');
        const serviceLocation = document.getElementById('serviceLocation');
        const addressField = document.getElementById('addressField');
        const postcodeField = document.getElementById('postcodeField');
        const streetAddress = document.getElementById('streetAddress');
        const postcode = document.getElementById('postcode');
        const depositDisplay = document.getElementById('depositDisplay');
        const depositAmount = document.getElementById('depositAmount');

        function updateDepositAmount() {
            const category = customerCategory?.value;
            const location = serviceLocation?.value;
            let deposit = 0;

            if (category === 'walk-in') {
                deposit = 20;
                locationField.style.display = 'none';
                addressField.style.display = 'none';
                postcodeField.style.display = 'none';
                serviceLocation.removeAttribute('required');
                streetAddress.removeAttribute('required');
                postcode.removeAttribute('required');
                depositDisplay.style.display = 'block';
            } else if (category === 'home-service') {
                locationField.style.display = 'block';
                addressField.style.display = 'block';
                postcodeField.style.display = 'block';
                serviceLocation.setAttribute('required', 'required');
                streetAddress.setAttribute('required', 'required');
                postcode.setAttribute('required', 'required');
                
                if (location === 'within-reading') {
                    deposit = 50;
                    depositDisplay.style.display = 'block';
                } else if (location === 'outside-reading') {
                    deposit = 70;
                    depositDisplay.style.display = 'block';
                } else {
                    depositDisplay.style.display = 'none';
                }
            } else {
                locationField.style.display = 'none';
                addressField.style.display = 'none';
                postcodeField.style.display = 'none';
                depositDisplay.style.display = 'none';
                serviceLocation.removeAttribute('required');
                streetAddress.removeAttribute('required');
                postcode.removeAttribute('required');
            }

            depositAmount.textContent = deposit;
        }

        if (customerCategory) {
            customerCategory.addEventListener('change', updateDepositAmount);
        }

        if (serviceLocation) {
            serviceLocation.addEventListener('change', updateDepositAmount);
        }

        // Trigger on page load if values are pre-selected
        if (customerCategory?.value) {
            updateDepositAmount();
        }

        // Initialize Flatpickr date picker
        const bookingDateInput = document.getElementById('bookingDate');
        if (bookingDateInput) {
            flatpickr(bookingDateInput, {
                minDate: 'today',
                dateFormat: 'Y-m-d',
                disableMobile: false,
                inline: false,
                mode: 'single',
                defaultDate: '{{ old("preferred_date") }}',
                disable: [
                    function(date) {
                        // Disable dates before tomorrow (24 hours advance)
                        const tomorrow = new Date();
                        tomorrow.setDate(tomorrow.getDate() + 1);
                        tomorrow.setHours(0, 0, 0, 0);
                        return date < tomorrow;
                    }
                ],
                onChange: function(selectedDates, dateStr, instance) {
                    // Optional: Add any custom logic when date changes
                },
                onReady: function(selectedDates, dateStr, instance) {
                    // Add custom styling to calendar
                    instance.calendarContainer.style.boxShadow = '0 4px 20px rgba(0,0,0,0.1)';
                }
            });
        }
    </script>
</body>
</html>
