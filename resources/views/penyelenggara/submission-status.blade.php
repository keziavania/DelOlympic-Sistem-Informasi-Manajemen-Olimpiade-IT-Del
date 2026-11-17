@extends('layouts.dashboard')

@section('title', 'Status Pengajuan Lomba – DelOlympic')
@section('header_title', 'Status Pengajuan Lomba Organisasi')
@section('header_subtitle', 'Pantau status peninjauan proposal lomba Anda oleh Administrator.')

@section('content')
<div class="space-y-6">
    
    <div class="flex items-center justify-between">
        <p class="text-xs text-slate-500">
            Berikut riwayat pengajuan kompetisi yang diajukan oleh <strong class="text-slate-800">HIMATIF Institut Teknologi Del</strong>
        </p>
        <a href="{{ route('penyelenggara.submission.create') }}" class="px-4 py-2 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition shadow-sm">
            <i class="fa-solid fa-plus mr-1"></i> Ajukan Lomba Baru
        </a>
    </div>

    <div class="space-y-4">
        @foreach($submissions as $sub)
            <div class="bg-white rounded-2xl p-6 border {{ $sub['status'] === 'Ditolak' ? 'border-rose-300 ring-1 ring-rose-200' : ($sub['status'] === 'Disetujui' ? 'border-emerald-200' : 'border-amber-200') }} shadow-xs">
                <div class="flex flex-col lg:flex-row lg:items-start justify-between gap-6">
                    
                    <div class="space-y-3 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <h3 class="text-base font-bold text-slate-900">{{ $sub['title'] }}</h3>
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold 
                                {{ $sub['status'] === 'Disetujui' ? 'bg-emerald-100 text-emerald-800 border border-emerald-200' : 
                                   ($sub['status'] === 'Pending' ? 'bg-amber-100 text-amber-800 border border-amber-200' : 'bg-rose-100 text-rose-800 border border-rose-200') }}">
                                Status: {{ $sub['status'] }}
                            </span>
                            <span class="text-xs text-slate-400 font-medium">• Kategori: {{ $sub['category'] }}</span>
                        </div>

                        <p class="text-xs text-slate-600 leading-relaxed">{{ $sub['description'] }}</p>

                        <div class="flex flex-wrap items-center gap-4 text-xs text-slate-500">
                            <span><i class="fa-regular fa-clock mr-1"></i> Diajukan: {{ $sub['submitted_at'] }}</span>
                            <span>•</span>
                            <span><i class="fa-regular fa-calendar mr-1"></i> Tanggal Acara: {{ $sub['event_date'] }}</span>
                        </div>

                        <!-- REJECTION REASON & REPAIR BUTTON -->
                        @if($sub['status'] === 'Ditolak' && $sub['rejection_reason'])
                            <div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-xs text-rose-900 space-y-2">
                                <div class="font-bold flex items-center gap-2 text-rose-700">
                                    <i class="fa-solid fa-triangle-exclamation text-sm"></i>
                                    <span>Alasan Penolakan dari Admin:</span>
                                </div>
                                <p class="text-slate-700 leading-relaxed">{{ $sub['rejection_reason'] }}</p>
                                <div class="pt-1">
                                    <a href="{{ route('penyelenggara.submission.edit', $sub['id']) }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg text-xs font-bold text-white bg-rose-600 hover:bg-rose-700 shadow-sm transition">
                                        <i class="fa-solid fa-wrench"></i>
                                        <span>Perbaiki Pengajuan & Ajukan Ulang</span>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Actions -->
                    <div class="shrink-0 flex items-center gap-2 pt-2 lg:pt-0 border-t lg:border-t-0 border-slate-100">
                        @if($sub['status'] === 'Disetujui')
                            <a href="{{ route('penyelenggara.branches') }}" class="px-4 py-2 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition shadow-sm">
                                <i class="fa-solid fa-diagram-project mr-1.5"></i> Kelola Cabang Lomba
                            </a>
                        @elseif($sub['status'] === 'Pending')
                            <span class="px-3 py-1.5 rounded-xl text-xs font-semibold text-amber-700 bg-amber-50 border border-amber-200">
                                <i class="fa-solid fa-hourglass-half mr-1"></i> Menunggu Verifikasi Admin
                            </span>
                        @else
                            <a href="{{ route('penyelenggara.submission.edit', $sub['id']) }}" class="px-4 py-2 rounded-xl text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 transition">
                                Edit Form
                            </a>
                        @endif
                    </div>

                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
