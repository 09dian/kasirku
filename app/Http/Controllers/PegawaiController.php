<?php

namespace App\Http\Controllers;


use App\Models\Message;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    public function pegawai()
    {
        // Mendapatkan user yang sedang login
        $id_user = Auth::id(); // Mengambil ID user yang sedang login
    
        // Mengambil data pegawai yang sesuai dengan id_user
        $pegawais = Pegawai::where('id_user', $id_user)->get(); // Query berdasarkan id_user
    
        $id_pemilik = Auth::user()->id;
        $messages = Message::where('sender_id', $id_pemilik)->get();
        $total_message = count($messages);
        // Mengirim data pegawai ke view
        return view('home.pegawai',compact('total_message'), [
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
            'password'=>Hash::make($validated['no_pegawai']),
            'nama' => $validated['nama'],
            'ttl' => $validated['ttl'],
            'alamat' => $validated['alamat'],
            'no_hp' => $validated['no_hp'],
            'nama_toko' => Auth::user()->nama_toko,
            'terakhir_login' => now() // Menyimpan waktu terakhir login
        ]);
      
        // Redirect dengan pesan sukses
        return redirect()->route('pegawai')->with('success', 'Pegawai berhasil ditambahkan');
    }
    public function destroy($id) {
        // Menghapus data pegawai berdasarkan id
        Pegawai::destroy($id);
    
        // Redirect dengan pesan sukses
        return redirect()->route('pegawai')->with('success', 'Pegawai berhasil dihapus');
    }


        public function update(Request $request, $id) {
            // Validasi input dari pengguna
            $validated = $request->validate([
                'no_pegawai' => 'required|string|max:255',
                'nama' => 'required|string|max:255',
                'ttl' => 'required|date',
                'alamat' => 'required|string|max:255',
                'no_hp' => 'required|string|max:15'
            ]);

            // Mengambil data pegawai berdasarkan id
            $pegawai = Pegawai::findOrFail($id);

            // Mengupdate data pegawai
            $pegawai->update([
                'no_pegawai' => $validated['no_pegawai'],
                'nama' => $validated['nama'],
                'ttl' => $validated['ttl'],
                'alamat' => $validated['alamat'],
                'no_hp' => $validated['no_hp']
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('pegawai')->with('success', 'Pegawai berhasil diperbarui');
        }
    
}
