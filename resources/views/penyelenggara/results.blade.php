@extends('layouts.dashboard')

@section('title', 'Hasil Pertandingan & Bracket – DelOlympic')
@section('header_title', 'Hasil Pertandingan & Manajemen Juara')
@section('header_subtitle', 'Input perolehan skor pertandingan, pantau bagan bracket sistem gugur & klasemen liga.')

@section('content')
<div class="space-y-8" x-data="{ activeTab: 'bracket', scoreModal: false, activeMatch: null, scoreA: 0, scoreB: 0 }">
    
    <!-- Top Tabs & Publish Final Action Bar -->
    <div class="bg-white p-5 rounded-2xl border border-slate-200/90 shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        
        <!-- Tab Selector: Bracket vs Klasemen Liga vs Input Skor -->
        <div class="flex items-center gap-1.5 p-1 bg-slate-100 rounded-xl text-xs font-semibold">
            <button type="button" @click="activeTab = 'bracket'" :class="activeTab === 'bracket' ? 'bg-white text-emerald-700 font-bold shadow-xs' : 'text-slate-600'" class="px-3.5 py-2 rounded-lg transition flex items-center gap-2">
                <i class="fa-solid fa-sitemap"></i>
                <span>Bracket Sistem Gugur</span>
            </button>
            <button type="button" @click="activeTab = 'standings'" :class="activeTab === 'standings' ? 'bg-white text-emerald-700 font-bold shadow-xs' : 'text-slate-600'" class="px-3.5 py-2 rounded-lg transition flex items-center gap-2">
                <i class="fa-solid fa-table-list"></i>
                <span>Klasemen Sistem Liga</span>
            </button>
            <button type="button" @click="activeTab = 'matches'" :class="activeTab === 'matches' ? 'bg-white text-emerald-700 font-bold shadow-xs' : 'text-slate-600'" class="px-3.5 py-2 rounded-lg transition flex items-center gap-2">
                <i class="fa-solid fa-square-poll-vertical"></i>
                <span>Input Skor Match</span>
            </button>
        </div>

        <!-- Publish Final Results Button -->
        <form action="{{ route('penyelenggara.results.publish') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mempublikasikan daftar juara resmi ke publik?');">
            @csrf
            <button type="submit" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs font-bold text-white bg-amber-500 hover:bg-amber-600 transition shadow-sm">
                <i class="fa-solid fa-crown text-slate-950"></i>
                <span class="text-slate-950">Publikasikan Hasil Akhir & Juara</span>
            </button>
        </form>

    </div>

    <!-- TAB 1: BRACKET SISTEM GUGUR (INTERACTIVE TOURNAMENT BRACKET) -->
    <div x-show="activeTab === 'bracket'" class="space-y-6">
        <div class="bg-white rounded-3xl border border-slate-200/90 p-6 sm:p-8 shadow-xs overflow-x-auto custom-scrollbar">
            
            <div class="flex items-center justify-between pb-6 border-b border-slate-100 mb-6">
                <div>
                    <h3 class="font-bold text-base text-slate-900">Bagan Turnamen Sistem Gugur (Valorant Championship 2026)</h3>
                    <p class="text-xs text-slate-500">Pemenang babak otomatis maju ke pertandingan selanjutnya setelah skor dikonfirmasi.</p>
                </div>
                <span class="px-3 py-1 rounded-full text-xs font-bold bg-purple-50 text-purple-700 border border-purple-200">
                    Sistem Gugur Tunggal
                </span>
            </div>

            <!-- Bracket Columns Layout -->
            <div class="min-w-[800px] grid grid-cols-3 gap-8 items-center relative">
                
                <!-- Col 1: Quarter Finals -->
                <div class="space-y-6">
                    <div class="text-center pb-2 text-xs font-bold uppercase tracking-wider text-slate-400">
                        Perempat Final (Quarter Finals)
                    </div>

                    @foreach($bracket['quarter_finals'] as $qf)
                        <div class="bg-slate-50 rounded-2xl border {{ $qf['winner'] ? 'border-emerald-300 ring-1 ring-emerald-200' : 'border-slate-200' }} p-3.5 space-y-2 text-xs shadow-xs">
                            <div class="flex items-center justify-between {{ $qf['winner'] === $qf['team1'] ? 'font-bold text-emerald-700' : 'text-slate-700' }}">
                                <span>{{ $qf['team1'] }}</span>
                                <span class="font-mono bg-white px-2 py-0.5 rounded border border-slate-200">{{ $qf['score1'] }}</span>
                            </div>
                            <div class="flex items-center justify-between border-t border-slate-200 pt-1.5 {{ $qf['winner'] === $qf['team2'] ? 'font-bold text-emerald-700' : 'text-slate-700' }}">
                                <span>{{ $qf['team2'] }}</span>
                                <span class="font-mono bg-white px-2 py-0.5 rounded border border-slate-200">{{ $qf['score2'] }}</span>
                            </div>
                            <div class="text-[10px] text-emerald-600 font-semibold pt-1 border-t border-slate-200/60 flex items-center justify-between">
                                <span>Lolos: {{ $qf['winner'] }}</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Col 2: Semi Finals -->
                <div class="space-y-12">
                    <div class="text-center pb-2 text-xs font-bold uppercase tracking-wider text-slate-400">
                        Babak Semifinal (Semi Finals)
                    </div>

                    @foreach($bracket['semi_finals'] as $sf)
                        <div class="bg-slate-50 rounded-2xl border {{ $sf['winner'] ? 'border-brand-300 ring-1 ring-brand-200' : 'border-slate-200' }} p-4 space-y-2.5 text-xs shadow-sm">
                            <div class="flex items-center justify-between {{ $sf['winner'] === $sf['team1'] ? 'font-bold text-brand-700' : 'text-slate-700' }}">
                                <span>{{ $sf['team1'] }}</span>
                                <span class="font-mono bg-white px-2 py-0.5 rounded border border-slate-200">{{ $sf['score1'] }}</span>
                            </div>
                            <div class="flex items-center justify-between border-t border-slate-200 pt-2 {{ $sf['winner'] === $sf['team2'] ? 'font-bold text-brand-700' : 'text-slate-700' }}">
                                <span>{{ $sf['team2'] }}</span>
                                <span class="font-mono bg-white px-2 py-0.5 rounded border border-slate-200">{{ $sf['score2'] }}</span>
                            </div>
                            <div class="text-[10px] text-brand-600 font-semibold pt-1 border-t border-slate-200/60 flex items-center justify-between">
                                <span>Maju ke Final: {{ $sf['winner'] }}</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Col 3: Grand Final -->
                <div class="space-y-6">
                    <div class="text-center pb-2 text-xs font-bold uppercase tracking-wider text-amber-500">
                        <i class="fa-solid fa-trophy mr-1"></i> Grand Final
                    </div>

                    <div class="bg-gradient-to-b from-amber-50 to-white rounded-3xl border-2 border-amber-300 p-6 space-y-4 text-xs shadow-lg">
                        <div class="text-center pb-2 border-b border-amber-200/80">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-amber-800">Perebutan Juara 1 & 2</span>
                            <p class="text-[10px] text-slate-500 mt-0.5">{{ $bracket['finals'][0]['date'] }}</p>
                        </div>

                        <div class="space-y-3 font-bold text-slate-900 text-sm">
                            <div class="flex items-center justify-between p-2 rounded-xl bg-white border border-amber-200">
                                <span>{{ $bracket['finals'][0]['team1'] }}</span>
                                <span class="text-amber-600 font-mono font-black text-base">{{ $bracket['finals'][0]['score1'] }}</span>
                            </div>
                            <div class="text-center text-xs text-slate-400 font-semibold">VS</div>
                            <div class="flex items-center justify-between p-2 rounded-xl bg-white border border-amber-200">
                                <span>{{ $bracket['finals'][0]['team2'] }}</span>
                                <span class="text-amber-600 font-mono font-black text-base">{{ $bracket['finals'][0]['score2'] }}</span>
                            </div>
                        </div>

                        <button type="button" @click="scoreModal = true; activeMatch = { title: 'Grand Final Valorant', team_a: 'Del Phoenix', team_b: 'Unimed Rangers' }" class="w-full py-2.5 rounded-xl font-bold text-xs text-slate-950 bg-amber-400 hover:bg-amber-300 transition shadow-sm text-center">
                            <i class="fa-solid fa-pen-to-square mr-1"></i> Input Skor Final Ini
                        </button>
                    </div>

                    <!-- Juara 3 Box -->
                    <div class="p-3 rounded-2xl bg-slate-50 border border-slate-200 text-center text-xs">
                        <span class="text-[10px] text-slate-400 font-semibold block">Juara 3 (Third Place):</span>
                        <strong class="text-slate-800">{{ $bracket['third_place'][0]['winner'] }}</strong>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- TAB 2: KLASEMEN SISTEM LIGA -->
    <div x-show="activeTab === 'standings'" x-cloak class="space-y-6">
        <div class="bg-white rounded-3xl border border-slate-200/90 shadow-xs overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h3 class="font-bold text-base text-slate-900">Klasemen Perolehan Poin (Sistem Liga / ICPC Standings)</h3>
                    <p class="text-xs text-slate-500">Peringkat diperbarui secara otomatis berdasarkan jumlah kemenangan, solved problem, dan selisih skor.</p>
                </div>
                <span class="px-3 py-1 rounded-full text-xs font-bold bg-brand-50 text-brand-700 border border-brand-200">
                    Sistem Poin Klasemen
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-600">
                    <thead class="bg-slate-50 text-[11px] font-bold uppercase tracking-wider text-slate-500 border-b border-slate-200">
                        <tr>
                            <th class="py-3.5 px-4 text-center">Peringkat</th>
                            <th class="py-3.5 px-4">Nama Tim & Institusi</th>
                            <th class="py-3.5 px-4 text-center">Main (Match)</th>
                            <th class="py-3.5 px-4 text-center">Solved / Win</th>
                            <th class="py-3.5 px-4 text-center">Penalti / Selisih</th>
                            <th class="py-3.5 px-4 text-center font-bold text-slate-900">Total Poin</th>
                            <th class="py-3.5 px-4 text-center">Status Kelolosan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($standings as $st)
                            <tr class="hover:bg-slate-50/80 transition {{ $st['rank'] <= 3 ? 'bg-amber-50/30' : '' }}">
                                <td class="py-3.5 px-4 text-center font-black">
                                    @if($st['rank'] === 1)
                                        <span class="w-7 h-7 rounded-full bg-amber-400 text-slate-950 inline-flex items-center justify-center font-bold">1</span>
                                    @elseif($st['rank'] === 2)
                                        <span class="w-7 h-7 rounded-full bg-slate-300 text-slate-800 inline-flex items-center justify-center font-bold">2</span>
                                    @elseif($st['rank'] === 3)
                                        <span class="w-7 h-7 rounded-full bg-amber-700 text-white inline-flex items-center justify-center font-bold">3</span>
                                    @else
                                        {{ $st['rank'] }}
                                    @endif
                                </td>
                                <td class="py-3.5 px-4 font-bold text-slate-900">{{ $st['team'] }}</td>
                                <td class="py-3.5 px-4 text-center">{{ $st['played'] }}</td>
                                <td class="py-3.5 px-4 text-center font-semibold text-emerald-600">{{ $st['solved'] }}</td>
                                <td class="py-3.5 px-4 text-center font-mono">{{ $st['penalty'] }}</td>
                                <td class="py-3.5 px-4 text-center font-black text-sm text-brand-700">{{ $st['points'] }}</td>
                                <td class="py-3.5 px-4 text-center">
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold {{ $st['rank'] <= 3 ? 'bg-emerald-100 text-emerald-800' : 'bg-slate-100 text-slate-600' }}">
                                        {{ $st['rank'] <= 3 ? 'Zona Lolos Final' : 'Grup Tahap 1' }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- TAB 3: INPUT SKOR MATCH -->
    <div x-show="activeTab === 'matches'" x-cloak class="space-y-4">
        @foreach($matches as $match)
            <div class="bg-white rounded-2xl p-5 border border-slate-200/90 shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="space-y-1">
                    <span class="text-[11px] font-semibold text-brand-600">{{ $match['competition'] }} • {{ $match['round'] }}</span>
                    <h4 class="font-bold text-slate-900 text-sm">{{ $match['team_a'] }} vs {{ $match['team_b'] }}</h4>
                    <p class="text-xs text-slate-500">{{ $match['datetime'] }} • Venue: {{ $match['venue'] }}</p>
                </div>
                <div class="flex items-center gap-3 shrink-0">
                    <div class="font-mono font-bold text-sm bg-slate-100 px-3 py-1.5 rounded-xl border border-slate-200">
                        {{ $match['score_a'] }} : {{ $match['score_b'] }}
                    </div>
                    <button type="button" @click="scoreModal = true; activeMatch = {{ json_encode($match) }}; scoreA = {{ is_numeric($match['score_a']) ? $match['score_a'] : 0 }}; scoreB = {{ is_numeric($match['score_b']) ? $match['score_b'] : 0 }}" class="px-4 py-2 rounded-xl font-bold text-xs text-white bg-emerald-600 hover:bg-emerald-700 transition shadow-sm">
                        <i class="fa-solid fa-pen-to-square mr-1"></i> Input / Ubah Skor
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal Input Skor -->
    <div x-show="scoreModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto bg-slate-950/60 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-md w-full p-6 sm:p-8 space-y-5 shadow-2xl border border-slate-200" @click.away="scoreModal = false">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <h3 class="text-base font-bold text-slate-900">Input Skor Pertandingan</h3>
                <button @click="scoreModal = false" class="text-slate-400 hover:text-slate-600"><i class="fa-solid fa-xmark text-lg"></i></button>
            </div>

            <form action="{{ route('penyelenggara.score.update') }}" method="POST" class="space-y-5 text-xs">
                @csrf
                <div class="text-center font-semibold text-slate-500" x-text="activeMatch ? activeMatch.title || (activeMatch.team_a + ' vs ' + activeMatch.team_b) : ''"></div>

                <div class="grid grid-cols-2 gap-4 items-center">
                    <div class="text-center p-3 rounded-2xl bg-slate-50 border border-slate-200">
                        <label class="block font-bold text-slate-800 text-xs truncate mb-2" x-text="activeMatch ? activeMatch.team_a : 'Tim A'"></label>
                        <input type="number" name="score_a" x-model="scoreA" min="0" class="w-20 text-center py-2 text-xl font-black rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500">
                    </div>

                    <div class="text-center p-3 rounded-2xl bg-slate-50 border border-slate-200">
                        <label class="block font-bold text-slate-800 text-xs truncate mb-2" x-text="activeMatch ? activeMatch.team_b : 'Tim B'"></label>
                        <input type="number" name="score_b" x-model="scoreB" min="0" class="w-20 text-center py-2 text-xl font-black rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500">
                    </div>
                </div>

                <div class="p-3 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-900 text-[11px] flex items-center gap-2">
                    <i class="fa-solid fa-circle-check text-emerald-600"></i>
                    <span>Setelah disimpan, bracket babak berikutnya dan klasemen liga akan langsung diperbarui.</span>
                </div>

                <div class="pt-3 flex justify-end gap-2 border-t border-slate-100">
                    <button type="button" @click="scoreModal = false" class="px-4 py-2 rounded-xl font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200">Batal</button>
                    <button type="submit" class="px-5 py-2 rounded-xl font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-sm">Simpan & Konfirmasi Hasil</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
