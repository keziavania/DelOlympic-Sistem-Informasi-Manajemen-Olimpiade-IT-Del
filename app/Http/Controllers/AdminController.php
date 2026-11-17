<?php

namespace App\Http\Controllers;

use App\Services\DelOlympicData;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = DelOlympicData::getStats();
        $activities = DelOlympicData::getActivities();
        $pendingOrganizers = array_filter(DelOlympicData::getOrganizers(), fn($o) => $o['status'] === 'Menunggu Verifikasi');
        $pendingSubmissions = array_filter(DelOlympicData::getSubmissions(), fn($s) => $s['status'] === 'Pending');

        return view('admin.dashboard', compact('stats', 'activities', 'pendingOrganizers', 'pendingSubmissions'));
    }

    public function organizers()
    {
        $organizers = DelOlympicData::getOrganizers();
        return view('admin.organizers', compact('organizers'));
    }

    public function verifyAccounts()
    {
        $organizers = DelOlympicData::getOrganizers();
        return view('admin.verify-accounts', compact('organizers'));
    }

    public function actionVerifyAccount(Request $request, $id)
    {
        $action = $request->input('action'); // 'approve' or 'reject'
        $reason = $request->input('reason');

        if ($action === 'reject' && empty($reason)) {
            return back()->with('error', 'Alasan penolakan wajib diisi!');
        }

        $statusMsg = $action === 'approve' 
            ? 'Akun penyelenggara berhasil DISETUJUI dan dapat mulai mempublikasikan lomba.'
            : 'Akun penyelenggara DITOLAK dengan alasan: ' . $reason;

        return back()->with('success', $statusMsg);
    }

    public function submissions()
    {
        $submissions = DelOlympicData::getSubmissions();
        return view('admin.submissions', compact('submissions'));
    }

    public function actionSubmission(Request $request, $id)
    {
        $action = $request->input('action'); // 'approve' or 'reject'
        $reason = $request->input('reason');

        if ($action === 'reject' && empty($reason)) {
            return back()->with('error', 'Alasan penolakan pengajuan lomba wajib diisi!');
        }

        $msg = $action === 'approve'
            ? 'Pengajuan lomba telah DISETUJUI. Penyelenggara dapat segera membuka pendaftaran.'
            : 'Pengajuan lomba telah DITOLAK. Pemberitahuan telah dikirim ke penyelenggara dengan catatan: ' . $reason;

        return back()->with('success', $msg);
    }

    public function competitions()
    {
        $competitions = DelOlympicData::getCompetitions();
        return view('admin.competitions', compact('competitions'));
    }

    public function participants()
    {
        $registrations = DelOlympicData::getRegistrations();
        return view('admin.participants', compact('registrations'));
    }

    public function activities()
    {
        $activities = DelOlympicData::getActivities();
        return view('admin.activities', compact('activities'));
    }

    public function settings()
    {
        return view('admin.settings');
    }
}
