@extends('layouts.dashboard')

@section('title', 'Verifikasi Peserta – Penyelenggara DelOlympic')
@section('header_title', 'Verifikasi Berkas Pendaftaran Peserta')
@section('header_subtitle', 'Periksa identitas tim, keabsahan KTM/kartu pelajar, dan konfirmasi penerimaan atau penolakan.')

@section('content')
<div class="space-y-6" x-data="{ modalOpen: false, modalAction: 'approve', activeReg: null, reasonText: '' }">
    
    <div class="bg-white p-4 rounded-2xl border border-slate-200/90 shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex items-center gap-2">
            <span class="px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800 border border-amber-200">
                2 Pendaftaran Perlu Verifikasi
            </span>
            <span class="text-xs text-slate-500 hidden sm:inline">• Validasi data sebelum menyusun bagan pertandingan</span>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('penyelenggara.registrations') }}" class="text-xs font-semibold text-brand-600 hover:underline">
                Lihat Semua Riwayat Pendaftaran
            </a>
        </div>
    </div>

    <!-- Registrations Cards -->
    <div class="space-y-4">
        @foreach($registrations as $r)
            <div class="bg-white rounded-2xl p-6 border {{ $r['status'] === 'Menunggu Verifikasi' ? 'border-amber-300 ring-1 ring-amber-200 bg-amber-50/10' : 'border-slate-200/90' }} shadow-xs">
                <div class="flex flex-col lg:flex-row lg:items-start justify-between gap-6">
                    
                    <div class="space-y-3 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="font-mono text-xs font-bold text-slate-400">{{ $r['id'] }}</span>
                            <h3 class="text-base font-bold text-slate-900">{{ $r['participant_name'] }}</h3>
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold 
                                {{ $r['status'] === 'Terverifikasi' ? 'bg-emerald-100 text-emerald-800 border border-emerald-200' : 
                                   ($r['status'] === 'Menunggu Verifikasi' ? 'bg-amber-100 text-amber-800 border border-amber-300' : 'bg-rose-100 text-rose-800 border border-rose-200') }}">
                                {{ $r['status'] }}
                            </span>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs text-slate-600">
                            <div>
                                <span class="text-slate-400 block">Ketua & Anggota:</span>
                                <strong class="text-slate-800">{{ $r['leader_name'] }}</strong>
                                <p class="text-[11px] text-slate-500">{{ implode(', ', $r['members']) }}</p>
                            </div>
                            <div>
                                <span class="text-slate-400 block">Institusi & Kontak:</span>
                                <span>{{ $r['institution'] }}</span>
                                <p class="text-[11px] text-slate-500 font-mono">{{ $r['email'] }} • {{ $r['phone'] }}</p>
                            </div>
                            <div>
                                <span class="text-slate-400 block">Cabang Lomba:</span>
                                <strong class="text-brand-600">{{ $r['branch'] }}</strong>
                                <p class="text-[11px] text-slate-400">Didaftarkan: {{ $r['registered_at'] }}</p>
                            </div>
                        </div>

                        <!-- Dokumen Persyaratan -->
                        <div class="pt-2 flex flex-wrap items-center gap-2 text-xs">
                            <span class="text-slate-400">Berkas Terlampir:</span>
                            @foreach($r['documents'] as $doc)
                                <a href="javascript:void(0)" onclick="alert('Membuka pratinjau dokumen: {{ $doc }}')" class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium transition">
                                    <i class="fa-solid fa-file-pdf text-rose-500 text-[11px]"></i>
                                    <span>{{ $doc }}</span>
                                </a>
                            @endforeach
                        </div>

                        @if($r['rejection_reason'])
                            <div class="p-3 rounded-xl bg-rose-50 border border-rose-200 text-xs text-rose-800 space-y-1">
                                <strong class="font-bold block flex items-center gap-1.5">
                                    <i class="fa-solid fa-circle-exclamation"></i> Alasan Penolakan Berkas:
                                </strong>
                                <p>{{ $r['rejection_reason'] }}</p>
                            </div>
                        @endif
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center gap-2.5 shrink-0 pt-2 lg:pt-0 border-t lg:border-t-0 border-slate-100">
                        @if($r['status'] === 'Menunggu Verifikasi')
                            <button type="button" @click="modalOpen = true; modalAction = 'reject'; activeReg = {{ json_encode($r) }}; reasonText = ''" class="px-4 py-2.5 rounded-xl text-xs font-bold text-rose-700 bg-rose-50 hover:bg-rose-100 border border-rose-200 transition">
                                <i class="fa-solid fa-xmark mr-1"></i> Tolak Berkas
                            </button>
                            <button type="button" @click="modalOpen = true; modalAction = 'approve'; activeReg = {{ json_encode($r) }}; reasonText = ''" class="px-5 py-2.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-sm transition">
                                <i class="fa-solid fa-check mr-1"></i> Terima Peserta
                            </button>
                        @elseif($r['status'] === 'Terverifikasi')
                            <span class="px-3 py-1.5 rounded-xl text-xs font-semibold text-emerald-700 bg-emerald-50 border border-emerald-200">
                                <i class="fa-solid fa-circle-check mr-1"></i> Telah Terverifikasi
                            </span>
                        @else
                            <button type="button" @click="modalOpen = true; modalAction = 'approve'; activeReg = {{ json_encode($r) }}; reasonText = ''" class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 transition">
                                Tinjau Ulang
                            </button>
                        @endif
                    </div>

                </div>
            </div>
        @endforeach
    </div>

    <!-- Verification Modal -->
    <div x-show="modalOpen" x-cloak class="fixed inset-0 z-50 overflow-y-auto bg-slate-950/60 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-lg w-full p-6 sm:p-8 space-y-5 shadow-2xl border border-slate-200" @click.away="modalOpen = false">
            
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <div :class="modalAction === 'approve' ? 'bg-emerald-100 text-emerald-600' : 'bg-rose-100 text-rose-600'" class="w-10 h-10 rounded-xl flex items-center justify-center text-lg">
                        <i :class="modalAction === 'approve' ? 'fa-solid fa-check' : 'fa-solid fa-xmark'"></i>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-slate-900" x-text="modalAction === 'approve' ? 'Terima Pendaftaran Peserta' : 'Tolak Pendaftaran Peserta'"></h3>
                        <p class="text-xs text-slate-500" x-text="activeReg ? activeReg.participant_name : ''"></p>
                    </div>
                </div>
                <button @click="modalOpen = false" class="text-slate-400 hover:text-slate-600"><i class="fa-solid fa-xmark text-lg"></i></button>
            </div>

            <form :action="'{{ url('penyelenggara/verifikasi-peserta') }}/' + (activeReg ? activeReg.id : 1)" method="POST" class="space-y-4 text-xs">
                @csrf
                <input type="hidden" name="action" :value="modalAction">

                <div x-show="modalAction === 'approve'" class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-900 leading-relaxed">
                    Dengan menyetujui, peserta resmi terdaftar dalam cabang lomba dan siap dimasukkan ke dalam bagan pertandingan (bracket/jadwal).
                </div>

                <div x-show="modalAction === 'reject'" class="space-y-2">
                    <label class="block font-bold text-slate-700 uppercase tracking-wider">
                        Alasan Penolakan <span class="text-rose-600">* (Wajib Diisi)</span>
                    </label>
                    <textarea name="reason" x-model="reasonText" rows="3" placeholder="Sebutkan berkas yang tidak valid atau alasan kuota penuh..." class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-rose-500"></textarea>
                    <p class="text-[11px] text-slate-500">Alasan ini akan tampil pada dashboard pendaftaran milik peserta.</p>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                    <button type="button" @click="modalOpen = false" class="px-4 py-2 rounded-xl font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200">
                        Batal
                    </button>
                    <button type="submit" :class="modalAction === 'approve' ? 'bg-emerald-600 hover:bg-emerald-700' : 'bg-rose-600 hover:bg-rose-700'" class="px-5 py-2 rounded-xl font-bold text-white shadow-sm transition">
                        <span x-text="modalAction === 'approve' ? 'Ya, Terima Peserta' : 'Kirim Penolakan'"></span>
                    </button>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection
