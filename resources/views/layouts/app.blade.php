<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'AsitCom Sport') }}</title>

    <meta name="description" content="AsitCom Sport adalah platform booking lapangan olahraga terdepan di Indonesia. Pesan lapangan futsal, basket, badminton, dan olahraga lainnya dengan mudah, aman, dan terpercaya.">
    <meta name="keywords" content="AsitCom Sport, booking lapangan olahraga, sewa lapangan futsal, booking lapangan basket, lapangan badminton, venue olahraga, Indonesia, booking online, lapangan olahraga premium">
    <meta name="author" content="AsitCom Sport">
    <meta name="robots" content="index, follow">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph (Facebook, WhatsApp, LinkedIn) -->
    <meta property="og:title" content="AsitCom Sport - Platform Booking Lapangan Olahraga Terdepan">
    <meta property="og:description" content="Booking lapangan olahraga premium dalam hitungan detik. Mudah, aman, dan terpercaya untuk semua kebutuhan olahragamu di Indonesia.">
    <meta property="og:image" content="{{ asset('images/asitcom-sport-og.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="id_ID">
    <meta property="og:site_name" content="AsitCom Sport">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="AsitCom Sport - Platform Booking Lapangan Olahraga">
    <meta name="twitter:description" content="Platform booking lapangan olahraga terdepan di Indonesia. Pesan sekarang!">
    <meta name="twitter:image" content="{{ asset('images/asitcom-sport-twitter.jpg') }}">

    <!-- Additional SEO Meta -->
    <meta name="theme-color" content="#8AA624">
    <meta name="msapplication-TileColor" content="#8AA624">
    <meta name="apple-mobile-web-app-title" content="AsitCom Sport">
    <meta name="application-name" content="AsitCom Sport">

    <!-- Favicon Standard -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Apple Devices -->
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}" sizes="180x180">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Orbitron:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

    <!-- Alpine.js for Dropdown and Hamburger -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                        'sport': ['Orbitron', 'monospace']
                    },
                    colors: {
                        sport: {
                            primary: '#8AA624',
                            'primary-dark': '#DBE4C9',
                            secondary: '#FFFFF0',
                            accent: '#22C55E',
                            dark: '#0A0E27',
                            gray: '#1A1D29',
                            'light-gray': '#2D3748',
                            text: '#E2E8F0',
                            'text-muted': '#A0AEC0'
                        }
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                        'pulse-sport': 'pulse-sport 2s infinite',
                        'slide-in-right': 'slide-in-right 0.8s ease-out',
                        'slide-in-left': 'slide-in-left 0.8s ease-out',
                        'fade-in-up': 'fade-in-up 0.8s ease-out',
                        'bounce-in': 'bounce-in 0.6s ease-out'
                    }
                }
            }
        }
    </script>
    <!-- Midtrans Script -->
    <script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>
</head>

