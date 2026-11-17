@extends('layouts.dashboard')

@section('title', 'Data Penyelenggara – DelOlympic')
@section('header_title', 'Data Akun Penyelenggara')
@section('header_subtitle', 'Direktori seluruh organisasi, himpunan mahasiswa, dan UKM yang terdaftar.')

@section('content')
<div class="space-y-6">
    <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs overflow-hidden">
        
        <div class="p-5 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <h3 class="font-bold text-sm text-slate-900">Daftar Penyelenggara Terdaftar ({{ count($organizers) }})</h3>
            <a href="{{ route('admin.verify-accounts') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold text-amber-700 bg-amber-50 hover:bg-amber-100 border border-amber-200 transition">
                <i class="fa-solid fa-user-check"></i>
                <span>Buka Verifikasi Akun Baru</span>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-600">
                <thead class="bg-slate-50 text-[11px] font-bold uppercase tracking-wider text-slate-500 border-b border-slate-200">
                    <tr>
                        <th class="py-3.5 px-4">Nama Organisasi</th>
                        <th class="py-3.5 px-4">Tipe Organisasi</th>
                        <th class="py-3.5 px-4">Penanggung Jawab (PIC)</th>
                        <th class="py-3.5 px-4">Kontak</th>
                        <th class="py-3.5 px-4 text-center">Jumlah Lomba</th>
                        <th class="py-3.5 px-4">Status Akun</th>
                        <th class="py-3.5 px-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($organizers as $org)
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="py-3.5 px-4 font-bold text-slate-900">{{ $org['name'] }}</td>
                            <td class="py-3.5 px-4">{{ $org['type'] }}</td>
                            <td class="py-3.5 px-4">{{ $org['pic'] }}</td>
                            <td class="py-3.5 px-4 font-mono">{{ $org['email'] }}</td>
                            <td class="py-3.5 px-4 text-center font-bold">{{ $org['competitions_count'] }}</td>
                            <td class="py-3.5 px-4">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold 
                                    {{ $org['status'] === 'Terverifikasi' ? 'bg-emerald-100 text-emerald-800' : 
                                       ($org['status'] === 'Menunggu Verifikasi' ? 'bg-amber-100 text-amber-800' : 'bg-rose-100 text-rose-800') }}">
                                    {{ $org['status'] }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 text-right">
                                <a href="{{ route('admin.verify-accounts') }}" class="font-bold text-brand-600 hover:underline">Kelola</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
