<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') – DelOlympic</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Tailwind CSS CDN -->
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
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                            950: '#0f172a',
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
        .custom-scrollbar::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: #cbd5e1;
            border-radius: 9999px;
        }
    </style>
</head>
<body class="bg-slate-100 text-slate-800 antialiased font-sans flex min-h-screen" x-data="{ sidebarOpen: false }">

    @php
        $currentRole = session('current_role', 'peserta');
        if (request()->is('admin*')) $currentRole = 'admin';
        elseif (request()->is('penyelenggara*')) $currentRole = 'penyelenggara';
        elseif (request()->is('peserta*')) $currentRole = 'peserta';

        $roleColors = [
            'admin' => ['bg' => 'bg-amber-500', 'badge' => 'bg-amber-100 text-amber-800 border-amber-300', 'icon' => 'fa-shield-halved'],
            'penyelenggara' => ['bg' => 'bg-emerald-600', 'badge' => 'bg-emerald-100 text-emerald-800 border-emerald-300', 'icon' => 'fa-building-columns'],
            'peserta' => ['bg' => 'bg-brand-600', 'badge' => 'bg-brand-100 text-brand-800 border-brand-300', 'icon' => 'fa-graduation-cap'],
        ];
    @endphp

    <!-- Mobile Backdrop -->
    <div x-show="sidebarOpen" x-cloak @click="sidebarOpen = false" class="fixed inset-0 z-40 bg-slate-950/60 backdrop-blur-sm lg:hidden"></div>

    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-50 w-72 bg-brand-950 text-slate-300 flex flex-col transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-auto">
        
        <!-- Sidebar Brand Header -->
        <div class="h-20 flex items-center justify-between px-6 border-b border-slate-800">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-brand-500 to-brand-700 flex items-center justify-center text-white shadow-md shadow-brand-500/20">
                    <i class="fa-solid fa-trophy text-amber-300"></i>
                </div>
                <div>
                    <span class="text-xl font-black tracking-tight text-white">Del<span class="text-brand-400">Olympic</span></span>
                    <span class="block text-[10px] uppercase font-bold tracking-widest text-brand-300">Portal {{ ucfirst($currentRole) }}</span>
                </div>
            </a>
            <button @click="sidebarOpen = false" class="text-slate-400 hover:text-white lg:hidden">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>

        <!-- Role Indicator Pill -->
        <div class="px-6 py-4 border-b border-slate-800/80 bg-slate-900/50">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full {{ $currentRole === 'admin' ? 'bg-amber-400' : ($currentRole === 'penyelenggara' ? 'bg-emerald-400' : 'bg-brand-400') }} animate-pulse"></span>
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-200">Mode {{ ucfirst($currentRole) }}</span>
                </div>
                <div class="text-[11px] text-slate-400">
                    Online
                </div>
            </div>
        </div>

        <!-- Navigation Links Menu -->
        <div class="flex-1 overflow-y-auto custom-scrollbar px-4 py-4 space-y-1">

            @if($currentRole === 'admin')
                <!-- ADMIN MENU -->
                <div class="px-3 pb-2 text-[11px] font-bold uppercase tracking-wider text-slate-500">Menu Utama</div>
                
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.dashboard') ? 'bg-brand-600 text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    <i class="fa-solid fa-gauge-high w-5 text-center text-amber-400"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.organizers') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.organizers') ? 'bg-brand-600 text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    <i class="fa-solid fa-building-columns w-5 text-center text-emerald-400"></i>
                    <span>Data Penyelenggara</span>
                </a>

                <a href="{{ route('admin.verify-accounts') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.verify-accounts*') ? 'bg-brand-600 text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-user-check w-5 text-center text-sky-400"></i>
                        <span>Verifikasi Akun</span>
                    </div>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500 text-slate-950">2 Baru</span>
                </a>

                <a href="{{ route('admin.submissions') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.submissions*') ? 'bg-brand-600 text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-file-circle-check w-5 text-center text-indigo-400"></i>
                        <span>Pengajuan Lomba</span>
                    </div>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-brand-500 text-white">2 Baru</span>
                </a>

                <a href="{{ route('admin.competitions') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.competitions') ? 'bg-brand-600 text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    <i class="fa-solid fa-trophy w-5 text-center text-amber-300"></i>
                    <span>Data Lomba</span>
                </a>

                <a href="{{ route('admin.participants') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.participants') ? 'bg-brand-600 text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    <i class="fa-solid fa-users w-5 text-center text-teal-400"></i>
                    <span>Data Peserta</span>
                </a>

                <div class="pt-4 px-3 pb-2 text-[11px] font-bold uppercase tracking-wider text-slate-500">Sistem</div>

                <a href="{{ route('admin.activities') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.activities') ? 'bg-brand-600 text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    <i class="fa-solid fa-clock-rotate-left w-5 text-center text-slate-400"></i>
                    <span>Aktivitas Sistem</span>
                </a>

                <a href="{{ route('admin.settings') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.settings') ? 'bg-brand-600 text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    <i class="fa-solid fa-gear w-5 text-center text-slate-400"></i>
                    <span>Pengaturan</span>
                </a>

            @elseif($currentRole === 'penyelenggara')
                <!-- PENYELENGGARA MENU -->
                <div class="px-3 pb-2 text-[11px] font-bold uppercase tracking-wider text-slate-500">Manajemen Lomba</div>

                <a href="{{ route('penyelenggara.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('penyelenggara.dashboard') ? 'bg-emerald-600 text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    <i class="fa-solid fa-gauge-high w-5 text-center text-emerald-400"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('penyelenggara.profile') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('penyelenggara.profile') ? 'bg-emerald-600 text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    <i class="fa-solid fa-id-card w-5 text-center text-sky-400"></i>
                    <span>Profil Organisasi</span>
                </a>

                <a href="{{ route('penyelenggara.submission.create') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('penyelenggara.submission.create') ? 'bg-emerald-600 text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    <i class="fa-solid fa-plus-circle w-5 text-center text-amber-400"></i>
                    <span>Pengajuan Lomba</span>
                </a>

                <a href="{{ route('penyelenggara.status-pengajuan') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('penyelenggara.status-pengajuan*') ? 'bg-emerald-600 text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    <i class="fa-solid fa-list-check w-5 text-center text-teal-400"></i>
                    <span>Status Pengajuan</span>
                </a>

                <a href="{{ route('penyelenggara.competitions') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('penyelenggara.competitions') ? 'bg-emerald-600 text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    <i class="fa-solid fa-trophy w-5 text-center text-amber-300"></i>
                    <span>Kelola Lomba</span>
                </a>

                <a href="{{ route('penyelenggara.branches') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('penyelenggara.branches') ? 'bg-emerald-600 text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    <i class="fa-solid fa-diagram-project w-5 text-center text-indigo-400"></i>
                    <span>Cabang Lomba</span>
                </a>

                <div class="pt-4 px-3 pb-2 text-[11px] font-bold uppercase tracking-wider text-slate-500">Peserta & Tanding</div>

                <a href="{{ route('penyelenggara.registrations') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('penyelenggara.registrations') ? 'bg-emerald-600 text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    <i class="fa-solid fa-clipboard-list w-5 text-center text-blue-400"></i>
                    <span>Pendaftaran Peserta</span>
                </a>

                <a href="{{ route('penyelenggara.verify-participants') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('penyelenggara.verify-participants*') ? 'bg-emerald-600 text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-user-check w-5 text-center text-emerald-400"></i>
                        <span>Verifikasi Peserta</span>
                    </div>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500 text-slate-950">2 Baru</span>
                </a>

                <a href="{{ route('penyelenggara.schedules') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('penyelenggara.schedules') ? 'bg-emerald-600 text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    <i class="fa-solid fa-calendar-days w-5 text-center text-rose-400"></i>
                    <span>Jadwal Pertandingan</span>
                </a>

                <a href="{{ route('penyelenggara.results') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('penyelenggara.results') ? 'bg-emerald-600 text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    <i class="fa-solid fa-square-poll-vertical w-5 text-center text-purple-400"></i>
                    <span>Hasil & Bracket/Klasemen</span>
                </a>

                <a href="{{ route('penyelenggara.settings') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('penyelenggara.settings') ? 'bg-emerald-600 text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    <i class="fa-solid fa-gear w-5 text-center text-slate-400"></i>
                    <span>Pengaturan</span>
                </a>

            @else
                <!-- PESERTA MENU -->
                <div class="px-3 pb-2 text-[11px] font-bold uppercase tracking-wider text-slate-500">Menu Peserta</div>

                <a href="{{ route('peserta.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('peserta.dashboard') ? 'bg-brand-600 text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    <i class="fa-solid fa-gauge-high w-5 text-center text-brand-400"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('peserta.competitions') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('peserta.competitions') ? 'bg-brand-600 text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    <i class="fa-solid fa-compass w-5 text-center text-sky-400"></i>
                    <span>Jelajahi Lomba</span>
                </a>

                <a href="{{ route('peserta.pendaftaran') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('peserta.pendaftaran') ? 'bg-brand-600 text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-id-card-clip w-5 text-center text-emerald-400"></i>
                        <span>Pendaftaran Saya</span>
                    </div>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-brand-500 text-white">2 Lomba</span>
                </a>

                <a href="{{ route('peserta.schedules') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('peserta.schedules') ? 'bg-brand-600 text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    <i class="fa-solid fa-calendar-days w-5 text-center text-amber-400"></i>
                    <span>Jadwal Pertandingan</span>
                </a>

                <a href="{{ route('peserta.results') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('peserta.results') ? 'bg-brand-600 text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    <i class="fa-solid fa-ranking-star w-5 text-center text-purple-400"></i>
                    <span>Hasil & Bracket / Juara</span>
                </a>

                <a href="{{ route('peserta.profile') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('peserta.profile') ? 'bg-brand-600 text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/70' }}">
                    <i class="fa-solid fa-user-gear w-5 text-center text-teal-400"></i>
                    <span>Profil Saya</span>
                </a>
            @endif

        </div>

        <!-- Sidebar Bottom User Profile Card -->
        <div class="p-4 border-t border-slate-800 bg-slate-900/60">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-slate-800 border border-slate-700 flex items-center justify-center font-bold text-white shadow-sm">
                    @if($currentRole === 'admin')
                        <i class="fa-solid fa-user-shield text-amber-400"></i>
                    @elseif($currentRole === 'penyelenggara')
                        <i class="fa-solid fa-building text-emerald-400"></i>
                    @else
                        <i class="fa-solid fa-user-graduate text-brand-400"></i>
                    @endif
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-white truncate">
                        {{ session('user_name', ($currentRole === 'admin' ? 'Admin Utama' : ($currentRole === 'penyelenggara' ? 'HIMATIF IT Del' : 'Bona Ventura P.'))) }}
                    </p>
                    <p class="text-xs text-slate-400 truncate">
                        {{ session('user_email', ($currentRole === 'admin' ? 'admin@del.ac.id' : ($currentRole === 'penyelenggara' ? 'himatif@del.ac.id' : 'bona.panjaitan@del.ac.id'))) }}
                    </p>
                </div>
                <a href="{{ route('logout') }}" class="text-slate-400 hover:text-rose-400 p-1" title="Keluar">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </a>
            </div>
        </div>
    </aside>

    <!-- Main Content Container -->
    <div class="flex-1 flex flex-col min-w-0">

        <!-- Top Header Bar -->
        <header class="h-20 bg-white border-b border-slate-200/90 px-4 sm:px-6 lg:px-8 flex items-center justify-between sticky top-0 z-30 shadow-xs">
            
            <!-- Left Header: Mobile Toggle & Page Title -->
            <div class="flex items-center gap-4">
                <button @click="sidebarOpen = true" class="p-2 rounded-xl text-slate-600 hover:bg-slate-100 lg:hidden">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
                <div>
                    <h1 class="text-xl sm:text-2xl font-bold tracking-tight text-slate-900 leading-tight">
                        @yield('header_title', 'Dashboard')
                    </h1>
                    <p class="text-xs text-slate-500 hidden sm:block">
                        @yield('header_subtitle', 'Selamat datang di sistem manajemen DelOlympic')
                    </p>
                </div>
            </div>

            <!-- Right Header: Quick Role Switcher Toolbar & Actions -->
            <div class="flex items-center gap-3">
                
                <!-- Quick Role Switch Dropdown / Pill -->
                <div class="hidden md:flex items-center bg-slate-100 p-1 rounded-xl border border-slate-200 text-xs font-semibold">
                    <span class="px-2 text-slate-400 text-[11px]">Ganti Role:</span>
                    <a href="{{ route('switch.role', 'admin') }}" class="px-2.5 py-1 rounded-lg transition {{ $currentRole === 'admin' ? 'bg-white text-slate-900 shadow-xs font-bold' : 'text-slate-600 hover:text-slate-900' }}">
                        Admin
                    </a>
                    <a href="{{ route('switch.role', 'penyelenggara') }}" class="px-2.5 py-1 rounded-lg transition {{ $currentRole === 'penyelenggara' ? 'bg-white text-slate-900 shadow-xs font-bold' : 'text-slate-600 hover:text-slate-900' }}">
                        Penyelenggara
                    </a>
                    <a href="{{ route('switch.role', 'peserta') }}" class="px-2.5 py-1 rounded-lg transition {{ $currentRole === 'peserta' ? 'bg-white text-slate-900 shadow-xs font-bold' : 'text-slate-600 hover:text-slate-900' }}">
                        Peserta
                    </a>
                </div>

                <!-- Back to Landing Page Link -->
                <a href="{{ route('home') }}" class="hidden sm:inline-flex items-center gap-1.5 px-3 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:text-brand-600 hover:bg-slate-100 transition border border-slate-200">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    <span>Lihat Web</span>
                </a>

                <!-- Notification Bell -->
                <div class="relative" x-data="{ notifOpen: false }">
                    <button @click="notifOpen = !notifOpen" class="w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200 flex items-center justify-center text-slate-600 relative transition">
                        <i class="fa-regular fa-bell text-base"></i>
                        <span class="absolute top-2 right-2 w-2 h-2 rounded-full bg-rose-500"></span>
                    </button>

                    <!-- Notifications Dropdown -->
                    <div x-show="notifOpen" x-cloak @click.away="notifOpen = false" class="absolute right-0 mt-2 w-80 sm:w-96 bg-white rounded-2xl shadow-xl border border-slate-200 py-3 z-50">
                        <div class="px-4 pb-2 border-b border-slate-100 flex items-center justify-between">
                            <span class="font-bold text-sm text-slate-900">Notifikasi</span>
                            <span class="text-[11px] font-semibold text-brand-600 hover:underline cursor-pointer">Tandai Dibaca</span>
                        </div>
                        <div class="divide-y divide-slate-100 max-h-72 overflow-y-auto">
                            <div class="p-3 hover:bg-slate-50 transition flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i class="fa-solid fa-check text-xs"></i>
                                </div>
                                <div class="text-xs">
                                    <p class="font-semibold text-slate-800">Akun Penyelenggara Disetujui</p>
                                    <p class="text-slate-500 text-[11px]">HIMATIF IT Del telah diverifikasi oleh Admin Utama.</p>
                                    <span class="text-[10px] text-slate-400">10 menit yang lalu</span>
                                </div>
                            </div>
                            <div class="p-3 hover:bg-slate-50 transition flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-brand-100 text-brand-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i class="fa-solid fa-calendar text-xs"></i>
                                </div>
                                <div class="text-xs">
                                    <p class="font-semibold text-slate-800">Jadwal Pertandingan Diperbarui</p>
                                    <p class="text-slate-500 text-[11px]">Babak semifinal Valorant telah dijadwalkan ulang.</p>
                                    <span class="text-[10px] text-slate-400">1 jam yang lalu</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Avatar Quick Profile Link -->
                <a href="{{ route($currentRole . '.' . ($currentRole === 'peserta' ? 'profile' : ($currentRole === 'penyelenggara' ? 'profile' : 'settings'))) }}" class="flex items-center gap-2 pl-2 border-l border-slate-200">
                    <div class="w-9 h-9 rounded-xl {{ $currentRole === 'admin' ? 'bg-amber-600' : ($currentRole === 'penyelenggara' ? 'bg-emerald-600' : 'bg-brand-600') }} text-white flex items-center justify-center text-xs font-bold shadow-sm">
                        {{ strtoupper(substr(session('user_name', $currentRole), 0, 2)) }}
                    </div>
                </a>

            </div>
        </header>

        <!-- Global Flash Alerts for Dashboard -->
        <div class="px-4 sm:px-6 lg:px-8 mt-6">
            @if(session('success'))
                <div class="flex items-center gap-3 p-4 mb-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 shadow-xs" x-data="{ show: true }" x-show="show">
                    <i class="fa-solid fa-circle-check text-emerald-600 text-lg"></i>
                    <div class="text-sm font-medium flex-1">{{ session('success') }}</div>
                    <button @click="show = false" class="text-emerald-500 hover:text-emerald-800"><i class="fa-solid fa-xmark"></i></button>
                </div>
            @endif

            @if(session('warning'))
                <div class="flex items-center gap-3 p-4 mb-4 rounded-xl bg-amber-50 border border-amber-200 text-amber-800 shadow-xs" x-data="{ show: true }" x-show="show">
                    <i class="fa-solid fa-triangle-exclamation text-amber-600 text-lg"></i>
                    <div class="text-sm font-medium flex-1">{{ session('warning') }}</div>
                    <button @click="show = false" class="text-amber-500 hover:text-amber-800"><i class="fa-solid fa-xmark"></i></button>
                </div>
            @endif

            @if(session('error'))
                <div class="flex items-center gap-3 p-4 mb-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 shadow-xs" x-data="{ show: true }" x-show="show">
                    <i class="fa-solid fa-circle-xmark text-rose-600 text-lg"></i>
                    <div class="text-sm font-medium flex-1">{{ session('error') }}</div>
                    <button @click="show = false" class="text-rose-500 hover:text-rose-800"><i class="fa-solid fa-xmark"></i></button>
                </div>
            @endif

            @if(session('info'))
                <div class="flex items-center gap-3 p-4 mb-4 rounded-xl bg-brand-50 border border-brand-200 text-brand-800 shadow-xs" x-data="{ show: true }" x-show="show">
                    <i class="fa-solid fa-circle-info text-brand-600 text-lg"></i>
                    <div class="text-sm font-medium flex-1">{{ session('info') }}</div>
                    <button @click="show = false" class="text-brand-500 hover:text-brand-800"><i class="fa-solid fa-xmark"></i></button>
                </div>
            @endif
        </div>

        <!-- Dashboard Body Content -->
        <main class="flex-1 px-4 sm:px-6 lg:px-8 py-6">
            @yield('content')
        </main>

        <!-- Dashboard Footer -->
        <footer class="bg-white border-t border-slate-200/90 py-4 px-6 text-center sm:text-left sm:flex sm:justify-between text-xs text-slate-500">
            <span>DelOlympic &copy; {{ date('Y') }} Institut Teknologi Del. Semua Hak Dilindungi.</span>
            <span class="mt-2 sm:mt-0">Versi 1.0.0 – Mode Tampilan & Alur</span>
        </footer>

    </div>

    @stack('scripts')
</body>
</html>
