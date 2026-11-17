@extends('layouts.app')

@section('title', 'Tentang Kami – DelOlympic IT Del')

@section('content')
<div class="bg-gradient-to-b from-brand-950 via-brand-900 to-slate-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center max-w-3xl">
        <span class="text-xs font-bold uppercase tracking-widest text-sky-400">Tentang Platform</span>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight mt-2">Mengenal DelOlympic</h1>
        <p class="text-slate-300 text-sm sm:text-base mt-4 leading-relaxed">
            Sistem Informasi Terintegrasi Penyelenggaraan dan Pendaftaran Kompetisi Institut Teknologi Del untuk membangun ekosistem prestasi mahasiswa yang unggul, transparan, dan kompetitif.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16">
    
    <!-- Vision & Mission Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="bg-white p-8 rounded-2xl border border-slate-200/90 shadow-sm space-y-4">
            <div class="w-12 h-12 rounded-xl bg-brand-100 text-brand-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-bullseye"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-900">Visi Kami</h3>
            <p class="text-sm text-slate-600 leading-relaxed">
                Menjadi platform manajemen perlombaan kampus percontohan di Indonesia yang mengintegrasikan seluruh tahapan kompetisi secara digital, mulai dari verifikasi organisasi penyelenggara hingga penerbitan hasil juara dan sertifikasi.
            </p>
        </div>

        <div class="bg-white p-8 rounded-2xl border border-slate-200/90 shadow-sm space-y-4">
            <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-rocket"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-900">Misi Kami</h3>
            <ul class="space-y-2 text-sm text-slate-600">
                <li class="flex items-start gap-2">
                    <i class="fa-solid fa-check text-emerald-500 mt-1"></i>
                    <span>Memudahkan mahasiswa menemukan dan mengikuti kompetisi bereputasi.</span>
                </li>
                <li class="flex items-start gap-2">
                    <i class="fa-solid fa-check text-emerald-500 mt-1"></i>
                    <span>Menyediakan tools manajemen bracket dan jadwal bebas bentrok bagi organisasi.</span>
                </li>
                <li class="flex items-start gap-2">
                    <i class="fa-solid fa-check text-emerald-500 mt-1"></i>
                    <span>Menjamin transparansi penilaian dan pelaporan kegiatan kepada pimpinan kampus.</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- 3 Pillars Architecture -->
    <div class="bg-slate-900 text-white rounded-3xl p-8 sm:p-12">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <span class="text-xs font-bold uppercase tracking-widest text-sky-400">Ekosistem 3 Peran</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold mt-1">Kolaborasi Terpadu DelOlympic</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-slate-800/80 p-6 rounded-2xl border border-slate-700 space-y-3">
                <div class="text-amber-400 text-2xl"><i class="fa-solid fa-shield-halved"></i></div>
                <h4 class="text-lg font-bold">1. Administrator</h4>
                <p class="text-xs text-slate-300 leading-relaxed">
                    Memverifikasi kredibilitas akun organisasi pengusul, menyetujui pengajuan proposal lomba, dan memantau keseluruhan aktivitas platform.
                </p>
            </div>

            <div class="bg-slate-800/80 p-6 rounded-2xl border border-slate-700 space-y-3">
                <div class="text-emerald-400 text-2xl"><i class="fa-solid fa-building-columns"></i></div>
                <h4 class="text-lg font-bold">2. Penyelenggara</h4>
                <p class="text-xs text-slate-300 leading-relaxed">
                    Himpunan dan UKM IT Del mengelola cabang lomba, menyeleksi berkas peserta, menyusun jadwal pertandingan bebas bentrok, serta menginput skor.
                </p>
            </div>

            <div class="bg-slate-800/80 p-6 rounded-2xl border border-slate-700 space-y-3">
                <div class="text-sky-400 text-2xl"><i class="fa-solid fa-graduation-cap"></i></div>
                <h4 class="text-lg font-bold">3. Peserta</h4>
                <p class="text-xs text-slate-300 leading-relaxed">
                    Mahasiswa atau pelajar yang mendaftarkan tim, memantau status validasi berkas, melihat lawan di bracket turnamen, dan meraih trofi kejuaraan.
                </p>
            </div>
        </div>
    </div>

</div>
@endsection
