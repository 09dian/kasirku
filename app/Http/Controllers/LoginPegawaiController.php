<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai; // Ganti model User dengan model Pegawai
use Illuminate\Support\Facades\Auth; // Untuk autentikasi
use Illuminate\Support\Facades\Hash; // Untuk pengecekan password yang terenkripsi

class LoginPegawaiController extends Controller
{
    public function ActionLogin(Request $request)
    {
        // Validate the request data
        $request->validate([
            'id_pegawai' => 'required',
            'password' => 'required',
        ]);
    
        // Retrieve the input data
        $id_pegawai = $request->input('id_pegawai');
        $password = $request->input('password');
    
        // Check if the pegawai exists
        $pegawai = \App\Models\Pegawai::where('no_pegawai', $id_pegawai)->first();
    
        // Jika pegawai tidak ditemukan atau password salah
    if (!$pegawai || !\Hash::check($password, $pegawai->password)) {
        return back()->with('message', 'ID Pegawai atau Password salah.');
    }
    
        // Log the user in session
        session(['pegawai' => $pegawai]);
    
        // Update the last login timestamp
        $pegawai->terakhir_login = now();
        $pegawai->save();
   
            // Redirect ke route 'home_pegawai'
    return redirect()->route('home_pegawai');
    }
    

    public function index(){
        // Cek apakah pegawai sudah login atau belum
        if (!session()->has('pegawai')) {
            // Jika pegawai belum login, arahkan ke halaman login
            return redirect()->route('login_pegawai')->with('message', 'Silakan login terlebih dahulu.');
        }
    
        // Ambil data pegawai yang login
        $pegawai = session('pegawai');
    
        // Kirim data pegawai ke view
        return view('home_pegawai.user_pegawai', compact('pegawai'));
    }
    


    
    public function logout(Request $request)
    {
        // Menghapus data pegawai dari session
        $request->session()->forget('pegawai');
    
        // Menghancurkan semua data session
        $request->session()->flush();
    
        // Menambahkan pesan sukses
        session()->flash('message', 'Akun Pegawai telah keluar');
    
        // Redirect ke halaman login setelah logout
        return redirect()->route('/');
    }
    
}