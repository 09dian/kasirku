<?php

namespace App\Http\Controllers;


use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    public function pegawai()
    {
        // Mendapatkan user yang sedang login
        $id_user = Auth::id(); // Mengambil ID user yang sedang login
    
        // Mengambil data pegawai yang sesuai dengan id_user
        $pegawais = Pegawai::where('id_user', $id_user)->get(); // Query berdasarkan id_user
    
        // Mengirim data pegawai ke view
        return view('home.pegawai', [
            'title' => 'Pegawai',
            'pegawais' => $pegawais, // Mengirim data ke view
        ]);
    }
    //untuk menyimpan ke data base
    public function create(Request $request) {
        Auth::user()->nama_toko;
        
        // Validasi input dari pengguna
        $validated = $request->validate([
            'no_pegawai' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'ttl' => 'required|date',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15'
        ]);
     
        
        // Menyimpan data ke database
        Pegawai::create([
            'id_user'=>Auth::user()->id,
            'no_pegawai'=>$validated['no_pegawai'],
            'nama' => $validated['nama'],
            'ttl' => $validated['ttl'],
            'alamat' => $validated['alamat'],
            'no_hp' => $validated['no_hp'],
            'terakhir_login' => now() // Menyimpan waktu terakhir login
        ]);
      
        // Redirect dengan pesan sukses
        return redirect()->route('pegawai')->with('success', 'Pegawai berhasil ditambahkan');
    }
    
}