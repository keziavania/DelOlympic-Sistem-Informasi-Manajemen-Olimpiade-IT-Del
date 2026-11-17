@extends('layouts.dashboard')

@section('title', 'Profil Organisasi – Penyelenggara DelOlympic')
@section('header_title', 'Profil Organisasi Penyelenggara')
@section('header_subtitle', 'Kelola informasi publik himpunan/UKM, penanggung jawab, dan berkas SK kepengurusan.')

@section('content')
<div class="max-w-4xl space-y-6">
    
    <!-- Status Verifikasi Banner -->
    <div class="bg-emerald-50 border border-emerald-200 rounded-2xl p-5 flex items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-emerald-600 text-white flex items-center justify-center text-lg shadow-sm">
                <i class="fa-solid fa-certificate"></i>
            </div>
            <div>
                <h4 class="font-bold text-sm text-emerald-900">Status Akun: Terverifikasi Resmi</h4>
                <p class="text-xs text-emerald-700">Diverifikasi oleh Administrator Kampus IT Del pada {{ $organizer['registered_at'] }}</p>
            </div>
        </div>
        <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-600 text-white shrink-0">
            Terverifikasi
        </span>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs p-6 sm:p-8 space-y-6">
        
        <form action="{{ route('penyelenggara.profile.update') }}" method="POST" class="space-y-5 text-xs">
            @csrf

            <div class="flex items-center gap-5 pb-4 border-b border-slate-100">
                <div class="w-20 h-20 rounded-2xl bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-400 text-3xl overflow-hidden">
                    <i class="fa-solid fa-building-columns text-emerald-600"></i>
                </div>
                <div>
                    <h3 class="text-base font-bold text-slate-900">{{ $organizer['name'] }}</h3>
                    <p class="text-xs text-slate-500">{{ $organizer['type'] }}</p>
                    <button type="button" class="mt-2 text-xs font-semibold text-emerald-600 hover:underline">
                        Ganti Logo Organisasi
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Nama Organisasi</label>
                    <input type="text" value="{{ $organizer['name'] }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500">
                </div>

                <div>
                    <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Nama Ketua / PIC</label>
                    <input type="text" value="{{ $organizer['pic'] }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Email Resmi</label>
                    <input type="email" value="{{ $organizer['email'] }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500">
                </div>

                <div>
                    <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Nomor WhatsApp PIC</label>
                    <input type="text" value="{{ $organizer['phone'] }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500">
                </div>
            </div>

            <div>
                <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Dokumen Legalitas Terlampir (SK Kepengurusan)</label>
                <div class="p-3 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-between">
                    <span class="font-mono text-slate-700 flex items-center gap-2">
                        <i class="fa-solid fa-file-pdf text-rose-500"></i>
                        {{ $organizer['document'] }}
                    </span>
                    <button type="button" onclick="alert('Membuka file SK')" class="text-emerald-600 font-bold hover:underline">
                        Unduh Berkas
                    </button>
                </div>
            </div>

            <div class="pt-4 flex justify-end">
                <button type="submit" class="px-6 py-2.5 rounded-xl font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-sm transition">
                    Perbarui Profil Organisasi
                </button>
            </div>
        </form>

    </div>
</div>
@endsection
