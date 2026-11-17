@extends('layouts.dashboard')

@section('title', 'Data Peserta – Admin DelOlympic')
@section('header_title', 'Master Data Peserta')
@section('header_subtitle', 'Seluruh peserta dan tim yang mendaftar ke berbagai cabang lomba.')

@section('content')
<div class="space-y-6">
    <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs overflow-hidden">
        
        <div class="p-5 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <h3 class="font-bold text-sm text-slate-900">Data Pendaftaran Peserta ({{ count($registrations) }})</h3>
            <button onclick="alert('Export data peserta ke spreadsheet berhasil diunduh.')" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 transition">
                <i class="fa-solid fa-file-excel text-emerald-600"></i>
                <span>Ekspor Spreadsheet (.xlsx)</span>
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-600">
                <thead class="bg-slate-50 text-[11px] font-bold uppercase tracking-wider text-slate-500 border-b border-slate-200">
                    <tr>
                        <th class="py-3.5 px-4">ID Reg</th>
                        <th class="py-3.5 px-4">Nama Tim / Peserta</th>
                        <th class="py-3.5 px-4">Ketua & Kontak</th>
                        <th class="py-3.5 px-4">Institusi</th>
                        <th class="py-3.5 px-4">Lomba & Cabang</th>
                        <th class="py-3.5 px-4">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($registrations as $r)
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="py-3.5 px-4 font-mono font-bold text-slate-500">{{ $r['id'] }}</td>
                            <td class="py-3.5 px-4 font-bold text-slate-900">{{ $r['participant_name'] }}</td>
                            <td class="py-3.5 px-4">
                                <p class="font-semibold text-slate-800">{{ $r['leader_name'] }}</p>
                                <p class="text-[11px] text-slate-400 font-mono">{{ $r['email'] }}</p>
                            </td>
                            <td class="py-3.5 px-4">{{ $r['institution'] }}</td>
                            <td class="py-3.5 px-4">
                                <p class="font-semibold text-slate-800">{{ $r['competition'] }}</p>
                                <p class="text-[11px] text-brand-600 font-medium">{{ $r['branch'] }}</p>
                            </td>
                            <td class="py-3.5 px-4">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold 
                                    {{ $r['status'] === 'Terverifikasi' ? 'bg-emerald-100 text-emerald-800' : 
                                       ($r['status'] === 'Menunggu Verifikasi' ? 'bg-amber-100 text-amber-800' : 'bg-rose-100 text-rose-800') }}">
                                    {{ $r['status'] }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
