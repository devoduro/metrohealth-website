<footer style="background: linear-gradient(135deg, #1e2a4a 0%, #2d3e5f 100%); padding: 60px 0 0; position: relative; overflow: hidden;">
    <!-- Background Pattern -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; opacity: 0.03; background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

    <div class="container" style="position: relative; z-index: 1;">
        <div class="row">
            <!-- About Section -->
            <div class="col-lg-4 mb-4 mb-lg-0">
                <a href="{{ route('home') }}" class="d-block mb-3">
                    <img src="{{ asset('images/logo/footer_logo.png') }}" alt="Metro Health Hospital Logo" style="height: 60px;">
                </a>
                <p style="color: rgba(255, 255, 255, 0.8); font-size: 0.9rem; line-height: 1.7; margin-bottom: 20px;">
                    At Metro Health, our mission is to provide patient-centered healthcare marked by empathy, excellence, and a genuine passion for improving the well-being of every individual who walks through our doors. While we are especially recognized for our exceptional care for the elderly, our team of highly skilled and experienced medical professionals spans a wide range of specialties.
                </p>
                <div class="social-icons" style="margin-top: 20px;">
                    <a href="http://web.facebook.com/profile.php?id=100076176886846&rdid=X9ySH7o7NK" target="_blank" rel="noopener noreferrer" style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: rgba(255, 255, 255, 0.1); border-radius: 50%; color: white; margin-right: 10px; transition: all 0.3s ease; text-decoration: none;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" target="_blank" rel="noopener noreferrer" style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: rgba(255, 255, 255, 0.1); border-radius: 50%; color: white; margin-right: 10px; transition: all 0.3s ease; text-decoration: none;">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" target="_blank" rel="noopener noreferrer" style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: rgba(255, 255, 255, 0.1); border-radius: 50%; color: white; margin-right: 10px; transition: all 0.3s ease; text-decoration: none;">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-6 mb-4 mb-lg-0">
                <h5 style="color: white; font-weight: 700; font-size: 1.1rem; margin-bottom: 20px; position: relative; padding-bottom: 10px;">
                    Quick Links
                    <span style="position: absolute; bottom: 0; left: 0; width: 40px; height: 3px; background: #84a33f;"></span>
                </h5>
                <div style="display: flex; flex-direction: column; gap: 10px;">
                    <a href="{{ route('home') }}" style="color: rgba(255, 255, 255, 0.7); text-decoration: none; font-size: 0.9rem; transition: all 0.3s ease; display: block;">Home</a>
                    <a href="{{ route('who-we-are') }}" style="color: rgba(255, 255, 255, 0.7); text-decoration: none; font-size: 0.9rem; transition: all 0.3s ease; display: block;">About Us</a>
                    <a href="{{ route('services.index') }}" style="color: rgba(255, 255, 255, 0.7); text-decoration: none; font-size: 0.9rem; transition: all 0.3s ease; display: block;">Our Services</a>
                    <a href="#" style="color: rgba(255, 255, 255, 0.7); text-decoration: none; font-size: 0.9rem; transition: all 0.3s ease; display: block;">Gallery</a>
                    <a href="#" style="color: rgba(255, 255, 255, 0.7); text-decoration: none; font-size: 0.9rem; transition: all 0.3s ease; display: block;">FAQs</a>
                    <a href="{{ route('contact') }}" style="color: rgba(255, 255, 255, 0.7); text-decoration: none; font-size: 0.9rem; transition: all 0.3s ease; display: block;">Contact Us</a>
                </div>
            </div>

            <!-- Our Services -->
            <div class="col-lg-3 col-6 mb-4 mb-lg-0">
                <h5 style="color: white; font-weight: 700; font-size: 1.1rem; margin-bottom: 20px; position: relative; padding-bottom: 10px;">
                    All Services
                    <span style="position: absolute; bottom: 0; left: 0; width: 40px; height: 3px; background: #84a33f;"></span>
                </h5>
                <div style="display: flex; flex-direction: column; gap: 10px;">
                    <a href="{{ route('services.general-practice') }}" style="color: rgba(255, 255, 255, 0.7); text-decoration: none; font-size: 0.9rem; transition: all 0.3s ease; display: block;">General Practice</a>
                    <a href="{{ route('services.general-surgery') }}" style="color: rgba(255, 255, 255, 0.7); text-decoration: none; font-size: 0.9rem; transition: all 0.3s ease; display: block;">General Surgery</a>
                    <a href="{{ route('services.obstetrics-gynaecology') }}" style="color: rgba(255, 255, 255, 0.7); text-decoration: none; font-size: 0.9rem; transition: all 0.3s ease; display: block;">Obstetrics & Gynaecology</a>
                    <a href="{{ route('services.geriatric-care') }}" style="color: rgba(255, 255, 255, 0.7); text-decoration: none; font-size: 0.9rem; transition: all 0.3s ease; display: block;">Geriatric Care</a>
                    <a href="{{ route('services.neurology-neurosurgery') }}" style="color: rgba(255, 255, 255, 0.7); text-decoration: none; font-size: 0.9rem; transition: all 0.3s ease; display: block;">Neurology & Neurosurgery</a>
                    <a href="{{ route('services.paediatrics') }}" style="color: rgba(255, 255, 255, 0.7); text-decoration: none; font-size: 0.9rem; transition: all 0.3s ease; display: block;">Paediatrics</a>
                    <a href="{{ route('services.urology') }}" style="color: rgba(255, 255, 255, 0.7); text-decoration: none; font-size: 0.9rem; transition: all 0.3s ease; display: block;">Urology</a>
                    <a href="{{ route('services.orthopaedic') }}" style="color: rgba(255, 255, 255, 0.7); text-decoration: none; font-size: 0.9rem; transition: all 0.3s ease; display: block;">Orthopaedic</a>
                    <a href="{{ route('services.ent-care') }}" style="color: rgba(255, 255, 255, 0.7); text-decoration: none; font-size: 0.9rem; transition: all 0.3s ease; display: block;">ENT Care</a>
                    <a href="{{ route('services.eye-care') }}" style="color: rgba(255, 255, 255, 0.7); text-decoration: none; font-size: 0.9rem; transition: all 0.3s ease; display: block;">Eye Care</a>
                    <a href="{{ route('services.plastic-surgery') }}" style="color: rgba(255, 255, 255, 0.7); text-decoration: none; font-size: 0.9rem; transition: all 0.3s ease; display: block;">Plastic Surgery</a>
                </div>
            </div>

            <!-- Contact Us -->
            <div class="col-lg-3">
                <h5 style="color: white; font-weight: 700; font-size: 1.1rem; margin-bottom: 20px; position: relative; padding-bottom: 10px;">
                    Contact Us
                    <span style="position: absolute; bottom: 0; left: 0; width: 40px; height: 3px; background: #84a33f;"></span>
                </h5>
                <div style="display: flex; flex-direction: column; gap: 15px;">
                    <div style="display: flex; align-items: start;">
                        <i class="fas fa-map-marker-alt" style="color: #84a33f; font-size: 1.1rem; margin-right: 12px; margin-top: 3px;"></i>
                        <div>
                            <p style="color: rgba(255, 255, 255, 0.7); font-size: 0.9rem; margin: 0; line-height: 1.6;">4 Barekese Road, Abrepo Junction<br>Near Angel Fm, Kumasi, Ghana</p>
                        </div>
                    </div>
                    <div style="display: flex; align-items: start;">
                        <i class="fas fa-phone" style="color: #84a33f; font-size: 1.1rem; margin-right: 12px; margin-top: 3px;"></i>
                        <div>
                            <p style="color: rgba(255, 255, 255, 0.7); font-size: 0.9rem; margin: 0;">+233 24 185 0091</p>
                            <p style="color: rgba(255, 255, 255, 0.7); font-size: 0.9rem; margin: 0;">+233 24 185 0091</p>
                            <p style="color: rgba(255, 255, 255, 0.7); font-size: 0.9rem; margin: 0;">+233 24 185 0091</p>
                            <p style="color: rgba(255, 255, 255, 0.7); font-size: 0.9rem; margin: 0;">+233 24 185 0091</p>
                        </div>
                    </div>
                    <div style="display: flex; align-items: start;">
                        <i class="fas fa-envelope" style="color: #84a33f; font-size: 1.1rem; margin-right: 12px; margin-top: 3px;"></i>
                        <div>
                            <p style="color: rgba(255, 255, 255, 0.7); font-size: 0.9rem; margin: 0;">info@metrohealthgh.com</p>
                            <p style="color: rgba(255, 255, 255, 0.7); font-size: 0.9rem; margin: 0;">appointments@metrohealthgh.com</p>
                        </div>
                    </div>
                    <div style="display: flex; align-items: start;">
                        <i class="fas fa-clock" style="color: #84a33f; font-size: 1.1rem; margin-right: 12px; margin-top: 3px;"></i>
                        <div>
                            <p style="color: rgba(255, 255, 255, 0.7); font-size: 0.9rem; margin: 0; font-weight: 600;">24/7 Emergency Services</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div style="margin-top: 50px; padding: 25px 0; border-top: 1px solid rgba(255, 255, 255, 0.1);">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <p style="color: rgba(255, 255, 255, 0.6); font-size: 0.85rem; margin: 0;">
                        &copy; <span id="year"></span> Metro Health Hospital. All rights reserved.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" style="color: rgba(255, 255, 255, 0.6); text-decoration: none; font-size: 0.85rem; margin-left: 20px;">Privacy Policy</a>
                    <a href="#" style="color: rgba(255, 255, 255, 0.6); text-decoration: none; font-size: 0.85rem; margin-left: 20px;">Terms & Conditions</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    footer a:hover {
        color: #84a33f !important;
        padding-left: 5px;
    }
    
    footer .social-icons a:hover {
        background: #84a33f !important;
        transform: translateY(-3px);
        padding-left: 0 !important;
    }
</style>

<script>
    document.getElementById('year').textContent = new Date().getFullYear();
</script>
