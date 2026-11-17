@extends('layouts.dashboard')

@section('title', 'Buat Pengajuan Lomba Baru – DelOlympic')
@section('header_title', 'Formulir Pengajuan Lomba Baru')
@section('header_subtitle', 'Lengkapi rincian proposal lomba untuk diajukan dan diverifikasi oleh Administrator.')

@section('content')
<div class="max-w-4xl space-y-6">
    <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs p-6 sm:p-8 space-y-6">
        
        <form action="{{ route('penyelenggara.submission.store') }}" method="POST" class="space-y-6 text-xs">
            @csrf

            <!-- Section 1: Informasi Pokok -->
            <div class="space-y-4">
                <h3 class="font-bold text-sm text-slate-900 pb-2 border-b border-slate-100 flex items-center gap-2">
                    <i class="fa-solid fa-trophy text-emerald-600"></i>
                    <span>Informasi Pokok Kompetisi</span>
                </h3>

                <div>
                    <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Nama Lomba / Kompetisi *</label>
                    <input type="text" name="title" placeholder="Contoh: Del Game Dev Challenge 2026" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Kategori Kompetisi *</label>
                        <select name="category" required class="w-full px-3 py-2.5 rounded-xl border border-slate-200 text-xs bg-white focus:ring-2 focus:ring-emerald-500">
                            @foreach($categories as $cat)
                                <option value="{{ $cat['name'] }}">{{ $cat['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Lokasi / Venue Pelaksanaan *</label>
                        <input type="text" name="location" placeholder="Contoh: Auditorium Gedung 7 IT Del / Hybrid" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500">
                    </div>
                </div>

                <div>
                    <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Deskripsi Lengkap Kompetisi *</label>
                    <textarea name="description" rows="4" placeholder="Jelaskan latar belakang, tujuan lomba, dan sasaran peserta..." required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500"></textarea>
                </div>
            </div>

            <!-- Section 2: Jadwal & Periode -->
            <div class="space-y-4 pt-2">
                <h3 class="font-bold text-sm text-slate-900 pb-2 border-b border-slate-100 flex items-center gap-2">
                    <i class="fa-solid fa-calendar-days text-emerald-600"></i>
                    <span>Periode Pendaftaran & Pelaksanaan</span>
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Buka Pendaftaran *</label>
                        <input type="date" name="reg_start" value="2026-11-20" required class="w-full px-3 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500">
                    </div>

                    <div>
                        <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Tutup Pendaftaran *</label>
                        <input type="date" name="reg_end" value="2026-12-10" required class="w-full px-3 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500">
                    </div>

                    <div>
                        <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Tanggal Acara / Pertandingan *</label>
                        <input type="text" name="event_date" placeholder="Contoh: 15 - 17 Des 2026" required class="w-full px-3 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500">
                    </div>
                </div>
            </div>

            <!-- Section 3: Persyaratan, Poster & Kontak -->
            <div class="space-y-4 pt-2">
                <h3 class="font-bold text-sm text-slate-900 pb-2 border-b border-slate-100 flex items-center gap-2">
                    <i class="fa-solid fa-file-shield text-emerald-600"></i>
                    <span>Persyaratan Peserta & Berkas</span>
                </h3>

                <div>
                    <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Persyaratan Peserta & Aturan *</label>
                    <textarea name="rules" rows="3" placeholder="Tuliskan butir-butir syarat peserta, batas usia, komposisi tim, dll..." required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500"></textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Kontak Narahubung / PIC *</label>
                        <input type="text" name="contact" placeholder="himatif@del.ac.id | WA: 0821-xxxx-xxxx" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500">
                    </div>

                    <div>
                        <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Unggah Poster / Banner Lomba (JPG/PNG)</label>
                        <input type="file" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-100 file:text-emerald-700 hover:file:bg-emerald-200">
                    </div>
                </div>
            </div>

            <div class="pt-4 flex justify-between border-t border-slate-100">
                <a href="{{ route('penyelenggara.status-pengajuan') }}" class="px-5 py-2.5 rounded-xl font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 transition">
                    Batal
                </a>
                <button type="submit" class="px-7 py-2.5 rounded-xl font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-md shadow-emerald-500/20 transition">
                    <i class="fa-solid fa-paper-plane mr-2"></i> Kirim Pengajuan ke Admin
                </button>
            </div>
        </form>

    </div>
</div>
@endsection
