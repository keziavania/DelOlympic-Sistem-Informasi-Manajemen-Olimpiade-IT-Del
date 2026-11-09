# DelOlympic - Sistem Informasi Manajemen Olimpiade IT Del

Aplikasi web untuk mengelola Olimpiade IT Del, mulai dari pengajuan lomba, pendaftaran peserta, penjadwalan pertandingan, sampai pengumuman hasil dan juara. Dibangun untuk mata kuliah **Pemrograman dan Pengujian Aplikasi Web** dengan pola **MVC (Model, View, Controller)**.

## Aktor Sistem

| Aktor | Peran |
|---|---|
| Admin | Memverifikasi akun penyelenggara dan pengajuan lomba |
| Penyelenggara | Mengajukan lomba, mengelola pendaftar, menyusun jadwal, memasukkan hasil |
| Peserta | Mendaftar lomba, melihat status pendaftaran, jadwal, dan hasil |

## Teknologi

- Laravel 13 (PHP 8.3 atau lebih baru)
- MySQL 8 (lewat Laragon)
- Composer dan Node.js (untuk Vite)
- Git dan GitHub

## Prasyarat

Pastikan semua ini sudah terpasang di laptop sebelum memulai:

| Kebutuhan | Cara cek | Keterangan |
|---|---|---|
| Laragon | Buka aplikasi Laragon | Sudah termasuk Apache dan MySQL |
| PHP 8.3+ | `php -v` | Di Laragon, pilih versi PHP lewat menu Laragon |
| Composer | `composer -V` | Bawaan Laragon |
| Node.js | `node -v` | Bawaan Laragon |
| Git | `git --version` | Pasang dari git-scm.com jika belum ada |

## Prosedur Instalasi (Dilakukan Sekali per Anggota)

Setiap anggota memiliki database sendiri di laptop masing-masing. Yang dibagikan lewat GitHub hanya kode, sedangkan database dan file `.env` disiapkan sendiri.

### Langkah 1: Nyalakan Laragon

1. Buka **Laragon**.
2. Klik **Start All**.
3. Pastikan Apache dan MySQL berstatus *started*.

### Langkah 2: Clone repository

Buka terminal di folder tempat kamu menyimpan proyek, lalu jalankan:

```bash
git clone https://github.com/keziavania/DelOlympic-Sistem-Informasi-Manajemen-Olimpiade-IT-Del.git
cd DelOlympic-Sistem-Informasi-Manajemen-Olimpiade-IT-Del
```

Hindari menyimpan proyek di folder yang path-nya terlalu panjang atau mengandung karakter aneh.

### Langkah 3: Pasang dependency

```bash
composer install
npm install
```

Proses ini bisa memakan beberapa menit. Pastikan ruang disk cukup (minimal 2 GB kosong).

### Langkah 4: Buat file `.env`

```bash
copy .env.example .env
php artisan key:generate
```

(Di macOS/Linux, ganti `copy` dengan `cp`.)

### Langkah 5: Buat database kosong

1. Di Laragon, klik tombol **Database** (membuka HeidiSQL).
2. Pilih koneksi **Laragon.MySQL**, lalu klik **Open**.
3. Klik kanan pada **Laragon.MySQL**, pilih **Create new > Database**.
4. Isi nama: `delolympic`, lalu klik **OK**.

### Langkah 6: Atur koneksi database di `.env`

Buka file `.env`, cari bagian `DB_`, lalu ubah menjadi:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=delolympic
DB_USERNAME=root
DB_PASSWORD=
```

Password dikosongkan karena password bawaan `root` di Laragon memang kosong. Simpan file dengan `Ctrl + S`.

### Langkah 7: Buat tabel database

```bash
php artisan migrate
```

Jika semua baris berstatus **DONE**, berarti Laravel sudah tersambung ke MySQL.

### Langkah 8: Jalankan aplikasi

Gunakan dua terminal:

Terminal 1 (server Laravel):

```bash
php artisan serve
```

Terminal 2 (aset frontend):

```bash
npm run dev
```

Buka `http://127.0.0.1:8000` di browser. Jika halaman utama muncul, instalasi berhasil.

Untuk menghentikan server, tekan `Ctrl + C` di terminalnya.

## Alur Kerja Harian

Setiap kali mulai mengerjakan proyek:

1. Nyalakan **Laragon** (klik **Start All**).
2. Ambil perubahan terbaru dari teman:
   ```bash
   git pull
   ```
3. Jika ada file migration baru, jalankan:
   ```bash
   php artisan migrate
   ```
4. Jalankan `php artisan serve`, lalu mulai bekerja.

## Aturan Kerja Tim dengan Git

1. **Selalu `git pull` sebelum mulai bekerja** agar tidak bentrok dengan pekerjaan teman.
2. **Buat branch untuk setiap fitur**, jangan langsung bekerja di `main`:
   ```bash
   git checkout -b fitur/nama-fitur
   ```
3. Commit dengan pesan yang jelas, misalnya `feat(auth): add role to users table`.
4. Push branch, lalu buat **Pull Request** di GitHub agar bisa dicek anggota lain sebelum digabung ke `main`.
5. **Jangan pernah meng-commit file `.env`.** File ini sudah diabaikan oleh `.gitignore` karena berisi pengaturan pribadi.
6. **Perubahan struktur tabel harus lewat file migration**, bukan mengubah langsung di HeidiSQL. Dengan begitu semua anggota mendapat struktur yang sama lewat `php artisan migrate`.

## Struktur MVC pada Proyek

| Komponen | Lokasi | Fungsi |
|---|---|---|
| Model | `app/Models` | Mewakili tabel dan relasi antar tabel |
| View | `resources/views` | Tampilan halaman (Blade) |
| Controller | `app/Http/Controllers` | Logika yang menghubungkan Model dan View |
| Route | `routes/web.php` | Pemetaan alamat URL ke Controller |
| Migration | `database/migrations` | Definisi struktur tabel database |

## Pemecahan Masalah

| Masalah | Penyebab dan solusi |
|---|---|
| `Connection refused` saat migrate | MySQL belum menyala. Klik **Start All** di Laragon. |
| `Unknown database 'delolympic'` | Database belum dibuat. Ulangi Langkah 5. |
| `php is not recognized` | PATH PHP belum terbaca. Buka terminal lewat tombol **Terminal** di Laragon. |
| `No application encryption key` | Jalankan `php artisan key:generate`. |
| `No space left on device` | Ruang disk penuh. Kosongkan disk, lalu ulangi `composer install`. |
| Perubahan `.env` tidak terbaca | Jalankan `php artisan config:clear`, lalu restart `php artisan serve`. |

## Anggota Tim

| Nama | NIM | Peran |
|---|---|---|
| (isi) | (isi) | (isi) |
| (isi) | (isi) | (isi) |
| (isi) | (isi) | (isi) |