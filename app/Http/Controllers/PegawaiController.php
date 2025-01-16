<?php

namespace App\Http\Controllers;


use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function pegawai() {
    $pegawais = Pegawai::all(); // Mengambil semua data pegawai dari database
    return view('home.pegawai', [
        'title' => 'Pegawai',
        'pegawais' => $pegawais // Mengirimkan data pegawai ke view
    ]);
    }


    //untuk menyimpan ke data base
    public function create(Request $request) {

        
        
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