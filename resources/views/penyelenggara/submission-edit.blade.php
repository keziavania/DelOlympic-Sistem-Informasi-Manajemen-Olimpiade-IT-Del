@extends('layouts.dashboard')

@section('title', 'Perbaiki Pengajuan Lomba – DelOlympic')
@section('header_title', 'Perbaiki Pengajuan Lomba')
@section('header_subtitle', 'Perbaiki poin catatan penolakan admin dan ajukan kembali proposal kompetisi.')

@section('content')
<div class="max-w-4xl space-y-6">
    
    <!-- Banner Catatan Penolakan Sebelumnya -->
    <div class="bg-rose-50 border border-rose-200 rounded-2xl p-5 text-xs text-rose-900 space-y-1">
        <strong class="font-bold text-sm block text-rose-700 flex items-center gap-2">
            <i class="fa-solid fa-triangle-exclamation"></i>
            Catatan Penolakan dari Admin:
        </strong>
        <p class="leading-relaxed">{{ $submission['rejection_reason'] ?? 'Harap lengkapi berkas perizinan lokasi dan perjelas kuota peserta.' }}</p>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs p-6 sm:p-8 space-y-6">
        <form action="{{ route('penyelenggara.submission.store') }}" method="POST" class="space-y-6 text-xs">
            @csrf

            <div class="space-y-4">
                <h3 class="font-bold text-sm text-slate-900 pb-2 border-b border-slate-100 flex items-center gap-2">
                    <i class="fa-solid fa-file-pen text-brand-600"></i>
                    <span>Informasi Lomba yang Diperbaiki</span>
                </h3>

                <div>
                    <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Nama Lomba / Kompetisi *</label>
                    <input type="text" name="title" value="{{ $submission['title'] }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-brand-500">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Kategori Kompetisi *</label>
                        <select name="category" required class="w-full px-3 py-2.5 rounded-xl border border-slate-200 text-xs bg-white focus:ring-2 focus:ring-brand-500">
                            @foreach($categories as $cat)
                                <option value="{{ $cat['name'] }}" {{ $submission['category'] === $cat['name'] ? 'selected' : '' }}>{{ $cat['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Lokasi / Venue Pelaksanaan *</label>
                        <input type="text" name="location" value="Auditorium Gedung 7 IT Del (Izin Lokasi Terlampir)" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-brand-500">
                    </div>
                </div>

                <div>
                    <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Deskripsi Lengkap Kompetisi *</label>
                    <textarea name="description" rows="4" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-brand-500">{{ $submission['description'] }}</textarea>
                </div>
            </div>

            <div class="space-y-4 pt-2">
                <h3 class="font-bold text-sm text-slate-900 pb-2 border-b border-slate-100 flex items-center gap-2">
                    <i class="fa-solid fa-calendar-days text-brand-600"></i>
                    <span>Periode & Persyaratan yang Direvisi</span>
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Buka Pendaftaran *</label>
                        <input type="date" name="reg_start" value="2026-11-20" required class="w-full px-3 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-brand-500">
                    </div>

                    <div>
                        <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Tutup Pendaftaran *</label>
                        <input type="date" name="reg_end" value="2026-12-10" required class="w-full px-3 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-brand-500">
                    </div>

                    <div>
                        <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Tanggal Acara *</label>
                        <input type="text" name="event_date" value="{{ $submission['event_date'] }}" required class="w-full px-3 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-brand-500">
                    </div>
                </div>

                <div>
                    <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Persyaratan Peserta yang Diperjelas *</label>
                    <textarea name="rules" rows="3" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-brand-500">1. Peserta mahasiswa aktif seluruh Indonesia.
2. Membawa surat tugas resmi delegasi fakultas.
3. Mengikuti technical meeting tepat waktu.</textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Kontak Narahubung / PIC *</label>
                        <input type="text" name="contact" value="organizer@del.ac.id | WA: 0821-6543-9870" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-brand-500">
                    </div>

                    <div>
                        <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Unggah Surat Izin / Berkas Perbaikan (PDF)</label>
                        <input type="file" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-brand-100 file:text-brand-700 hover:file:bg-brand-200">
                    </div>
                </div>
            </div>

            <div class="pt-4 flex justify-between border-t border-slate-100">
                <a href="{{ route('penyelenggara.status-pengajuan') }}" class="px-5 py-2.5 rounded-xl font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 transition">
                    Batal
                </a>
                <button type="submit" class="px-7 py-2.5 rounded-xl font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-md shadow-emerald-500/20 transition">
                    <i class="fa-solid fa-rotate-right mr-1.5"></i> Kirim Ulang Pengajuan Hasil Perbaikan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
