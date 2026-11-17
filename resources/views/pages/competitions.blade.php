@extends('layouts.app')

@section('title', 'Jelajahi Lomba – DelOlympic')

@section('content')
<div class="bg-slate-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <span class="text-xs font-bold uppercase tracking-widest text-sky-400">Katalog Lengkap</span>
        <h1 class="text-3xl sm:text-4xl font-extrabold mt-1">Jelajahi Kompetisi</h1>
        <p class="text-slate-400 text-sm mt-2 max-w-2xl">
            Cari dan saring perlombaan berdasarkan kategori, nama kompetisi, dan status pendaftaran.
        </p>

        <!-- Search & Filter Form Bar -->
        <form action="{{ route('competitions.index') }}" method="GET" class="mt-8 bg-white p-4 rounded-2xl shadow-xl text-slate-800 grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
            
            <!-- Search Keyword -->
            <div class="sm:col-span-5 relative">
                <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400"></i>
                <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama lomba atau kata kunci..." class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>

            <!-- Category Filter -->
            <div class="sm:col-span-3">
                <select name="kategori" class="w-full px-3 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 bg-white">
                    <option value="all" {{ $selectedCategory == 'all' ? 'selected' : '' }}>Semua Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat['id'] }}" {{ $selectedCategory == $cat['id'] ? 'selected' : '' }}>{{ $cat['name'] }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Status Filter -->
            <div class="sm:col-span-2">
                <select name="status" class="w-full px-3 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 bg-white">
                    <option value="all" {{ $selectedStatus == 'all' ? 'selected' : '' }}>Semua Status</option>
                    <option value="Dibuka" {{ $selectedStatus == 'Dibuka' ? 'selected' : '' }}>Dibuka</option>
                    <option value="Segera Dibuka" {{ $selectedStatus == 'Segera Dibuka' ? 'selected' : '' }}>Segera Dibuka</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="sm:col-span-2">
                <button type="submit" class="w-full py-2.5 px-4 rounded-xl font-bold text-sm bg-brand-600 hover:bg-brand-700 text-white transition flex items-center justify-center gap-2 shadow-sm">
                    <i class="fa-solid fa-filter text-xs"></i>
                    <span>Terapkan</span>
                </button>
            </div>

        </form>
    </div>
</div>

<!-- Competition List Container -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <!-- Results Header -->
    <div class="flex items-center justify-between mb-8 pb-4 border-b border-slate-200">
        <p class="text-sm text-slate-600">
            Menampilkan <strong class="text-slate-900">{{ count($competitions) }}</strong> kompetisi yang tersedia
        </p>
        @if($search || $selectedCategory !== 'all' || $selectedStatus !== 'all')
            <a href="{{ route('competitions.index') }}" class="text-xs font-semibold text-rose-600 hover:underline">
                <i class="fa-solid fa-rotate-left mr-1"></i> Reset Filter
            </a>
        @endif
    </div>

    @if(count($competitions) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($competitions as $item)
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-200 flex flex-col overflow-hidden group">
                    
                    <!-- Poster -->
                    <div class="relative h-48 overflow-hidden bg-slate-900">
                        <img src="{{ $item['poster'] }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>

                        <span class="absolute top-3 left-3 px-3 py-1 rounded-lg text-xs font-bold bg-white/95 text-brand-900 shadow-sm">
                            {{ $item['category'] }}
                        </span>

                        <span class="absolute top-3 right-3 px-3 py-1 rounded-lg text-xs font-bold {{ $item['status_pendaftaran'] === 'Dibuka' ? 'bg-emerald-500 text-white' : 'bg-amber-500 text-white' }} shadow-sm">
                            {{ $item['status_pendaftaran'] }}
                        </span>

                        <div class="absolute bottom-3 left-3 text-white">
                            <span class="text-[10px] uppercase font-semibold text-slate-300 block">Total Hadiah</span>
                            <span class="text-sm font-bold text-amber-300">{{ $item['prize_pool'] }}</span>
                        </div>
                    </div>

                    <!-- Details -->
                    <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            <div class="flex items-center gap-2 text-xs text-slate-500 font-medium mb-2">
                                <i class="fa-solid fa-building-columns text-slate-400"></i>
                                <span class="truncate">{{ $item['organizer'] }}</span>
                            </div>

                            <h3 class="text-lg font-bold text-slate-900 line-clamp-2 group-hover:text-brand-600 transition">
                                <a href="{{ route('competitions.detail', $item['id']) }}">{{ $item['title'] }}</a>
                            </h3>

                            <p class="text-slate-500 text-xs mt-2 line-clamp-2 leading-relaxed">
                                {{ $item['description'] }}
                            </p>
                        </div>

                        <div class="pt-4 border-t border-slate-100 space-y-2 text-xs text-slate-600">
                            <div class="flex items-center gap-2">
                                <i class="fa-regular fa-calendar-check text-brand-500 w-4 text-center"></i>
                                <span>Pelaksanaan: <strong>{{ $item['event_date'] }}</strong></span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-location-dot text-rose-500 w-4 text-center"></i>
                                <span class="truncate">{{ $item['location'] }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-users text-sky-500 w-4 text-center"></i>
                                <span>Kuota: <strong>{{ $item['participants_count'] }}/{{ $item['max_quota'] }} Terisi</strong></span>
                            </div>
                        </div>

                        <div class="pt-2 flex items-center gap-3">
                            <a href="{{ route('competitions.detail', $item['id']) }}" class="flex-1 py-2.5 px-4 rounded-xl text-xs font-bold text-center text-brand-700 bg-brand-50 hover:bg-brand-100 transition border border-brand-200">
                                Detail Lomba
                            </a>
                            <a href="{{ route('competitions.register', $item['id']) }}" class="flex-1 py-2.5 px-4 rounded-xl text-xs font-bold text-center text-white bg-brand-600 hover:bg-brand-700 transition shadow-sm">
                                Daftar Sekarang
                            </a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    @else
        <!-- Empty State -->
        <div class="bg-white rounded-2xl border border-slate-200 p-12 text-center max-w-md mx-auto">
            <div class="w-16 h-16 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center text-2xl mx-auto mb-4">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <h3 class="text-base font-bold text-slate-900">Kompetisi Tidak Ditemukan</h3>
            <p class="text-xs text-slate-500 mt-1">
                Tidak ada perlombaan yang cocok dengan kriteria filter atau kata kunci pencarian Anda.
            </p>
            <a href="{{ route('competitions.index') }}" class="mt-4 inline-block px-4 py-2 rounded-xl text-xs font-semibold bg-brand-600 text-white">
                Tampilkan Semua Lomba
            </a>
        </div>
    @endif

</div>
@endsection
