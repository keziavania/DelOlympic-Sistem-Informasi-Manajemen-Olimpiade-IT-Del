@extends('layouts.dashboard')

@section('title', 'Pengaturan – Penyelenggara DelOlympic')
@section('header_title', 'Pengaturan Penyelenggara')
@section('header_subtitle', 'Kelola preferensi notifikasi pendaftar dan integrasi pesan.')

@section('content')
<div class="max-w-4xl space-y-6">
    <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs p-6 sm:p-8 space-y-6">
        <h3 class="font-bold text-base text-slate-900 pb-3 border-b border-slate-100">Preferensi Notifikasi & Lomba</h3>

        <form onsubmit="event.preventDefault(); alert('Pengaturan penyelenggara berhasil disimpan!');" class="space-y-4 text-xs">
            <label class="flex items-center gap-3 p-3 rounded-xl border border-slate-200 bg-slate-50/50 cursor-pointer">
                <input type="checkbox" checked class="h-4 w-4 text-emerald-600 rounded">
                <div>
                    <span class="block font-bold text-slate-800">Kirim Notifikasi Email Saat Ada Pendaftar Baru</span>
                    <span class="text-slate-500 text-[11px]">Dapatkan pemberitahuan otomatis ke email resmi saat tim mengirim formulir pendaftaran.</span>
                </div>
            </label>

            <label class="flex items-center gap-3 p-3 rounded-xl border border-slate-200 bg-slate-50/50 cursor-pointer">
                <input type="checkbox" checked class="h-4 w-4 text-emerald-600 rounded">
                <div>
                    <span class="block font-bold text-slate-800">Izinkan Tim Memperbaiki Berkas Jika Ditolak</span>
                    <span class="text-slate-500 text-[11px]">Peserta dapat mengunggah ulang dokumen jika ada KTM yang buram atau salah sebelum batas pendaftaran ditutup.</span>
                </div>
            </label>

            <div class="pt-4 flex justify-end">
                <button type="submit" class="px-6 py-2.5 rounded-xl font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-sm transition">
                    Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
