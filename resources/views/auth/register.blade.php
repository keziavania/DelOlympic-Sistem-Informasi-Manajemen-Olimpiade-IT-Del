@extends('layouts.app')

@section('title', 'Daftar Akun Baru – DelOlympic')

@section('content')
<div class="min-h-[85vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-lg w-full space-y-8 bg-white p-8 sm:p-10 rounded-3xl border border-slate-200/90 shadow-xl" x-data="{ roleType: 'peserta' }">
        
        <div class="text-center">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-brand-900 to-brand-600 flex items-center justify-center text-white mx-auto shadow-md shadow-brand-500/20 mb-3">
                <i class="fa-solid fa-user-plus text-2xl text-amber-300"></i>
            </div>
            <h2 class="text-2xl font-black tracking-tight text-slate-900">Registrasi Akun DelOlympic</h2>
            <p class="text-xs text-slate-500 mt-1">Pilih jenis akun yang ingin Anda daftarkan</p>
        </div>

        <!-- Role Type Tab Switcher -->
        <div class="grid grid-cols-2 gap-2 p-1.5 bg-slate-100 rounded-2xl">
            <button type="button" @click="roleType = 'peserta'" :class="roleType === 'peserta' ? 'bg-white text-brand-700 font-bold shadow-sm' : 'text-slate-600 font-medium'" class="py-2.5 text-xs rounded-xl transition flex items-center justify-center gap-2">
                <i class="fa-solid fa-graduation-cap"></i>
                <span>Sebagai Peserta</span>
            </button>
            <button type="button" @click="roleType = 'penyelenggara'" :class="roleType === 'penyelenggara' ? 'bg-white text-emerald-700 font-bold shadow-sm' : 'text-slate-600 font-medium'" class="py-2.5 text-xs rounded-xl transition flex items-center justify-center gap-2">
                <i class="fa-solid fa-building-columns"></i>
                <span>Organisasi Penyelenggara</span>
            </button>
        </div>

        <form action="{{ route('register.process') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="role" :value="roleType">

            <!-- FORM PESERTA -->
            <div x-show="roleType === 'peserta'" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Nama Lengkap</label>
                    <input type="text" name="name" placeholder="Contoh: Bona Ventura Panjaitan" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Asal Institusi / Sekolah</label>
                    <input type="text" name="institution" placeholder="Contoh: Institut Teknologi Del" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Email Mahasiswa / Pribadi</label>
                    <input type="email" name="email" placeholder="nama@del.ac.id" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Kata Sandi</label>
                    <input type="password" name="password" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>
            </div>

            <!-- FORM PENYELENGGARA -->
            <div x-show="roleType === 'penyelenggara'" x-cloak class="space-y-4">
                <div class="p-3 rounded-xl bg-amber-50 border border-amber-200 text-amber-800 text-xs">
                    <i class="fa-solid fa-circle-exclamation mr-1 text-amber-600"></i>
                    <strong>Perhatian:</strong> Akun organisasi penyelenggara memerlukan proses verifikasi berkas oleh Administrator sebelum dapat mempublikasikan lomba.
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Nama Organisasi / Lembaga</label>
                    <input type="text" name="org_name" placeholder="Contoh: HIMATIF IT Del / GDSC IT Del" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Tipe Organisasi</label>
                        <select name="org_type" class="w-full px-3 py-2.5 rounded-xl border border-slate-200 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-brand-500">
                            <option value="Himpunan Mahasiswa">Himpunan Mahasiswa</option>
                            <option value="Unit Kegiatan Mahasiswa (UKM)">Unit Kegiatan Mahasiswa (UKM)</option>
                            <option value="Komunitas Kampus">Komunitas Kampus</option>
                            <option value="Organisasi Eksternal">Organisasi Eksternal</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Nama Penanggung Jawab (PIC)</label>
                        <input type="text" name="pic_name" placeholder="Nama Ketua / PIC" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Email Resmi Organisasi</label>
                        <input type="email" name="email" placeholder="himatif@del.ac.id" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Nomor WhatsApp PIC</label>
                        <input type="text" name="phone" placeholder="+62 821-xxxx-xxxx" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Unggah Dokumen SK / Rekomendasi (PDF)</label>
                    <input type="file" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-100 file:text-emerald-700 hover:file:bg-emerald-200">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Kata Sandi Akun</label>
                    <input type="password" name="password" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full py-3 px-4 rounded-xl font-bold text-sm text-white bg-brand-600 hover:bg-brand-700 shadow-md shadow-brand-500/25 transition mt-4">
                <span x-text="roleType === 'peserta' ? 'Daftar Sebagai Peserta' : 'Kirim Pengajuan Akun Penyelenggara'"></span>
            </button>
        </form>

        <div class="text-center text-xs text-slate-500 pt-2 border-t border-slate-100">
            Sudah memiliki akun?
            <a href="{{ route('login') }}" class="font-bold text-brand-600 hover:underline">
                Masuk di sini
            </a>
        </div>

    </div>
</div>
@endsection