<body class="font-sans antialiased min-h-screen relative overflow-x-hidden bg-gradient-to-br from-sport-dark via-sport-gray to-sport-dark">
    <!-- Animated Background Pattern -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <!-- Geometric Patterns -->
        <div class="absolute top-20 left-10 w-20 h-20 md:w-32 md:h-32 border-2 border-sport-primary/20 rounded-full animate-pulse-sport"></div>
        <div class="absolute top-40 right-10 w-12 h-12 md:w-16 md:h-16 bg-sport-accent/10 rounded-lg rotate-45 animate-float" style="animation-delay: -2s;"></div>
        <div class="absolute bottom-40 left-1/4 w-16 h-16 md:w-24 md:h-24 border-2 border-sport-secondary/20 rounded-lg rotate-12 animate-float" style="animation-delay: -4s;"></div>
        <div class="absolute bottom-20 right-1/3 w-24 h-24 md:w-40 md:h-40 border-2 border-sport-primary/10 rounded-full animate-pulse-sport" style="animation-delay: -1s;"></div>

        <!-- Gradient Orbs -->
        <div class="absolute top-1/4 left-1/4 w-64 h-64 md:w-96 md:h-96 bg-gradient-to-r from-sport-primary/20 to-transparent rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-1/4 right-1/4 w-48 h-48 md:w-80 md:h-80 bg-gradient-to-r from-sport-secondary/20 to-transparent rounded-full blur-3xl animate-float" style="animation-delay: -3s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-40 h-40 md:w-64 md:h-64 bg-gradient-to-r from-sport-accent/10 to-transparent rounded-full blur-3xl animate-float" style="animation-delay: -1.5s;"></div>

        <!-- Sport Icons Pattern -->
        <div class="absolute top-32 right-10 md:right-40 text-sport-primary/10 text-2xl md:text-4xl animate-float">
            <i class="fas fa-football-ball"></i>
        </div>
        <div class="absolute bottom-48 left-10 md:left-32 text-sport-secondary/10 text-xl md:text-3xl animate-float" style="animation-delay: -2s;">
            <i class="fas fa-basketball-ball"></i>
        </div>
        <div class="absolute top-2/3 right-10 md:right-1/4 text-sport-accent/10 text-lg md:text-2xl animate-float" style="animation-delay: -3s;">
            <i class="fas fa-volleyball-ball"></i>
        </div>
    </div>
    <!-- Particle Background -->
    <div class="particles-container fixed inset-0 pointer-events-none z-0 opacity-30"></div>

    <!-- Navigation -->
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
    <header class="bg-sport-gray/50 backdrop-blur-lg border-b border-sport-primary/20 shadow-lg shadow-sport-primary/5">
        <div class="max-w-7xl mx-auto py-4 sm:py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-2 sm:gap-0">
                <div class="animate-fade-in-up">
                    {{ $header }}
                </div>
                <!-- Breadcrumb Navigation -->
                <nav class="flex items-center space-x-2 text-xs sm:text-sm text-sport-text-muted">
                    <a href="{{ route('dashboard') }}" class="hover:text-sport-primary transition-colors duration-300">
                        <i class="fas fa-home"></i>
                    </a>
                    <i class="fas fa-chevron-right text-xs"></i>
                </nav>
            </div>
        </div>
    </header>
    @endif

    <!-- Notification Container -->
    <div id="notification-container" class="fixed top-16 sm:top-20 right-2 sm:right-4 z-40 space-y-2 w-11/12 sm:w-80 md:w-96"></div>

    <!-- Main Content -->
    <main class="relative z-10 flex items-center justify-center min-h-[calc(100vh-120px)] py-6 sm:py-8 px-4 sm:px-6">
        <!-- Session Messages -->
        @if (session('success') || session('error') || session('info') || session('warning'))
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4 sm:pt-6">
            <!-- Success Message -->
            @if (session('success'))
            <div class="glass-morphism border-l-4 border-sport-accent bg-sport-accent/10 px-4 sm:px-6 py-3 sm:py-4 rounded-r-xl mb-4 animate-slide-in-right"
                x-data="{ show: true }"
                x-show="show"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-x-full"
                x-transition:enter-end="opacity-100 transform translate-x-0">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-6 h-6 sm:w-8 sm:h-8 bg-sport-accent rounded-full flex items-center justify-center mr-2 sm:mr-3 animate-pulse-sport">
                            <i class="fas fa-check text-white text-xs sm:text-sm"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-sport-text text-sm sm:text-base">Success!</p>
                            <p class="text-sport-text-muted text-xs sm:text-sm">{{ session('success') }}</p>
                        </div>
                    </div>
                    <button @click="show = false" class="text-sport-text-muted hover:text-sport-accent transition-colors duration-300">
                        <i class="fas fa-times text-xs sm:text-sm"></i>
                    </button>
                </div>
            </div>
            @endif

            <!-- Error Message -->
            @if (session('error'))
            <div class="glass-morphism border-l-4 border-red-500 bg-red-500/10 px-4 sm:px-6 py-3 sm:py-4 rounded-r-xl mb-4 animate-slide-in-right"
                x-data="{ show: true }"
                x-show="show"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-x-full"
                x-transition:enter-end="opacity-100 transform translate-x-0">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-6 h-6 sm:w-8 sm:h-8 bg-red-500 rounded-full flex items-center justify-center mr-2 sm:mr-3">
                            <i class="fas fa-exclamation-triangle text-white text-xs sm:text-sm"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-sport-text text-sm sm:text-base">Error!</p>
                            <p class="text-sport-text-muted text-xs sm:text-sm">{{ session('error') }}</p>
                        </div>
                    </div>
                    <button @click="show = false" class="text-sport-text-muted hover:text-red-400 transition-colors duration-300">
                        <i class="fas fa-times text-xs sm:text-sm"></i>
                    </button>
                </div>
            </div>
            @endif

            <!-- Info Message -->
            @if (session('info'))
            <div class="glass-morphism border-l-4 border-sport-primary bg-sport-primary/10 px-4 sm:px-6 py-3 sm:py-4 rounded-r-xl mb-4 animate-slide-in-right"
                x-data="{ show: true }"
                x-show="show"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-x-full"
                x-transition:enter-end="opacity-100 transform translate-x-0">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-6 h-6 sm:w-8 sm:h-8 bg-sport-primary rounded-full flex items-center justify-center mr-2 sm:mr-3">
                            <i class="fas fa-info-circle text-white text-xs sm:text-sm"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-sport-text text-sm sm:text-base">Information</p>
                            <p class="text-sport-text-muted text-xs sm:text-sm">{{ session('info') }}</p>
                        </div>
                    </div>
                    <button @click="show = false" class="text-sport-text-muted hover:text-sport-primary transition-colors duration-300">
                        <i class="fas fa-times text-xs sm:text-sm"></i>
                    </button>
                </div>
            </div>
            @endif

            <!-- Warning Message -->
            @if (session('warning'))
            <div class="glass-morphism border-l-4 border-yellow-500 bg-yellow-500/10 px-4 sm:px-6 py-3 sm:py-4 rounded-r-xl mb-4 animate-slide-in-right"
                x-data="{ show: true }"
                x-show="show"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-x-full"
                x-transition:enter-end="opacity-100 transform translate-x-0">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-6 h-6 sm:w-8 sm:h-8 bg-yellow-500 rounded-full flex items-center justify-center mr-2 sm:mr-3">
                            <i class="fas fa-exclamation text-white text-xs sm:text-sm"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-sport-text text-sm sm:text-base">Warning!</p>
                            <p class="text-sport-text-muted text-xs sm:text-sm">{{ session('warning') }}</p>
                        </div>
                    </div>
                    <button @click="show = false" class="text-sport-text-muted hover:text-yellow-400 transition-colors duration-300">
                        <i class="fas fa-times text-xs sm:text-sm"></i>
                    </button>
                </div>
            </div>
            @endif
        </div>
        @endif

        <!-- Page Content -->
        <div class="w-full max-w-7xl animate-fade-in-up">
            {{ $slot }}
        </div>
    </main>

    <!-- Scroll to Top Button -->
    <button id="scroll-to-top"
        class="fixed bottom-4 sm:bottom-6 right-4 sm:right-6 w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-sport-primary to-sport-accent rounded-full shadow-lg shadow-sport-primary/30 text-white opacity-0 invisible transform translate-y-4 transition-all duration-300 hover:scale-110 z-30"
        onclick="scrollToTop()">
        <i class="fas fa-arrow-up text-sm sm:text-base"></i>
    </button>

    <!-- Global Footer -->
    <footer class="mt-auto bg-sport-gray/30 backdrop-blur-lg border-t border-sport-primary/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 sm:py-6">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 sm:gap-0">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-gradient-to-br from-sport-primary to-sport-secondary rounded-lg flex items-center justify-center">
                        <x-application-logo class="block h-6 w-auto sm:h-8 sm:w-auto fill-current text-white" />
                    </div>
                    <span class="text-sport-text-muted text-xs sm:text-sm">
                        © {{ date('Y') }} AsitCom Sport. All rights reserved.
                    </span>
                </div>
                <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-6 text-xs sm:text-sm text-sport-text-muted">
                    <a href="#" class="hover:text-sport-primary transition-colors duration-300">Privacy Policy</a>
                    <a href="#" class="hover:text-sport-primary transition-colors duration-300">Terms of Service</a>
                    <a href="#" class="hover:text-sport-primary transition-colors duration-300">Support</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Custom Sport Scripts -->
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Consolidated JavaScript -->
    <script>
        // Global App Functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize scroll to top
            initializeScrollToTop();

            // Initialize notification system
            initializeNotifications();

            // Auto-hide messages after 5 seconds
            setTimeout(() => {
                const messages = document.querySelectorAll('[x-data*="show"]');
                messages.forEach(message => {
                    if (message.__x) {
                        message.__x.$data.show = false;
                    }
                });
            }, 5000);

            // Initialize ripple effect for buttons
            initializeRippleEffect();

            // Initialize counter animations
            initializeCounterAnimations();

            // Initialize intersection observer for animations
            initializeIntersectionObserver();
        });

        // Scroll to Top Functionality
        function initializeScrollToTop() {
            const button = document.getElementById('scroll-to-top');
            window.addEventListener('scroll', () => {
                if (window.pageYOffset > 300) {
                    button.classList.remove('opacity-0', 'invisible', 'translate-y-4');
                    button.classList.add('opacity-100', 'visible', 'translate-y-0');
                } else {
                    button.classList.add('opacity-0', 'invisible', 'translate-y-4');
                    button.classList.remove('opacity-100', 'visible', 'translate-y-0');
                }
            });
        }

        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Notification System
        function initializeNotifications() {
            window.showNotification = function(message, type = 'info', duration = 4000) {
                const container = document.getElementById('notification-container');
                const notification = document.createElement('div');

                const colors = {
                    success: 'border-sport-accent bg-sport-accent/10',
                    error: 'border-red-500 bg-red-500/10',
                    info: 'border-sport-primary bg-sport-primary/10',
                    warning: 'border-yellow-500 bg-yellow-500/10'
                };

                const icons = {
                    success: 'fa-check-circle',
                    error: 'fa-exclamation-triangle',
                    info: 'fa-info-circle',
                    warning: 'fa-exclamation'
                };

                notification.className = `glass-morphism border-l-4 ${colors[type]} px-4 py-3 rounded-r-xl shadow-lg transform translate-x-full transition-all duration-300`;
                notification.innerHTML = `
                    <div class="flex items-center">
                        <i class="fas ${icons[type]} mr-2 sm:mr-3 text-current text-xs sm:text-sm"></i>
                        <span class="text-sport-text text-xs sm:text-sm">${message}</span>
                        <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-sport-text-muted hover:text-current">
                            <i class="fas fa-times text-xs sm:text-sm"></i>
                        </button>
                    </div>
                `;

                container.appendChild(notification);

                // Slide in
                setTimeout(() => {
                    notification.classList.remove('translate-x-full');
                    notification.classList.add('translate-x-0');
                }, 100);

                // Auto remove
                setTimeout(() => {
                    notification.classList.add('translate-x-full');
                    setTimeout(() => {
                        if (notification.parentNode) {
                            notification.remove();
                        }
                    }, 300);
                }, duration);
            };
        }

        // Ripple Effect for Buttons
        function initializeRippleEffect() {
            document.querySelectorAll('.btn-sport, .sport-card').forEach(element => {
                element.addEventListener('click', function(e) {
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;

                    const ripple = document.createElement('div');
                    ripple.style.cssText = `
                        position: absolute;
                        width: ${size}px;
                        height: ${size}px;
                        left: ${x}px;
                        top: ${y}px;
                        background: rgba(138, 166, 36, 0.3);
                        border-radius: 50%;
                        transform: scale(0);
                        animation: rippleEffect 0.6s linear;
                        pointer-events: none;
                        z-index: 10;
                    `;

                    this.style.position = 'relative';
                    this.style.overflow = 'hidden';
                    this.appendChild(ripple);

                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });

            // Add ripple animation keyframes
            const style = document.createElement('style');
            style.textContent = `
                @keyframes rippleEffect {
                    to {
                        transform: scale(4);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);
        }

        // Counter Animation
        function animateCounter(element, target, duration = 2000) {
            const start = 0;
            const increment = target / (duration / 16);
            let current = start;

            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    element.textContent = target.toLocaleString() + (element.dataset.suffix || '');
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current).toLocaleString() + (element.dataset.suffix || '');
                }
            }, 16);
        }

        function initializeCounterAnimations() {
            document.querySelectorAll('[data-count]').forEach(counter => {
                const target = parseInt(counter.dataset.count);
                counter.dataset.suffix = counter.textContent.replace(/[0-9,]/g, '');
                animateCounter(counter, target);
            });
        }

        // Intersection Observer for Animations
        function initializeIntersectionObserver() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in-up');
                        // Animate counters
                        const counters = entry.target.querySelectorAll('[data-count]');
                        counters.forEach(counter => {
                            const target = parseInt(counter.dataset.count);
                            counter.dataset.suffix = counter.textContent.replace(/[0-9,]/g, '');
                            animateCounter(counter, target);
                        });
                    }
                });
            }, observerOptions);

            document.querySelectorAll('section').forEach(section => {
                observer.observe(section);
            });
        }

        // Smooth Scrolling for Anchor Links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const headerOffset = 80;
                    const elementPosition = target.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Navbar Scroll Effect
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('nav');
            if (window.scrollY > 100) {
                navbar.style.backgroundColor = 'rgba(26, 29, 41, 0.95)';
                navbar.style.backdropFilter = 'blur(20px)';
            } else {
                navbar.style.backgroundColor = 'rgba(26, 29, 41, 0.8)';
                navbar.style.backdropFilter = 'blur(15px)';
            }
        });

        // Enhanced Parallax Effect
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const heroElements = document.querySelectorAll('.animate-float');
            heroElements.forEach((element, index) => {
                const speed = 0.1 + (index * 0.05);
                element.style.transform = `translateY(${scrolled * speed}px)`;
            });
        });

        // Performance Optimization
        let ticking = false;

        function updateElements() {
            // Update scroll-based animations here
            ticking = false;
        }

        function requestTick() {
            if (!ticking) {
                requestAnimationFrame(updateElements);
                ticking = true;
            }
        }

        // Initialize
        window.addEventListener('load', () => {
            document.body.classList.add('loaded');
            // Add stagger animation to features
            setTimeout(() => {
                document.querySelectorAll('#features .sport-card').forEach((card, index) => {
                    card.style.animationDelay = `${index * 0.1}s`;
                });
            }, 100);
        });
    </script>
</body>
</html>