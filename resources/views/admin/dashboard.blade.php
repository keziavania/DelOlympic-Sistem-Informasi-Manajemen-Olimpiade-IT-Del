@extends('layouts.dashboard')

@section('title', 'Admin Dashboard – DelOlympic')
@section('header_title', 'Dashboard Administrator')
@section('header_subtitle', 'Pantau ringkasan statistik, verifikasi akun, dan pengajuan lomba platform.')

@section('content')
<div class="space-y-8">
    
    <!-- 4 KPI Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        
        <!-- Total Penyelenggara -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Penyelenggara</span>
                <div class="text-2xl font-black text-slate-900 mt-1">{{ $stats['total_penyelenggara'] }}</div>
                <div class="text-[11px] text-emerald-600 font-semibold mt-1">
                    <i class="fa-solid fa-check-circle"></i> {{ $stats['penyelenggara_terverifikasi'] }} Terverifikasi
                </div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-building-columns"></i>
            </div>
        </div>

        <!-- Total Lomba -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Total Kompetisi</span>
                <div class="text-2xl font-black text-slate-900 mt-1">{{ $stats['total_lomba'] }}</div>
                <div class="text-[11px] text-brand-600 font-semibold mt-1">
                    <i class="fa-solid fa-fire"></i> {{ $stats['lomba_aktif'] }} Lomba Aktif
                </div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-brand-100 text-brand-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-trophy"></i>
            </div>
        </div>

        <!-- Total Peserta -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Total Peserta</span>
                <div class="text-2xl font-black text-slate-900 mt-1">{{ $stats['total_peserta'] }}</div>
                <div class="text-[11px] text-teal-600 font-semibold mt-1">
                    <i class="fa-solid fa-user-check"></i> {{ $stats['pendaftaran_diterima'] }} Terdaftar
                </div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-teal-100 text-teal-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-users"></i>
            </div>
        </div>

        <!-- Pengajuan Menunggu -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Antrean Verifikasi</span>
                <div class="text-2xl font-black text-amber-600 mt-1">{{ count($pendingOrganizers) + count($pendingSubmissions) }}</div>
                <div class="text-[11px] text-amber-700 font-semibold mt-1">
                    {{ count($pendingOrganizers) }} Akun • {{ count($pendingSubmissions) }} Lomba
                </div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-hourglass-half"></i>
            </div>
        </div>

    </div>

    <!-- Visual Chart & Analytics Section -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        
        <!-- Statistik Grafik Visual Lomba & Peserta -->
        <div class="lg:col-span-8 bg-white rounded-2xl p-6 border border-slate-200/90 shadow-xs space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-base text-slate-900">Statistik Pertumbuhan Kompetisi & Peserta (2026)</h3>
                    <p class="text-xs text-slate-500">Distribusi peserta berdasarkan cabang kompetisi di Institut Teknologi Del</p>
                </div>
                <span class="text-xs font-bold px-2.5 py-1 rounded-lg bg-brand-50 text-brand-700 border border-brand-200">
                    Tahun Akademik 2026
                </span>
            </div>

            <!-- Bar Chart Visualization Simulation -->
            <div class="pt-4 space-y-3">
                <div>
                    <div class="flex justify-between text-xs font-semibold text-slate-700 mb-1">
                        <span>Teknologi & Algoritma (ICPC Coding)</span>
                        <span>128 Peserta (37%)</span>
                    </div>
                    <div class="w-full bg-slate-100 h-3 rounded-full overflow-hidden">
                        <div class="bg-brand-600 h-full rounded-full" style="width: 37%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between text-xs font-semibold text-slate-700 mb-1">
                        <span>E-Sport Turnamen Resmi (Valorant & MLBB)</span>
                        <span>92 Peserta (26%)</span>
                    </div>
                    <div class="w-full bg-slate-100 h-3 rounded-full overflow-hidden">
                        <div class="bg-purple-600 h-full rounded-full" style="width: 26%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between text-xs font-semibold text-slate-700 mb-1">
                        <span>Desain Pengalaman Pengguna (UI/UX)</span>
                        <span>54 Peserta (16%)</span>
                    </div>
                    <div class="w-full bg-slate-100 h-3 rounded-full overflow-hidden">
                        <div class="bg-sky-500 h-full rounded-full" style="width: 16%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between text-xs font-semibold text-slate-700 mb-1">
                        <span>Keamanan Siber (CTF Hacking)</span>
                        <span>42 Peserta (12%)</span>
                    </div>
                    <div class="w-full bg-slate-100 h-3 rounded-full overflow-hidden">
                        <div class="bg-emerald-500 h-full rounded-full" style="width: 12%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between text-xs font-semibold text-slate-700 mb-1">
                        <span>Robotika & IoT Line Follower</span>
                        <span>32 Peserta (9%)</span>
                    </div>
                    <div class="w-full bg-slate-100 h-3 rounded-full overflow-hidden">
                        <div class="bg-amber-500 h-full rounded-full" style="width: 9%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Aktivitas Sistem Terbaru -->
        <div class="lg:col-span-4 bg-white rounded-2xl p-6 border border-slate-200/90 shadow-xs space-y-4">
            <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                <h3 class="font-bold text-base text-slate-900">Aktivitas Terbaru</h3>
                <a href="{{ route('admin.activities') }}" class="text-xs font-semibold text-brand-600 hover:underline">Semua</a>
            </div>

            <div class="space-y-4">
                @foreach(array_slice($activities, 0, 4) as $act)
                    <div class="flex items-start gap-3 text-xs">
                        <div class="w-7 h-7 rounded-lg bg-slate-100 text-slate-700 flex items-center justify-center shrink-0 mt-0.5 font-bold">
                            @if($act['type'] === 'approve')
                                <i class="fa-solid fa-check text-emerald-600"></i>
                            @elseif($act['type'] === 'reject')
                                <i class="fa-solid fa-xmark text-rose-600"></i>
                            @elseif($act['type'] === 'register')
                                <i class="fa-solid fa-user-plus text-brand-600"></i>
                            @else
                                <i class="fa-solid fa-pen text-amber-600"></i>
                            @endif
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-slate-800 leading-snug">{{ $act['action'] }}</p>
                            <span class="text-[10px] text-slate-400">{{ $act['time'] }} • Oleh {{ $act['user'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    <!-- Quick Action Workspaces: Pending Organizers & Pending Submissions -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <!-- Table 1: Akun Penyelenggara Menunggu Verifikasi -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-xs space-y-4">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                    <h3 class="font-bold text-slate-900 text-sm">Verifikasi Akun Penyelenggara</h3>
                </div>
                <a href="{{ route('admin.verify-accounts') }}" class="text-xs font-semibold text-brand-600 hover:underline">
                    Buka Halaman Verifikasi
                </a>
            </div>

            @if(count($pendingOrganizers) > 0)
                <div class="divide-y divide-slate-100">
                    @foreach($pendingOrganizers as $org)
                        <div class="py-3 flex items-center justify-between gap-3 text-xs">
                            <div>
                                <h4 class="font-bold text-slate-900">{{ $org['name'] }}</h4>
                                <p class="text-slate-500 text-[11px]">{{ $org['type'] }} • PIC: {{ $org['pic'] }}</p>
                                <span class="text-[10px] text-slate-400 font-mono"><i class="fa-solid fa-file-pdf mr-1 text-rose-500"></i> {{ $org['document'] }}</span>
                            </div>
                            <div class="flex items-center gap-1.5 shrink-0">
                                <a href="{{ route('admin.verify-accounts') }}" class="px-3 py-1.5 rounded-lg font-bold bg-amber-50 text-amber-700 border border-amber-200 hover:bg-amber-100 transition">
                                    Tinjau Berkas
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-xs text-slate-400 py-4 text-center">Tidak ada akun penyelenggara yang menunggu verifikasi.</p>
            @endif
        </div>

        <!-- Table 2: Pengajuan Lomba Menunggu Persetujuan -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-xs space-y-4">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-indigo-500"></span>
                    <h3 class="font-bold text-slate-900 text-sm">Persetujuan Pengajuan Lomba</h3>
                </div>
                <a href="{{ route('admin.submissions') }}" class="text-xs font-semibold text-brand-600 hover:underline">
                    Buka Halaman Pengajuan
                </a>
            </div>

            @if(count($pendingSubmissions) > 0)
                <div class="divide-y divide-slate-100">
                    @foreach($pendingSubmissions as $sub)
                        <div class="py-3 flex items-center justify-between gap-3 text-xs">
                            <div>
                                <h4 class="font-bold text-slate-900">{{ $sub['title'] }}</h4>
                                <p class="text-slate-500 text-[11px]">Oleh {{ $sub['organizer'] }} • {{ $sub['category'] }}</p>
                                <span class="text-[10px] text-slate-400">Diajukan: {{ $sub['submitted_at'] }}</span>
                            </div>
                            <div class="flex items-center gap-1.5 shrink-0">
                                <a href="{{ route('admin.submissions') }}" class="px-3 py-1.5 rounded-lg font-bold bg-indigo-50 text-indigo-700 border border-indigo-200 hover:bg-indigo-100 transition">
                                    Periksa Lomba
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-xs text-slate-400 py-4 text-center">Tidak ada pengajuan lomba baru saat ini.</p>
            @endif
        </div>

    </div>

</div>
@endsection
