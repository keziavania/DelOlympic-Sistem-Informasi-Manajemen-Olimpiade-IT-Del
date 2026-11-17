<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DelOlympic') – Platform Kompetisi Terintegrasi IT Del</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Tailwind CSS CDN with Custom Theme -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb', // Aksen biru terang
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a', // Biru navy utama
                            950: '#0f172a', // Deep dark navy
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.3/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        .glassmorphism {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased font-sans flex flex-col min-h-screen">

    <!-- Top Simulation Bar (Untuk Pengujian Cepat 3 Role & Publik) -->
    <div class="bg-slate-900 text-slate-200 text-xs py-2 px-4 border-b border-slate-800 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-2">
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-semibold bg-brand-500/20 text-brand-300 border border-brand-500/30">
                    <i class="fa-solid fa-flask-vial mr-1.5 text-brand-400"></i> Mode Simulasi UI
                </span>
                <span class="text-slate-400 hidden sm:inline">Pilih peran untuk menguji tampilan & alur:</span>
            </div>
            <div class="flex items-center gap-1.5 overflow-x-auto">
                <a href="{{ route('home') }}" class="px-2.5 py-1 rounded transition {{ request()->is('/') ? 'bg-brand-600 text-white font-semibold' : 'text-slate-300 hover:bg-slate-800' }}">
                    <i class="fa-solid fa-globe mr-1"></i> Publik
                </a>
                <a href="{{ route('switch.role', 'admin') }}" class="px-2.5 py-1 rounded transition {{ session('current_role') == 'admin' ? 'bg-amber-500 text-slate-950 font-bold' : 'text-slate-300 hover:bg-slate-800' }}">
                    <i class="fa-solid fa-shield-halved mr-1"></i> Admin
                </a>
                <a href="{{ route('switch.role', 'penyelenggara') }}" class="px-2.5 py-1 rounded transition {{ session('current_role') == 'penyelenggara' ? 'bg-emerald-500 text-slate-950 font-bold' : 'text-slate-300 hover:bg-slate-800' }}">
                    <i class="fa-solid fa-building-columns mr-1"></i> Penyelenggara
                </a>
                <a href="{{ route('switch.role', 'peserta') }}" class="px-2.5 py-1 rounded transition {{ session('current_role') == 'peserta' ? 'bg-brand-500 text-white font-bold' : 'text-slate-300 hover:bg-slate-800' }}">
                    <i class="fa-solid fa-graduation-cap mr-1"></i> Peserta
                </a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <header class="glassmorphism sticky top-[37px] z-40 border-b border-slate-200/80 shadow-sm" x-data="{ mobileMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Logo & Brand -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-brand-900 to-brand-600 flex items-center justify-center text-white shadow-md shadow-brand-500/20 group-hover:scale-105 transition-transform duration-200">
                        <i class="fa-solid fa-trophy text-lg text-amber-300"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-1.5">
                            <span class="text-2xl font-black tracking-tight text-brand-950">Del<span class="text-brand-600">Olympic</span></span>
                            <span class="text-[10px] uppercase font-bold tracking-widest px-1.5 py-0.5 rounded bg-brand-100 text-brand-800">IT Del</span>
                        </div>
                        <p class="text-[11px] text-slate-500 font-medium leading-none">Competition Management Platform</p>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-sm font-semibold transition {{ request()->routeIs('home') ? 'text-brand-600' : 'text-slate-600 hover:text-brand-600' }}">
                        Beranda
                    </a>
                    <a href="{{ route('competitions.index') }}" class="text-sm font-semibold transition {{ request()->routeIs('competitions.*') ? 'text-brand-600' : 'text-slate-600 hover:text-brand-600' }}">
                        Daftar Lomba
                    </a>
                    <a href="{{ route('about') }}" class="text-sm font-semibold transition {{ request()->routeIs('about') ? 'text-brand-600' : 'text-slate-600 hover:text-brand-600' }}">
                        Tentang Kami
                    </a>
                </nav>

                <!-- Auth Buttons / User Session -->
                <div class="hidden md:flex items-center gap-3">
                    @if(session('current_role'))
                        <div class="flex items-center gap-3">
                            <a href="{{ route(session('current_role') . '.dashboard') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-semibold bg-brand-50 text-brand-700 border border-brand-200 hover:bg-brand-100 transition shadow-sm">
                                <i class="fa-solid fa-gauge-high"></i>
                                Dashboard ({{ ucfirst(session('current_role')) }})
                            </a>
                            <a href="{{ route('logout') }}" class="text-slate-500 hover:text-rose-600 text-sm font-medium p-2" title="Keluar">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            </a>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="px-5 py-2.5 rounded-xl text-sm font-semibold text-brand-900 hover:text-brand-600 hover:bg-slate-100 transition">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-white bg-brand-600 hover:bg-brand-700 shadow-md shadow-brand-500/25 transition hover:shadow-lg hover:shadow-brand-500/30">
                            <span>Daftar Sekarang</span>
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    @endif
                </div>

                <!-- Mobile Hamburger Button -->
                <div class="flex md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 rounded-lg text-slate-600 hover:text-slate-900 hover:bg-slate-100 focus:outline-none">
                        <i :class="mobileMenuOpen ? 'fa-solid fa-xmark text-xl' : 'fa-solid fa-bars text-xl'"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation Menu -->
            <div x-show="mobileMenuOpen" x-cloak class="md:hidden py-4 border-t border-slate-200">
                <div class="flex flex-col gap-3">
                    <a href="{{ route('home') }}" class="px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('home') ? 'bg-brand-50 text-brand-600' : 'text-slate-700' }}">Beranda</a>
                    <a href="{{ route('competitions.index') }}" class="px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('competitions.*') ? 'bg-brand-50 text-brand-600' : 'text-slate-700' }}">Daftar Lomba</a>
                    <a href="{{ route('about') }}" class="px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('about') ? 'bg-brand-50 text-brand-600' : 'text-slate-700' }}">Tentang Kami</a>
                    <hr class="border-slate-200 my-1">
                    @if(session('current_role'))
                        <a href="{{ route(session('current_role') . '.dashboard') }}" class="px-3 py-2 rounded-lg text-sm font-semibold bg-brand-600 text-white text-center">Ke Dashboard {{ ucfirst(session('current_role')) }}</a>
                        <a href="{{ route('logout') }}" class="px-3 py-2 rounded-lg text-sm font-medium text-rose-600 text-center">Keluar</a>
                    @else
                        <a href="{{ route('login') }}" class="px-3 py-2 rounded-lg text-sm font-medium text-slate-700 text-center border border-slate-200">Masuk</a>
                        <a href="{{ route('register') }}" class="px-3 py-2 rounded-lg text-sm font-semibold bg-brand-600 text-white text-center">Daftar Akun Baru</a>
                    @endif
                </div>
            </div>
        </div>
    </header>

    <!-- Global Alert / Toast Notifications -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 w-full">
        @if(session('success'))
            <div class="flex items-center gap-3 p-4 mb-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 shadow-sm" x-data="{ show: true }" x-show="show">
                <i class="fa-solid fa-circle-check text-emerald-600 text-lg"></i>
                <div class="text-sm font-medium flex-1">{{ session('success') }}</div>
                <button @click="show = false" class="text-emerald-500 hover:text-emerald-800"><i class="fa-solid fa-xmark"></i></button>
            </div>
        @endif

        @if(session('warning'))
            <div class="flex items-center gap-3 p-4 mb-4 rounded-xl bg-amber-50 border border-amber-200 text-amber-800 shadow-sm" x-data="{ show: true }" x-show="show">
                <i class="fa-solid fa-triangle-exclamation text-amber-600 text-lg"></i>
                <div class="text-sm font-medium flex-1">{{ session('warning') }}</div>
                <button @click="show = false" class="text-amber-500 hover:text-amber-800"><i class="fa-solid fa-xmark"></i></button>
            </div>
        @endif

        @if(session('error'))
            <div class="flex items-center gap-3 p-4 mb-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 shadow-sm" x-data="{ show: true }" x-show="show">
                <i class="fa-solid fa-circle-xmark text-rose-600 text-lg"></i>
                <div class="text-sm font-medium flex-1">{{ session('error') }}</div>
                <button @click="show = false" class="text-rose-500 hover:text-rose-800"><i class="fa-solid fa-xmark"></i></button>
            </div>
        @endif

        @if(session('info'))
            <div class="flex items-center gap-3 p-4 mb-4 rounded-xl bg-brand-50 border border-brand-200 text-brand-800 shadow-sm" x-data="{ show: true }" x-show="show">
                <i class="fa-solid fa-circle-info text-brand-600 text-lg"></i>
                <div class="text-sm font-medium flex-1">{{ session('info') }}</div>
                <button @click="show = false" class="text-brand-500 hover:text-brand-800"><i class="fa-solid fa-xmark"></i></button>
            </div>
        @endif
    </div>

    <!-- Main Content Area -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-brand-950 text-slate-300 pt-16 pb-10 border-t border-slate-800 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-slate-800">
                
                <!-- Col 1: Platform Info -->
                <div class="lg:col-span-2 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-brand-600 flex items-center justify-center text-white shadow-md">
                            <i class="fa-solid fa-trophy text-amber-300"></i>
                        </div>
                        <div>
                            <span class="text-2xl font-black tracking-tight text-white">Del<span class="text-brand-400">Olympic</span></span>
                        </div>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed max-w-sm">
                        Platform digital resmi pengelolaan dan pendaftaran kompetisi di Institut Teknologi Del. Menghubungkan penyelenggara lomba berprestasi dengan peserta dari seluruh nusantara secara transparan dan terintegrasi.
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <a href="#" class="w-9 h-9 rounded-lg bg-slate-900 border border-slate-800 hover:border-brand-500 flex items-center justify-center text-slate-400 hover:text-brand-400 transition">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-lg bg-slate-900 border border-slate-800 hover:border-brand-500 flex items-center justify-center text-slate-400 hover:text-brand-400 transition">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-lg bg-slate-900 border border-slate-800 hover:border-brand-500 flex items-center justify-center text-slate-400 hover:text-brand-400 transition">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-lg bg-slate-900 border border-slate-800 hover:border-brand-500 flex items-center justify-center text-slate-400 hover:text-brand-400 transition">
                            <i class="fa-brands fa-github"></i>
                        </a>
                    </div>
                </div>

                <!-- Col 2: Navigasi Cepat -->
                <div>
                    <h4 class="text-white text-sm font-semibold tracking-wider uppercase mb-4">Navigasi</h4>
                    <ul class="space-y-2.5 text-sm text-slate-400">
                        <li><a href="{{ route('home') }}" class="hover:text-brand-400 transition">Beranda</a></li>
                        <li><a href="{{ route('competitions.index') }}" class="hover:text-brand-400 transition">Jelajahi Lomba</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-brand-400 transition">Tentang DelOlympic</a></li>
                        <li><a href="{{ route('register') }}" class="hover:text-brand-400 transition">Daftar Penyelenggara</a></li>
                    </ul>
                </div>

                <!-- Col 3: Kategori Populer -->
                <div>
                    <h4 class="text-white text-sm font-semibold tracking-wider uppercase mb-4">Kategori Lomba</h4>
                    <ul class="space-y-2.5 text-sm text-slate-400">
                        <li><a href="{{ route('competitions.index', ['kategori' => 'tech']) }}" class="hover:text-brand-400 transition">Teknologi & Coding</a></li>
                        <li><a href="{{ route('competitions.index', ['kategori' => 'design']) }}" class="hover:text-brand-400 transition">Desain UI/UX</a></li>
                        <li><a href="{{ route('competitions.index', ['kategori' => 'cyber']) }}" class="hover:text-brand-400 transition">Keamanan Siber (CTF)</a></li>
                        <li><a href="{{ route('competitions.index', ['kategori' => 'esport']) }}" class="hover:text-brand-400 transition">E-Sport Turnamen</a></li>
                        <li><a href="{{ route('competitions.index', ['kategori' => 'robotik']) }}" class="hover:text-brand-400 transition">Robotika & IoT</a></li>
                    </ul>
                </div>

                <!-- Col 4: Kontak & Kampus -->
                <div>
                    <h4 class="text-white text-sm font-semibold tracking-wider uppercase mb-4">Kontak Kampus</h4>
                    <div class="space-y-3 text-sm text-slate-400">
                        <div class="flex items-start gap-2.5">
                            <i class="fa-solid fa-location-dot mt-1 text-brand-400"></i>
                            <span>Institut Teknologi Del, Jl. Sisingamangaraja, Sitoluama, Laguboti, Toba, Sumut 22381</span>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <i class="fa-solid fa-envelope text-brand-400"></i>
                            <span>delolympic@del.ac.id</span>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <i class="fa-solid fa-phone text-brand-400"></i>
                            <span>+62 632 331234</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom Copyright -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 gap-4">
                <p>&copy; {{ date('Y') }} DelOlympic – Institut Teknologi Del. Seluruh hak cipta dilindungi.</p>
                <div class="flex items-center gap-6">
                    <a href="#" class="hover:text-slate-400">Ketentuan Layanan</a>
                    <a href="#" class="hover:text-slate-400">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-slate-400">Pusat Bantuan</a>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
