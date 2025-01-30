<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Hash;

class LoginPegawaiController extends Controller
{
    public function ActionLogin(Request $request)
    {
        // Validasi input
        $request->validate([
            'no_pegawai' => 'required|string',
            'password' => 'required|string',
        ]);

        // Ambil data input
        $credentials = $request->only('no_pegawai', 'password');

        // Cek autentikasi menggunakan guard 'pegawai'
        if (Auth::guard('pegawai')->attempt($credentials)) {
            // Jika berhasil login, update waktu terakhir login
            $pegawai = Auth::guard('pegawai')->user();
            $pegawai->update(['terakhir_login' => now()]);
        return redirect('/home_pegawai');
        }

        // Jika gagal login
        return back()
            ->withErrors(['no_pegawai' => 'Nomor pegawai atau password salah.'])
            ->withInput($request->only('no_pegawai'));
    }

    public function index()
    {
        // Ambil data pengguna yang sedang login
        $pegawai = Auth::guard('pegawai')->user();
        return view('home_pegawai.user_pegawai', compact('pegawai'), ['title' => 'Pegawai']);
    }
    public function logout(Request $request)
    {
        // Logout dari guard 'pegawai'
        Auth::guard('pegawai')->logout();
        // Hapus semua data sesi
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        session()->flash('success', 'Akun pegawai atos kaluar');
        return redirect('/');
    }
}