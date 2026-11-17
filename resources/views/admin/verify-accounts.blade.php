@extends('layouts.dashboard')

@section('title', 'Verifikasi Akun Penyelenggara – DelOlympic')
@section('header_title', 'Verifikasi Akun Penyelenggara')
@section('header_subtitle', 'Tinjau identitas, SK kepengurusan, dan berikan persetujuan atau penolakan dengan alasan.')

@section('content')
<div class="space-y-6" x-data="{ modalOpen: false, modalAction: 'approve', activeOrg: null, reasonText: '' }">
    
    <!-- Header Filter Bar -->
    <div class="bg-white p-4 rounded-2xl border border-slate-200/90 shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex items-center gap-2">
            <span class="px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800 border border-amber-200">
                2 Akun Menunggu Verifikasi
            </span>
            <span class="text-xs text-slate-500 hidden sm:inline">• Diperlukan tinjauan dokumen legalitas</span>
        </div>
        <div class="flex items-center gap-2">
            <input type="text" placeholder="Cari nama organisasi / PIC..." class="px-3 py-2 rounded-xl border border-slate-200 text-xs w-64 focus:outline-none focus:ring-2 focus:ring-brand-500">
        </div>
    </div>

    <!-- Organizer Verification Cards List -->
    <div class="grid grid-cols-1 gap-4">
        @foreach($organizers as $org)
            <div class="bg-white rounded-2xl p-6 border {{ $org['status'] === 'Menunggu Verifikasi' ? 'border-amber-300 ring-1 ring-amber-200 bg-amber-50/10' : 'border-slate-200/90' }} shadow-xs">
                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                    
                    <!-- Left: Identity & Details -->
                    <div class="space-y-3 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <h3 class="text-base font-bold text-slate-900">{{ $org['name'] }}</h3>
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold 
                                {{ $org['status'] === 'Terverifikasi' ? 'bg-emerald-100 text-emerald-800 border border-emerald-200' : 
                                   ($org['status'] === 'Menunggu Verifikasi' ? 'bg-amber-100 text-amber-800 border border-amber-300' : 'bg-rose-100 text-rose-800 border border-rose-200') }}">
                                {{ $org['status'] }}
                            </span>
                            <span class="text-xs text-slate-400 font-medium">• {{ $org['type'] }}</span>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs text-slate-600">
                            <div>
                                <span class="text-slate-400 block">Penanggung Jawab (PIC):</span>
                                <strong class="text-slate-800">{{ $org['pic'] }}</strong>
                            </div>
                            <div>
                                <span class="text-slate-400 block">Email & Kontak:</span>
                                <span>{{ $org['email'] }} • {{ $org['phone'] }}</span>
                            </div>
                            <div>
                                <span class="text-slate-400 block">Dokumen Legalitas:</span>
                                <a href="javascript:void(0)" onclick="alert('Membuka pratinjau berkas: {{ $org['document'] }}')" class="font-bold text-brand-600 hover:underline flex items-center gap-1.5 mt-0.5">
                                    <i class="fa-solid fa-file-pdf text-rose-500"></i>
                                    <span>{{ $org['document'] }}</span>
                                    <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                                </a>
                            </div>
                        </div>

                        @if(isset($org['rejection_reason']))
                            <div class="p-3 rounded-xl bg-rose-50 border border-rose-200 text-xs text-rose-800 space-y-1">
                                <strong class="font-bold block flex items-center gap-1.5">
                                    <i class="fa-solid fa-triangle-exclamation"></i> Alasan Penolakan:
                                </strong>
                                <p>{{ $org['rejection_reason'] }}</p>
                            </div>
                        @endif
                    </div>

                    <!-- Right: Action Buttons -->
                    <div class="flex items-center gap-2.5 shrink-0 pt-2 lg:pt-0 border-t lg:border-t-0 border-slate-100">
                        @if($org['status'] === 'Menunggu Verifikasi')
                            <button type="button" @click="modalOpen = true; modalAction = 'reject'; activeOrg = {{ json_encode($org) }}; reasonText = ''" class="px-4 py-2.5 rounded-xl text-xs font-bold text-rose-700 bg-rose-50 hover:bg-rose-100 border border-rose-200 transition">
                                <i class="fa-solid fa-xmark mr-1.5"></i> Tolak Akun
                            </button>
                            <button type="button" @click="modalOpen = true; modalAction = 'approve'; activeOrg = {{ json_encode($org) }}; reasonText = ''" class="px-5 py-2.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-sm transition">
                                <i class="fa-solid fa-check mr-1.5"></i> Setujui Akun
                            </button>
                        @elseif($org['status'] === 'Terverifikasi')
                            <span class="text-xs text-emerald-700 font-semibold bg-emerald-50 px-3 py-1.5 rounded-xl border border-emerald-200">
                                <i class="fa-solid fa-check-circle mr-1"></i> Disetujui ({{ $org['verified_by'] }})
                            </span>
                        @else
                            <button type="button" @click="modalOpen = true; modalAction = 'approve'; activeOrg = {{ json_encode($org) }}; reasonText = ''" class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 transition">
                                Tinjau Ulang
                            </button>
                        @endif
                    </div>

                </div>
            </div>
        @endforeach
    </div>

    <!-- Interactive Verification Modal (Alpine.js) -->
    <div x-show="modalOpen" x-cloak class="fixed inset-0 z-50 overflow-y-auto bg-slate-950/60 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-lg w-full p-6 sm:p-8 space-y-5 shadow-2xl border border-slate-200" @click.away="modalOpen = false">
            
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <div :class="modalAction === 'approve' ? 'bg-emerald-100 text-emerald-600' : 'bg-rose-100 text-rose-600'" class="w-10 h-10 rounded-xl flex items-center justify-center text-lg">
                        <i :class="modalAction === 'approve' ? 'fa-solid fa-check' : 'fa-solid fa-xmark'"></i>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-slate-900" x-text="modalAction === 'approve' ? 'Konfirmasi Persetujuan Akun' : 'Tolak Pendaftaran Akun'"></h3>
                        <p class="text-xs text-slate-500" x-text="activeOrg ? activeOrg.name : ''"></p>
                    </div>
                </div>
                <button @click="modalOpen = false" class="text-slate-400 hover:text-slate-600">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            <!-- Form Action -->
            <form :action="'{{ url('admin/verifikasi-akun') }}/' + (activeOrg ? activeOrg.id : 1)" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="action" :value="modalAction">

                <div x-show="modalAction === 'approve'" class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-900 text-xs leading-relaxed">
                    Dengan menyetujui akun ini, organisasi akan mendapatkan status <strong>Terverifikasi</strong> dan dapat segera mengajukan kompetisi resmi di platform DelOlympic.
                </div>

                <div x-show="modalAction === 'reject'" class="space-y-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                        Alasan Penolakan <span class="text-rose-600">* (Wajib Diisi)</span>
                    </label>
                    <textarea name="reason" x-model="reasonText" rows="3" placeholder="Jelaskan alasan dokumen tidak sah atau informasi yang belum lengkap agar dapat diperbaiki penyelenggara..." class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs focus:outline-none focus:ring-2 focus:ring-rose-500"></textarea>
                    <p class="text-[11px] text-slate-500">Alasan ini akan dikirimkan otomatis melalui notifikasi kepada pihak penyelenggara.</p>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                    <button type="button" @click="modalOpen = false" class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 transition">
                        Batal
                    </button>
                    <button type="submit" :class="modalAction === 'approve' ? 'bg-emerald-600 hover:bg-emerald-700' : 'bg-rose-600 hover:bg-rose-700'" class="px-5 py-2 rounded-xl text-xs font-bold text-white shadow-sm transition">
                        <span x-text="modalAction === 'approve' ? 'Ya, Setujui Akun' : 'Kirim Penolakan'"></span>
                    </button>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection
