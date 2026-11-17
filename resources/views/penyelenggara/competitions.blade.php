@extends('layouts.dashboard')

@section('title', 'Kelola Lomba Saya – DelOlympic')
@section('header_title', 'Kelola Kompetisi Organisasi')
@section('header_subtitle', 'Daftar kompetisi resmi yang telah disetujui Admin dan siap diselenggarakan.')

@section('content')
<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($competitions as $c)
            <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs overflow-hidden flex flex-col justify-between">
                <div>
                    <div class="h-40 relative bg-slate-900">
                        <img src="{{ $c['poster'] }}" class="w-full h-full object-cover">
                        <span class="absolute top-3 right-3 px-3 py-1 rounded-lg text-xs font-bold bg-emerald-500 text-white shadow-sm">
                            {{ $c['status_pendaftaran'] }}
                        </span>
                    </div>

                    <div class="p-6 space-y-3">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-emerald-600">{{ $c['category'] }}</span>
                        <h3 class="text-base font-bold text-slate-900">{{ $c['title'] }}</h3>
                        <p class="text-xs text-slate-500 line-clamp-2">{{ $c['description'] }}</p>

                        <div class="pt-2 border-t border-slate-100 grid grid-cols-2 gap-2 text-xs text-slate-600">
                            <div><i class="fa-regular fa-calendar text-emerald-600 mr-1"></i> {{ $c['event_date'] }}</div>
                            <div><i class="fa-solid fa-users text-sky-600 mr-1"></i> {{ $c['participants_count'] }}/{{ $c['max_quota'] }} Tim</div>
                        </div>
                    </div>
                </div>

                <div class="p-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between text-xs">
                    <a href="{{ route('penyelenggara.branches') }}" class="font-bold text-emerald-700 hover:underline">
                        Cabang Lomba ({{ count($c['branches']) }})
                    </a>
                    <a href="{{ route('competitions.detail', $c['id']) }}" target="_blank" class="px-3 py-1.5 rounded-lg bg-white border border-slate-200 text-slate-700 font-semibold hover:bg-slate-100">
                        Lihat Halaman Publik <i class="fa-solid fa-arrow-up-right-from-square text-[10px] ml-1"></i>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
