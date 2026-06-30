<!-- Main Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top main-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/logo/logo.png') }}" alt="Metro Health Logo" class="navbar-logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="aboutDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            About Us
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                            <li><a class="dropdown-item" href="{{ route('who-we-are') }}">Who We Are</a></li>
                            <li><a class="dropdown-item" href="{{ route('team') }}">Our Team</a></li>
                            <li><a class="dropdown-item" href="{{ route('gallery') }}">Our Gallery</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                            <li><a class="dropdown-item" href="{{ route('services.general-practice') }}">General Practice</a></li>
                            <li><a class="dropdown-item" href="{{ route('services.general-surgery') }}">General Surgery</a></li>
                            <li><a class="dropdown-item" href="{{ route('services.obstetrics-gynaecology') }}">Obstetrics & Gynaecology</a></li>
                            <li><a class="dropdown-item" href="{{ route('services.geriatric-care') }}">Geriatric Care</a></li>
                            <li><a class="dropdown-item" href="{{ route('services.neurology-neurosurgery') }}">Neurology & Neurosurgery</a></li>
                            <li><a class="dropdown-item" href="{{ route('services.paediatrics') }}">Paediatrics</a></li>
                            <li><a class="dropdown-item" href="{{ route('services.urology') }}">Urology</a></li>
                            <li><a class="dropdown-item" href="{{ route('services.orthopaedic') }}">Orthopaedic</a></li>
                            <li><a class="dropdown-item" href="{{ route('services.ent-care') }}">ENT Care</a></li>
                            <li><a class="dropdown-item" href="{{ route('services.eye-care') }}">Eye Care</a></li>
                            <li><a class="dropdown-item" href="{{ route('services.plastic-surgery') }}">Plastic Surgery</a></li>
                          
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('services.index') }}">View All Services</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="resourcesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Resources
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="resourcesDropdown">
                            <li><a class="dropdown-item" href="{{ route('news-articles') }}">News & Articles</a></li>
                            <li><a class="dropdown-item" href="{{ route('faqs') }}">FAQs</a></li>
                      
                        </ul>
                        
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="clientDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Client
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="clientDropdown">
                            <li><a class="dropdown-item" href="{{ route('businesses-organizations') }}">Businesses & Organizations</a></li>
                        </ul>
                    </li>
                    <li class="nav-item ms-3">
                        <a class="btn btn-book-appointment" href="{{ route('clinic-appointments.index') }}">
                            <i class="fas fa-calendar-check me-2"></i>BOOK APPOINTMENT
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
