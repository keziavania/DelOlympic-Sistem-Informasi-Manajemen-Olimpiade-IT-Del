@extends('layouts.dashboard')

@section('title', 'Jelajahi Kompetisi – Peserta DelOlympic')
@section('header_title', 'Jelajahi Kompetisi')
@section('header_subtitle', 'Cari dan daftarkan tim Anda pada beragam kompetisi resmi di DelOlympic.')

@section('content')
<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($competitions as $item)
            <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs overflow-hidden flex flex-col justify-between hover:border-brand-400 transition group">
                <div>
                    <div class="relative h-44 bg-slate-900 overflow-hidden">
                        <img src="{{ $item['poster'] }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <span class="absolute top-3 left-3 px-2.5 py-1 rounded-lg text-xs font-bold bg-white/90 text-brand-900 shadow-sm">
                            {{ $item['category'] }}
                        </span>
                        <span class="absolute top-3 right-3 px-2.5 py-1 rounded-lg text-xs font-bold bg-emerald-500 text-white shadow-sm">
                            {{ $item['status_pendaftaran'] }}
                        </span>
                    </div>

                    <div class="p-5 space-y-3">
                        <div class="text-[11px] text-slate-400 font-semibold">{{ $item['organizer'] }}</div>
                        <h3 class="font-bold text-slate-900 text-base leading-snug group-hover:text-brand-600 transition">{{ $item['title'] }}</h3>
                        <p class="text-xs text-slate-500 line-clamp-2">{{ $item['description'] }}</p>

                        <div class="pt-2 border-t border-slate-100 space-y-1 text-xs text-slate-600">
                            <div><i class="fa-regular fa-calendar text-brand-600 mr-1.5"></i> Pelaksanaan: <strong>{{ $item['event_date'] }}</strong></div>
                            <div><i class="fa-solid fa-trophy text-amber-500 mr-1.5"></i> Total Hadiah: <strong>{{ $item['prize_pool'] }}</strong></div>
                        </div>
                    </div>
                </div>

                <div class="p-4 bg-slate-50 border-t border-slate-100 flex items-center gap-2">
                    <a href="{{ route('competitions.detail', $item['id']) }}" class="flex-1 py-2 rounded-xl text-center text-xs font-bold text-brand-700 bg-white border border-brand-200 hover:bg-brand-50 transition">
                        Detail
                    </a>
                    <a href="{{ route('competitions.register', $item['id']) }}" class="flex-1 py-2 rounded-xl text-center text-xs font-bold text-white bg-brand-600 hover:bg-brand-700 transition shadow-sm">
                        Daftar Lomba
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
