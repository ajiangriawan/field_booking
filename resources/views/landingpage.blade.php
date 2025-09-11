<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AsitCom Sport - Platform Pemesanan Lapangan Olahraga Terdepan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Orbitron:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        /* AsitCom Sport - Modern Sporty Design */
        :root {
            --sport-primary: #8AA624;
            --sport-primary-dark: #7A9620;
            --sport-secondary: #FFFFF0;
            --sport-accent: #22C55E;
            --sport-dark: #0A0E27;
            --sport-gray: #1A1D29;
            --sport-light-gray: #2D3748;
            --sport-text: #E2E8F0;
            --sport-text-muted: #A0AEC0;
            --gradient-sport: linear-gradient(135deg, var(--sport-primary) 0%, var(--sport-accent) 100%);
            --gradient-dark: linear-gradient(135deg, var(--sport-dark) 0%, var(--sport-gray) 100%);
            --shadow-sport: 0 10px 40px rgba(138, 166, 36, 0.3);
            --shadow-dark: 0 10px 40px rgba(0, 0, 0, 0.5);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--sport-dark);
            color: var(--sport-text);
        }

        .sport-font {
            font-family: 'Orbitron', monospace;
        }

        /* Glass morphism effect */
        .glass-morphism {
            background: rgba(26, 29, 41, 0.8);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(138, 166, 36, 0.2);
        }

        .glass-card {
            background: rgba(26, 29, 41, 0.6);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(138, 166, 36, 0.1);
        }

        /* Sport-themed animations */
        @keyframes pulse-sport {
            0%, 100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(138, 166, 36, 0.7);
            }
            50% {
                transform: scale(1.02);
                box-shadow: 0 0 0 10px rgba(138, 166, 36, 0);
            }
        }

        @keyframes glow-sport {
            0%, 100% {
                box-shadow: 0 0 20px rgba(138, 166, 36, 0.5);
            }
            50% {
                box-shadow: 0 0 40px rgba(138, 166, 36, 0.8);
            }
        }

        @keyframes fade-in-up {
            0% {
                transform: translateY(30px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }
            100% {
                background-position: 200% 0;
            }
        }

        .animate-pulse-sport {
            animation: pulse-sport 2s infinite;
        }

        .animate-glow-sport {
            animation: glow-sport 2s infinite alternate;
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out;
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-shimmer {
            background: linear-gradient(90deg, transparent, rgba(138, 166, 36, 0.4), transparent);
            background-size: 200% 100%;
            animation: shimmer 2s linear infinite;
        }

        /* Custom buttons */
        .btn-sport {
            position: relative;
            overflow: hidden;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 1rem;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, var(--sport-primary) 0%, var(--sport-accent) 100%);
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-sport:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-sport);
        }

        .btn-sport::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .btn-sport:hover::before {
            left: 100%;
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--sport-primary);
            color: var(--sport-primary);
        }

        .btn-outline:hover {
            background: var(--sport-primary);
            color: white;
        }

        /* Sport card effects */
        .sport-card {
            background: var(--sport-gray);
            border-radius: 1.5rem;
            padding: 2rem;
            transition: all 0.3s ease;
            border: 1px solid rgba(138, 166, 36, 0.1);
        }

        .sport-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-sport);
            border-color: var(--sport-primary);
        }

        /* Utility classes */
        .text-sport-primary { color: var(--sport-primary); }
        .text-sport-secondary { color: var(--sport-secondary); }
        .text-sport-accent { color: var(--sport-accent); }
        .text-sport-text { color: var(--sport-text); }
        .text-sport-text-muted { color: var(--sport-text-muted); }
        .bg-sport-primary { background-color: var(--sport-primary); }
        .bg-sport-secondary { background-color: var(--sport-secondary); }
        .bg-sport-accent { background-color: var(--sport-accent); }
        .bg-sport-dark { background-color: var(--sport-dark); }
        .bg-sport-gray { background-color: var(--sport-gray); }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--sport-gray);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--sport-primary);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--sport-primary-dark);
        }

        /* Background effects */
        .hero-bg {
            background: linear-gradient(135deg, var(--sport-dark) 0%, #1a1d29 50%, var(--sport-gray) 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 30%, rgba(138, 166, 36, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(34, 197, 94, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 50% 50%, rgba(138, 166, 36, 0.05) 0%, transparent 70%);
        }
    </style>
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
                            'primary-dark': '#7A9620',
                            secondary: '#FFFFF0',
                            accent: '#22C55E',
                            dark: '#0A0E27',
                            gray: '#1A1D29',
                            'light-gray': '#2D3748',
                            text: '#E2E8F0',
                            'text-muted': '#A0AEC0'
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="overflow-x-hidden">

    <!-- Navigation -->
    <nav class="fixed w-full top-0 z-50 transition-all duration-300 glass-morphism" id="navbar">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <a href="{{ url('/') }}" class="inline-flex items-center space-x-3 hover:opacity-80 transition-opacity">
                        <div class="w-10 h-10 bg-gradient-to-br from-sport-primary to-sport-secondary rounded-xl flex items-center justify-center shadow-lg animate-pulse-sport">
                            <x-application-logo class="block h-8 w-auto fill-current text-white" />
                        </div>
                        <span class="text-xl font-bold text-sport-text sport-font">AsitCom Sport</span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-sport-text-muted hover:text-sport-primary font-medium transition-colors duration-200">Beranda</a>
                    <a href="#features" class="text-sport-text-muted hover:text-sport-primary font-medium transition-colors duration-200">Fitur</a>
                    <a href="#process" class="text-sport-text-muted hover:text-sport-primary font-medium transition-colors duration-200">Cara Kerja</a>
                    <a href="#contact" class="text-sport-text-muted hover:text-sport-primary font-medium transition-colors duration-200">Kontak</a>
                </div>

                <!-- CTA Button -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ url('/dashboard') }}" class="btn-sport">
                        <i class="fas fa-rocket mr-2"></i>
                        Mulai Pesan
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button class="md:hidden p-2 rounded-lg hover:bg-sport-gray transition-colors" onclick="toggleMobileMenu()">
                    <i class="fas fa-bars text-sport-text"></i>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div class="md:hidden hidden py-4 border-t border-sport-primary/20 glass-morphism" id="mobile-menu">
                <div class="flex flex-col space-y-3 items-center">
                    <a href="#home" class="py-2 text-sport-text-muted hover:text-sport-primary font-medium">Beranda</a>
                    <a href="#features" class="py-2 text-sport-text-muted hover:text-sport-primary font-medium">Fitur</a>
                    <a href="#process" class="py-2 text-sport-text-muted hover:text-sport-primary font-medium">Cara Kerja</a>
                    <a href="#contact" class="py-2 text-sport-text-muted hover:text-sport-primary font-medium">Kontak</a>
                    <div class="pt-4 border-t border-sport-primary/20">
                        <a href="{{ url('/dashboard') }}" class="block mt-2 btn-sport text-center">
                            Mulai Pesan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="min-h-screen pt-16 hero-bg relative">
        <!-- Background Elements -->
        <div class="absolute inset-0 z-0">
            <div class="absolute top-1/4 left-10 w-72 h-72 bg-sport-primary/20 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-1/4 right-10 w-96 h-96 bg-sport-accent/20 rounded-full blur-3xl animate-float" style="animation-delay: -3s;"></div>
        </div>

        <div class="container mx-auto px-6 py-20 max-w-7xl relative z-10">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Content -->
                <div class="space-y-8 animate-fade-in-up">
                    <div class="inline-flex items-center px-4 py-2 glass-card rounded-full border border-sport-primary/30 mb-6">
                        <i class="fas fa-star text-sport-primary mr-2"></i>
                        <span class="text-sport-primary font-medium">Platform #1 di Indonesia</span>
                    </div>

                    <h1 class="text-5xl lg:text-6xl xl:text-7xl sport-font font-black leading-tight text-sport-text">
                        Pesan Lapangan
                        <span class="bg-gradient-to-r from-sport-primary to-sport-accent bg-clip-text text-transparent">
                            Olahraga
                        </span>
                        Impianmu
                    </h1>

                    <p class="text-xl text-sport-text-muted leading-relaxed max-w-2xl">
                        Booking lapangan olahraga premium dalam hitungan detik. Mudah, aman, dan terpercaya untuk semua kebutuhan olahragamu.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="{{ url('/dashboard') }}" class="btn-sport text-lg px-8 py-4 rounded-2xl group">
                            <span>Mulai Pesan Sekarang</span>
                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        <button class="btn-outline text-lg px-8 py-4 rounded-2xl group flex items-center justify-center">
                            <i class="fas fa-play-circle mr-2"></i>
                            <span>Lihat Demo</span>
                        </button>
                    </div>

                    <!-- Trust Indicators -->
                    <div class="flex flex-wrap items-center gap-6 pt-8">
                        <div class="flex items-center space-x-2">
                            <div class="flex -space-x-2">
                                <div class="w-8 h-8 bg-gradient-to-r from-sport-primary to-sport-accent rounded-full border-2 border-sport-dark"></div>
                                <div class="w-8 h-8 bg-gradient-to-r from-sport-accent to-green-400 rounded-full border-2 border-sport-dark"></div>
                                <div class="w-8 h-8 bg-gradient-to-r from-green-400 to-blue-500 rounded-full border-2 border-sport-dark"></div>
                            </div>
                            <span class="text-sport-text-muted font-medium">10K+ Pengguna Aktif</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-sport-text-muted font-medium">4.9/5 Rating</span>
                        </div>
                    </div>
                </div>

                <!-- Hero Visual -->
                <div class="relative animate-fade-in-up" style="animation-delay: 0.3s;">
                    <div class="glass-card rounded-3xl p-8 relative overflow-hidden border border-sport-primary/20">
                        <!-- Animated Background -->
                        <div class="absolute inset-0 bg-gradient-to-br from-sport-primary/10 to-sport-accent/10"></div>

                        <!-- Mock App Interface -->
                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-sport-primary to-sport-accent rounded-xl flex items-center justify-center animate-pulse-sport">
                                        <i class="fas fa-mobile-alt text-white"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-sport-text sport-font">Quick Booking</h3>
                                        <p class="text-sport-text-muted text-sm">Dalam 30 detik</p>
                                    </div>
                                </div>
                                <div class="w-12 h-12 bg-sport-accent rounded-full flex items-center justify-center animate-pulse">
                                    <i class="fas fa-check text-white"></i>
                                </div>
                            </div>

                            <!-- Sports Selection -->
                            <div class="grid grid-cols-3 gap-3 mb-6">
                                <div class="glass-card p-4 rounded-xl text-center hover:border-sport-primary/50 transition-all cursor-pointer group">
                                    <i class="fas fa-futbol text-2xl text-sport-primary mb-2 group-hover:scale-110 transition-transform"></i>
                                    <p class="text-sm font-medium text-sport-text">Futsal</p>
                                </div>
                                <div class="glass-card p-4 rounded-xl text-center hover:border-sport-primary/50 transition-all cursor-pointer group">
                                    <i class="fas fa-basketball-ball text-2xl text-sport-accent mb-2 group-hover:scale-110 transition-transform"></i>
                                    <p class="text-sm font-medium text-sport-text">Basket</p>
                                </div>
                                <div class="glass-card p-4 rounded-xl text-center hover:border-sport-primary/50 transition-all cursor-pointer group">
                                    <i class="fas fa-volleyball-ball text-2xl text-green-400 mb-2 group-hover:scale-110 transition-transform"></i>
                                    <p class="text-sm font-medium text-sport-text">Voli</p>
                                </div>
                            </div>

                            <!-- Booking Status -->
                            <div class="bg-gradient-to-r from-sport-accent to-sport-primary rounded-2xl p-6 text-white">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-green-100 text-sm">Booking Confirmed!</p>
                                        <p class="font-bold text-lg sport-font">Lapangan A - 19:00</p>
                                    </div>
                                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center animate-bounce">
                                        <i class="fas fa-calendar-check text-2xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Elements -->
                    <div class="absolute -top-4 -right-4 w-16 h-16 bg-gradient-to-r from-sport-primary to-sport-accent rounded-2xl flex items-center justify-center shadow-lg animate-float">
                        <i class="fas fa-star text-white text-xl"></i>
                    </div>
                    <div class="absolute -bottom-4 -left-4 w-20 h-20 bg-gradient-to-r from-sport-accent to-green-400 rounded-2xl flex items-center justify-center shadow-lg animate-float" style="animation-delay: -2s;">
                        <i class="fas fa-trophy text-white text-2xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 bg-sport-gray border-t border-sport-primary/20">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-sport-primary to-sport-accent rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform animate-glow-sport">
                        <i class="fas fa-map-marker-alt text-white text-xl"></i>
                    </div>
                    <h3 class="text-3xl lg:text-4xl font-black text-sport-text mb-2 sport-font" data-count="200">200+</h3>
                    <p class="text-sport-text-muted font-medium">Venue Partner</p>
                </div>
                <div class="text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-sport-accent to-green-400 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform animate-glow-sport">
                        <i class="fas fa-calendar-check text-white text-xl"></i>
                    </div>
                    <h3 class="text-3xl lg:text-4xl font-black text-sport-text mb-2 sport-font" data-count="50000">50K+</h3>
                    <p class="text-sport-text-muted font-medium">Booking Sukses</p>
                </div>
                <div class="text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-sport-primary rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform animate-glow-sport">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <h3 class="text-3xl lg:text-4xl font-black text-sport-text mb-2 sport-font" data-count="10000">10K+</h3>
                    <p class="text-sport-text-muted font-medium">Pengguna Aktif</p>
                </div>
                <div class="text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-sport-accent rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform animate-glow-sport">
                        <i class="fas fa-award text-white text-xl"></i>
                    </div>
                    <h3 class="text-3xl lg:text-4xl font-black text-sport-text mb-2 sport-font" data-count="25">25+</h3>
                    <p class="text-sport-text-muted font-medium">Jenis Olahraga</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-24 bg-sport-dark">
        <div class="container mx-auto px-6 max-w-7xl">
            <!-- Section Header -->
            <div class="text-center mb-20 animate-fade-in-up">
                <div class="inline-flex items-center px-4 py-2 glass-card rounded-full border border-sport-primary/30 mb-6">
                    <i class="fas fa-star text-sport-primary mr-2"></i>
                    <span class="text-sport-primary font-medium">Fitur Unggulan</span>
                </div>
                <h2 class="text-4xl lg:text-5xl sport-font font-black text-sport-text mb-6">
                    Kenapa <span class="bg-gradient-to-r from-sport-primary to-sport-accent bg-clip-text text-transparent">AsitCom Sport?</span>
                </h2>
                <p class="text-xl text-sport-text-muted max-w-3xl mx-auto">
                    Teknologi terdepan dan pengalaman pengguna terbaik untuk kebutuhan olahraga yang sempurna.
                </p>
            </div>

            <!-- Features Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="sport-card group hover:scale-105 transition-transform duration-300 animate-fade-in-up" style="animation-delay: 0.1s;">
                    <div class="w-16 h-16 bg-gradient-to-br from-sport-primary to-sport-accent rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform animate-pulse-sport">
                        <i class="fas fa-bolt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-sport-text mb-4 sport-font">Instant Booking</h3>
                    <p class="text-sport-text-muted leading-relaxed">Booking dalam hitungan detik dengan sistem real-time yang selalu update ketersediaan lapangan.</p>
                </div>

                <!-- Feature 2 -->
                <div class="sport-card group hover:scale-105 transition-transform duration-300 animate-fade-in-up" style="animation-delay: 0.2s;">
                    <div class="w-16 h-16 bg-gradient-to-br from-sport-accent to-green-400 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform animate-pulse-sport">
                        <i class="fas fa-shield-check text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-sport-text mb-4 sport-font">Pembayaran Aman</h3>
                    <p class="text-sport-text-muted leading-relaxed">Sistem pembayaran terenkripsi dengan dukungan berbagai metode pembayaran populer di Indonesia.</p>
                </div>

                <!-- Feature 3 -->
                <div class="sport-card group hover:scale-105 transition-transform duration-300 animate-fade-in-up" style="animation-delay: 0.3s;">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-sport-primary rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform animate-pulse-sport">
                        <i class="fas fa-map-marked-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-sport-text mb-4 sport-font">Lokasi Premium</h3>
                    <p class="text-sport-text-muted leading-relaxed">Venue-venue pilihan di lokasi strategis dengan fasilitas lengkap dan akses mudah.</p>
                </div>

                <!-- Feature 4 -->
                <div class="sport-card group hover:scale-105 transition-transform duration-300 animate-fade-in-up" style="animation-delay: 0.4s;">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-sport-accent rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform animate-pulse-sport">
                        <i class="fas fa-mobile-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-sport-text mb-4 sport-font">Mobile Optimized</h3>
                    <p class="text-sport-text-muted leading-relaxed">Pengalaman seamless di semua device dengan interface yang intuitif dan responsif.</p>
                </div>

                <!-- Feature 5 -->
                <div class="sport-card group hover:scale-105 transition-transform duration-300 animate-fade-in-up" style="animation-delay: 0.5s;">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-sport-accent rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform animate-pulse-sport">
                        <i class="fas fa-headset text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-sport-text mb-4 sport-font">Support 24/7</h3>
                    <p class="text-sport-text-muted leading-relaxed">Tim customer support profesional yang siap membantu kapan saja melalui berbagai channel.</p>
                </div>

                <!-- Feature 6 -->
                <div class="sport-card group hover:scale-105 transition-transform duration-300 animate-fade-in-up" style="animation-delay: 0.6s;">
                    <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-sport-primary rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform animate-pulse-sport">
                        <i class="fas fa-chart-line text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-sport-text mb-4 sport-font">Analytics Personal</h3>
                    <p class="text-sport-text-muted leading-relaxed">Lacak statistik olahraga dan riwayat booking dengan dashboard personal yang komprehensif.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section id="process" class="py-24 bg-sport-gray">
        <div class="container mx-auto px-6 max-w-7xl">
            <!-- Section Header -->
            <div class="text-center mb-20 animate-fade-in-up">
                <div class="inline-flex items-center px-4 py-2 glass-card rounded-full border border-sport-accent/30 mb-6">
                    <i class="fas fa-route text-sport-accent mr-2"></i>
                    <span class="text-sport-accent font-medium">Cara Kerja</span>
                </div>
                <h2 class="text-4xl lg:text-5xl sport-font font-black text-sport-text mb-6">
                    3 Langkah <span class="bg-gradient-to-r from-sport-primary to-sport-accent bg-clip-text text-transparent">Sederhana</span>
                </h2>
                <p class="text-xl text-sport-text-muted max-w-2xl mx-auto">
                    Proses booking yang dirancang untuk memberikan pengalaman terbaik dan tercepat.
                </p>
            </div>

            <!-- Process Steps -->
            <div class="grid md:grid-cols-3 gap-12 relative">
                <!-- Connector Lines -->
                <div class="hidden md:block absolute top-20 left-1/3 right-1/3 h-0.5 bg-gradient-to-r from-sport-primary/20 via-sport-primary to-sport-primary/20"></div>

                <!-- Step 1 -->
                <div class="text-center group animate-fade-in-up" style="animation-delay: 0.1s;">
                    <div class="relative mb-8">
                        <div class="w-20 h-20 bg-gradient-to-br from-sport-primary to-sport-accent rounded-3xl flex items-center justify-center mx-auto shadow-lg group-hover:scale-110 transition-transform animate-glow-sport">
                            <i class="fas fa-search text-white text-2xl"></i>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-sport-accent rounded-full flex items-center justify-center text-white text-sm font-bold sport-font">1</div>
                    </div>
                    <h3 class="text-2xl font-bold text-sport-text mb-4 sport-font">Cari & Pilih</h3>
                    <p class="text-sport-text-muted leading-relaxed">Temukan lapangan sesuai lokasi, jenis olahraga, dan waktu yang diinginkan dengan filter canggih.</p>
                </div>

                <!-- Step 2 -->
                <div class="text-center group animate-fade-in-up" style="animation-delay: 0.3s;">
                    <div class="relative mb-8">
                        <div class="w-20 h-20 bg-gradient-to-br from-sport-accent to-green-400 rounded-3xl flex items-center justify-center mx-auto shadow-lg group-hover:scale-110 transition-transform animate-glow-sport">
                            <i class="fas fa-credit-card text-white text-2xl"></i>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-sport-primary rounded-full flex items-center justify-center text-white text-sm font-bold sport-font">2</div>
                    </div>
                    <h3 class="text-2xl font-bold text-sport-text mb-4 sport-font">Bayar & Konfirmasi</h3>
                    <p class="text-sport-text-muted leading-relaxed">Proses pembayaran aman dan instant dengan berbagai metode pembayaran yang mudah.</p>
                </div>

                <!-- Step 3 -->
                <div class="text-center group animate-fade-in-up" style="animation-delay: 0.5s;">
                    <div class="relative mb-8">
                        <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-sport-primary rounded-3xl flex items-center justify-center mx-auto shadow-lg group-hover:scale-110 transition-transform animate-glow-sport">
                            <i class="fas fa-play text-white text-2xl"></i>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-sport-accent rounded-full flex items-center justify-center text-white text-sm font-bold sport-font">3</div>
                    </div>
                    <h3 class="text-2xl font-bold text-sport-text mb-4 sport-font">Main & Nikmati</h3>
                    <p class="text-sport-text-muted leading-relaxed">Datang ke venue sesuai jadwal dan nikmati fasilitas olahraga premium yang telah dipesan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-24 bg-sport-dark">
        <div class="container mx-auto px-6 max-w-7xl">
            <!-- Section Header -->
            <div class="text-center mb-20 animate-fade-in-up">
                <div class="inline-flex items-center px-4 py-2 glass-card rounded-full border border-yellow-500/30 mb-6">
                    <i class="fas fa-star text-yellow-400 mr-2"></i>
                    <span class="text-yellow-400 font-medium">Testimoni</span>
                </div>
                <h2 class="text-4xl lg:text-5xl sport-font font-black text-sport-text mb-6">
                    Kata <span class="bg-gradient-to-r from-sport-primary to-sport-accent bg-clip-text text-transparent">Pengguna</span> Kami
                </h2>
                <p class="text-xl text-sport-text-muted max-w-2xl mx-auto">
                    Ribuan pengguna telah merasakan kemudahan booking lapangan dengan AsitCom Sport.
                </p>
            </div>

            <!-- Testimonials Grid -->
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="glass-card rounded-3xl p-8 border border-sport-primary/20 group hover:border-sport-primary/50 transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.1s;">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-sport-primary to-sport-accent rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-sport-text sport-font">Ahmad Rizki</h4>
                            <p class="text-sport-text-muted text-sm">Futsal Enthusiast</p>
                        </div>
                    </div>
                    <div class="flex text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-sport-text leading-relaxed">"Booking futsal jadi super mudah! Gak perlu lagi ribet nelpon sana-sini. Tinggal klik, bayar, jadi!"</p>
                </div>

                <!-- Testimonial 2 -->
                <div class="glass-card rounded-3xl p-8 border border-sport-accent/20 group hover:border-sport-accent/50 transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.3s;">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-sport-accent to-green-400 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-sport-text sport-font">Sarah Putri</h4>
                            <p class="text-sport-text-muted text-sm">Badminton Player</p>
                        </div>
                    </div>
                    <div class="flex text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-sport-text leading-relaxed">"Venue-venue yang ada di AsitCom Sport kualitasnya bagus semua. Customer service nya juga responsif banget!"</p>
                </div>

                <!-- Testimonial 3 -->
                <div class="glass-card rounded-3xl p-8 border border-purple-500/20 group hover:border-purple-500/50 transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.5s;">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-sport-primary rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-sport-text sport-font">Dedi Pratama</h4>
                            <p class="text-sport-text-muted text-sm">Basketball Coach</p>
                        </div>
                    </div>
                    <div class="flex text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-sport-text leading-relaxed">"Sebagai coach, saya sering booking untuk latihan tim. AsitCom Sport memudahkan saya mengatur jadwal latihan."</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="booking" class="py-24 bg-gradient-to-br from-sport-primary via-sport-accent to-black-400 text-white relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-1/4 left-20 w-64 h-64 bg-white/10 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-1/4 right-20 w-96 h-96 bg-sport-dark/20 rounded-full blur-3xl animate-float" style="animation-delay: -2s;"></div>
        </div>

        <div class="container mx-auto px-6 text-center relative z-10 max-w-4xl animate-fade-in-up">
            <h2 class="text-4xl lg:text-5xl sport-font font-black mb-6">
                Siap Memulai Petualangan Olahraga?
            </h2>
            <p class="text-xl mb-12 text-green-100 leading-relaxed">
                Bergabunglah dengan ribuan atlet dan pecinta olahraga yang telah merasakan kemudahan booking dengan AsitCom Sport.
            </p>

            <div class="flex flex-col sm:flex-row gap-6 justify-center mb-12">
                <a href="{{ url('/dashboard') }}" class="bg-white text-sport-primary px-10 py-4 rounded-2xl font-bold text-lg transition-all duration-300 hover:shadow-2xl transform hover:-translate-y-1 flex items-center justify-center group">
                    <span>Mulai Booking Sekarang</span>
                    <i class="fas fa-rocket ml-3 group-hover:translate-x-1 transition-transform"></i>
                </a>
                <button class="border-2 border-white/30 hover:border-white px-10 py-4 rounded-2xl font-bold text-lg transition-all duration-300 hover:bg-white/10 flex items-center justify-center group">
                    <i class="fas fa-play-circle mr-3"></i>
                    <span>Tonton Demo</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-sport-dark text-sport-text py-20 border-t border-sport-primary/20">
        <div class="container mx-auto px-6 max-w-7xl">
            <!-- Footer Content -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
                <!-- Company Info -->
                <div class="lg:col-span-1 space-y-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-sport-primary to-sport-secondary rounded-xl flex items-center justify-center animate-pulse-sport">
                            <x-application-logo class="block h-8 w-auto fill-current text-white" />
                        </div>
                        <span class="text-xl font-bold sport-font">AsitCom Sport</span>
                    </div>
                    <p class="text-sport-text-muted leading-relaxed max-w-md">
                        Platform booking lapangan olahraga terdepan di Indonesia. Kami berkomitmen memberikan pengalaman terbaik untuk komunitas olahraga Indonesia.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 glass-card rounded-xl flex items-center justify-center hover:border-sport-primary/50 transition-colors group">
                            <i class="fab fa-facebook-f text-sport-primary group-hover:text-sport-accent"></i>
                        </a>
                        <a href="#" class="w-10 h-10 glass-card rounded-xl flex items-center justify-center hover:border-sport-primary/50 transition-colors group">
                            <i class="fab fa-instagram text-sport-primary group-hover:text-sport-accent"></i>
                        </a>
                        <a href="#" class="w-10 h-10 glass-card rounded-xl flex items-center justify-center hover:border-sport-primary/50 transition-colors group">
                            <i class="fab fa-twitter text-sport-primary group-hover:text-sport-accent"></i>
                        </a>
                        <a href="#" class="w-10 h-10 glass-card rounded-xl flex items-center justify-center hover:border-sport-primary/50 transition-colors group">
                            <i class="fab fa-linkedin-in text-sport-primary group-hover:text-sport-accent"></i>
                        </a>
                    </div>
                </div>

                <!-- Product -->
                <div class="animate-fade-in-up" style="animation-delay: 0.1s;">
                    <h3 class="text-lg font-bold mb-6 sport-font text-sport-primary">Produk</h3>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-sport-text-muted hover:text-sport-primary transition-colors">Booking Lapangan</a></li>
                        <li><a href="#" class="text-sport-text-muted hover:text-sport-primary transition-colors">Event Management</a></li>
                        <li><a href="#" class="text-sport-text-muted hover:text-sport-primary transition-colors">Tournament Organizer</a></li>
                        <li><a href="#" class="text-sport-text-muted hover:text-sport-primary transition-colors">Membership Program</a></li>
                        <li><a href="#" class="text-sport-text-muted hover:text-sport-primary transition-colors">Corporate Package</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div class="animate-fade-in-up" style="animation-delay: 0.3s;">
                    <h3 class="text-lg font-bold mb-6 sport-font text-sport-accent">Dukungan</h3>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-sport-text-muted hover:text-sport-accent transition-colors">Pusat Bantuan</a></li>
                        <li><a href="#" class="text-sport-text-muted hover:text-sport-accent transition-colors">FAQ</a></li>
                        <li><a href="#" class="text-sport-text-muted hover:text-sport-accent transition-colors">Customer Support</a></li>
                        <li><a href="#" class="text-sport-text-muted hover:text-sport-accent transition-colors">Panduan Pengguna</a></li>
                        <li><a href="#" class="text-sport-text-muted hover:text-sport-accent transition-colors">Status Sistem</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div class="animate-fade-in-up" style="animation-delay: 0.5s;">
                    <h3 class="text-lg font-bold mb-6 sport-font text-sport-primary">Kontak</h3>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-envelope text-sport-primary mt-1"></i>
                            <div>
                                <p class="text-sport-text-muted">Email</p>
                                <a href="mailto:asitcom.business@gmail.com" class="text-sport-text hover:text-sport-primary transition-colors">hello@asitcomsport.com</a>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-phone text-sport-accent mt-1"></i>
                            <div>
                                <p class="text-sport-text-muted">Telepon</p>
                                <a href="tel:+687813233775" class="text-sport-text hover:text-sport-accent transition-colors">+62 21 1234 5678</a>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-map-marker-alt text-sport-primary mt-1"></i>
                            <div>
                                <p class="text-sport-text-muted">Alamat</p>
                                <p class="text-sport-text">Palembang, Indonesia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="border-t border-sport-primary/20 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <p class="text-sport-text-muted text-center md:text-left">
                        © 2025 AsitCom Sport. All rights reserved.
                    </p>
                    <div class="flex space-x-6 text-sm">
                        <a href="#" class="text-sport-text-muted hover:text-sport-primary transition-colors">Privacy Policy</a>
                        <a href="#" class="text-sport-text-muted hover:text-sport-primary transition-colors">Terms of Service</a>
                        <a href="#" class="text-sport-text-muted hover:text-sport-primary transition-colors">Cookie Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-8 right-8 w-14 h-14 bg-gradient-to-r from-sport-primary to-sport-accent text-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 opacity-0 invisible z-50 animate-glow-sport">
        <i class="fas fa-chevron-up text-xl"></i>
    </button>

    <!-- Scripts -->
    <script>
        // Mobile Menu Toggle
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        }

        // Navbar Scroll Effect
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            const backToTop = document.getElementById('backToTop');

            if (window.scrollY > 100) {
                navbar.style.backgroundColor = 'rgba(26, 29, 41, 0.95)';
                navbar.style.backdropFilter = 'blur(20px)';
                backToTop.classList.remove('opacity-0', 'invisible');
            } else {
                navbar.style.backgroundColor = 'rgba(26, 29, 41, 0.8)';
                navbar.style.backdropFilter = 'blur(15px)';
                backToTop.classList.add('opacity-0', 'invisible');
            }
        });

        // Smooth Scrolling
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

                // Close mobile menu
                const mobileMenu = document.getElementById('mobile-menu');
                if (!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                }
            });
        });

        // Back to Top
        document.getElementById('backToTop').addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

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

        // Intersection Observer for Animations
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

        // Observe elements for animation
        document.querySelectorAll('section').forEach(section => {
            observer.observe(section);
        });

        // Add loading state
        window.addEventListener('load', () => {
            document.body.classList.add('loaded');
        });

        // Button click effects with ripple
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

        // Enhanced parallax effect
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const heroElements = document.querySelectorAll('.animate-float');
            heroElements.forEach((element, index) => {
                const speed = 0.1 + (index * 0.05);
                element.style.transform = `translateY(${scrolled * speed}px)`;
            });
        });

        // Performance optimization
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
        document.addEventListener('DOMContentLoaded', () => {
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