<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'AsitCom Sport') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Orbitron:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
                                accent: '#22C55E ',
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
        <div class="absolute top-20 left-10 w-32 h-32 border-2 border-sport-primary/20 rounded-full animate-pulse-sport"></div>
        <div class="absolute top-40 right-20 w-16 h-16 bg-sport-accent/10 rounded-lg rotate-45 animate-float" style="animation-delay: -2s;"></div>
        <div class="absolute bottom-40 left-1/4 w-24 h-24 border-2 border-sport-secondary/20 rounded-lg rotate-12 animate-float" style="animation-delay: -4s;"></div>
        <div class="absolute bottom-20 right-1/3 w-40 h-40 border-2 border-sport-primary/10 rounded-full animate-pulse-sport" style="animation-delay: -1s;"></div>

        <!-- Gradient Orbs -->
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-gradient-to-r from-sport-primary/20 to-transparent rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-gradient-to-r from-sport-secondary/20 to-transparent rounded-full blur-3xl animate-float" style="animation-delay: -3s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gradient-to-r from-sport-accent/10 to-transparent rounded-full blur-3xl animate-float" style="animation-delay: -1.5s;"></div>

        <!-- Sport Icons Pattern -->
        <div class="absolute top-32 right-40 text-sport-primary/10 text-4xl animate-float">
            <i class="fas fa-football-ball"></i>
        </div>
        <div class="absolute bottom-48 left-32 text-sport-secondary/10 text-3xl animate-float" style="animation-delay: -2s;">
            <i class="fas fa-basketball-ball"></i>
        </div>
        <div class="absolute top-2/3 right-1/4 text-sport-accent/10 text-2xl animate-float" style="animation-delay: -3s;">
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
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div class="animate-fade-in-up">
                    {{ $header }}
                </div>
                <!-- Breadcrumb Navigation -->
                <nav class="hidden md:flex items-center space-x-2 text-sm text-sport-text-muted">
                    <a href="{{ route('dashboard') }}" class="hover:text-sport-primary transition-colors duration-300">
                        <i class="fas fa-home"></i>
                    </a>
                    <i class="fas fa-chevron-right text-xs"></i>
                    <!-- <span class="text-sport-text">{{ $header ?? 'Page' }}</span> -->
                </nav>
            </div>
        </div>
    </header>
    @endif

    <!-- Notification Container -->
    <div id="notification-container" class="fixed top-20 right-4 z-40 space-y-2"></div>

    <!-- Main Content -->
    <main class="relative z-10 flex items-center justify-center min-h-[calc(100vh-120px)] py-8 px-6">
        <!-- Session Messages -->
        @if (session('success') || session('error') || session('info') || session('warning'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6">
            <!-- Success Message -->
            @if (session('success'))
            <div class="glass-morphism border-l-4 border-sport-accent bg-sport-accent/10 px-6 py-4 rounded-r-xl mb-4 animate-slide-in-right"
                x-data="{ show: true }"
                x-show="show"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-x-full"
                x-transition:enter-end="opacity-100 transform translate-x-0">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-sport-accent rounded-full flex items-center justify-center mr-3 animate-pulse-sport">
                            <i class="fas fa-check text-white text-sm"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-sport-text">Success!</p>
                            <p class="text-sport-text-muted text-sm">{{ session('success') }}</p>
                        </div>
                    </div>
                    <button @click="show = false" class="text-sport-text-muted hover:text-sport-accent transition-colors duration-300">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            @endif

            <!-- Error Message -->
            @if (session('error'))
            <div class="glass-morphism border-l-4 border-red-500 bg-red-500/10 px-6 py-4 rounded-r-xl mb-4 animate-slide-in-right"
                x-data="{ show: true }"
                x-show="show"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-x-full"
                x-transition:enter-end="opacity-100 transform translate-x-0">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-exclamation-triangle text-white text-sm"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-sport-text">Error!</p>
                            <p class="text-sport-text-muted text-sm">{{ session('error') }}</p>
                        </div>
                    </div>
                    <button @click="show = false" class="text-sport-text-muted hover:text-red-400 transition-colors duration-300">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            @endif

            <!-- Info Message -->
            @if (session('info'))
            <div class="glass-morphism border-l-4 border-sport-primary bg-sport-primary/10 px-6 py-4 rounded-r-xl mb-4 animate-slide-in-right"
                x-data="{ show: true }"
                x-show="show"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-x-full"
                x-transition:enter-end="opacity-100 transform translate-x-0">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-sport-primary rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-info-circle text-white text-sm"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-sport-text">Information</p>
                            <p class="text-sport-text-muted text-sm">{{ session('info') }}</p>
                        </div>
                    </div>
                    <button @click="show = false" class="text-sport-text-muted hover:text-sport-primary transition-colors duration-300">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            @endif

            <!-- Warning Message -->
            @if (session('warning'))
            <div class="glass-morphism border-l-4 border-yellow-500 bg-yellow-500/10 px-6 py-4 rounded-r-xl mb-4 animate-slide-in-right"
                x-data="{ show: true }"
                x-show="show"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-x-full"
                x-transition:enter-end="opacity-100 transform translate-x-0">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-exclamation text-white text-sm"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-sport-text">Warning!</p>
                            <p class="text-sport-text-muted text-sm">{{ session('warning') }}</p>
                        </div>
                    </div>
                    <button @click="show = false" class="text-sport-text-muted hover:text-yellow-400 transition-colors duration-300">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            @endif
        </div>
        @endif

        <!-- Page Content -->
        <div class="animate-fade-in-up">
            {{ $slot }}
        </div>
    </main>

    <!-- Scroll to Top Button -->
    <button id="scroll-to-top"
        class="fixed bottom-6 right-6 w-12 h-12 bg-gradient-to-br from-sport-primary to-sport-accent rounded-full shadow-lg shadow-sport-primary/30 text-white opacity-0 invisible transform translate-y-4 transition-all duration-300 hover:scale-110 z-30"
        onclick="scrollToTop()">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Global Footer -->
    <footer class="mt-auto bg-sport-gray/30 backdrop-blur-lg border-t border-sport-primary/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="flex items-center space-x-2 mb-4 md:mb-0">
                    <div class="w-8 h-8 bg-gradient-to-br from-sport-primary to-sport-secondary rounded-lg flex items-center justify-center">
                        <x-application-logo class="block h-8 w-auto fill-current text-white" />
                    </div>
                    <span class="text-sport-text-muted text-sm">
                        © {{ date('Y') }} AsitCom Sport. All rights reserved.
                    </span>
                </div>
                <div class="flex items-center space-x-6 text-sm text-sport-text-muted">
                    <a href="#" class="hover:text-sport-primary transition-colors duration-300">Privacy Policy</a>
                    <a href="#" class="hover:text-sport-primary transition-colors duration-300">Terms of Service</a>
                    <a href="#" class="hover:text-sport-primary transition-colors duration-300">Support</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Custom Sport Scripts -->
    <script src="{{ asset('js/script.js') }}"></script>
    <!-- Particles Container -->
    <div class="particles-container"></div>

    <!-- Enhanced App Scripts -->
    <script>
        // Global App Functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize loading states
            initializeLoadingStates();

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
        });

        function initializeLoadingStates() {
            // Show loading overlay for form submissions
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function() {
                    showLoadingOverlay();
                });
            });

            // Show loading for navigation
            const links = document.querySelectorAll('a[href]:not([href^="#"]):not([href^="mailto"]):not([href^="tel"])');
            links.forEach(link => {
                link.addEventListener('click', function() {
                    if (!this.target || this.target === '_self') {
                        setTimeout(() => showLoadingOverlay(), 100);
                    }
                });
            });
        }

        function showLoadingOverlay() {
            const overlay = document.getElementById('loading-overlay');
            if (overlay) {
                overlay.style.display = 'flex';
                overlay.classList.remove('opacity-0');
                overlay.classList.add('opacity-100');
            }
        }

        function hideLoadingOverlay() {
            const overlay = document.getElementById('loading-overlay');
            if (overlay) {
                overlay.classList.add('opacity-0');
                setTimeout(() => {
                    overlay.style.display = 'none';
                }, 500);
            }
        }

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

        function initializeNotifications() {
            // Global notification function
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
                            <i class="fas ${icons[type]} mr-3 text-current"></i>
                            <span class="text-sport-text text-sm">${message}</span>
                            <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-sport-text-muted hover:text-current">
                                <i class="fas fa-times text-xs"></i>
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

        // Hide loading overlay when page is fully loaded
        window.addEventListener('load', hideLoadingOverlay);
    </script>

    <!-- Performance Optimization -->
    <script>
        // Preload critical resources
        const criticalImages = [
            // Add any critical images here
        ];

        criticalImages.forEach(src => {
            const link = document.createElement('link');
            link.rel = 'preload';
            link.as = 'image';
            link.href = src;
            document.head.appendChild(link);
        });
    </script>

</body>

</html>