@extends('layouts.app')

@section('title', 'Beranda – Platform Kompetisi DelOlympic IT Del')

@section('content')
    <!-- HERO SECTION -->
    <section class="relative overflow-hidden bg-gradient-to-b from-brand-950 via-brand-900 to-slate-900 text-white pt-16 pb-24 lg:pt-24 lg:pb-32">
        <!-- Background Glow & Decorative Elements -->
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-brand-500/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute top-1/2 -left-40 w-96 h-96 bg-sky-500/15 rounded-full blur-3xl pointer-events-none"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Hero Text & CTA -->
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-brand-500/15 border border-brand-400/30 text-brand-300 text-xs font-semibold backdrop-blur-md">
                        <i class="fa-solid fa-sparkles text-amber-300"></i>
                        <span>Platform Resmi Manajemen Kompetisi Institut Teknologi Del</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight sm:leading-tight">
                        Temukan Kompetisi, <br class="hidden sm:inline">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 via-blue-300 to-amber-200">
                            Tunjukkan Prestasimu.
                        </span>
                    </h1>

                    <p class="text-slate-300 text-base sm:text-lg max-w-2xl leading-relaxed mx-auto lg:mx-0">
                        DelOlympic adalah wadah terpadu untuk mengeksplorasi perlombaan, mendaftarkan tim, memantau jadwal pertandingan secara real-time, hingga melihat klasemen dan perolehan juara dalam satu ekosistem digital modern.
                    </p>

                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                        <a href="{{ route('competitions.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-8 py-4 rounded-xl text-base font-bold text-slate-950 bg-gradient-to-r from-sky-400 to-brand-400 hover:from-sky-300 hover:to-brand-300 shadow-lg shadow-sky-500/25 transition-all duration-200 hover:-translate-y-0.5">
                            <span>Jelajahi Lomba</span>
                            <i class="fa-solid fa-compass text-sm"></i>
                        </a>
                        <a href="{{ route('register') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-7 py-4 rounded-xl text-base font-semibold text-white bg-slate-800/80 hover:bg-slate-800 border border-slate-700 transition">
                            <i class="fa-solid fa-building-columns text-slate-400"></i>
                            <span>Daftar Penyelenggara</span>
                        </a>
                    </div>

                    <!-- Trust Badges -->
                    <div class="pt-6 flex flex-wrap items-center justify-center lg:justify-start gap-6 text-xs text-slate-400 border-t border-slate-800/80">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-circle-check text-emerald-400"></i>
                            <span>Verifikasi Penyelenggara Resmi</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-circle-check text-emerald-400"></i>
                            <span>Bracket & Jadwal Otomatis</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-circle-check text-emerald-400"></i>
                            <span>Sertifikat & Hadiah Terjamin</span>
                        </div>
                    </div>
                </div>

                <!-- Hero Graphic / Interactive Card Preview -->
                <div class="lg:col-span-5 relative">
                    <div class="relative mx-auto max-w-md lg:max-w-none">
                        
                        <!-- Floating Highlight Card -->
                        <div class="bg-slate-900/90 border border-slate-700/80 rounded-2xl p-6 shadow-2xl backdrop-blur-xl relative">
                            
                            <!-- Card Header -->
                            <div class="flex items-center justify-between pb-4 border-b border-slate-800">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-brand-500 to-indigo-600 flex items-center justify-center text-white">
                                        <i class="fa-solid fa-code"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-white text-sm">Del Programming Contest</h3>
                                        <p class="text-[11px] text-slate-400">HIMATIF IT Del</p>
                                    </div>
                                </div>
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">
                                    Pendaftaran Dibuka
                                </span>
                            </div>

                            <!-- Live Bracket / Match Preview Box -->
                            <div class="my-5 p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-3">
                                <div class="flex items-center justify-between text-[11px] text-slate-400 font-semibold uppercase tracking-wider">
                                    <span>Live Matchmaking</span>
                                    <span class="text-sky-400"><i class="fa-solid fa-bolt mr-1"></i> Grand Final</span>
                                </div>
                                <div class="flex items-center justify-between bg-slate-900 p-2.5 rounded-lg border border-slate-800">
                                    <div class="flex items-center gap-2">
                                        <div class="w-6 h-6 rounded bg-brand-600 flex items-center justify-center text-xs font-bold text-white">1</div>
                                        <span class="text-xs font-semibold text-slate-200">Horas Coder (IT Del)</span>
                                    </div>
                                    <span class="text-xs font-bold text-amber-300">8 Soal</span>
                                </div>
                                <div class="flex items-center justify-between bg-slate-900 p-2.5 rounded-lg border border-slate-800">
                                    <div class="flex items-center gap-2">
                                        <div class="w-6 h-6 rounded bg-indigo-600 flex items-center justify-center text-xs font-bold text-white">2</div>
                                        <span class="text-xs font-semibold text-slate-200">Gadjah Algo (UGM)</span>
                                    </div>
                                    <span class="text-xs font-bold text-slate-400">8 Soal</span>
                                </div>
                            </div>

                            <!-- Quick Stats Grid Inside Card -->
                            <div class="grid grid-cols-3 gap-2 text-center text-xs pt-1">
                                <div class="p-2.5 rounded-xl bg-slate-800/60 border border-slate-800">
                                    <span class="block text-slate-400 text-[10px]">Total Hadiah</span>
                                    <span class="font-bold text-amber-300">Rp 15 Juta</span>
                                </div>
                                <div class="p-2.5 rounded-xl bg-slate-800/60 border border-slate-800">
                                    <span class="block text-slate-400 text-[10px]">Peserta</span>
                                    <span class="font-bold text-sky-300">78 Tim</span>
                                </div>
                                <div class="p-2.5 rounded-xl bg-slate-800/60 border border-slate-800">
                                    <span class="block text-slate-400 text-[10px]">Format</span>
                                    <span class="font-bold text-emerald-300">ICPC Style</span>
                                </div>
                            </div>
                        </div>

                        <!-- Floating Stat Badge Top Left -->
                        <div class="absolute -top-5 -left-5 bg-white text-slate-900 rounded-xl p-3 shadow-xl border border-slate-100 flex items-center gap-3 hidden sm:flex">
                            <div class="w-9 h-9 rounded-lg bg-brand-100 text-brand-600 flex items-center justify-center font-bold">
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-900 leading-none">340+ Peserta</p>
                                <p class="text-[10px] text-slate-500 font-medium">Aktif Berkompetisi</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- STATS COUNTER BAR -->
    <section class="relative -mt-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-20">
        <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-200/80 p-6 sm:p-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 divide-y lg:divide-y-0 lg:divide-x divide-slate-100">
                
                <div class="text-center pt-4 lg:pt-0">
                    <div class="text-3xl sm:text-4xl font-extrabold text-brand-950">{{ $stats['total_lomba'] }}+</div>
                    <p class="text-xs sm:text-sm font-semibold text-slate-500 mt-1">Kompetisi Terselenggara</p>
                </div>

                <div class="text-center pt-4 lg:pt-0">
                    <div class="text-3xl sm:text-4xl font-extrabold text-brand-600">{{ $stats['total_penyelenggara'] }}</div>
                    <p class="text-xs sm:text-sm font-semibold text-slate-500 mt-1">Organisasi Penyelenggara</p>
                </div>

                <div class="text-center pt-4 lg:pt-0">
                    <div class="text-3xl sm:text-4xl font-extrabold text-emerald-600">{{ $stats['total_peserta'] }}+</div>
                    <p class="text-xs sm:text-sm font-semibold text-slate-500 mt-1">Peserta Terdaftar</p>
                </div>

                <div class="text-center pt-4 lg:pt-0">
                    <div class="text-3xl sm:text-4xl font-extrabold text-amber-500">Rp 45M+</div>
                    <p class="text-xs sm:text-sm font-semibold text-slate-500 mt-1">Total Prize Pool</p>
                </div>

            </div>
        </div>
    </section>

    <!-- FEATURED COMPETITIONS SECTION -->
    <section class="py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <span class="text-xs font-bold uppercase tracking-widest text-brand-600">Pilihan Terbaik</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-1">Kompetisi Unggulan</h2>
                <p class="text-slate-500 text-sm sm:text-base mt-2">Daftarkan dirimu dan tim pada perlombaan paling bergengsi bulan ini.</p>
            </div>
            <a href="{{ route('competitions.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-brand-600 hover:text-brand-700 group">
                <span>Lihat Semua Lomba</span>
                <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>

        <!-- Competitions Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredCompetitions as $item)
                <div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-200 flex flex-col overflow-hidden group">
                    
                    <!-- Poster Image with Badge -->
                    <div class="relative h-48 overflow-hidden bg-slate-900">
                        <img src="{{ $item['poster'] }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>
                        
                        <!-- Category Badge Top Left -->
                        <span class="absolute top-3 left-3 px-3 py-1 rounded-lg text-xs font-bold bg-white/95 text-brand-900 shadow-sm backdrop-blur-md">
                            {{ $item['category'] }}
                        </span>

                        <!-- Status Badge Top Right -->
                        <span class="absolute top-3 right-3 px-3 py-1 rounded-lg text-xs font-bold {{ $item['status_pendaftaran'] === 'Dibuka' ? 'bg-emerald-500 text-white' : 'bg-amber-500 text-white' }} shadow-sm">
                            {{ $item['status_pendaftaran'] }}
                        </span>

                        <!-- Prize Pool Bottom Left -->
                        <div class="absolute bottom-3 left-3 text-white">
                            <span class="text-[10px] uppercase font-semibold text-slate-300 block">Total Hadiah</span>
                            <span class="text-sm font-bold text-amber-300">{{ $item['prize_pool'] }}</span>
                        </div>
                    </div>

                    <!-- Card Content -->
                    <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            <!-- Organizer Info -->
                            <div class="flex items-center gap-2 text-xs text-slate-500 font-medium mb-2">
                                <i class="fa-solid fa-building-columns text-slate-400"></i>
                                <span class="truncate">{{ $item['organizer'] }}</span>
                            </div>

                            <h3 class="text-lg font-bold text-slate-900 line-clamp-2 group-hover:text-brand-600 transition">
                                <a href="{{ route('competitions.detail', $item['id']) }}">{{ $item['title'] }}</a>
                            </h3>

                            <p class="text-slate-500 text-xs mt-2 line-clamp-2 leading-relaxed">
                                {{ $item['description'] }}
                            </p>
                        </div>

                        <!-- Date & Location Meta -->
                        <div class="pt-4 border-t border-slate-100 space-y-2 text-xs text-slate-600">
                            <div class="flex items-center gap-2">
                                <i class="fa-regular fa-calendar-check text-brand-500 w-4 text-center"></i>
                                <span>Pelaksanaan: <strong>{{ $item['event_date'] }}</strong></span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-location-dot text-rose-500 w-4 text-center"></i>
                                <span class="truncate">{{ $item['location'] }}</span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="pt-2 flex items-center gap-3">
                            <a href="{{ route('competitions.detail', $item['id']) }}" class="flex-1 py-2.5 px-4 rounded-xl text-xs font-bold text-center text-brand-700 bg-brand-50 hover:bg-brand-100 transition border border-brand-200">
                                Detail Lomba
                            </a>
                            <a href="{{ route('competitions.register', $item['id']) }}" class="flex-1 py-2.5 px-4 rounded-xl text-xs font-bold text-center text-white bg-brand-600 hover:bg-brand-700 transition shadow-sm shadow-brand-500/20">
                                Daftar Sekarang
                            </a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </section>

    <!-- KATEGORI LOMBA SECTION -->
    <section class="py-16 bg-slate-100/70 border-y border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-bold uppercase tracking-widest text-brand-600">Eksplorasi Bidang</span>
                <h2 class="text-3xl font-extrabold text-slate-900 mt-1">Kategori Perlombaan</h2>
                <p class="text-slate-500 text-sm mt-2">Pilih cabang kompetisi sesuai minat, keahlian, dan bakat unggulanmu.</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @foreach($categories as $cat)
                    <a href="{{ route('competitions.index', ['kategori' => $cat['id']]) }}" class="bg-white p-5 rounded-2xl border border-slate-200/80 hover:border-brand-500 hover:shadow-lg transition text-center group">
                        <div class="w-12 h-12 rounded-xl bg-brand-50 group-hover:bg-brand-600 text-brand-600 group-hover:text-white flex items-center justify-center mx-auto text-xl transition-colors mb-3">
                            <i class="fa-solid {{ $cat['icon'] }}"></i>
                        </div>
                        <h4 class="text-xs sm:text-sm font-bold text-slate-900 group-hover:text-brand-600 transition">{{ $cat['name'] }}</h4>
                        <span class="text-[11px] text-slate-400 mt-1 block">{{ $cat['count'] }} Lomba</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CARA KERJA / FLOW SISTEM SECTION -->
    <section class="py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-xs font-bold uppercase tracking-widest text-brand-600">Alur Sederhana</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-1">Bagaimana DelOlympic Bekerja?</h2>
            <p class="text-slate-500 text-sm sm:text-base mt-2">Hanya dalam 4 langkah mudah untuk berpartisipasi dan meraih prestasi membanggakan.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 relative">
            
            <!-- Step 1 -->
            <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm relative text-center">
                <div class="w-14 h-14 rounded-2xl bg-brand-100 text-brand-700 flex items-center justify-center text-xl font-black mx-auto mb-4">
                    1
                </div>
                <h3 class="text-base font-bold text-slate-900 mb-2">Temukan Lomba</h3>
                <p class="text-slate-500 text-xs leading-relaxed">
                    Jelajahi berbagai cabang lomba mulai dari teknologi, desain, robotika hingga turnamen esports resmi.
                </p>
            </div>

            <!-- Step 2 -->
            <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm relative text-center">
                <div class="w-14 h-14 rounded-2xl bg-sky-100 text-sky-700 flex items-center justify-center text-xl font-black mx-auto mb-4">
                    2
                </div>
                <h3 class="text-base font-bold text-slate-900 mb-2">Daftar Kompetisi</h3>
                <p class="text-slate-500 text-xs leading-relaxed">
                    Lengkapi identitas tim atau individu dan unggah berkas persyaratan melalui formulir terintegrasi.
                </p>
            </div>

            <!-- Step 3 -->
            <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm relative text-center">
                <div class="w-14 h-14 rounded-2xl bg-indigo-100 text-indigo-700 flex items-center justify-center text-xl font-black mx-auto mb-4">
                    3
                </div>
                <h3 class="text-base font-bold text-slate-900 mb-2">Ikuti Pertandingan</h3>
                <p class="text-slate-500 text-xs leading-relaxed">
                    Pantau verifikasi berkas, jadwal tanding otomatis, dan lawan kompetisimu melalui bagan bracket interaktif.
                </p>
            </div>

            <!-- Step 4 -->
            <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm relative text-center">
                <div class="w-14 h-14 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-xl font-black mx-auto mb-4">
                    4
                </div>
                <h3 class="text-base font-bold text-slate-900 mb-2">Raih Prestasi</h3>
                <p class="text-slate-500 text-xs leading-relaxed">
                    Cek pembaruan skor live, raih posisi juara di klasemen, dan dapatkan sertifikat resmi serta total hadiah.
                </p>
            </div>

        </div>
    </section>

    <!-- TENTANG DELOLYMPIC & CTA BANNER -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20">
        <div class="bg-gradient-to-r from-brand-950 via-brand-900 to-brand-800 rounded-3xl p-8 sm:p-12 lg:p-16 text-white relative overflow-hidden shadow-2xl">
            <div class="absolute -right-20 -bottom-20 w-80 h-80 bg-brand-500/20 rounded-full blur-3xl pointer-events-none"></div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
                <div class="lg:col-span-8 space-y-4">
                    <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-white/10 text-brand-200">
                        Tentang Inisiatif DelOlympic
                    </span>
                    <h2 class="text-2xl sm:text-4xl font-extrabold tracking-tight">
                        Wujudkan Standar Kompetisi Kampus yang Transparan & Profesional
                    </h2>
                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                        DelOlympic dikembangkan untuk memfasilitasi organisasi kemahasiswaan IT Del dalam mengelola pendaftaran peserta, penyusunan bagan tanding bebas bentrok jadwal, dan input hasil skor secara transparan bagi publik.
                    </p>
                </div>
                <div class="lg:col-span-4 flex flex-col sm:flex-row lg:flex-col gap-3 justify-center">
                    <a href="{{ route('register') }}" class="py-3.5 px-6 rounded-xl text-center text-sm font-bold text-slate-950 bg-sky-400 hover:bg-sky-300 shadow-lg shadow-sky-500/20 transition">
                        Gabung Sebagai Peserta
                    </a>
                    <a href="{{ route('about') }}" class="py-3.5 px-6 rounded-xl text-center text-sm font-semibold text-white bg-white/10 hover:bg-white/20 border border-white/20 transition">
                        Pelajari Selengkapnya
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
