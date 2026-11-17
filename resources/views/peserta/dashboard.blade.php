@extends('layouts.dashboard')

@section('title', 'Dashboard Peserta – DelOlympic')
@section('header_title', 'Dashboard Peserta')
@section('header_subtitle', 'Selamat datang, Bona Ventura! Pantau status pendaftaran dan jadwal tanding timmu.')

@section('content')
<div class="space-y-8">
    
    <!-- 4 Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        
        <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Lomba Diikuti</span>
                <div class="text-2xl font-black text-slate-900 mt-1">{{ $stats['lomba_diikuti'] }} Kompetisi</div>
                <div class="text-[11px] text-brand-600 font-semibold mt-1">
                    Aktif Berkompetisi
                </div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-brand-100 text-brand-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-trophy"></i>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Pendaftaran Diterima</span>
                <div class="text-2xl font-black text-emerald-600 mt-1">{{ $stats['diterima'] }} Lomba</div>
                <div class="text-[11px] text-emerald-700 font-semibold mt-1">
                    <i class="fa-solid fa-circle-check"></i> Berkas Terverifikasi
                </div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-id-card"></i>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Menunggu Validasi</span>
                <div class="text-2xl font-black text-slate-700 mt-1">{{ $stats['menunggu_verifikasi'] }} Lomba</div>
                <div class="text-[11px] text-slate-500 font-semibold mt-1">
                    Semua berkas telah lolos
                </div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-clock"></i>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Jadwal Tanding</span>
                <div class="text-2xl font-black text-purple-600 mt-1">{{ count($upcomingMatches) }} Match</div>
                <div class="text-[11px] text-purple-700 font-semibold mt-1">
                    Pertandingan Mendatang
                </div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-calendar-days"></i>
            </div>
        </div>

    </div>

    <!-- Active Team Banner -->
    <div class="bg-gradient-to-r from-brand-950 via-brand-900 to-indigo-900 text-white rounded-2xl p-6 sm:p-8 flex flex-col md:flex-row md:items-center justify-between gap-6 shadow-xl">
        <div class="space-y-2">
            <span class="px-3 py-1 rounded-full text-xs font-bold bg-amber-400 text-slate-950 inline-block">
                <i class="fa-solid fa-crown mr-1"></i> Tim Unggulan IT Del
            </span>
            <h3 class="text-xl sm:text-2xl font-extrabold">Tim Horas Coder – Divisi Senior ICPC</h3>
            <p class="text-xs text-slate-300 max-w-xl">
                Status berkas pendaftaran Anda telah <strong>Terverifikasi Penuh</strong>. Pertandingan babak penyisihan online akan dimulai pada <strong>05 Desember 2026 pukul 09:00 WIB</strong>.
            </p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3 shrink-0">
            <a href="{{ route('peserta.schedules') }}" class="px-5 py-3 rounded-xl font-bold text-xs text-slate-950 bg-sky-400 hover:bg-sky-300 transition text-center shadow-md">
                <i class="fa-solid fa-calendar-check mr-1.5"></i> Cek Jadwal Tanding
            </a>
            <a href="{{ route('peserta.results') }}" class="px-5 py-3 rounded-xl font-semibold text-xs text-white bg-white/10 hover:bg-white/20 border border-white/20 transition text-center">
                <i class="fa-solid fa-sitemap mr-1.5"></i> Bagan Bracket & Klasemen
            </a>
        </div>
    </div>

    <!-- 2 Column: Pendaftaran Saya & Jadwal Mendatang -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        
        <!-- Pendaftaran Saya -->
        <div class="lg:col-span-7 bg-white rounded-2xl p-6 border border-slate-200/90 shadow-xs space-y-4">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                    <h3 class="font-bold text-sm text-slate-900">Pendaftaran Kompetisi Saya</h3>
                </div>
                <a href="{{ route('peserta.pendaftaran') }}" class="text-xs font-semibold text-brand-600 hover:underline">
                    Detail Semua Pendaftaran
                </a>
            </div>

            <div class="space-y-3">
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-2 text-xs">
                    <div class="flex items-center justify-between">
                        <span class="font-mono text-[10px] text-slate-400">REG-2026-001</span>
                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800 border border-emerald-200">
                            Terverifikasi
                        </span>
                    </div>
                    <h4 class="font-bold text-slate-900 text-sm">Del Competitive Programming Contest 2026</h4>
                    <p class="text-slate-500 text-[11px]">Cabang: Divisi Mahasiswa (Senior) • Tim: Tim Horas Coder</p>
                    <div class="pt-2 border-t border-slate-200/60 flex items-center justify-between">
                        <span class="text-[11px] text-slate-400">Diselenggarakan oleh HIMATIF IT Del</span>
                        <button type="button" onclick="alert('Kartu Peserta Resmi DelOlympic berhasil diunduh (PDF)')" class="text-brand-600 font-bold hover:underline">
                            <i class="fa-solid fa-download mr-1"></i> Unduh Kartu Peserta
                        </button>
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-2 text-xs">
                    <div class="flex items-center justify-between">
                        <span class="font-mono text-[10px] text-slate-400">REG-2026-004</span>
                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-amber-100 text-amber-800 border border-amber-200">
                            Menunggu Verifikasi
                        </span>
                    </div>
                    <h4 class="font-bold text-slate-900 text-sm">Toba Cyber Strike: CTF Competition 2026</h4>
                    <p class="text-slate-500 text-[11px]">Cabang: Jeopardy Style Cybersecurity • Tim: Shadow Hackers</p>
                    <div class="pt-2 border-t border-slate-200/60 flex items-center justify-between text-slate-400">
                        <span>Penyelenggara sedang memeriksa berkas KTM</span>
                        <span class="font-semibold text-amber-600">Proses Validasi</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jadwal Tanding Mendatang -->
        <div class="lg:col-span-5 bg-white rounded-2xl p-6 border border-slate-200/90 shadow-xs space-y-4">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-purple-500"></span>
                    <h3 class="font-bold text-sm text-slate-900">Jadwal Tanding Terdekat</h3>
                </div>
                <a href="{{ route('peserta.schedules') }}" class="text-xs font-semibold text-brand-600 hover:underline">
                    Semua Jadwal
                </a>
            </div>

            <div class="space-y-3">
                @foreach(array_slice($upcomingMatches, 0, 2) as $up)
                    <div class="p-4 rounded-xl bg-purple-50/50 border border-purple-200/80 space-y-2 text-xs">
                        <div class="flex items-center justify-between text-[11px] font-semibold text-purple-700">
                            <span>{{ $up['round'] }}</span>
                            <span>{{ $up['datetime'] }}</span>
                        </div>
                        <h4 class="font-bold text-slate-900">{{ $up['team_a'] }} vs {{ $up['team_b'] }}</h4>
                        <div class="text-[11px] text-slate-500 flex items-center gap-1.5">
                            <i class="fa-solid fa-location-dot text-rose-500"></i>
                            <span>{{ $up['venue'] }}</span>
                        </div>
                    </div>
                @endforeach

                <div class="pt-2 text-center">
                    <a href="{{ route('peserta.competitions') }}" class="inline-flex items-center gap-2 text-xs font-bold text-brand-600 hover:underline">
                        <span>Jelajahi Lomba Lainnya</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
