<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function processLogin(Request $request)
    {
        $role = $request->input('role', 'peserta');
        session(['current_role' => $role]);

        if ($role === 'admin') {
            session(['user_name' => 'Admin DelOlympic', 'user_email' => 'admin@delolympic.del.ac.id']);
            return redirect()->route('admin.dashboard')->with('success', 'Selamat datang kembali, Administrator!');
        } elseif ($role === 'penyelenggara') {
            session(['user_name' => 'HIMATIF IT Del', 'user_email' => 'himatif@del.ac.id', 'org_name' => 'HIMATIF Institut Teknologi Del']);
            return redirect()->route('penyelenggara.dashboard')->with('success', 'Selamat datang, Penyelenggara HIMATIF IT Del!');
        } else {
            session(['user_name' => 'Bona Ventura Panjaitan', 'user_email' => 'bona.panjaitan@del.ac.id']);
            return redirect()->route('peserta.dashboard')->with('success', 'Selamat datang kembali, Bona Ventura!');
        }
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function processRegister(Request $request)
    {
        $role = $request->input('role', 'peserta');
        
        if ($role === 'penyelenggara') {
            return redirect()->route('login')->with('info', 'Registrasi Penyelenggara berhasil dikirim! Akun Anda sedang dalam proses verifikasi berkas oleh Administrator.');
        }

        session(['current_role' => 'peserta', 'user_name' => $request->name ?? 'Peserta Baru', 'user_email' => $request->email]);
        return redirect()->route('peserta.dashboard')->with('success', 'Registrasi berhasil! Selamat datang di DelOlympic.');
    }

    public function switchRole($role)
    {
        session(['current_role' => $role]);
        if ($role === 'admin') {
            session(['user_name' => 'Admin DelOlympic', 'user_email' => 'admin@delolympic.del.ac.id']);
            return redirect()->route('admin.dashboard')->with('info', 'Beralih ke mode simulasi: Administrator DelOlympic');
        } elseif ($role === 'penyelenggara') {
            session(['user_name' => 'HIMATIF IT Del', 'user_email' => 'himatif@del.ac.id', 'org_name' => 'HIMATIF Institut Teknologi Del']);
            return redirect()->route('penyelenggara.dashboard')->with('info', 'Beralih ke mode simulasi: Penyelenggara Kompetisi');
        } else {
            session(['user_name' => 'Bona Ventura Panjaitan', 'user_email' => 'bona.panjaitan@del.ac.id']);
            return redirect()->route('peserta.dashboard')->with('info', 'Beralih ke mode simulasi: Peserta');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('home')->with('info', 'Anda telah berhasil keluar dari sistem DelOlympic.');
    }
}
