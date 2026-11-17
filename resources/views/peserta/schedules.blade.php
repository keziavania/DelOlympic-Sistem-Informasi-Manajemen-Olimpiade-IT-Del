@extends('layouts.dashboard')

@section('title', 'Jadwal Pertandingan Saya – DelOlympic')
@section('header_title', 'Jadwal Pertandingan')
@section('header_subtitle', 'Pantau jadwal temu tanding, lawan pertandingan, dan arena pelaksanaan lomba.')

@section('content')
<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        @foreach($matches as $m)
            <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-4">
                <div>
                    <div class="flex items-center justify-between text-xs pb-3 border-b border-slate-100">
                        <span class="font-bold text-slate-800">{{ $m['competition'] }}</span>
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold {{ $m['status'] === 'Selesai' ? 'bg-slate-100 text-slate-700' : 'bg-purple-100 text-purple-800' }}">
                            {{ $m['status'] }}
                        </span>
                    </div>

                    <div class="py-2 flex items-center justify-between text-xs text-slate-500">
                        <span class="font-semibold text-brand-600">{{ $m['round'] }}</span>
                        <span class="font-mono text-slate-400">{{ $m['format'] }}</span>
                    </div>

                    <div class="bg-slate-50 rounded-xl p-3 border border-slate-200/80 space-y-2 text-xs">
                        <div class="flex items-center justify-between font-bold text-slate-900">
                            <span class="truncate">{{ $m['team_a'] }}</span>
                            <span class="text-base text-brand-700 font-black px-2">{{ $m['score_a'] }}</span>
                        </div>
                        <div class="border-t border-slate-200/60 pt-1.5 flex items-center justify-between font-bold text-slate-900">
                            <span class="truncate">{{ $m['team_b'] }}</span>
                            <span class="text-base text-indigo-700 font-black px-2">{{ $m['score_b'] }}</span>
                        </div>
                    </div>
                </div>

                <div class="pt-2 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                    <div>
                        <p><i class="fa-regular fa-clock text-brand-600 mr-1.5"></i> <strong>{{ $m['datetime'] }}</strong></p>
                        <p class="mt-0.5"><i class="fa-solid fa-location-dot text-rose-500 mr-1.5"></i> {{ $m['venue'] }}</p>
                    </div>
                    @if($m['winner'])
                        <span class="text-emerald-700 font-bold text-right text-[11px] block">
                            Pemenang: <br>{{ $m['winner'] }}
                        </span>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
