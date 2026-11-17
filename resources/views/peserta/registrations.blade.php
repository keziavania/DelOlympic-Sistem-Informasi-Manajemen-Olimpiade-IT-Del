@extends('layouts.dashboard')

@section('title', 'Pendaftaran Saya – DelOlympic')
@section('header_title', 'Status Pendaftaran Kompetisi')
@section('header_subtitle', 'Pantau keabsahan berkas pendaftaran, cetak bukti registrasi, dan lihat catatan panitia.')

@section('content')
<div class="space-y-6">
    
    <div class="bg-white p-4 rounded-2xl border border-slate-200/90 shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex items-center gap-2">
            <span class="text-xs text-slate-500">
                Riwayat pendaftaran lomba aktif atas nama akun <strong class="text-slate-900">Bona Ventura Panjaitan</strong>
            </span>
        </div>
        <a href="{{ route('competitions.index') }}" class="px-4 py-2 rounded-xl text-xs font-bold text-white bg-brand-600 hover:bg-brand-700 transition shadow-sm self-start sm:self-auto">
            <i class="fa-solid fa-plus mr-1"></i> Daftar Lomba Lain
        </a>
    </div>

    <!-- Registrations Cards List -->
    <div class="space-y-4">
        @foreach($allRegistrations as $reg)
            <div class="bg-white rounded-2xl p-6 border {{ $reg['status'] === 'Ditolak' ? 'border-rose-300 ring-1 ring-rose-200' : ($reg['status'] === 'Terverifikasi' ? 'border-emerald-200' : 'border-amber-200') }} shadow-xs">
                <div class="flex flex-col lg:flex-row lg:items-start justify-between gap-6">
                    
                    <div class="space-y-3 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="font-mono text-xs font-bold text-slate-400">{{ $reg['id'] }}</span>
                            <h3 class="text-base font-bold text-slate-900">{{ $reg['competition'] }}</h3>
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold 
                                {{ $reg['status'] === 'Terverifikasi' ? 'bg-emerald-100 text-emerald-800 border border-emerald-200' : 
                                   ($reg['status'] === 'Menunggu Verifikasi' ? 'bg-amber-100 text-amber-800 border border-amber-300' : 'bg-rose-100 text-rose-800 border border-rose-200') }}">
                                Status: {{ $reg['status'] }}
                            </span>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs text-slate-600">
                            <div>
                                <span class="text-slate-400 block">Cabang Lomba:</span>
                                <strong class="text-brand-600">{{ $reg['branch'] }}</strong>
                            </div>
                            <div>
                                <span class="text-slate-400 block">Nama Tim & Ketua:</span>
                                <strong class="text-slate-800">{{ $reg['participant_name'] }}</strong>
                                <p class="text-[11px] text-slate-500">{{ $reg['leader_name'] }} ({{ $reg['institution'] }})</p>
                            </div>
                            <div>
                                <span class="text-slate-400 block">Waktu Registrasi:</span>
                                <span class="text-slate-500">{{ $reg['registered_at'] }}</span>
                            </div>
                        </div>

                        <div class="pt-1 text-xs text-slate-500">
                            <span>Anggota Tim: </span>
                            <span class="font-medium text-slate-700">{{ implode(', ', $reg['members']) }}</span>
                        </div>

                        <!-- ALASAN PENOLAKAN JIKA DITOLAK -->
                        @if($reg['status'] === 'Ditolak' && $reg['rejection_reason'])
                            <div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-xs text-rose-900 space-y-2">
                                <div class="font-bold flex items-center gap-2 text-rose-700">
                                    <i class="fa-solid fa-triangle-exclamation text-sm"></i>
                                    <span>Alasan Penolakan dari Pihak Penyelenggara:</span>
                                </div>
                                <p class="text-slate-700 leading-relaxed">{{ $reg['rejection_reason'] }}</p>
                                <div class="pt-1">
                                    <button type="button" onclick="alert('Formulir perbaikan berkas dibuka. Anda dapat mengunggah ulang KTM/bukti bayar yang jelas.')" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg text-xs font-bold text-white bg-rose-600 hover:bg-rose-700 shadow-sm transition">
                                        <i class="fa-solid fa-upload"></i>
                                        <span>Unggah Ulang Berkas yang Diperbaiki</span>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Actions -->
                    <div class="shrink-0 flex items-center gap-2 pt-2 lg:pt-0 border-t lg:border-t-0 border-slate-100">
                        @if($reg['status'] === 'Terverifikasi')
                            <button type="button" onclick="alert('Kartu Peserta Resmi DelOlympic berhasil diunduh (PDF)')" class="px-4 py-2 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition shadow-sm flex items-center gap-1.5">
                                <i class="fa-solid fa-file-arrow-down"></i>
                                <span>Unduh Kartu Peserta</span>
                            </button>
                        @elseif($reg['status'] === 'Menunggu Verifikasi')
                            <span class="px-3 py-1.5 rounded-xl text-xs font-semibold text-amber-700 bg-amber-50 border border-amber-200 flex items-center gap-1.5">
                                <i class="fa-solid fa-clock"></i>
                                <span>Menunggu Validasi</span>
                            </span>
                        @else
                            <button type="button" onclick="alert('Silakan hubungi narahubung panitia untuk bantuan perbaikan pendaftaran.')" class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 transition">
                                Hubungi Panitia
                            </button>
                        @endif
                    </div>

                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
