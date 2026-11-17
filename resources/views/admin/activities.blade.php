@extends('layouts.dashboard')

@section('title', 'Aktivitas Sistem – Admin DelOlympic')
@section('header_title', 'Aktivitas Sistem Platform')
@section('header_subtitle', 'Audit trail dan riwayat aksi pengguna, verifikasi, dan pembaruan lomba.')

@section('content')
<div class="space-y-6">
    <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs p-6 space-y-6">
        <h3 class="font-bold text-sm text-slate-900 pb-3 border-b border-slate-100">Log Aktivitas Terbaru</h3>

        <div class="space-y-6 relative before:absolute before:inset-0 before:left-3.5 before:w-0.5 before:bg-slate-200">
            @foreach($activities as $act)
                <div class="relative flex items-start gap-4 text-xs">
                    <div class="w-7 h-7 rounded-full bg-white border-2 {{ $act['type'] === 'approve' ? 'border-emerald-500 text-emerald-600' : ($act['type'] === 'reject' ? 'border-rose-500 text-rose-600' : 'border-brand-500 text-brand-600') }} flex items-center justify-center relative z-10 shrink-0 font-bold">
                        @if($act['type'] === 'approve')
                            <i class="fa-solid fa-check text-[10px]"></i>
                        @elseif($act['type'] === 'reject')
                            <i class="fa-solid fa-xmark text-[10px]"></i>
                        @elseif($act['type'] === 'register')
                            <i class="fa-solid fa-plus text-[10px]"></i>
                        @else
                            <i class="fa-solid fa-pen text-[10px]"></i>
                        @endif
                    </div>
                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-200/80 flex-1">
                        <div class="flex items-center justify-between gap-2">
                            <span class="font-bold text-slate-900 text-sm">{{ $act['user'] }}</span>
                            <span class="text-[10px] text-slate-400 font-mono">{{ $act['time'] }}</span>
                        </div>
                        <p class="text-slate-600 mt-1">{{ $act['action'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
