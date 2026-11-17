@extends('layouts.app')

@section('title', 'Masuk ke Akun – DelOlympic')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-8 sm:p-10 rounded-3xl border border-slate-200/90 shadow-xl">
        
        <!-- Header -->
        <div class="text-center">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-brand-900 to-brand-600 flex items-center justify-center text-white mx-auto shadow-md shadow-brand-500/20 mb-3">
                <i class="fa-solid fa-trophy text-2xl text-amber-300"></i>
            </div>
            <h2 class="text-2xl font-black tracking-tight text-slate-900">Masuk ke DelOlympic</h2>
            <p class="text-xs text-slate-500 mt-1">Akses dashboard sesuai peran pengguna Anda</p>
        </div>

        <!-- Quick Demo Role Selectors (1-Click Test) -->
        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 text-xs">
            <span class="block font-bold text-slate-700 uppercase tracking-wider text-[10px] mb-2 text-center">
                <i class="fa-solid fa-bolt text-amber-500 mr-1"></i> Quick Test (Klik untuk Langsung Menguji):
            </span>
            <div class="grid grid-cols-3 gap-2">
                <a href="{{ route('switch.role', 'peserta') }}" class="p-2 rounded-xl text-center bg-white border border-slate-200 hover:border-brand-500 hover:text-brand-600 font-bold transition shadow-xs">
                    <i class="fa-solid fa-graduation-cap block mb-1 text-sm text-brand-600"></i>
                    Peserta
                </a>
                <a href="{{ route('switch.role', 'penyelenggara') }}" class="p-2 rounded-xl text-center bg-white border border-slate-200 hover:border-emerald-500 hover:text-emerald-600 font-bold transition shadow-xs">
                    <i class="fa-solid fa-building-columns block mb-1 text-sm text-emerald-600"></i>
                    Penyelenggara
                </a>
                <a href="{{ route('switch.role', 'admin') }}" class="p-2 rounded-xl text-center bg-white border border-slate-200 hover:border-amber-500 hover:text-amber-600 font-bold transition shadow-xs">
                    <i class="fa-solid fa-shield-halved block mb-1 text-sm text-amber-500"></i>
                    Admin
                </a>
            </div>
        </div>

        <!-- Standard Login Form -->
        <form action="{{ route('login.process') }}" method="POST" class="space-y-4" x-data="{ selectedRole: 'peserta' }">
            @csrf

            <!-- Role Selector Tabs -->
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Pilih Peran Akun</label>
                <div class="grid grid-cols-3 gap-1.5 p-1 bg-slate-100 rounded-xl">
                    <button type="button" @click="selectedRole = 'peserta'" :class="selectedRole === 'peserta' ? 'bg-white text-brand-700 font-bold shadow-xs' : 'text-slate-600 font-medium'" class="py-1.5 text-xs rounded-lg transition">
                        Peserta
                    </button>
                    <button type="button" @click="selectedRole = 'penyelenggara'" :class="selectedRole === 'penyelenggara' ? 'bg-white text-emerald-700 font-bold shadow-xs' : 'text-slate-600 font-medium'" class="py-1.5 text-xs rounded-lg transition">
                        Penyelenggara
                    </button>
                    <button type="button" @click="selectedRole = 'admin'" :class="selectedRole === 'admin' ? 'bg-white text-amber-700 font-bold shadow-xs' : 'text-slate-600 font-medium'" class="py-1.5 text-xs rounded-lg transition">
                        Admin
                    </button>
                </div>
                <input type="hidden" name="role" :value="selectedRole">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Email Pengguna</label>
                <div class="relative">
                    <i class="fa-solid fa-envelope absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                    <input type="email" name="email" value="bona.panjaitan@del.ac.id" required class="w-full pl-9 pr-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>
            </div>

            <!-- Password -->
            <div>
                <div class="flex items-center justify-between mb-1">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Kata Sandi</label>
                    <a href="#" class="text-xs text-brand-600 hover:underline">Lupa sandi?</a>
                </div>
                <div class="relative">
                    <i class="fa-solid fa-lock absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                    <input type="password" name="password" value="password123" required class="w-full pl-9 pr-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>
            </div>

            <div class="flex items-center">
                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-brand-600 focus:ring-brand-500 border-slate-300 rounded">
                <label for="remember-me" class="ml-2 block text-xs text-slate-600">
                    Ingat saya di perangkat ini
                </label>
            </div>

            <!-- Submit -->
            <button type="submit" class="w-full py-3 px-4 rounded-xl font-bold text-sm text-white bg-brand-600 hover:bg-brand-700 shadow-md shadow-brand-500/25 transition">
                Masuk Sekarang
            </button>
        </form>

        <!-- Register Link -->
        <div class="text-center text-xs text-slate-500 pt-2 border-t border-slate-100">
            Belum memiliki akun?
            <a href="{{ route('register') }}" class="font-bold text-brand-600 hover:underline">
                Daftar Akun Baru
            </a>
        </div>

    </div>
</div>
@endsection
