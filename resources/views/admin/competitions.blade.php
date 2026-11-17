@extends('layouts.dashboard')

@section('title', 'Data Seluruh Lomba – Admin DelOlympic')
@section('header_title', 'Master Data Kompetisi')
@section('header_subtitle', 'Seluruh data perlombaan yang tercatat di dalam platform DelOlympic.')

@section('content')
<div class="space-y-6">
    <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs overflow-hidden">
        
        <div class="p-5 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <h3 class="font-bold text-sm text-slate-900">Daftar Kompetisi Aktif ({{ count($competitions) }})</h3>
            <a href="{{ route('admin.submissions') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold text-brand-700 bg-brand-50 hover:bg-brand-100 border border-brand-200 transition">
                <i class="fa-solid fa-file-circle-check"></i>
                <span>Tinjau Pengajuan Lomba Baru</span>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-600">
                <thead class="bg-slate-50 text-[11px] font-bold uppercase tracking-wider text-slate-500 border-b border-slate-200">
                    <tr>
                        <th class="py-3.5 px-4">Nama Lomba</th>
                        <th class="py-3.5 px-4">Kategori</th>
                        <th class="py-3.5 px-4">Penyelenggara</th>
                        <th class="py-3.5 px-4">Jadwal Acara</th>
                        <th class="py-3.5 px-4 text-center">Partisipan</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-4 text-right">Detail</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($competitions as $c)
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="py-3.5 px-4 font-bold text-slate-900">{{ $c['title'] }}</td>
                            <td class="py-3.5 px-4">{{ $c['category'] }}</td>
                            <td class="py-3.5 px-4">{{ $c['organizer'] }}</td>
                            <td class="py-3.5 px-4">{{ $c['event_date'] }}</td>
                            <td class="py-3.5 px-4 text-center font-bold">{{ $c['participants_count'] }}/{{ $c['max_quota'] }}</td>
                            <td class="py-3.5 px-4">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold {{ $c['status_pendaftaran'] === 'Dibuka' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }}">
                                    {{ $c['status_pendaftaran'] }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 text-right">
                                <a href="{{ route('competitions.detail', $c['id']) }}" target="_blank" class="font-bold text-brand-600 hover:underline">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
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
