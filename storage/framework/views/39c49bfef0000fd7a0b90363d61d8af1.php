<!-- Main Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top main-navbar">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
                <img src="<?php echo e(asset('images/logo/logo.png')); ?>" alt="Metro Health Logo" class="navbar-logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link active" href="<?php echo e(route('home')); ?>">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="aboutDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            About Us
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                            <li><a class="dropdown-item" href="<?php echo e(route('who-we-are')); ?>">Who We Are</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('team')); ?>">Our Team</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('gallery')); ?>">Our Gallery</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu services-dropdown-grouped" aria-labelledby="servicesDropdown">
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Inpatient &amp; Operative Care</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?php echo e(route('services.general-surgery')); ?>">General and Specialized Surgery</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('services.physician-clinic')); ?>">Internal Medicine Department</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('services.general-surgery')); ?>">Anesthesiology &amp; Perioperative Care Department</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('services.obstetrics-gynaecology')); ?>">Obstetrics &amp; Gynecology Department</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('services.paediatrics')); ?>">General Pediatrics</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Emergency &amp; Critical Care</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?php echo e(route('services.ambulance-service')); ?>">Emergency Medicine</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('services.ambulance-service')); ?>">Ambulance Service</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Advanced Diagnostics</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?php echo e(route('services.radiology')); ?>">Radiology &amp; Medical Imaging</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('services.laboratory')); ?>">General Laboratory</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('services.laboratory')); ?>">Electrocardiogram (EKG/ECG)</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('services.laboratory')); ?>">Spirometry &amp; Pulmonary/Lung Function Test</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('services.endoscopy')); ?>">Gastrointestinal Endoscopy (Upper and Lower GI)</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('services.radiology')); ?>">Echocardiography (Echo)</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('services.laboratory')); ?>">Holter Monitoring</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Outpatient &amp; Ambulatory Care</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?php echo e(route('services.general-practice')); ?>">General Outpatient Department (OPD)</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('services.physician-clinic')); ?>">Specialist Outpatient Clinics</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('services.family-medicine-clinic')); ?>">Family Medicine Specialist Outpatient Clinics</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('services.eye-care')); ?>">Eye Care</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('services.ent-care')); ?>">ENT</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('services.index')); ?>">Home Health Services (Home Visit)</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Therapeutics &amp; Allied Health Support</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?php echo e(route('services.pharmacy')); ?>">Pharmacy</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('services.dietetics')); ?>">Clinical Nutrition</a></li>
                                </ul>
                            </li>

                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('services.index')); ?>">View All Services</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="resourcesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Resources
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="resourcesDropdown">
                            <li><a class="dropdown-item" href="<?php echo e(route('news-articles')); ?>">News & Articles</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('faqs')); ?>">FAQs</a></li>
                      
                        </ul>
                        
                    </li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('contact')); ?>">Contact</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="clientDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Client
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="clientDropdown">
                            <li><a class="dropdown-item" href="<?php echo e(route('businesses-organizations')); ?>">Businesses & Organizations</a></li>
                        </ul>
                    </li>
                    <li class="nav-item ms-3">
                        <a class="btn btn-book-appointment" href="<?php echo e(route('clinic-appointments.index')); ?>">
                            <i class="fas fa-calendar-check me-2"></i>BOOK APPOINTMENT
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script>
    (function () {
        document.querySelectorAll('.dropdown-submenu > .dropdown-item.dropdown-toggle').forEach(function (toggle) {
            toggle.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                var submenu = toggle.parentElement;
                var isOpen = submenu.classList.contains('show');

                submenu.parentElement.querySelectorAll(':scope > .dropdown-submenu.show').forEach(function (sibling) {
                    if (sibling !== submenu) sibling.classList.remove('show');
                });

                submenu.classList.toggle('show', !isOpen);

                if (!isOpen) {
                    var flyout = submenu.querySelector(':scope > .dropdown-menu');
                    if (flyout && window.innerWidth >= 992) {
                        flyout.classList.remove('dropdown-submenu-left');
                        var rect = flyout.getBoundingClientRect();
                        if (rect.right > window.innerWidth) {
                            flyout.classList.add('dropdown-submenu-left');
                        }
                    }
                }
            });
        });

        document.getElementById('navbarNav').addEventListener('hidden.bs.collapse', function () {
            document.querySelectorAll('.dropdown-submenu.show').forEach(function (submenu) {
                submenu.classList.remove('show');
            });
        });

        var servicesDropdown = document.getElementById('servicesDropdown');
        if (servicesDropdown) {
            servicesDropdown.addEventListener('hidden.bs.dropdown', function () {
                document.querySelectorAll('.dropdown-submenu.show').forEach(function (submenu) {
                    submenu.classList.remove('show');
                });
            });
        }
    })();
    </script>
<?php /**PATH C:\xampp\htdocs\metrohealth-web\resources\views/partials/navigation.blade.php ENDPATH**/ ?>