@extends('layouts.dashboard')

@section('title', 'Kelola Cabang Lomba – DelOlympic')
@section('header_title', 'Cabang Perlombaan')
@section('header_subtitle', 'Atur kategori cabang lomba, kuota pendaftar, dan sistem pertandingan (Gugur vs Liga).')

@section('content')
<div class="space-y-6" x-data="{ addModal: false }">
    
    <div class="bg-white p-5 rounded-2xl border border-slate-200/90 shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="font-bold text-sm text-slate-900">Cabang Lomba yang Dikelola</h3>
            <p class="text-xs text-slate-500">Del Competitive Programming Contest & Turnamen Kampus Lainnya</p>
        </div>
        <button type="button" @click="addModal = true" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition shadow-sm">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Cabang Lomba Baru</span>
        </button>
    </div>

    <!-- Branches Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($competitions as $comp)
            @foreach($comp['branches'] as $br)
                <div class="bg-white rounded-2xl border border-slate-200/90 p-6 shadow-xs flex flex-col justify-between space-y-4 hover:border-emerald-300 transition">
                    <div>
                        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                            <span class="text-xs text-slate-400 font-semibold">{{ $comp['title'] }}</span>
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-indigo-50 text-indigo-700 border border-indigo-200">
                                {{ $br['type'] }}
                            </span>
                        </div>

                        <h4 class="text-base font-bold text-slate-900 mt-3">{{ $br['name'] }}</h4>

                        <div class="grid grid-cols-2 gap-3 pt-3 text-xs text-slate-600">
                            <div class="bg-slate-50 p-2.5 rounded-xl border border-slate-100">
                                <span class="text-slate-400 block text-[10px]">Kuota Pendaftar</span>
                                <strong class="text-slate-900 text-sm">{{ $br['registered'] }} / {{ $br['quota'] }} Tim</strong>
                            </div>
                            <div class="bg-slate-50 p-2.5 rounded-xl border border-slate-100">
                                <span class="text-slate-400 block text-[10px]">Biaya Pendaftaran</span>
                                <strong class="text-emerald-600 text-sm">{{ $br['fee'] }}</strong>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                        <span class="text-emerald-700 font-bold flex items-center gap-1.5">
                            <i class="fa-solid fa-circle-check text-emerald-500"></i> Aktif Menerima Pendaftaran
                        </span>
                        <div class="flex items-center gap-2">
                            <button type="button" onclick="alert('Buka dialog edit cabang lomba')" class="p-2 rounded-lg text-slate-500 hover:text-slate-900 hover:bg-slate-100">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button type="button" onclick="if(confirm('Hapus cabang lomba ini?')) alert('Cabang lomba berhasil dihapus');" class="p-2 rounded-lg text-slate-500 hover:text-rose-600 hover:bg-rose-50">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>

    <!-- Modal Tambah Cabang Lomba -->
    <div x-show="addModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto bg-slate-950/60 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-lg w-full p-6 sm:p-8 space-y-5 shadow-2xl border border-slate-200" @click.away="addModal = false">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <h3 class="text-base font-bold text-slate-900">Tambah Cabang Lomba Baru</h3>
                <button @click="addModal = false" class="text-slate-400 hover:text-slate-600"><i class="fa-solid fa-xmark text-lg"></i></button>
            </div>

            <form action="{{ route('penyelenggara.branch.store') }}" method="POST" class="space-y-4 text-xs">
                @csrf
                <div>
                    <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Induk Kompetisi</label>
                    <select class="w-full px-3 py-2.5 rounded-xl border border-slate-200 text-xs bg-white">
                        @foreach($competitions as $c)
                            <option value="{{ $c['id'] }}">{{ $c['title'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Nama Cabang Lomba *</label>
                    <input type="text" placeholder="Contoh: Divisi Senior Algorithm / 5v5 Knockout" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500">
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Sistem Kompetisi *</label>
                        <select class="w-full px-3 py-2.5 rounded-xl border border-slate-200 text-xs bg-white">
                            <option value="gugur">Sistem Gugur (Knockout Bracket)</option>
                            <option value="liga">Sistem Liga / Grup (Klasemen Poin)</option>
                            <option value="icpc">Standar ICPC / Scoreboard</option>
                            <option value="juri">Penjurian Presentasi</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Kuota Maksimal (Tim)</label>
                        <input type="number" value="32" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500">
                    </div>
                </div>

                <div>
                    <label class="block font-bold text-slate-700 uppercase tracking-wider mb-1">Aturan Khusus Cabang Ini</label>
                    <textarea rows="2" placeholder="Ketentuan khusus bahasa/platform/durasi..." class="w-full px-4 py-2 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-emerald-500"></textarea>
                </div>

                <div class="pt-3 flex justify-end gap-2 border-t border-slate-100">
                    <button type="button" @click="addModal = false" class="px-4 py-2 rounded-xl font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200">Batal</button>
                    <button type="submit" class="px-5 py-2 rounded-xl font-bold text-white bg-emerald-600 hover:bg-emerald-700">Simpan Cabang</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
