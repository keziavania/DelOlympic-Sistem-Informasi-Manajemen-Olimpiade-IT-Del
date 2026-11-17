<?php

namespace App\Http\Controllers;

use App\Services\DelOlympicData;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function dashboard()
    {
        $allRegistrations = DelOlympicData::getRegistrations();
        // Simulasi pendaftaran milik user yang sedang login (Bona Ventura)
        $myRegistrations = array_filter($allRegistrations, fn($r) => str_contains($r['leader_name'], 'Bona') || str_contains($r['participant_name'], 'Horas'));
        $upcomingMatches = array_filter(DelOlympicData::getMatches(), fn($m) => $m['status'] !== 'Selesai');
        $competitions = DelOlympicData::getCompetitions();

        $stats = [
            'lomba_diikuti' => 2,
            'menunggu_verifikasi' => 0,
            'diterima' => 2,
            'jadwal_terdekat' => count($upcomingMatches),
        ];

        return view('peserta.dashboard', compact('stats', 'myRegistrations', 'upcomingMatches', 'competitions'));
    }

    public function competitions(Request $request)
    {
        $allCompetitions = DelOlympicData::getCompetitions();
        $categories = DelOlympicData::getCategories();

        return view('peserta.competitions', [
            'competitions' => $allCompetitions,
            'categories' => $categories,
        ]);
    }

    public function myRegistrations()
    {
        $allRegistrations = DelOlympicData::getRegistrations();
        return view('peserta.registrations', compact('allRegistrations'));
    }

    public function schedules()
    {
        $matches = DelOlympicData::getMatches();
        return view('peserta.schedules', compact('matches'));
    }

    public function results()
    {
        $matches = DelOlympicData::getMatches();
        $bracket = DelOlympicData::getBracket();
        $standings = DelOlympicData::getStandings();

        return view('peserta.results', compact('matches', 'bracket', 'standings'));
    }

    public function profile()
    {
        $user = [
            'name' => 'Bona Ventura Panjaitan',
            'nim' => '11S22045',
            'email' => 'bona.panjaitan@del.ac.id',
            'phone' => '+62 812-4455-6677',
            'institution' => 'Institut Teknologi Del - S1 Informatika',
            'address' => 'Jl. Sisingamangaraja, Sitoluama, Laguboti, Toba, Sumatera Utara',
            'bio' => 'Competitive programmer & Full-stack enthusiast at IT Del. Anggota tim Del Horas Coder.',
            'avatar' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&h=200&q=80',
        ];

        return view('peserta.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        return back()->with('success', 'Profil peserta berhasil diperbarui!');
    }
}
