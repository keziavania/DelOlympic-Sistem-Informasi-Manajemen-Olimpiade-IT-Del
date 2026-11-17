@extends('layouts.dashboard')

@section('title', 'Hasil Pertandingan & Daftar Juara – DelOlympic')
@section('header_title', 'Hasil Pertandingan & Daftar Juara')
@section('header_subtitle', 'Pantau bagan sistem gugur, posisi tim di klasemen liga, dan perolehan medali juara.')

@section('content')
<div class="space-y-8" x-data="{ viewMode: 'bracket' }">
    
    <!-- Tab Selector -->
    <div class="bg-white p-4 rounded-2xl border border-slate-200/90 shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex items-center gap-2 p-1 bg-slate-100 rounded-xl text-xs font-semibold">
            <button type="button" @click="viewMode = 'bracket'" :class="viewMode === 'bracket' ? 'bg-white text-brand-700 font-bold shadow-xs' : 'text-slate-600'" class="px-4 py-2 rounded-lg transition flex items-center gap-2">
                <i class="fa-solid fa-sitemap"></i>
                <span>Bagan Bracket Turnamen</span>
            </button>
            <button type="button" @click="viewMode = 'standings'" :class="viewMode === 'standings' ? 'bg-white text-brand-700 font-bold shadow-xs' : 'text-slate-600'" class="px-4 py-2 rounded-lg transition flex items-center gap-2">
                <i class="fa-solid fa-table-list"></i>
                <span>Klasemen Skor Liga</span>
            </button>
            <button type="button" @click="viewMode = 'champions'" :class="viewMode === 'champions' ? 'bg-white text-brand-700 font-bold shadow-xs' : 'text-slate-600'" class="px-4 py-2 rounded-lg transition flex items-center gap-2">
                <i class="fa-solid fa-trophy text-amber-500"></i>
                <span>Daftar Juara Resmi</span>
            </button>
        </div>

        <span class="text-xs text-slate-500 font-medium">
            <i class="fa-solid fa-arrows-rotate mr-1 text-emerald-500"></i> Live Update Hasil Resmi
        </span>
    </div>

    <!-- VIEW 1: TOURNAMENT BRACKET -->
    <div x-show="viewMode === 'bracket'" class="space-y-6">
        <div class="bg-white rounded-3xl border border-slate-200/90 p-6 sm:p-8 shadow-xs overflow-x-auto custom-scrollbar">
            <h3 class="font-bold text-base text-slate-900 mb-6 pb-3 border-b border-slate-100">
                Bagan Pertandingan Sistem Gugur (Valorant Collegiate Championship 2026)
            </h3>

            <div class="min-w-[800px] grid grid-cols-3 gap-8 items-center">
                <!-- Quarter Finals -->
                <div class="space-y-6">
                    <div class="text-center pb-2 text-xs font-bold uppercase tracking-wider text-slate-400">Quarter Finals</div>
                    @foreach($bracket['quarter_finals'] as $qf)
                        <div class="bg-slate-50 rounded-2xl border border-slate-200 p-3.5 space-y-2 text-xs">
                            <div class="flex items-center justify-between {{ $qf['winner'] === $qf['team1'] ? 'font-bold text-emerald-700' : 'text-slate-700' }}">
                                <span>{{ $qf['team1'] }}</span>
                                <span class="font-mono bg-white px-2 py-0.5 rounded border border-slate-200">{{ $qf['score1'] }}</span>
                            </div>
                            <div class="flex items-center justify-between border-t border-slate-200 pt-1.5 {{ $qf['winner'] === $qf['team2'] ? 'font-bold text-emerald-700' : 'text-slate-700' }}">
                                <span>{{ $qf['team2'] }}</span>
                                <span class="font-mono bg-white px-2 py-0.5 rounded border border-slate-200">{{ $qf['score2'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Semi Finals -->
                <div class="space-y-12">
                    <div class="text-center pb-2 text-xs font-bold uppercase tracking-wider text-slate-400">Semifinals</div>
                    @foreach($bracket['semi_finals'] as $sf)
                        <div class="bg-slate-50 rounded-2xl border border-slate-200 p-4 space-y-2 text-xs">
                            <div class="flex items-center justify-between {{ $sf['winner'] === $sf['team1'] ? 'font-bold text-brand-700' : 'text-slate-700' }}">
                                <span>{{ $sf['team1'] }}</span>
                                <span class="font-mono bg-white px-2 py-0.5 rounded border border-slate-200">{{ $sf['score1'] }}</span>
                            </div>
                            <div class="flex items-center justify-between border-t border-slate-200 pt-1.5 {{ $sf['winner'] === $sf['team2'] ? 'font-bold text-brand-700' : 'text-slate-700' }}">
                                <span>{{ $sf['team2'] }}</span>
                                <span class="font-mono bg-white px-2 py-0.5 rounded border border-slate-200">{{ $sf['score2'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Grand Final -->
                <div class="space-y-6">
                    <div class="text-center pb-2 text-xs font-bold uppercase tracking-wider text-amber-500">
                        <i class="fa-solid fa-trophy mr-1"></i> Grand Final
                    </div>
                    <div class="bg-gradient-to-b from-amber-50 to-white rounded-3xl border-2 border-amber-300 p-6 space-y-4 text-xs shadow-md">
                        <div class="text-center pb-2 border-b border-amber-200">
                            <span class="font-bold text-amber-900 block">Jadwal Final</span>
                            <span class="text-[10px] text-slate-500">{{ $bracket['finals'][0]['date'] }}</span>
                        </div>
                        <div class="space-y-3 font-bold text-slate-900">
                            <div class="flex items-center justify-between p-2 rounded-xl bg-white border border-amber-200">
                                <span>{{ $bracket['finals'][0]['team1'] }}</span>
                                <span class="text-amber-600 font-mono text-base font-black">?</span>
                            </div>
                            <div class="text-center text-xs text-slate-400">VS</div>
                            <div class="flex items-center justify-between p-2 rounded-xl bg-white border border-amber-200">
                                <span>{{ $bracket['finals'][0]['team2'] }}</span>
                                <span class="text-amber-600 font-mono text-base font-black">?</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- VIEW 2: KLASEMEN SISTEM LIGA -->
    <div x-show="viewMode === 'standings'" x-cloak class="space-y-6">
        <div class="bg-white rounded-3xl border border-slate-200/90 shadow-xs overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                <h3 class="font-bold text-base text-slate-900">Klasemen Skor Resmi (ICPC Del 2026)</h3>
                <span class="text-xs text-slate-400">Pembaruan Babak Terakhir</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-600">
                    <thead class="bg-slate-50 text-[11px] font-bold uppercase tracking-wider text-slate-500 border-b border-slate-200">
                        <tr>
                            <th class="py-3.5 px-4 text-center">Rank</th>
                            <th class="py-3.5 px-4">Nama Tim</th>
                            <th class="py-3.5 px-4 text-center">Main</th>
                            <th class="py-3.5 px-4 text-center">Solved</th>
                            <th class="py-3.5 px-4 text-center">Penalti</th>
                            <th class="py-3.5 px-4 text-center font-bold text-slate-900">Total Poin</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($standings as $st)
                            <tr class="hover:bg-slate-50/80 transition {{ $st['rank'] === 1 ? 'bg-amber-50/40 font-bold' : '' }}">
                                <td class="py-3.5 px-4 text-center font-black">
                                    <span class="w-6 h-6 rounded-full {{ $st['rank'] === 1 ? 'bg-amber-400 text-slate-950' : 'bg-slate-200 text-slate-700' }} inline-flex items-center justify-center text-xs">
                                        {{ $st['rank'] }}
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 font-bold text-slate-900">{{ $st['team'] }}</td>
                                <td class="py-3.5 px-4 text-center">{{ $st['played'] }}</td>
                                <td class="py-3.5 px-4 text-center font-bold text-emerald-600">{{ $st['solved'] }}</td>
                                <td class="py-3.5 px-4 text-center font-mono">{{ $st['penalty'] }}</td>
                                <td class="py-3.5 px-4 text-center font-black text-sm text-brand-700">{{ $st['points'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- VIEW 3: DAFTAR JUARA (HALL OF CHAMPIONS) -->
    <div x-show="viewMode === 'champions'" x-cloak class="space-y-6">
        <div class="bg-white rounded-3xl border border-slate-200/90 p-8 shadow-xs space-y-8">
            <div class="text-center max-w-xl mx-auto space-y-2">
                <div class="w-16 h-16 rounded-2xl bg-amber-100 text-amber-500 flex items-center justify-center text-3xl mx-auto mb-2">
                    <i class="fa-solid fa-trophy"></i>
                </div>
                <h3 class="text-2xl font-black text-slate-900">Daftar Juara & Peraih Prestasi DelOlympic</h3>
                <p class="text-xs text-slate-500">Hasil resmi yang telah disahkan dan dipublikasikan oleh Panitia Penyelenggara.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4">
                
                <!-- Juara 2 -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200 text-center space-y-3 order-2 md:order-1">
                    <div class="w-12 h-12 rounded-full bg-slate-300 text-slate-700 flex items-center justify-center text-xl font-black mx-auto">
                        2
                    </div>
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Juara 2 (Runner Up)</span>
                    <h4 class="font-extrabold text-slate-900 text-base">Gadjah Algoritma</h4>
                    <p class="text-xs text-slate-500">Universitas Gadjah Mada</p>
                    <div class="text-xs font-bold text-slate-700 bg-white p-2 rounded-xl border border-slate-200">
                        Hadiah: Rp 5.000.000 + Medali Perak
                    </div>
                </div>

                <!-- Juara 1 -->
                <div class="bg-gradient-to-b from-amber-50 to-white rounded-2xl p-8 border-2 border-amber-400 text-center space-y-3 shadow-xl order-1 md:order-2 -translate-y-2">
                    <div class="w-16 h-16 rounded-full bg-amber-400 text-slate-950 flex items-center justify-center text-3xl font-black mx-auto shadow-md">
                        <i class="fa-solid fa-crown text-xl"></i>
                    </div>
                    <span class="text-xs font-black uppercase tracking-wider text-amber-700">Juara 1 (Champion)</span>
                    <h4 class="font-black text-slate-900 text-lg">Tim Horas Coder</h4>
                    <p class="text-xs text-slate-500 font-semibold">Institut Teknologi Del</p>
                    <div class="text-xs font-bold text-amber-800 bg-amber-100 p-2.5 rounded-xl border border-amber-200">
                        Hadiah: Rp 8.000.000 + Piala Bergilir + Sertifikat Juara
                    </div>
                </div>

                <!-- Juara 3 -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200 text-center space-y-3 order-3">
                    <div class="w-12 h-12 rounded-full bg-amber-700 text-white flex items-center justify-center text-xl font-black mx-auto">
                        3
                    </div>
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Juara 3 (Third Place)</span>
                    <h4 class="font-extrabold text-slate-900 text-base">Bandung Binary</h4>
                    <p class="text-xs text-slate-500">Institut Teknologi Bandung</p>
                    <div class="text-xs font-bold text-slate-700 bg-white p-2 rounded-xl border border-slate-200">
                        Hadiah: Rp 2.000.000 + Medali Perunggu
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
