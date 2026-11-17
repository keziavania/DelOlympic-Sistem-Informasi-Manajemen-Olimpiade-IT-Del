@extends('layouts.dashboard')

@section('title', 'Pendaftaran Peserta – Penyelenggara DelOlympic')
@section('header_title', 'Pendaftaran Peserta Masuk')
@section('header_subtitle', 'Tabel seluruh peserta yang mendaftar ke cabang lomba yang Anda selenggarakan.')

@section('content')
<div class="space-y-6">
    <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs overflow-hidden">
        
        <div class="p-5 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <h3 class="font-bold text-sm text-slate-900">Data Pendaftar ({{ count($registrations) }})</h3>
            <a href="{{ route('penyelenggara.verify-participants') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 transition">
                <i class="fa-solid fa-user-check"></i>
                <span>Buka Antrean Verifikasi</span>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-600">
                <thead class="bg-slate-50 text-[11px] font-bold uppercase tracking-wider text-slate-500 border-b border-slate-200">
                    <tr>
                        <th class="py-3.5 px-4">Nama Tim / Peserta</th>
                        <th class="py-3.5 px-4">Email & Kontak</th>
                        <th class="py-3.5 px-4">Cabang Lomba</th>
                        <th class="py-3.5 px-4">Tanggal Daftar</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($registrations as $reg)
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="py-3.5 px-4">
                                <p class="font-bold text-slate-900">{{ $reg['participant_name'] }}</p>
                                <p class="text-[11px] text-slate-400">Ketua: {{ $reg['leader_name'] }}</p>
                            </td>
                            <td class="py-3.5 px-4 font-mono">{{ $reg['email'] }}</td>
                            <td class="py-3.5 px-4 font-semibold text-slate-800">{{ $reg['branch'] }}</td>
                            <td class="py-3.5 px-4 text-slate-500">{{ $reg['registered_at'] }}</td>
                            <td class="py-3.5 px-4">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold 
                                    {{ $reg['status'] === 'Terverifikasi' ? 'bg-emerald-100 text-emerald-800' : 
                                       ($reg['status'] === 'Menunggu Verifikasi' ? 'bg-amber-100 text-amber-800' : 'bg-rose-100 text-rose-800') }}">
                                    {{ $reg['status'] }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 text-right">
                                <a href="{{ route('penyelenggara.verify-participants') }}" class="font-bold text-emerald-600 hover:underline">
                                    Detail / Verifikasi
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
