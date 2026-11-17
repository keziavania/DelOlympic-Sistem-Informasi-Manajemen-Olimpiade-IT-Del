@extends('layouts.dashboard')

@section('title', 'Persetujuan Pengajuan Lomba – DelOlympic')
@section('header_title', 'Pengajuan Lomba Masuk')
@section('header_subtitle', 'Tinjau proposal kompetisi yang diajukan oleh penyelenggara sebelum dipublikasikan.')

@section('content')
<div class="space-y-6" x-data="{ modalOpen: false, modalAction: 'approve', activeSub: null, reasonText: '' }">
    
    <!-- Submissions Table / Cards -->
    <div class="space-y-4">
        @foreach($submissions as $sub)
            <div class="bg-white rounded-2xl p-6 border {{ $sub['status'] === 'Pending' ? 'border-indigo-300 ring-1 ring-indigo-200' : 'border-slate-200/90' }} shadow-xs">
                <div class="flex flex-col lg:flex-row lg:items-start justify-between gap-6">
                    
                    <div class="space-y-3 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <h3 class="text-base font-bold text-slate-900">{{ $sub['title'] }}</h3>
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold 
                                {{ $sub['status'] === 'Disetujui' ? 'bg-emerald-100 text-emerald-800' : 
                                   ($sub['status'] === 'Pending' ? 'bg-amber-100 text-amber-800' : 'bg-rose-100 text-rose-800') }}">
                                {{ $sub['status'] }}
                            </span>
                            <span class="text-xs text-slate-400 font-medium">• Kategori: {{ $sub['category'] }}</span>
                        </div>

                        <p class="text-xs text-slate-600 leading-relaxed">
                            {{ $sub['description'] }}
                        </p>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs text-slate-600 pt-1">
                            <div>
                                <span class="text-slate-400 block">Penyelenggara:</span>
                                <strong class="text-slate-800">{{ $sub['organizer'] }}</strong>
                            </div>
                            <div>
                                <span class="text-slate-400 block">Jadwal & Kuota:</span>
                                <span>{{ $sub['event_date'] }} • Kuota {{ $sub['quota'] }} Peserta</span>
                            </div>
                            <div>
                                <span class="text-slate-400 block">Waktu Pengajuan:</span>
                                <span class="text-slate-500">{{ $sub['submitted_at'] }}</span>
                            </div>
                        </div>

                        @if($sub['rejection_reason'])
                            <div class="p-3 rounded-xl bg-rose-50 border border-rose-200 text-xs text-rose-800 space-y-1">
                                <strong class="font-bold block flex items-center gap-1.5">
                                    <i class="fa-solid fa-triangle-exclamation"></i> Catatan Penolakan Admin:
                                </strong>
                                <p>{{ $sub['rejection_reason'] }}</p>
                            </div>
                        @endif
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center gap-2.5 shrink-0 pt-2 lg:pt-0 border-t lg:border-t-0 border-slate-100">
                        @if($sub['status'] === 'Pending')
                            <button type="button" @click="modalOpen = true; modalAction = 'reject'; activeSub = {{ json_encode($sub) }}; reasonText = ''" class="px-4 py-2.5 rounded-xl text-xs font-bold text-rose-700 bg-rose-50 hover:bg-rose-100 border border-rose-200 transition">
                                <i class="fa-solid fa-xmark mr-1.5"></i> Tolak
                            </button>
                            <button type="button" @click="modalOpen = true; modalAction = 'approve'; activeSub = {{ json_encode($sub) }}; reasonText = ''" class="px-5 py-2.5 rounded-xl text-xs font-bold text-white bg-brand-600 hover:bg-brand-700 shadow-sm transition">
                                <i class="fa-solid fa-check mr-1.5"></i> Setujui Lomba
                            </button>
                        @elseif($sub['status'] === 'Disetujui')
                            <span class="text-xs text-emerald-700 font-semibold bg-emerald-50 px-3 py-1.5 rounded-xl border border-emerald-200">
                                <i class="fa-solid fa-check-double mr-1"></i> Telah Disetujui
                            </span>
                        @else
                            <button type="button" @click="modalOpen = true; modalAction = 'approve'; activeSub = {{ json_encode($sub) }}; reasonText = ''" class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 transition">
                                Tinjau Ulang
                            </button>
                        @endif
                    </div>

                </div>
            </div>
        @endforeach
    </div>

    <!-- Review Modal -->
    <div x-show="modalOpen" x-cloak class="fixed inset-0 z-50 overflow-y-auto bg-slate-950/60 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-lg w-full p-6 sm:p-8 space-y-5 shadow-2xl border border-slate-200" @click.away="modalOpen = false">
            
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <div :class="modalAction === 'approve' ? 'bg-brand-100 text-brand-600' : 'bg-rose-100 text-rose-600'" class="w-10 h-10 rounded-xl flex items-center justify-center text-lg">
                        <i :class="modalAction === 'approve' ? 'fa-solid fa-check' : 'fa-solid fa-xmark'"></i>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-slate-900" x-text="modalAction === 'approve' ? 'Setujui Pengajuan Lomba' : 'Tolak Pengajuan Lomba'"></h3>
                        <p class="text-xs text-slate-500" x-text="activeSub ? activeSub.title : ''"></p>
                    </div>
                </div>
                <button @click="modalOpen = false" class="text-slate-400 hover:text-slate-600">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            <form :action="'{{ url('admin/pengajuan-lomba') }}/' + (activeSub ? activeSub.id : 1)" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="action" :value="modalAction">

                <div x-show="modalAction === 'approve'" class="p-4 rounded-xl bg-brand-50 border border-brand-200 text-brand-900 text-xs leading-relaxed">
                    Setelah disetujui, pihak penyelenggara akan dapat membuka pendaftaran peserta dan mempublikasikan jadwal kompetisi ke halaman publik DelOlympic.
                </div>

                <div x-show="modalAction === 'reject'" class="space-y-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                        Alasan Penolakan <span class="text-rose-600">* (Wajib Diisi)</span>
                    </label>
                    <textarea name="reason" x-model="reasonText" rows="3" placeholder="Sebutkan hal yang harus diperbaiki pada proposal lomba (misal: syarat belum lengkap, izin tempat belum jelas)..." class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs focus:outline-none focus:ring-2 focus:ring-rose-500"></textarea>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                    <button type="button" @click="modalOpen = false" class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 transition">
                        Batal
                    </button>
                    <button type="submit" :class="modalAction === 'approve' ? 'bg-brand-600 hover:bg-brand-700' : 'bg-rose-600 hover:bg-rose-700'" class="px-5 py-2 rounded-xl text-xs font-bold text-white shadow-sm transition">
                        <span x-text="modalAction === 'approve' ? 'Ya, Setujui Lomba' : 'Kirim Penolakan'"></span>
                    </button>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection
