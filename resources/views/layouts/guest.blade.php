<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

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

    <!-- Header with Enhanced Logo -->
    <header class="relative z-20 p-6 animate-slide-in-left">
        <div class="container mx-auto max-w-7xl">
            <a href="{{ url('/') }}" class="inline-flex items-center space-x-4 group hover:scale-105 transition-transform duration-300">
                <div class="w-14 h-14 bg-gradient-to-br from-sport-primary to-sport-secondary rounded-2xl flex items-center justify-center shadow-2xl group-hover:shadow-sport-primary/50 transition-all duration-300 animate-glow">
                    <x-application-logo class="block h-8 w-auto fill-current text-white" />
                </div>
                <div class="text-left">
                    <h1 class="text-2xl font-sport font-bold bg-gradient-to-r from-sport-primary to-sport-secondary bg-clip-text text-transparent">
                        AsitCom Sport
                    </h1>
                    <p class="text-sm text-sport-text-muted font-medium">Sports Facility Booking</p>
                </div>
            </a>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="relative z-10 flex items-center justify-center min-h-[calc(100vh-120px)] py-8 px-6">
        <div class="w-full max-w-md animate-fade-in-up">
            <!-- Glass Container -->
            <div class="glass-dark rounded-3xl p-8 shadow-2xl border border-sport-primary/20 backdrop-blur-xl">
                {{ $slot }}
            </div>

            <!-- Additional Info Cards -->
            <div class="mt-8 grid grid-cols-3 gap-4 animate-fade-in-up" style="animation-delay: 0.2s;">
                <div class="glass-dark rounded-xl p-4 text-center border border-sport-primary/10">
                    <div class="text-sport-primary text-2xl mb-2">
                        <i class="fas fa-clock"></i>
                    </div>
                    <p class="text-xs text-sport-text-muted">24/7 Booking</p>
                </div>
                <div class="glass-dark rounded-xl p-4 text-center border border-sport-accent/10">
                    <div class="text-sport-accent text-2xl mb-2">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <p class="text-xs text-sport-text-muted">Secure</p>
                </div>
                <div class="glass-dark rounded-xl p-4 text-center border border-sport-secondary/10">
                    <div class="text-sport-secondary text-2xl mb-2">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <p class="text-xs text-sport-text-muted">Mobile Ready</p>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
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

    <!-- Particles Container -->
    <div class="particles-container"></div>

    <!-- Custom JavaScript -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>