@extends('layouts.app')

@section('title', 'Formulir Pendaftaran – ' . $competition['title'])

@section('content')
<div class="bg-slate-900 text-white py-10">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('competitions.detail', $competition['id']) }}" class="inline-flex items-center gap-1.5 text-xs text-slate-400 hover:text-white mb-4">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali ke Detail Lomba</span>
        </a>
        <h1 class="text-2xl sm:text-3xl font-extrabold">Formulir Pendaftaran Kompetisi</h1>
        <p class="text-sm text-slate-300 mt-1">{{ $competition['title'] }} • Diselenggarakan oleh {{ $competition['organizer'] }}</p>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xl overflow-hidden" x-data="{ currentStep: 1 }">
        
        <!-- Multi-step Indicator Header -->
        <div class="bg-slate-50 border-b border-slate-200 p-4 sm:p-6">
            <div class="grid grid-cols-3 gap-2 text-center text-xs font-bold">
                <div :class="currentStep >= 1 ? 'text-brand-600 border-b-2 border-brand-600 pb-2' : 'text-slate-400 pb-2'">
                    1. Cabang & Identitas Tim
                </div>
                <div :class="currentStep >= 2 ? 'text-brand-600 border-b-2 border-brand-600 pb-2' : 'text-slate-400 pb-2'">
                    2. Anggota & Berkas Dokumen
                </div>
                <div :class="currentStep >= 3 ? 'text-brand-600 border-b-2 border-brand-600 pb-2' : 'text-slate-400 pb-2'">
                    3. Konfirmasi & Kirim
                </div>
            </div>
        </div>

        <form action="{{ route('competitions.submit-register', $competition['id']) }}" method="POST" class="p-6 sm:p-8 space-y-6">
            @csrf

            <!-- STEP 1: CABANG & IDENTITAS TIM -->
            <div x-show="currentStep === 1" class="space-y-6">
                <div>
                    <h3 class="text-base font-bold text-slate-900 mb-1">Langkah 1: Pilih Cabang & Data Tim</h3>
                    <p class="text-xs text-slate-500">Tentukan kategori yang akan diikuti dan identitas dasar kelompok Anda.</p>
                </div>

                <!-- Pilihan Cabang Lomba -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Pilih Cabang Lomba *</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @foreach($competition['branches'] as $idx => $br)
                            <label class="relative flex items-center p-4 rounded-xl border border-slate-200 hover:border-brand-500 cursor-pointer transition bg-slate-50/50">
                                <input type="radio" name="cabang_id" value="{{ $br['id'] }}" {{ $idx === 0 ? 'checked' : '' }} class="h-4 w-4 text-brand-600 focus:ring-brand-500 border-slate-300">
                                <div class="ml-3">
                                    <span class="block text-sm font-bold text-slate-900">{{ $br['name'] }}</span>
                                    <span class="block text-xs text-slate-500">Format: {{ $br['type'] }} • Biaya: {{ $br['fee'] }}</span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Nama Tim / Peserta *</label>
                        <input type="text" name="team_name" value="Tim Horas Coder IT Del" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Asal Institusi / Universitas / Sekolah *</label>
                        <input type="text" name="institution" value="Institut Teknologi Del" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Nama Ketua Tim *</label>
                        <input type="text" name="leader_name" value="Bona Ventura Panjaitan" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Email Kontak Aktif *</label>
                        <input type="email" name="email" value="bona.panjaitan@del.ac.id" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Nomor WhatsApp *</label>
                        <input type="text" name="phone" value="+62 812-4455-6677" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                    </div>
                </div>

                <div class="pt-4 flex justify-end">
                    <button type="button" @click="currentStep = 2" class="px-6 py-2.5 rounded-xl text-sm font-bold text-white bg-brand-600 hover:bg-brand-700 shadow-sm transition">
                        Lanjut ke Langkah 2 <i class="fa-solid fa-arrow-right ml-1"></i>
                    </button>
                </div>
            </div>

            <!-- STEP 2: ANGGOTA & DOKUMEN -->
            <div x-show="currentStep === 2" x-cloak class="space-y-6">
                <div>
                    <h3 class="text-base font-bold text-slate-900 mb-1">Langkah 2: Data Anggota & Berkas Persyaratan</h3>
                    <p class="text-xs text-slate-500">Masukkan nama anggota tim (jika beregu) dan unggah berkas identitas resmi.</p>
                </div>

                <div class="space-y-3">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Nama Anggota Tim</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <input type="text" name="member_1" placeholder="Nama Anggota 1" value="Riris Marpaung" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                        <input type="text" name="member_2" placeholder="Nama Anggota 2" value="Andre Manurung" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                    </div>
                </div>

                <!-- Upload Berkas Syarat -->
                <div class="p-5 rounded-xl border border-dashed border-slate-300 bg-slate-50/70 text-center space-y-2">
                    <i class="fa-solid fa-cloud-arrow-up text-3xl text-brand-600"></i>
                    <h4 class="text-xs font-bold text-slate-800">Unggah Kartu Tanda Mahasiswa (KTM) / Pelajar (PDF/JPG)</h4>
                    <p class="text-[11px] text-slate-500">Gabungkan kartu identitas seluruh anggota ke dalam 1 file zip/pdf (Maksimal 5MB)</p>
                    <div class="pt-2">
                        <input type="file" class="text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-brand-100 file:text-brand-700 hover:file:bg-brand-200">
                    </div>
                </div>

                <div class="pt-4 flex justify-between">
                    <button type="button" @click="currentStep = 1" class="px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 transition">
                        <i class="fa-solid fa-arrow-left mr-1"></i> Kembali
                    </button>
                    <button type="button" @click="currentStep = 3" class="px-6 py-2.5 rounded-xl text-sm font-bold text-white bg-brand-600 hover:bg-brand-700 shadow-sm transition">
                        Lanjut ke Konfirmasi <i class="fa-solid fa-arrow-right ml-1"></i>
                    </button>
                </div>
            </div>

            <!-- STEP 3: KONFIRMASI & KIRIM -->
            <div x-show="currentStep === 3" x-cloak class="space-y-6">
                <div>
                    <h3 class="text-base font-bold text-slate-900 mb-1">Langkah 3: Periksa Kembali Data Pendaftaran</h3>
                    <p class="text-xs text-slate-500">Pastikan seluruh data yang diisikan telah akurat sebelum dikirimkan ke pihak penyelenggara.</p>
                </div>

                <div class="bg-slate-50 rounded-xl p-5 border border-slate-200 space-y-3 text-xs">
                    <div class="flex justify-between py-1 border-b border-slate-200/60">
                        <span class="text-slate-500">Kompetisi:</span>
                        <strong class="text-slate-900">{{ $competition['title'] }}</strong>
                    </div>
                    <div class="flex justify-between py-1 border-b border-slate-200/60">
                        <span class="text-slate-500">Nama Tim:</span>
                        <strong class="text-slate-900">Tim Horas Coder IT Del</strong>
                    </div>
                    <div class="flex justify-between py-1 border-b border-slate-200/60">
                        <span class="text-slate-500">Ketua Tim:</span>
                        <strong class="text-slate-900">Bona Ventura Panjaitan</strong>
                    </div>
                    <div class="flex justify-between py-1 border-b border-slate-200/60">
                        <span class="text-slate-500">Institusi:</span>
                        <strong class="text-slate-900">Institut Teknologi Del</strong>
                    </div>
                    <div class="flex justify-between py-1">
                        <span class="text-slate-500">Status Awal:</span>
                        <span class="font-bold text-amber-600 bg-amber-100 px-2 py-0.5 rounded">Menunggu Verifikasi Penyelenggara</span>
                    </div>
                </div>

                <div class="flex items-start gap-3 p-4 rounded-xl bg-blue-50 border border-blue-200 text-blue-900 text-xs">
                    <input type="checkbox" id="agree" required checked class="mt-0.5 h-4 w-4 text-brand-600 rounded border-slate-300">
                    <label for="agree">
                        Saya menyatakan bahwa seluruh data yang diberikan adalah benar dan bersedia mematuhi segala peraturan yang ditetapkan oleh panitia DelOlympic.
                    </label>
                </div>

                <div class="pt-4 flex justify-between">
                    <button type="button" @click="currentStep = 2" class="px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 transition">
                        <i class="fa-solid fa-arrow-left mr-1"></i> Kembali
                    </button>
                    <button type="submit" class="px-8 py-3 rounded-xl text-sm font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-md shadow-emerald-500/25 transition">
                        <i class="fa-solid fa-paper-plane mr-2"></i> Kirim Pendaftaran
                    </button>
                </div>
            </div>

        </form>

    </div>
</div>
@endsection
