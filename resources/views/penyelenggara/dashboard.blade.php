@extends('layouts.dashboard')

@section('title', 'Dashboard Penyelenggara – DelOlympic')
@section('header_title', 'Dashboard Penyelenggara')
@section('header_subtitle', 'Kelola kompetisi, verifikasi berkas tim pendaftar, dan pantau jalannya turnamen.')

@section('content')
<div class="space-y-8">
    
    <!-- 4 Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        
        <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Lomba Dikelola</span>
                <div class="text-2xl font-black text-slate-900 mt-1">3 Lomba</div>
                <div class="text-[11px] text-emerald-600 font-semibold mt-1">
                    <i class="fa-solid fa-circle-check"></i> 2 Lomba Aktif Berjalan
                </div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-trophy"></i>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Total Tim Peserta</span>
                <div class="text-2xl font-black text-slate-900 mt-1">78 Tim</div>
                <div class="text-[11px] text-brand-600 font-semibold mt-1">
                    <i class="fa-solid fa-users"></i> Tersebar di 2 Cabang
                </div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-brand-100 text-brand-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-id-card-clip"></i>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Menunggu Verifikasi</span>
                <div class="text-2xl font-black text-amber-600 mt-1">{{ count($pendingRegistrations) }} Tim</div>
                <div class="text-[11px] text-amber-700 font-semibold mt-1">
                    Membutuhkan validasi berkas
                </div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-user-clock"></i>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Jadwal Terdekat</span>
                <div class="text-2xl font-black text-purple-600 mt-1">{{ count($matches) }} Match</div>
                <div class="text-[11px] text-purple-700 font-semibold mt-1">
                    Valorant & ICPC Final
                </div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-calendar-check"></i>
            </div>
        </div>

    </div>

    <!-- Quick CTA & Alert Banner -->
    <div class="bg-gradient-to-r from-emerald-900 to-slate-900 text-white rounded-2xl p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="space-y-1">
            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-emerald-500/30 text-emerald-300 border border-emerald-400/30">
                Organisasi Terverifikasi: HIMATIF Institut Teknologi Del
            </span>
            <h3 class="text-lg font-bold">Ingin Mengadakan Kompetisi Baru?</h3>
            <p class="text-xs text-slate-300">Ajukan proposal lomba baru untuk ditinjau oleh Administrator kampus.</p>
        </div>
        <a href="{{ route('penyelenggara.submission.create') }}" class="px-5 py-2.5 rounded-xl font-bold text-xs text-slate-950 bg-emerald-400 hover:bg-emerald-300 transition shrink-0 text-center">
            <i class="fa-solid fa-plus-circle mr-1.5"></i> Buat Pengajuan Lomba
        </a>
    </div>

    <!-- 2 Column Section: Pendaftaran Menunggu Verifikasi & Jadwal Terdekat -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        
        <!-- Pendaftaran Menunggu Verifikasi -->
        <div class="lg:col-span-7 bg-white rounded-2xl p-6 border border-slate-200/90 shadow-xs space-y-4">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                    <h3 class="font-bold text-sm text-slate-900">Pendaftaran Peserta Masuk</h3>
                </div>
                <a href="{{ route('penyelenggara.verify-participants') }}" class="text-xs font-semibold text-brand-600 hover:underline">
                    Periksa Semua
                </a>
            </div>

            <div class="divide-y divide-slate-100">
                @foreach($pendingRegistrations as $reg)
                    <div class="py-3 flex flex-col sm:flex-row sm:items-center justify-between gap-3 text-xs">
                        <div>
                            <h4 class="font-bold text-slate-900">{{ $reg['participant_name'] }}</h4>
                            <p class="text-slate-500 text-[11px]">{{ $reg['branch'] }} • Ketua: {{ $reg['leader_name'] }} ({{ $reg['institution'] }})</p>
                            <span class="text-[10px] text-slate-400">Didaftarkan: {{ $reg['registered_at'] }}</span>
                        </div>
                        <a href="{{ route('penyelenggara.verify-participants') }}" class="px-3 py-1.5 rounded-lg text-center font-bold text-xs bg-amber-50 text-amber-800 border border-amber-200 hover:bg-amber-100 transition shrink-0">
                            Verifikasi Berkas
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Jadwal Pertandingan Terdekat -->
        <div class="lg:col-span-5 bg-white rounded-2xl p-6 border border-slate-200/90 shadow-xs space-y-4">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-purple-500"></span>
                    <h3 class="font-bold text-sm text-slate-900">Jadwal Tanding Terdekat</h3>
                </div>
                <a href="{{ route('penyelenggara.schedules') }}" class="text-xs font-semibold text-brand-600 hover:underline">
                    Atur Jadwal
                </a>
            </div>

            <div class="space-y-3">
                @foreach(array_slice($matches, 0, 3) as $m)
                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1.5 text-xs">
                        <div class="flex items-center justify-between text-[11px]">
                            <span class="font-bold text-slate-800">{{ $m['round'] }}</span>
                            <span class="font-semibold text-purple-600">{{ $m['datetime'] }}</span>
                        </div>
                        <div class="flex items-center justify-between font-bold text-slate-900 bg-white p-2 rounded-lg border border-slate-200">
                            <span class="truncate">{{ $m['team_a'] }}</span>
                            <span class="px-2 text-slate-400">VS</span>
                            <span class="truncate">{{ $m['team_b'] }}</span>
                        </div>
                        <div class="flex items-center justify-between text-[10px] text-slate-500">
                            <span><i class="fa-solid fa-location-dot mr-1 text-rose-500"></i> {{ $m['venue'] }}</span>
                            <span class="px-1.5 py-0.5 rounded bg-slate-200 text-slate-700 font-mono">{{ $m['format'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</div>
@endsection
