<?php

namespace App\Http\Controllers;

use App\Services\DelOlympicData;
use Illuminate\Http\Request;

class PenyelenggaraController extends Controller
{
    public function dashboard()
    {
        $stats = DelOlympicData::getStats();
        $competitions = DelOlympicData::getCompetitions();
        $matches = DelOlympicData::getMatches();
        $registrations = DelOlympicData::getRegistrations();
        $pendingRegistrations = array_filter($registrations, fn($r) => $r['status'] === 'Menunggu Verifikasi');

        return view('penyelenggara.dashboard', compact('stats', 'competitions', 'matches', 'pendingRegistrations'));
    }

    public function profile()
    {
        $organizer = DelOlympicData::getOrganizers()[0]; // HIMATIF
        return view('penyelenggara.profile', compact('organizer'));
    }

    public function updateProfile(Request $request)
    {
        return back()->with('success', 'Profil organisasi berhasil diperbarui!');
    }

    public function createSubmission()
    {
        $categories = DelOlympicData::getCategories();
        return view('penyelenggara.submission-create', compact('categories'));
    }

    public function storeSubmission(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:150',
            'category' => 'required',
            'location' => 'required',
            'reg_start' => 'required|date',
            'reg_end' => 'required|date',
            'event_date' => 'required',
            'description' => 'required',
            'rules' => 'required',
            'contact' => 'required',
        ]);

        return redirect()->route('penyelenggara.status-pengajuan')
            ->with('success', 'Pengajuan lomba baru "' . $request->title . '" berhasil dikirimkan ke Admin untuk diverifikasi!');
    }

    public function submissionStatus()
    {
        $submissions = DelOlympicData::getSubmissions();
        return view('penyelenggara.submission-status', compact('submissions'));
    }

    public function editSubmission($id)
    {
        $submissions = DelOlympicData::getSubmissions();
        $submission = collect($submissions)->firstWhere('id', (int) $id);
        $categories = DelOlympicData::getCategories();

        return view('penyelenggara.submission-edit', compact('submission', 'categories'));
    }

    public function manageCompetitions()
    {
        $competitions = DelOlympicData::getCompetitions();
        return view('penyelenggara.competitions', compact('competitions'));
    }

    public function branches()
    {
        $competitions = DelOlympicData::getCompetitions();
        return view('penyelenggara.branches', compact('competitions'));
    }

    public function storeBranch(Request $request)
    {
        return back()->with('success', 'Cabang lomba baru berhasil ditambahkan!');
    }

    public function registrations()
    {
        $registrations = DelOlympicData::getRegistrations();
        return view('penyelenggara.registrations', compact('registrations'));
    }

    public function verifyParticipants()
    {
        $registrations = DelOlympicData::getRegistrations();
        return view('penyelenggara.verify-participants', compact('registrations'));
    }

    public function actionVerifyParticipant(Request $request, $id)
    {
        $action = $request->input('action');
        $reason = $request->input('reason');

        if ($action === 'reject' && empty($reason)) {
            return back()->with('error', 'Alasan penolakan berkas peserta wajib dicantumkan!');
        }

        $msg = $action === 'approve'
            ? 'Pendaftaran peserta ' . $id . ' berhasil DITERIMA dan status diperbarui menjadi Terverifikasi!'
            : 'Pendaftaran peserta ' . $id . ' DITOLAK dengan catatan: ' . $reason;

        return back()->with('success', $msg);
    }

    public function schedules()
    {
        $matches = DelOlympicData::getMatches();
        return view('penyelenggara.schedules', compact('matches'));
    }

    public function storeSchedule(Request $request)
    {
        // Validasi dan simulasi deteksi bentrok jadwal
        $conflict = false;
        if ($request->input('venue') === 'Arena Gaming Lt. 2 Gd. 7' && $request->input('date') === '2026-12-02') {
            $conflict = true;
        }

        if ($conflict) {
            return back()->with('warning', 'Peringatan Sistem Bentrok: Lokasi yang dipilih sudah digunakan oleh pertandingan lain di jam yang berdekatan! Harap pilih waktu atau lokasi alternatif.');
        }

        return back()->with('success', 'Jadwal pertandingan berhasil disusun dan dipublikasikan!');
    }

    public function results()
    {
        $matches = DelOlympicData::getMatches();
        $bracket = DelOlympicData::getBracket();
        $standings = DelOlympicData::getStandings();

        return view('penyelenggara.results', compact('matches', 'bracket', 'standings'));
    }

    public function updateScore(Request $request)
    {
        return back()->with('success', 'Skor pertandingan berhasil disimpan dan bracket kompetisi telah diperbarui secara otomatis!');
    }

    public function publishFinalResults(Request $request)
    {
        return back()->with('success', 'Hasil akhir dan daftar pemenang/juara resmi telah dipublikasikan ke publik!');
    }

    public function settings()
    {
        return view('penyelenggara.settings');
    }
}
