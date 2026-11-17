@extends('layouts.dashboard')

@section('title', 'Profil Saya – Peserta DelOlympic')
@section('header_title', 'Profil Pengguna Peserta')
@section('header_subtitle', 'Kelola informasi identitas pribadi, asal universitas/sekolah, dan kontak aktif.')

@section('content')
<div class="max-w-4xl space-y-6">
    <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs p-6 sm:p-8 space-y-6">
        
        <form action="{{ route('peserta.profile.update') }}" method="POST" class="space-y-6 text-xs">
            @csrf

            <!-- Avatar & Header -->
            <div class="flex items-center gap-5 pb-4 border-b border-slate-100">
                <img src="{{ $user['avatar'] }}" alt="{{ $user['name'] }}" class="w-20 h-20 rounded-2xl object-cover border-2 border-brand-500 shadow-sm">
                <div>
                    <h3 class="text-base font-bold text-slate-900">{{ $user['name'] }}</h3>
                    <p class="text-xs text-slate-500">{{ $user['institution'] }} • NIM: {{ $user['nim'] }}</p>
                    <button type="button" class="mt-2 text-xs font-semibold text-brand-600 hover:underline">
                        Ganti Foto Profil
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ $user['name'] }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-brand-500">
                </div>

                <div>
                    <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Nomor Induk Mahasiswa (NIM)</label>
                    <input type="text" name="nim" value="{{ $user['nim'] }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-brand-500">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Email Aktif</label>
                    <input type="email" name="email" value="{{ $user['email'] }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-brand-500">
                </div>

                <div>
                    <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Nomor WhatsApp</label>
                    <input type="text" name="phone" value="{{ $user['phone'] }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-brand-500">
                </div>
            </div>

            <div>
                <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Asal Institusi / Program Studi</label>
                <input type="text" name="institution" value="{{ $user['institution'] }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-brand-500">
            </div>

            <div>
                <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Biografi Singkat / Minat Kompetisi</label>
                <textarea name="bio" rows="3" class="w-full px-4 py-2 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-brand-500">{{ $user['bio'] }}</textarea>
            </div>

            <div class="pt-4 flex justify-end">
                <button type="submit" class="px-6 py-2.5 rounded-xl font-bold text-white bg-brand-600 hover:bg-brand-700 shadow-sm transition">
                    Simpan Perubahan Profil
                </button>
            </div>
        </form>

    </div>
</div>
@endsection
