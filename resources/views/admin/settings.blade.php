@extends('layouts.dashboard')

@section('title', 'Pengaturan Platform – Admin DelOlympic')
@section('header_title', 'Pengaturan Platform DelOlympic')
@section('header_subtitle', 'Kelola konfigurasi umum, periode tahun akademik, dan izin registrasi.')

@section('content')
<div class="max-w-4xl space-y-6">
    <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs p-6 sm:p-8 space-y-6">
        
        <h3 class="font-bold text-base text-slate-900 pb-3 border-b border-slate-100">Konfigurasi Umum</h3>

        <form onsubmit="event.preventDefault(); alert('Pengaturan platform berhasil disimpan!');" class="space-y-5 text-xs">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Nama Aplikasi</label>
                    <input type="text" value="DelOlympic – IT Del" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-brand-500">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Tahun Akademik Aktif</label>
                    <input type="text" value="2026 / 2027 Ganjil" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-brand-500">
                </div>
            </div>

            <div class="space-y-3 pt-2">
                <label class="flex items-center gap-3 p-3 rounded-xl border border-slate-200 bg-slate-50/50 cursor-pointer">
                    <input type="checkbox" checked class="h-4 w-4 text-brand-600 rounded">
                    <div>
                        <span class="block font-bold text-slate-800">Wajibkan Verifikasi Akun Penyelenggara Baru</span>
                        <span class="text-slate-500 text-[11px]">Setiap akun organisasi baru harus melampirkan SK dan disetujui Admin sebelum dapat mengajukan lomba.</span>
                    </div>
                </label>

                <label class="flex items-center gap-3 p-3 rounded-xl border border-slate-200 bg-slate-50/50 cursor-pointer">
                    <input type="checkbox" checked class="h-4 w-4 text-brand-600 rounded">
                    <div>
                        <span class="block font-bold text-slate-800">Aktifkan Deteksi Otomatis Bentrok Jadwal Pertandingan</span>
                        <span class="text-slate-500 text-[11px]">Sistem akan memvalidasi jadwal bila ada venue atau peserta yang bertanding di waktu bersamaan.</span>
                    </div>
                </label>
            </div>

            <div class="pt-4 flex justify-end">
                <button type="submit" class="px-6 py-2.5 rounded-xl font-bold text-white bg-brand-600 hover:bg-brand-700 transition shadow-sm">
                    Simpan Perubahan
                </button>
            </div>
        </form>

    </div>
</div>
@endsection
