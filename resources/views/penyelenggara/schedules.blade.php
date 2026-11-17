@extends('layouts.dashboard')

@section('title', 'Jadwal Pertandingan – Penyelenggara DelOlympic')
@section('header_title', 'Pengelolaan Jadwal Pertandingan')
@section('header_subtitle', 'Susun jadwal temu tanding, pantau ketersediaan venue, dan cegah bentrok jadwal.')

@section('content')
<div class="space-y-6" x-data="{ addModal: false }">
    
    <!-- Top Bar with Add Schedule Button -->
    <div class="bg-white p-5 rounded-2xl border border-slate-200/90 shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="font-bold text-sm text-slate-900">Jadwal Pertandingan Aktif</h3>
            <p class="text-xs text-slate-500">Sistem dilengkapi fitur pengecekan bentrok jadwal venue & peserta otomatis</p>
        </div>
        <button type="button" @click="addModal = true" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition shadow-sm">
            <i class="fa-solid fa-calendar-plus"></i>
            <span>Tambah Jadwal Baru</span>
        </button>
    </div>

    <!-- Match Schedule List -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        @foreach($matches as $m)
            <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-4 hover:border-emerald-300 transition">
                <div>
                    <!-- Match Header Meta -->
                    <div class="flex items-center justify-between text-xs pb-3 border-b border-slate-100">
                        <span class="font-bold text-slate-800">{{ $m['competition'] }}</span>
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold {{ $m['status'] === 'Selesai' ? 'bg-slate-100 text-slate-700' : 'bg-purple-100 text-purple-800' }}">
                            {{ $m['status'] }}
                        </span>
                    </div>

                    <!-- Round & Match Info -->
                    <div class="py-2 flex items-center justify-between text-xs text-slate-500">
                        <span class="font-semibold text-brand-600">{{ $m['round'] }} ({{ $m['format'] }})</span>
                        <span class="font-mono text-slate-400">{{ $m['id'] }}</span>
                    </div>

                    <!-- Teams Box -->
                    <div class="bg-slate-50 rounded-xl p-3 border border-slate-200/80 space-y-2 text-xs">
                        <div class="flex items-center justify-between font-bold text-slate-900">
                            <div class="flex items-center gap-2 truncate">
                                <span class="w-5 h-5 rounded bg-brand-600 text-white flex items-center justify-center text-[10px]">A</span>
                                <span class="truncate">{{ $m['team_a'] }}</span>
                            </div>
                            <span class="text-base text-brand-700 font-black px-2">{{ $m['score_a'] }}</span>
                        </div>

                        <div class="border-t border-slate-200/60 pt-1.5 flex items-center justify-between font-bold text-slate-900">
                            <div class="flex items-center gap-2 truncate">
                                <span class="w-5 h-5 rounded bg-indigo-600 text-white flex items-center justify-center text-[10px]">B</span>
                                <span class="truncate">{{ $m['team_b'] }}</span>
                            </div>
                            <span class="text-base text-indigo-700 font-black px-2">{{ $m['score_b'] }}</span>
                        </div>
                    </div>
                </div>

                <!-- Footer Time & Venue -->
                <div class="pt-2 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between text-xs text-slate-500 gap-2">
                    <div class="space-y-1">
                        <div><i class="fa-regular fa-clock text-brand-600 mr-1.5"></i> <strong>{{ $m['datetime'] }}</strong></div>
                        <div><i class="fa-solid fa-location-dot text-rose-500 mr-1.5"></i> {{ $m['venue'] }}</div>
                    </div>
                    <div class="flex items-center gap-2 self-end sm:self-auto">
                        <button type="button" onclick="alert('Buka dialog edit jadwal pertandingan')" class="p-2 rounded-lg text-slate-500 hover:text-slate-900 hover:bg-slate-100">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button type="button" onclick="if(confirm('Hapus jadwal ini?')) alert('Jadwal berhasil dihapus');" class="p-2 rounded-lg text-slate-500 hover:text-rose-600 hover:bg-rose-50">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal Tambah Jadwal & Deteksi Bentrok -->
    <div x-show="addModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto bg-slate-950/60 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-lg w-full p-6 sm:p-8 space-y-5 shadow-2xl border border-slate-200" @click.away="addModal = false">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <h3 class="text-base font-bold text-slate-900">Buat Jadwal Pertandingan Baru</h3>
                <button @click="addModal = false" class="text-slate-400 hover:text-slate-600"><i class="fa-solid fa-xmark text-lg"></i></button>
            </div>

            <form action="{{ route('penyelenggara.schedule.store') }}" method="POST" class="space-y-4 text-xs">
                @csrf

                <div>
                    <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Babak Pertandingan</label>
                    <input type="text" name="round" placeholder="Contoh: Babak Perempat Final / Match 3" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500">
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Tim / Peserta 1 *</label>
                        <input type="text" name="team_a" placeholder="Nama Tim A" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Tim / Peserta 2 *</label>
                        <input type="text" name="team_b" placeholder="Nama Tim B" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Tanggal *</label>
                        <input type="date" name="date" value="2026-12-02" required class="w-full px-3 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Waktu Pertandingan *</label>
                        <input type="time" name="time" value="13:00" required class="w-full px-3 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500">
                    </div>
                </div>

                <div>
                    <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Lokasi / Venue Lapangan *</label>
                    <select name="venue" required class="w-full px-3 py-2.5 rounded-xl border border-slate-200 text-xs bg-white focus:ring-2 focus:ring-emerald-500">
                        <option value="Auditorium Gedung 5 IT Del">Auditorium Gedung 5 IT Del</option>
                        <option value="Arena Gaming Lt. 2 Gd. 7">Arena Gaming Lt. 2 Gd. 7</option>
                        <option value="Lab Komputer 3 Gd. 5">Lab Komputer 3 Gd. 5</option>
                        <option value="Lapangan Hijau IT Del">Lapangan Hijau IT Del</option>
                        <option value="Online Platform Discord">Online Platform Discord</option>
                    </select>
                </div>

                <div class="p-3 rounded-xl bg-blue-50 border border-blue-200 text-blue-900 text-[11px] flex items-start gap-2">
                    <i class="fa-solid fa-shield-halved mt-0.5 text-blue-600"></i>
                    <span>Sistem secara otomatis akan memeriksa bentrok jadwal jika venue atau peserta yang sama sedang digunakan pada waktu tersebut.</span>
                </div>

                <div class="pt-3 flex justify-end gap-2 border-t border-slate-100">
                    <button type="button" @click="addModal = false" class="px-4 py-2 rounded-xl font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200">Batal</button>
                    <button type="submit" class="px-5 py-2 rounded-xl font-bold text-white bg-emerald-600 hover:bg-emerald-700">Simpan & Publikasikan Jadwal</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
