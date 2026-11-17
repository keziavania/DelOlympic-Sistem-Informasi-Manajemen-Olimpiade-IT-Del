<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenyelenggaraController;
use App\Http\Controllers\PesertaController;

/*
|--------------------------------------------------------------------------
| Web Routes - DelOlympic Platform
|--------------------------------------------------------------------------
*/

// Public Routes
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/lomba', [PublicController::class, 'competitions'])->name('competitions.index');
Route::get('/lomba/{id}', [PublicController::class, 'competitionDetail'])->name('competitions.detail');
Route::get('/lomba/{id}/daftar', [PublicController::class, 'registerForm'])->name('competitions.register');
Route::post('/lomba/{id}/daftar', [PublicController::class, 'submitRegister'])->name('competitions.submit-register');
Route::get('/tentang', [PublicController::class, 'about'])->name('about');

// Authentication & Quick Role Switcher
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin'])->name('login.process');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'processRegister'])->name('register.process');
Route::get('/switch-role/{role}', [AuthController::class, 'switchRole'])->name('switch.role');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard']);
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/penyelenggara', [AdminController::class, 'organizers'])->name('organizers');
    Route::get('/verifikasi-akun', [AdminController::class, 'verifyAccounts'])->name('verify-accounts');
    Route::post('/verifikasi-akun/{id}', [AdminController::class, 'actionVerifyAccount'])->name('verify-account.action');
    Route::get('/pengajuan-lomba', [AdminController::class, 'submissions'])->name('submissions');
    Route::post('/pengajuan-lomba/{id}', [AdminController::class, 'actionSubmission'])->name('submission.action');
    Route::get('/lomba', [AdminController::class, 'competitions'])->name('competitions');
    Route::get('/peserta', [AdminController::class, 'participants'])->name('participants');
    Route::get('/aktivitas', [AdminController::class, 'activities'])->name('activities');
    Route::get('/pengaturan', [AdminController::class, 'settings'])->name('settings');
});

// Penyelenggara Routes
Route::prefix('penyelenggara')->name('penyelenggara.')->group(function () {
    Route::get('/', [PenyelenggaraController::class, 'dashboard']);
    Route::get('/dashboard', [PenyelenggaraController::class, 'dashboard'])->name('dashboard');
    Route::get('/profil', [PenyelenggaraController::class, 'profile'])->name('profile');
    Route::post('/profil', [PenyelenggaraController::class, 'updateProfile'])->name('profile.update');
    Route::get('/pengajuan-lomba', [PenyelenggaraController::class, 'createSubmission'])->name('submission.create');
    Route::post('/pengajuan-lomba', [PenyelenggaraController::class, 'storeSubmission'])->name('submission.store');
    Route::get('/status-pengajuan', [PenyelenggaraController::class, 'submissionStatus'])->name('status-pengajuan');
    Route::get('/pengajuan/{id}/edit', [PenyelenggaraController::class, 'editSubmission'])->name('submission.edit');
    Route::get('/kelola-lomba', [PenyelenggaraController::class, 'manageCompetitions'])->name('competitions');
    Route::get('/cabang-lomba', [PenyelenggaraController::class, 'branches'])->name('branches');
    Route::post('/cabang-lomba', [PenyelenggaraController::class, 'storeBranch'])->name('branch.store');
    Route::get('/pendaftaran-peserta', [PenyelenggaraController::class, 'registrations'])->name('registrations');
    Route::get('/verifikasi-peserta', [PenyelenggaraController::class, 'verifyParticipants'])->name('verify-participants');
    Route::post('/verifikasi-peserta/{id}', [PenyelenggaraController::class, 'actionVerifyParticipant'])->name('verify-participant.action');
    Route::get('/jadwal-pertandingan', [PenyelenggaraController::class, 'schedules'])->name('schedules');
    Route::post('/jadwal-pertandingan', [PenyelenggaraController::class, 'storeSchedule'])->name('schedule.store');
    Route::get('/hasil-pertandingan', [PenyelenggaraController::class, 'results'])->name('results');
    Route::post('/update-skor', [PenyelenggaraController::class, 'updateScore'])->name('score.update');
    Route::post('/publikasi-juara', [PenyelenggaraController::class, 'publishFinalResults'])->name('results.publish');
    Route::get('/pengaturan', [PenyelenggaraController::class, 'settings'])->name('settings');
});

// Peserta Routes
Route::prefix('peserta')->name('peserta.')->group(function () {
    Route::get('/', [PesertaController::class, 'dashboard']);
    Route::get('/dashboard', [PesertaController::class, 'dashboard'])->name('dashboard');
    Route::get('/lomba', [PesertaController::class, 'competitions'])->name('competitions');
    Route::get('/pendaftaran', [PesertaController::class, 'myRegistrations'])->name('pendaftaran');
    Route::get('/jadwal', [PesertaController::class, 'schedules'])->name('schedules');
    Route::get('/hasil', [PesertaController::class, 'results'])->name('results');
    Route::get('/profil', [PesertaController::class, 'profile'])->name('profile');
    Route::post('/profil', [PesertaController::class, 'updateProfile'])->name('profile.update');
});
