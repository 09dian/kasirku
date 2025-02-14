<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        return view('home.pesan', ['title' => 'Pesan']); // Tampilkan view pesan.blade.php
    }
    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required',
            'receiver_type' => 'required|in:user,pegawai',
            'message' => 'required'
        ]);
        // Menentukan pengirim sesuai dengan yang sedang login
        $sender = auth()->user(); // Untuk User
        $sender_type = 'user'; // Asumsikan default user
        
        // Jika yang login adalah pegawai
        if (auth()->guard('pegawai')->check()) {
            $sender = auth()->guard('pegawai')->user(); // Untuk Pegawai
            $sender_type = 'pegawai'; // Menentukan tipe pengirim
        }
    
        // Cek jika penerima adalah user atau pegawai
        if ($request->receiver_type === 'user') {
            $receiver = User::find($request->receiver_id);
        } else {
            $receiver = Pegawai::find($request->receiver_id);
        }
    
        // Pastikan hanya user & pegawai dengan id_user yang sama bisa berkomunikasi
        if (!$receiver || $receiver->id_user != $sender->id) {
            return response()->json(['error' => 'Tidak bisa mengirim pesan ke penerima ini'], 403);
        }
    
        // Simpan pesan jika validasi lolos
        Message::create([
            'sender_id' => $sender->id,
            'sender_type' => $sender_type,  // Gunakan tipe pengirim sesuai dengan yang login
            'receiver_id' => $request->receiver_id,
            'receiver_type' => $request->receiver_type,
            'message' => htmlspecialchars($request->message, ENT_QUOTES, 'UTF-8')
        ]);
    
        return redirect()->route('pegawai')->with('success', 'Pesan Berhasil Dikirim');
    }
    
    
    
}