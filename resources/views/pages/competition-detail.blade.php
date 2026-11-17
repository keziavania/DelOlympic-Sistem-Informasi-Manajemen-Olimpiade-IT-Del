@extends('layouts.app')

@section('title', $competition['title'] . ' – DelOlympic')

@section('content')
<!-- Detail Banner Header -->
<div class="bg-gradient-to-b from-brand-950 via-brand-900 to-slate-900 text-white pt-10 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-xs text-slate-400 mb-6">
            <a href="{{ route('home') }}" class="hover:text-white">Beranda</a>
            <i class="fa-solid fa-chevron-right text-[10px]"></i>
            <a href="{{ route('competitions.index') }}" class="hover:text-white">Daftar Lomba</a>
            <i class="fa-solid fa-chevron-right text-[10px]"></i>
            <span class="text-slate-200 truncate">{{ $competition['title'] }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Poster Showcase -->
            <div class="lg:col-span-5">
                <div class="rounded-2xl overflow-hidden shadow-2xl border border-slate-700/80 bg-slate-950">
                    <img src="{{ $competition['poster'] }}" alt="{{ $competition['title'] }}" class="w-full h-80 object-cover">
                </div>
            </div>

            <!-- Header Info & CTA -->
            <div class="lg:col-span-7 space-y-4">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-brand-500/20 text-brand-300 border border-brand-500/30">
                        {{ $competition['category'] }}
                    </span>
                    <span class="px-3 py-1 rounded-full text-xs font-bold {{ $competition['status_pendaftaran'] === 'Dibuka' ? 'bg-emerald-500/20 text-emerald-300 border border-emerald-500/30' : 'bg-amber-500/20 text-amber-300 border border-amber-500/30' }}">
                        Status: {{ $competition['status_pendaftaran'] }}
                    </span>
                </div>

                <h1 class="text-2xl sm:text-4xl font-extrabold tracking-tight leading-tight">
                    {{ $competition['title'] }}
                </h1>

                <!-- Organizer Row -->
                <div class="flex items-center gap-3 pt-2">
                    <img src="{{ $competition['organizer_avatar'] }}" alt="{{ $competition['organizer'] }}" class="w-10 h-10 rounded-xl object-cover border border-slate-700">
                    <div>
                        <p class="text-xs text-slate-400 font-medium">Diselenggarakan oleh:</p>
                        <p class="text-sm font-bold text-white">{{ $competition['organizer'] }}</p>
                    </div>
                </div>

                <!-- Meta Strip -->
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 pt-4">
                    <div class="bg-slate-800/80 p-3 rounded-xl border border-slate-700">
                        <span class="block text-[11px] text-slate-400">Total Hadiah</span>
                        <span class="text-sm font-bold text-amber-300">{{ $competition['prize_pool'] }}</span>
                    </div>
                    <div class="bg-slate-800/80 p-3 rounded-xl border border-slate-700">
                        <span class="block text-[11px] text-slate-400">Batas Registrasi</span>
                        <span class="text-sm font-bold text-white">{{ $competition['reg_end'] }}</span>
                    </div>
                    <div class="bg-slate-800/80 p-3 rounded-xl border border-slate-700 col-span-2 sm:col-span-1">
                        <span class="block text-[11px] text-slate-400">Kuota Terisi</span>
                        <span class="text-sm font-bold text-sky-300">{{ $competition['participants_count'] }} / {{ $competition['max_quota'] }} Tim</span>
                    </div>
                </div>

                <!-- Action Button -->
                <div class="pt-4 flex flex-wrap gap-4">
                    <a href="{{ route('competitions.register', $competition['id']) }}" class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-xl text-sm font-bold text-slate-950 bg-sky-400 hover:bg-sky-300 shadow-lg shadow-sky-500/20 transition">
                        <i class="fa-solid fa-file-pen"></i>
                        <span>Daftar Sekarang</span>
                    </a>
                    <a href="#cabang" class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl text-sm font-semibold text-white bg-slate-800 hover:bg-slate-700 border border-slate-700 transition">
                        <i class="fa-solid fa-list-check"></i>
                        <span>Lihat Cabang Lomba</span>
                    </a>
                </div>

            </div>

        </div>

    </div>
</div>

<!-- Detailed Tabs & Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Main Column -->
        <div class="lg:col-span-8 space-y-8">
            
            <!-- Deskripsi Lengkap -->
            <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200/90 shadow-sm">
                <h3 class="text-lg font-bold text-slate-900 mb-4 pb-3 border-b border-slate-100 flex items-center gap-2">
                    <i class="fa-solid fa-circle-info text-brand-600"></i>
                    <span>Deskripsi Kompetisi</span>
                </h3>
                <p class="text-slate-600 text-sm leading-relaxed whitespace-pre-line">
                    {{ $competition['description'] }}
                </p>
            </div>

            <!-- Cabang Lomba -->
            <div id="cabang" class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200/90 shadow-sm">
                <h3 class="text-lg font-bold text-slate-900 mb-4 pb-3 border-b border-slate-100 flex items-center gap-2">
                    <i class="fa-solid fa-diagram-project text-brand-600"></i>
                    <span>Cabang Lomba yang Dibuka</span>
                </h3>

                <div class="space-y-4">
                    @foreach($competition['branches'] as $branch)
                        <div class="p-5 rounded-xl border border-slate-200 bg-slate-50/50 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:border-brand-300 transition">
                            <div class="space-y-1">
                                <h4 class="font-bold text-slate-900 text-base">{{ $branch['name'] }}</h4>
                                <div class="flex flex-wrap items-center gap-3 text-xs text-slate-500">
                                    <span><i class="fa-solid fa-users mr-1"></i> Kuota: <strong>{{ $branch['registered'] }}/{{ $branch['quota'] }}</strong></span>
                                    <span>•</span>
                                    <span><i class="fa-solid fa-trophy mr-1"></i> Format: <strong>{{ $branch['type'] }}</strong></span>
                                    <span>•</span>
                                    <span class="text-emerald-600 font-bold"><i class="fa-solid fa-ticket mr-1"></i> {{ $branch['fee'] }}</span>
                                </div>
                            </div>
                            <a href="{{ route('competitions.register', ['id' => $competition['id'], 'cabang' => $branch['id']]) }}" class="px-5 py-2.5 rounded-xl text-xs font-bold text-white bg-brand-600 hover:bg-brand-700 text-center transition shrink-0 shadow-sm">
                                Pilih Cabang Ini
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Persyaratan & Aturan Pertandingan -->
            <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200/90 shadow-sm">
                <h3 class="text-lg font-bold text-slate-900 mb-4 pb-3 border-b border-slate-100 flex items-center gap-2">
                    <i class="fa-solid fa-clipboard-check text-brand-600"></i>
                    <span>Persyaratan & Peraturan Lomba</span>
                </h3>
                <ul class="space-y-3">
                    @foreach($competition['rules'] as $rule)
                        <li class="flex items-start gap-3 text-sm text-slate-600">
                            <i class="fa-solid fa-check text-emerald-500 mt-1"></i>
                            <span>{{ $rule }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>

        <!-- Sidebar Meta Column -->
        <div class="lg:col-span-4 space-y-6">
            
            <!-- Card Timeline & Lokasi -->
            <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-sm space-y-4">
                <h3 class="text-sm font-bold uppercase tracking-wider text-slate-900 border-b border-slate-100 pb-3">
                    Informasi Pelaksanaan
                </h3>

                <div class="space-y-3.5 text-xs">
                    <div>
                        <span class="text-slate-400 block mb-0.5">Periode Pendaftaran:</span>
                        <div class="flex items-center gap-2 font-semibold text-slate-800">
                            <i class="fa-regular fa-clock text-brand-600"></i>
                            <span>{{ $competition['reg_start'] }} – {{ $competition['reg_end'] }}</span>
                        </div>
                    </div>

                    <div>
                        <span class="text-slate-400 block mb-0.5">Waktu Pertandingan:</span>
                        <div class="flex items-center gap-2 font-semibold text-slate-800">
                            <i class="fa-regular fa-calendar text-brand-600"></i>
                            <span>{{ $competition['event_date'] }}</span>
                        </div>
                    </div>

                    <div>
                        <span class="text-slate-400 block mb-0.5">Lokasi / Venue:</span>
                        <div class="flex items-start gap-2 font-semibold text-slate-800">
                            <i class="fa-solid fa-location-dot text-rose-500 mt-0.5"></i>
                            <span>{{ $competition['location'] }}</span>
                        </div>
                    </div>
                </div>

                <hr class="border-slate-100">

                <a href="{{ route('competitions.register', $competition['id']) }}" class="w-full block py-3 rounded-xl font-bold text-center text-sm text-white bg-brand-600 hover:bg-brand-700 shadow-md shadow-brand-500/20 transition">
                    Daftar Sekarang
                </a>
            </div>

            <!-- Card Kontak Penyelenggara -->
            <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-sm space-y-3">
                <h3 class="text-sm font-bold uppercase tracking-wider text-slate-900 border-b border-slate-100 pb-3">
                    Kontak Penyelenggara
                </h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    {{ $competition['contact'] }}
                </p>
                <div class="pt-2">
                    <a href="mailto:himatif@del.ac.id" class="w-full inline-flex items-center justify-center gap-2 py-2 px-3 rounded-lg text-xs font-semibold text-brand-700 bg-brand-50 hover:bg-brand-100 border border-brand-200 transition">
                        <i class="fa-solid fa-envelope"></i>
                        <span>Hubungi via Email</span>
                    </a>
                </div>
            </div>

            <!-- Rulebook Mock Download -->
            <div class="bg-slate-900 text-white rounded-2xl p-6 shadow-sm space-y-3">
                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-file-pdf text-2xl text-rose-400"></i>
                    <div>
                        <h4 class="font-bold text-sm">Buku Panduan (Rulebook)</h4>
                        <span class="text-[11px] text-slate-400">PDF • 2.4 MB</span>
                    </div>
                </div>
                <button type="button" onclick="alert('File Guidebook Del Olympic berhasil diunduh.')" class="w-full py-2.5 rounded-xl text-xs font-bold bg-white/10 hover:bg-white/20 border border-white/20 transition">
                    <i class="fa-solid fa-download mr-1.5"></i> Unduh Guidebook
                </button>
            </div>

        </div>

    </div>
</div>
@endsection
