        <script>
            // Init AOS (Animate On Scroll)
            AOS.init({
                duration: 800,
                easing: 'ease-out-cubic',
                once: true,
                offset: 50
            });

            // Current Year for Footer
            document.getElementById('year').textContent = new Date().getFullYear();

            // Dark Mode Toggle
            const themeToggle = document.getElementById('theme-toggle');
            const themeIcon = themeToggle.querySelector('i');
            const htmlElement = document.documentElement;

            // Check local storage, default to 'light' if not set
            const savedTheme = localStorage.getItem('theme') || 'light';
            htmlElement.setAttribute('data-theme', savedTheme);
            updateIcon(savedTheme);

            themeToggle.addEventListener('click', () => {
                const currentTheme = htmlElement.getAttribute('data-theme');
                const newTheme = currentTheme === 'light' ? 'dark' : 'light';

                htmlElement.setAttribute('data-theme', newTheme);
                localStorage.setItem('theme', newTheme);
                updateIcon(newTheme);
            });

            function updateIcon(theme) {
                if (theme === 'dark') {
                    themeIcon.classList.remove('fa-moon');
                    themeIcon.classList.add('fa-sun');
                } else {
                    themeIcon.classList.remove('fa-sun');
                    themeIcon.classList.add('fa-moon');
                }
            }

            // Smooth Scroll for Navbar Links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });

            // Navbar Active State on Scroll (Simple version)
            window.addEventListener('scroll', () => {
                const sections = document.querySelectorAll('section');
                const navLinks = document.querySelectorAll('.nav-link');

                let current = '';

                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.clientHeight;
                    if (pageYOffset >= sectionTop - 200) {
                        current = section.getAttribute('id');
                    }
                });

                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href').includes(current)) {
                        link.classList.add('active');
                    }
                });
            });

            // Mouse Move Effect for Product Cards (Spotlight)
            document.querySelectorAll('.product-card').forEach(card => {
                card.addEventListener('mousemove', (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    card.style.setProperty('--mouse-x', `${x}px`);
                    card.style.setProperty('--mouse-y', `${y}px`);
                });
            });

            // Typewriter Effect Logic
            const typewriterText = "Professional Hair Care & Dreadlock Specialists";
            const typewriterElement = document.getElementById('typewriter-text');
            let charIndex = 0;

            function typeWriter() {
                if (charIndex < typewriterText.length) {
                    typewriterElement.textContent += typewriterText.charAt(charIndex);
                    charIndex++;
                    setTimeout(typeWriter, 50); // Typing speed (ms)
                }
            }

            // Start typing after a short delay to allow slide-down to start
            setTimeout(typeWriter, 800);

            // Scroll Progress Button Logic
            const progressPath = document.querySelector('.progress-wrap path');
            const pathLength = progressPath.getTotalLength();

            progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
            progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
            progressPath.style.strokeDashoffset = pathLength;
            progressPath.getBoundingClientRect();
            progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';

            const updateProgress = function () {
                const scroll = window.scrollY || window.pageYOffset;
                const height = document.documentElement.scrollHeight - window.innerHeight;
                const progress = pathLength - (scroll * pathLength / height);
                progressPath.style.strokeDashoffset = progress;
            }

            updateProgress();
            window.addEventListener('scroll', updateProgress);

            const progressWrap = document.querySelector('.progress-wrap');
            const offset = 50;

            window.addEventListener('scroll', function () {
                if (window.scrollY > offset) {
                    progressWrap.classList.add('active-progress');
                } else {
                    progressWrap.classList.remove('active-progress');
                }
            });

            progressWrap.addEventListener('click', function (event) {
                event.preventDefault();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });

            // Animated Counters
            const counters = document.querySelectorAll('.counter-number');
            const speed = 200; // The lower the slower

            const animateCounters = () => {
                counters.forEach(counter => {
                    const updateCount = () => {
                        const target = +counter.getAttribute('data-target');
                        const count = +counter.innerText;
                        const inc = target / speed;

                        if (count < target) {
                            counter.innerText = Math.ceil(count + inc);
                            setTimeout(updateCount, 20);
                        } else {
                            counter.innerText = target + (counter.getAttribute('data-target') === '150' || counter.getAttribute('data-target') === '10' ? '+' : '%');
                        }
                    };
                    updateCount();
                });
            }

            // Trigger Counter Animation on Scroll using Intersection Observer
            let counterObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounters();
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            // Observe the section containing counters
            const statsSection = document.querySelector('.stats-item');
            if (statsSection) {
                counterObserver.observe(statsSection);
            }

            // Custom Cursor Logic
            const cursorDot = document.querySelector('.cursor-dot');
            const cursorOutline = document.querySelector('.cursor-outline');

            window.addEventListener('mousemove', function (e) {
                const posX = e.clientX;
                const posY = e.clientY;

                cursorDot.style.left = `${posX}px`;
                cursorDot.style.top = `${posY}px`;

                // Smooth follow for outline
                cursorOutline.animate({
                    left: `${posX}px`,
                    top: `${posY}px`
                }, { duration: 500, fill: "forwards" });
            });

            // Add hover effect to interactive elements
            const interactiveElements = document.querySelectorAll('a, button, .card, .glass-card, .product-card, .accordion-button');
            interactiveElements.forEach(el => {
                el.addEventListener('mouseenter', () => {
                    cursorOutline.style.width = '60px';
                    cursorOutline.style.height = '60px';
                    cursorOutline.style.backgroundColor = 'rgba(242, 101, 34, 0.1)';
                });
                el.addEventListener('mouseleave', () => {
                    cursorOutline.style.width = '40px';
                    cursorOutline.style.height = '40px';
                    cursorOutline.style.backgroundColor = 'transparent';
                });
            });

            // Initialize Vanilla Tilt
            VanillaTilt.init(document.querySelectorAll(".glass-card, .product-card, .about-img-item, .stats-item"), {
                max: 10,
                speed: 400,
                glare: true,
                "max-glare": 0.2,
                scale: 1.02
            });

            // Text Reveal Animation Logic
            const revealElements = document.querySelectorAll('h2, .service-title');

            revealElements.forEach(element => {
                // Wrap content in span if not already
                if (!element.querySelector('.reveal-text-wrapper')) {
                    const text = element.innerText;
                    element.innerHTML = `<span class="reveal-text-wrapper"><span class="reveal-text-inner">${text}</span></span>`;
                }
            });

            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('reveal-visible');
                    }
                });
            }, { threshold: 0.2 });

            document.querySelectorAll('h2, .service-title').forEach(el => revealObserver.observe(el));

        </script>
