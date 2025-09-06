<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AsitCom Sport - Platform Pemesanan Lapangan Olahraga Terdepan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif']
                    },
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                        secondary: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                        },
                        accent: {
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857'
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-out forwards',
                        'slide-up': 'slideUp 0.8s ease-out forwards',
                        'float': 'float 6s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                        'shimmer': 'shimmer 2s linear infinite'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(20px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            }
                        },
                        slideUp: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(40px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            }
                        },
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0px)'
                            },
                            '50%': {
                                transform: 'translateY(-20px)'
                            }
                        },
                        glow: {
                            '0%': {
                                boxShadow: '0 0 20px rgba(14, 165, 233, 0.3)'
                            },
                            '100%': {
                                boxShadow: '0 0 40px rgba(14, 165, 233, 0.6)'
                            }
                        },
                        shimmer: {
                            '0%': {
                                backgroundPosition: '-200% 0'
                            },
                            '100%': {
                                backgroundPosition: '200% 0'
                            }
                        }
                    },
                    backdropBlur: {
                        xs: '2px',
                    }
                }
            }
        }
    </script>
</head>

<body class="font-sans antialiased bg-white text-gray-900 overflow-x-hidden">

    <!-- Navigation -->
    <nav class="fixed w-full top-0 z-50 transition-all duration-300 bg-white/80 backdrop-blur-xl border-b border-gray-100" id="navbar">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <a href="{{ url('/') }}" class="inline-flex items-center space-x-3 hover:opacity-80 transition-opacity">
                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-lg">

                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />

                        </div>
                        <span class="text-xl font-bold text-gray-900">AsitCom Sport</span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-primary-600 font-medium transition-colors duration-200">Beranda</a>
                    <a href="#features" class="text-gray-700 hover:text-primary-600 font-medium transition-colors duration-200">Fitur</a>
                    <a href="#process" class="text-gray-700 hover:text-primary-600 font-medium transition-colors duration-200">Cara Kerja</a>
                    <!-- <a href="#pricing" class="text-gray-700 hover:text-primary-600 font-medium transition-colors duration-200">Harga</a> -->
                    <a href="#contact" class="text-gray-700 hover:text-primary-600 font-medium transition-colors duration-200">Kontak</a>
                </div>

                <!-- CTA Button -->
                <div class="hidden md:flex items-center space-x-4">
                    <!-- <a href="#login" class="text-gray-700 hover:text-primary-600 font-medium transition-colors duration-200">Masuk</a> -->
                    <a href="{{ url('/dashboard') }}" class="bg-gradient-to-r from-primary-500 to-primary-600 text-white px-6 py-2.5 rounded-xl font-medium hover:shadow-lg hover:shadow-primary-500/25 transition-all duration-200 transform hover:-translate-y-0.5">
                        Mulai Pesan
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors" onclick="toggleMobileMenu()">
                    <i class="fas fa-bars text-gray-700"></i>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div class="md:hidden hidden py-4 border-t border-gray-100 bg-white/95 backdrop-blur-xl" id="mobile-menu">
                <div class="flex flex-col space-y-3">
                    <a href="#home" class="py-2 text-gray-700 hover:text-primary-600 font-medium">Beranda</a>
                    <a href="#features" class="py-2 text-gray-700 hover:text-primary-600 font-medium">Fitur</a>
                    <a href="#process" class="py-2 text-gray-700 hover:text-primary-600 font-medium">Cara Kerja</a>
                    <a href="#pricing" class="py-2 text-gray-700 hover:text-primary-600 font-medium">Harga</a>
                    <a href="#contact" class="py-2 text-gray-700 hover:text-primary-600 font-medium">Kontak</a>
                    <div class="pt-4 border-t border-gray-200">
                        <!-- <a href="#login" class="block py-2 text-gray-700 hover:text-primary-600 font-medium">Masuk</a> -->
                        <a href="{{ url('/dashboard') }}" class="block mt-2 bg-gradient-to-r from-primary-500 to-primary-600 text-white px-4 py-2.5 rounded-xl font-medium text-center">
                            Mulai Pesan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="min-h-screen pt-2 bg-gradient-to-br from-gray-50 via-white to-blue-50 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-1/4 left-10 w-72 h-72 bg-primary-400/10 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-1/4 right-10 w-96 h-96 bg-accent-500/10 rounded-full blur-3xl animate-float" style="animation-delay: -3s;"></div>
        </div>

        <div class="container mx-auto px-6 py-20 max-w-7xl relative z-10">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Content -->
                <div class="space-y-8">

                    <h1 class="text-5xl lg:text-6xl xl:text-6xl font-black leading-tight text-gray-900">
                        Pesan Lapangan
                        <span class="bg-gradient-to-r from-primary-500 to-accent-500 bg-clip-text text-transparent">
                            Olahraga
                        </span>
                        Impianmu
                    </h1>

                    <p class="text-xl text-gray-600 leading-relaxed max-w-2xl">
                        Booking lapangan olahraga premium dalam hitungan detik. Mudah, aman, dan terpercaya untuk semua kebutuhan olahragamu.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-2">
                        <a href="{{ url('/dashboard') }}" class="group bg-gradient-to-r from-primary-500 to-primary-600 text-white px-8 py-4 rounded-2xl font-bold text-lg transition-all duration-300 hover:shadow-xl hover:shadow-primary-500/25 transform hover:-translate-y-1 flex items-center justify-center">
                            <span>Mulai Pesan Sekarang</span>
                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        <a href="#demo" class="group border-2 border-gray-300 hover:border-primary-500 px-8 py-4 rounded-2xl font-bold text-lg transition-all duration-300 hover:bg-primary-50 text-gray-700 hover:text-primary-600 flex items-center justify-center">
                            <i class="fas fa-play-circle mr-2"></i>
                            <span>Lihat Demo</span>
                        </a>
                    </div>

                    <!-- Trust Indicators -->
                    <div class="flex flex-wrap items-center gap-6 pt-8">
                        <!-- <div class="inline-flex items-center px-4 py-2 bg-primary-50 rounded-full border border-primary-200">
                            <span class="w-2 h-2 bg-primary-500 rounded-full mr-3 animate-pulse"></span>
                            <span class="text-primary-700 text-sm font-medium">Platform #1 di Indonesia</span>
                        </div> -->
                        <div class="flex items-center space-x-2">
                            <div class="flex -space-x-2">
                                <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full border-2 border-white"></div>
                                <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-teal-500 rounded-full border-2 border-white"></div>
                                <div class="w-8 h-8 bg-gradient-to-r from-orange-500 to-red-500 rounded-full border-2 border-white"></div>
                            </div>
                            <span class="text-gray-600 font-medium">10K+ Pengguna Aktif</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-gray-600 font-medium">4.9/5 Rating</span>
                        </div>
                    </div>
                </div>

                <!-- Hero Visual -->
                <div class="relative">
                    <div class="bg-white rounded-3xl shadow-2xl shadow-gray-900/10 p-8 relative overflow-hidden">
                        <!-- Animated Background -->
                        <div class="absolute inset-0 bg-gradient-to-br from-primary-500/5 to-accent-500/5"></div>

                        <!-- Mock App Interface -->
                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-600 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-mobile-alt text-white"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-gray-900">Quick Booking</h3>
                                        <p class="text-gray-500 text-sm">Dalam 30 detik</p>
                                    </div>
                                </div>
                                <div class="w-12 h-12 bg-accent-500 rounded-full flex items-center justify-center animate-pulse">
                                    <i class="fas fa-check text-white"></i>
                                </div>
                            </div>

                            <!-- Sports Selection -->
                            <div class="grid grid-cols-3 gap-3 mb-6">
                                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-4 rounded-xl text-center hover:shadow-md transition-shadow cursor-pointer group">
                                    <i class="fas fa-futbol text-2xl text-blue-600 mb-2 group-hover:scale-110 transition-transform"></i>
                                    <p class="text-sm font-medium text-gray-700">Futsal</p>
                                </div>
                                <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-4 rounded-xl text-center hover:shadow-md transition-shadow cursor-pointer group">
                                    <i class="fas fa-basketball-ball text-2xl text-orange-600 mb-2 group-hover:scale-110 transition-transform"></i>
                                    <p class="text-sm font-medium text-gray-700">Basket</p>
                                </div>
                                <div class="bg-gradient-to-br from-green-50 to-green-100 p-4 rounded-xl text-center hover:shadow-md transition-shadow cursor-pointer group">
                                    <i class="fas fa-volleyball-ball text-2xl text-green-600 mb-2 group-hover:scale-110 transition-transform"></i>
                                    <p class="text-sm font-medium text-gray-700">Voli</p>
                                </div>
                            </div>

                            <!-- Booking Status -->
                            <div class="bg-gradient-to-r from-accent-500 to-accent-600 rounded-2xl p-6 text-white">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-accent-100 text-sm">Booking Confirmed!</p>
                                        <p class="font-bold text-lg">Lapangan A - 19:00</p>
                                    </div>
                                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center animate-bounce">
                                        <i class="fas fa-calendar-check text-2xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Elements -->
                    <div class="absolute -top-4 -right-4 w-16 h-16 bg-gradient-to-r from-primary-500 to-primary-600 rounded-2xl flex items-center justify-center shadow-lg animate-float">
                        <i class="fas fa-star text-white text-xl"></i>
                    </div>
                    <div class="absolute -bottom-4 -left-4 w-20 h-20 bg-gradient-to-r from-accent-500 to-accent-600 rounded-2xl flex items-center justify-center shadow-lg animate-float" style="animation-delay: -2s;">
                        <i class="fas fa-trophy text-white text-2xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 bg-white border-t border-gray-100">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-map-marker-alt text-white text-xl"></i>
                    </div>
                    <h3 class="text-3xl lg:text-4xl font-black text-gray-900 mb-2" data-count="200">200+</h3>
                    <p class="text-gray-600 font-medium">Venue Partner</p>
                </div>
                <div class="text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-accent-500 to-accent-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-calendar-check text-white text-xl"></i>
                    </div>
                    <h3 class="text-3xl lg:text-4xl font-black text-gray-900 mb-2" data-count="50000">50K+</h3>
                    <p class="text-gray-600 font-medium">Booking Sukses</p>
                </div>
                <div class="text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <h3 class="text-3xl lg:text-4xl font-black text-gray-900 mb-2" data-count="10000">10K+</h3>
                    <p class="text-gray-600 font-medium">Pengguna Aktif</p>
                </div>
                <div class="text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-award text-white text-xl"></i>
                    </div>
                    <h3 class="text-3xl lg:text-4xl font-black text-gray-900 mb-2" data-count="25">25+</h3>
                    <p class="text-gray-600 font-medium">Jenis Olahraga</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-24 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="container mx-auto px-6 max-w-7xl">
            <!-- Section Header -->
            <div class="text-center mb-20">
                <div class="inline-flex items-center px-4 py-2 bg-primary-50 rounded-full border border-primary-200 mb-6">
                    <i class="fas fa-star text-primary-500 mr-2"></i>
                    <span class="text-primary-700 font-medium">Fitur Unggulan</span>
                </div>
                <h2 class="text-4xl lg:text-5xl font-black text-gray-900 mb-6">
                    Kenapa <span class="bg-gradient-to-r from-primary-500 to-accent-500 bg-clip-text text-transparent">AsitCom Sport?</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Teknologi terdepan dan pengalaman pengguna terbaik untuk kebutuhan olahraga yang sempurna.
                </p>
            </div>

            <!-- Features Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="group bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-500 hover:-translate-y-2 border border-gray-100">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-bolt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Instant Booking</h3>
                    <p class="text-gray-600 leading-relaxed">Booking dalam hitungan detik dengan sistem real-time yang selalu update ketersediaan lapangan.</p>
                </div>

                <!-- Feature 2 -->
                <div class="group bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-500 hover:-translate-y-2 border border-gray-100">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-shield-check text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Pembayaran Aman</h3>
                    <p class="text-gray-600 leading-relaxed">Sistem pembayaran terenkripsi dengan dukungan berbagai metode pembayaran populer di Indonesia.</p>
                </div>

                <!-- Feature 3 -->
                <div class="group bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-500 hover:-translate-y-2 border border-gray-100">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-map-marked-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Lokasi Premium</h3>
                    <p class="text-gray-600 leading-relaxed">Venue-venue pilihan di lokasi strategis dengan fasilitas lengkap dan akses mudah.</p>
                </div>

                <!-- Feature 4 -->
                <div class="group bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-500 hover:-translate-y-2 border border-gray-100">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-mobile-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Mobile Optimized</h3>
                    <p class="text-gray-600 leading-relaxed">Pengalaman seamless di semua device dengan interface yang intuitif dan responsif.</p>
                </div>

                <!-- Feature 5 -->
                <div class="group bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-500 hover:-translate-y-2 border border-gray-100">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-headset text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Support 24/7</h3>
                    <p class="text-gray-600 leading-relaxed">Tim customer support profesional yang siap membantu kapan saja melalui berbagai channel.</p>
                </div>

                <!-- Feature 6 -->
                <div class="group bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-500 hover:-translate-y-2 border border-gray-100">
                    <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-teal-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-chart-line text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Analytics Personal</h3>
                    <p class="text-gray-600 leading-relaxed">Lacak statistik olahraga dan riwayat booking dengan dashboard personal yang komprehensif.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section id="process" class="py-24 bg-white">
        <div class="container mx-auto px-6 max-w-7xl">
            <!-- Section Header -->
            <div class="text-center mb-20">
                <div class="inline-flex items-center px-4 py-2 bg-accent-50 rounded-full border border-accent-200 mb-6">
                    <i class="fas fa-route text-accent-600 mr-2"></i>
                    <span class="text-accent-700 font-medium">Cara Kerja</span>
                </div>
                <h2 class="text-4xl lg:text-5xl font-black text-gray-900 mb-6">
                    3 Langkah <span class="bg-gradient-to-r from-primary-500 to-accent-500 bg-clip-text text-transparent">Sederhana</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Proses booking yang dirancang untuk memberikan pengalaman terbaik dan tercepat.
                </p>
            </div>

            <!-- Process Steps -->
            <div class="grid md:grid-cols-3 gap-12 relative">
                <!-- Connector Lines -->
                <div class="hidden md:block absolute top-20 left-1/3 right-1/3 h-0.5 bg-gradient-to-r from-primary-200 via-primary-400 to-primary-200"></div>

                <!-- Step 1 -->
                <div class="text-center group">
                    <div class="relative mb-8">
                        <div class="w-20 h-20 bg-gradient-to-br from-primary-500 to-primary-600 rounded-3xl flex items-center justify-center mx-auto shadow-lg group-hover:scale-110 transition-transform">
                            <i class="fas fa-search text-white text-2xl"></i>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-accent-500 rounded-full flex items-center justify-center text-white text-sm font-bold">1</div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Cari & Pilih</h3>
                    <p class="text-gray-600 leading-relaxed">Temukan lapangan sesuai lokasi, jenis olahraga, dan waktu yang diinginkan dengan filter canggih.</p>
                </div>

                <!-- Step 2 -->
                <div class="text-center group">
                    <div class="relative mb-8">
                        <div class="w-20 h-20 bg-gradient-to-br from-accent-500 to-accent-600 rounded-3xl flex items-center justify-center mx-auto shadow-lg group-hover:scale-110 transition-transform">
                            <i class="fas fa-credit-card text-white text-2xl"></i>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-primary-500 rounded-full flex items-center justify-center text-white text-sm font-bold">2</div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Bayar & Konfirmasi</h3>
                    <p class="text-gray-600 leading-relaxed">Proses pembayaran aman dan instant dengan berbagai metode pembayaran yang mudah.</p>
                </div>

                <!-- Step 3 -->
                <div class="text-center group">
                    <div class="relative mb-8">
                        <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-3xl flex items-center justify-center mx-auto shadow-lg group-hover:scale-110 transition-transform">
                            <i class="fas fa-play text-white text-2xl"></i>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-accent-500 rounded-full flex items-center justify-center text-white text-sm font-bold">3</div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Main & Nikmati</h3>
                    <p class="text-gray-600 leading-relaxed">Datang ke venue sesuai jadwal dan nikmati fasilitas olahraga premium yang telah dipesan.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Testimonials Section -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6 max-w-7xl">
            <!-- Section Header -->
            <div class="text-center mb-20">
                <div class="inline-flex items-center px-4 py-2 bg-yellow-50 rounded-full border border-yellow-200 mb-6">
                    <i class="fas fa-star text-yellow-500 mr-2"></i>
                    <span class="text-yellow-700 font-medium">Testimoni</span>
                </div>
                <h2 class="text-4xl lg:text-5xl font-black text-gray-900 mb-6">
                    Kata <span class="bg-gradient-to-r from-primary-500 to-accent-500 bg-clip-text text-transparent">Pengguna</span> Kami
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Ribuan pengguna telah merasakan kemudahan booking lapangan dengan AsitCom Sport.
                </p>
            </div>

            <!-- Testimonials Grid -->
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-3xl p-8 border border-blue-200">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop&crop=face&auto=format" alt="User" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold text-gray-900">Ahmad Rizki</h4>
                            <p class="text-gray-600 text-sm">Futsal Enthusiast</p>
                        </div>
                    </div>
                    <div class="flex text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-700 leading-relaxed">"Booking futsal jadi super mudah! Gak perlu lagi ribet nelpon sana-sini. Tinggal klik, bayar, jadi!"</p>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-3xl p-8 border border-green-200">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616c9d53075?w=100&h=100&fit=crop&crop=face&auto=format" alt="User" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold text-gray-900">Sarah Putri</h4>
                            <p class="text-gray-600 text-sm">Badminton Player</p>
                        </div>
                    </div>
                    <div class="flex text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-700 leading-relaxed">"Venue-venue yang ada di AsitCom Sport kualitasnya bagus semua. Customer service nya juga responsif banget!"</p>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-3xl p-8 border border-purple-200">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&h=100&fit=crop&crop=face&auto=format" alt="User" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold text-gray-900">Dedi Pratama</h4>
                            <p class="text-gray-600 text-sm">Basketball Coach</p>
                        </div>
                    </div>
                    <div class="flex text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-700 leading-relaxed">"Sebagai coach, saya sering booking untuk latihan tim. AsitCom Sport memudahkan saya mengatur jadwal latihan."</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="booking" class="py-24 bg-gradient-to-br from-primary-600 via-primary-700 to-accent-600 text-white relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-1/4 left-20 w-64 h-64 bg-white/10 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-1/4 right-20 w-96 h-96 bg-accent-400/20 rounded-full blur-3xl animate-float" style="animation-delay: -2s;"></div>
        </div>

        <div class="container mx-auto px-6 text-center relative z-10 max-w-4xl">
            <h2 class="text-4xl lg:text-5xl font-black mb-6">
                Siap Memulai Petualangan Olahraga?
            </h2>
            <p class="text-xl mb-12 text-primary-100 leading-relaxed">
                Bergabunglah dengan ribuan atlet dan pecinta olahraga yang telah merasakan kemudahan booking dengan AsitCom Sport.
            </p>

            <div class="flex flex-col sm:flex-row gap-6 justify-center mb-12">
                <a href="{{ url('/dashboard') }}" class="group bg-white text-primary-600 px-10 py-4 rounded-2xl font-bold text-lg transition-all duration-300 hover:shadow-2xl transform hover:-translate-y-1 flex items-center justify-center">
                    <span>Mulai Booking Sekarang</span>
                    <i class="fas fa-rocket ml-3 group-hover:translate-x-1 transition-transform"></i>
                </a>
                <a href="#" class="group border-2 border-white/30 hover:border-white px-10 py-4 rounded-2xl font-bold text-lg transition-all duration-300 hover:bg-white/10 flex items-center justify-center">
                    <i class="fas fa-play-circle mr-3"></i>
                    <span>Tonton Demo</span>
                </a>
            </div>

            <!-- App Download Section -->
            <!-- <div class="space-y-4">
                <p class="text-primary-100 font-medium">Download aplikasi mobile untuk pengalaman yang lebih baik</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#" class="group bg-black hover:bg-gray-900 text-white px-6 py-3 rounded-2xl flex items-center space-x-4 transition-colors">
                        <i class="fab fa-apple text-3xl"></i>
                        <div class="text-left">
                            <div class="text-xs opacity-80">Download on the</div>
                            <div class="font-bold text-lg">App Store</div>
                        </div>
                    </a>
                    <a href="#" class="group bg-black hover:bg-gray-900 text-white px-6 py-3 rounded-2xl flex items-center space-x-4 transition-colors">
                        <i class="fab fa-google-play text-3xl"></i>
                        <div class="text-left">
                            <div class="text-xs opacity-80">Get it on</div>
                            <div class="font-bold text-lg">Google Play</div>
                        </div>
                    </a>
                </div>
            </div> -->
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-gray-900 text-white py-20">
        <div class="container mx-auto px-6 max-w-7xl">
            <!-- Footer Content -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
                <!-- Company Info -->
                <div class="lg:col-span-1 space-y-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-bolt text-white"></i>
                        </div>
                        <span class="text-xl font-bold">AsitCom Sport</span>
                    </div>
                    <p class="text-gray-400 leading-relaxed max-w-md">
                        Platform booking lapangan olahraga terdepan di Indonesia. Kami berkomitmen memberikan pengalaman terbaik untuk komunitas olahraga Indonesia.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-primary-600/20 hover:bg-primary-600 rounded-xl flex items-center justify-center transition-colors">
                            <i class="fab fa-facebook-f text-primary-400 hover:text-white"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-primary-600/20 hover:bg-primary-600 rounded-xl flex items-center justify-center transition-colors">
                            <i class="fab fa-instagram text-primary-400 hover:text-white"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-primary-600/20 hover:bg-primary-600 rounded-xl flex items-center justify-center transition-colors">
                            <i class="fab fa-twitter text-primary-400 hover:text-white"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-primary-600/20 hover:bg-primary-600 rounded-xl flex items-center justify-center transition-colors">
                            <i class="fab fa-linkedin-in text-primary-400 hover:text-white"></i>
                        </a>
                    </div>
                </div>

                <!-- Product -->
                <div>
                    <h3 class="text-lg font-bold mb-6">Produk</h3>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Booking Lapangan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Event Management</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Tournament Organizer</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Membership Program</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Corporate Package</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h3 class="text-lg font-bold mb-6">Dukungan</h3>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Pusat Bantuan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">FAQ</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Customer Support</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Panduan Pengguna</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Status Sistem</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="text-lg font-bold mb-6">Kontak</h3>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-envelope text-primary-400 mt-1"></i>
                            <div>
                                <p class="text-gray-400">Email</p>
                                <a href="mailto:hello@asitcomsport.com" class="text-white hover:text-primary-400 transition-colors">hello@asitcomsport.com</a>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-phone text-primary-400 mt-1"></i>
                            <div>
                                <p class="text-gray-400">Telepon</p>
                                <a href="tel:+6221123456789" class="text-white hover:text-primary-400 transition-colors">+62 21 1234 5678</a>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-map-marker-alt text-primary-400 mt-1"></i>
                            <div>
                                <p class="text-gray-400">Alamat</p>
                                <p class="text-white">Jakarta Selatan, Indonesia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="border-t border-gray-800 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <p class="text-gray-400 text-center md:text-left">
                        © 2025 AsitCom Sport. All rights reserved.
                    </p>
                    <div class="flex space-x-6 text-sm">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">Terms of Service</a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">Cookie Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-8 right-8 w-14 h-14 bg-gradient-to-r from-primary-500 to-primary-600 text-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 opacity-0 invisible z-50">
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
                navbar.classList.add('bg-white/95', 'shadow-lg');
                navbar.classList.remove('bg-white/80');
                backToTop.classList.remove('opacity-0', 'invisible');
            } else {
                navbar.classList.add('bg-white/80');
                navbar.classList.remove('bg-white/95', 'shadow-lg');
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
                    entry.target.classList.add('animate-fade-in');

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

        // Parallax effect for hero section
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const heroElements = document.querySelectorAll('#home .animate-float');
            heroElements.forEach((element, index) => {
                const speed = 0.5 + (index * 0.1);
                element.style.transform = `translateY(${scrolled * speed}px)`;
            });
        });

        // Button click effects
        document.querySelectorAll('a, button').forEach(button => {
            button.addEventListener('click', function(e) {
                // Ripple effect
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
                    background: rgba(255, 255, 255, 0.5);
                    border-radius: 50%;
                    transform: scale(0);
                    animation: ripple 0.6s linear;
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

        // Enhanced hover effects for cards
        document.querySelectorAll('.group').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px) scale(1.02)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Typing effect for hero title (optional)
        function typeWriter(element, text, speed = 50) {
            let i = 0;
            const originalText = element.innerHTML;
            element.innerHTML = '';

            function typing() {
                if (i < text.length) {
                    if (text.charAt(i) === '<') {
                        // Handle HTML tags
                        const tagEnd = text.indexOf('>', i);
                        element.innerHTML += text.substring(i, tagEnd + 1);
                        i = tagEnd + 1;
                    } else {
                        element.innerHTML += text.charAt(i);
                        i++;
                    }
                    setTimeout(typing, speed);
                } else {
                    // Add blinking cursor effect
                    element.innerHTML += '<span class="animate-pulse">|</span>';
                    setTimeout(() => {
                        element.innerHTML = originalText;
                    }, 2000);
                }
            }

            setTimeout(typing, 1000);
        }

        // Initialize enhanced interactions
        setTimeout(() => {
            // Add subtle animations to feature icons
            document.querySelectorAll('#features .group').forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
                card.classList.add('animate-slide-up');
            });

            // Add stagger animation to process steps
            document.querySelectorAll('#process .group').forEach((step, index) => {
                step.style.animationDelay = `${index * 0.2}s`;
                step.classList.add('animate-slide-up');
            });
        }, 500);

        // Advanced scroll-triggered animations
        const advancedObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const children = entry.target.querySelectorAll('.group, .animate-on-scroll');
                    children.forEach((child, index) => {
                        setTimeout(() => {
                            child.classList.add('animate-fade-in');
                            child.style.opacity = '1';
                            child.style.transform = 'translateY(0)';
                        }, index * 100);
                    });
                }
            });
        }, {
            threshold: 0.1
        });

        // Observe sections for stagger animations
        document.querySelectorAll('#features, #process, #pricing').forEach(section => {
            advancedObserver.observe(section);
        });

        // Performance optimization: Debounced scroll handler
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        // Optimized scroll handler
        const handleScroll = debounce(() => {
            const scrolled = window.pageYOffset;
            const navbar = document.getElementById('navbar');
            const backToTop = document.getElementById('backToTop');

            // Navbar effect
            if (scrolled > 100) {
                navbar.style.backdropFilter = 'blur(20px)';
                navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
                navbar.style.borderBottom = '1px solid rgba(0, 0, 0, 0.1)';
                backToTop.style.opacity = '1';
                backToTop.style.visibility = 'visible';
            } else {
                navbar.style.backdropFilter = 'blur(10px)';
                navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.8)';
                navbar.style.borderBottom = '1px solid rgba(0, 0, 0, 0.05)';
                backToTop.style.opacity = '0';
                backToTop.style.visibility = 'hidden';
            }

            // Parallax for floating elements
            const floatingElements = document.querySelectorAll('.animate-float');
            floatingElements.forEach((element, index) => {
                const speed = 0.1 + (index * 0.05);
                element.style.transform = `translateY(${scrolled * speed}px)`;
            });
        }, 10);

        window.addEventListener('scroll', handleScroll);

        // Enhanced mobile menu with animation
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobile-menu');
            const isHidden = mobileMenu.classList.contains('hidden');

            if (isHidden) {
                mobileMenu.classList.remove('hidden');
                mobileMenu.style.maxHeight = '0px';
                mobileMenu.style.opacity = '0';

                requestAnimationFrame(() => {
                    mobileMenu.style.transition = 'all 0.3s ease';
                    mobileMenu.style.maxHeight = '400px';
                    mobileMenu.style.opacity = '1';
                });
            } else {
                mobileMenu.style.maxHeight = '0px';
                mobileMenu.style.opacity = '0';

                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                }, 300);
            }
        }

        // Re-assign the enhanced toggle function
        window.toggleMobileMenu = toggleMobileMenu;

        // Add custom CSS for animations
        const customStyles = document.createElement('style');
        customStyles.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
            
            .animate-on-scroll {
                opacity: 0;
                transform: translateY(30px);
                transition: all 0.6s ease;
            }
            
            .loaded .animate-on-scroll {
                opacity: 1;
                transform: translateY(0);
            }
            
            .group {
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }
            
            .group:hover {
                transform: translateY(-4px) scale(1.02);
            }
            
            /* Enhanced button styles */
            .btn-primary {
                background: linear-gradient(135deg, #0ea5e9 0%, #10b981 100%);
                background-size: 200% 200%;
                animation: gradientShift 3s ease infinite;
            }
            
            @keyframes gradientShift {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }
            
            /* Smooth transitions for all interactive elements */
            * {
                transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
                transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                transition-duration: 150ms;
            }
            
            /* Enhanced focus styles for accessibility */
            a:focus, button:focus {
                outline: 2px solid #0ea5e9;
                outline-offset: 2px;
                border-radius: 0.5rem;
            }
            
            /* Loading state */
            .loading {
                opacity: 0;
                transform: translateY(20px);
            }
            
            .loaded .loading {
                opacity: 1;
                transform: translateY(0);
                transition: all 0.8s ease;
            }
        `;
        document.head.appendChild(customStyles);

        // Initialize page
        document.addEventListener('DOMContentLoaded', () => {
            // Add loading class to all sections
            document.querySelectorAll('section').forEach(section => {
                section.classList.add('loading');
            });

            // Trigger loaded state after a short delay
            setTimeout(() => {
                document.body.classList.add('loaded');
            }, 100);
        });

        // Error handling for any async operations
        window.addEventListener('error', (e) => {
            console.log('Error handled:', e.error);
        });

        // Performance monitoring
        if ('PerformanceObserver' in window) {
            const observer = new PerformanceObserver((entries) => {
                entries.getEntries().forEach((entry) => {
                    if (entry.entryType === 'navigation') {
                        console.log('Page load time:', entry.loadEventEnd - entry.loadEventStart, 'ms');
                    }
                });
            });
            observer.observe({
                entryTypes: ['navigation']
            });
        }
    </script>
</body>

</html>