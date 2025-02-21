<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PMessagesController extends Controller
{
    public function index($receiver_id)
    {
        $all_pesan = Message::where('receiver_id', $receiver_id)->get();
        $pegawai = Auth::guard('pegawai')->user()->nama; // Pegawai yang sedang login
        $balas =Message::where('sender_type', $pegawai)->get();
        $id_pegawai = Auth::guard('pegawai')->user()->id;
        $messages = Message::where('receiver_id', $id_pegawai)
            ->whereIn('id', function ($query) use ($id_pegawai) {
                $query->selectRaw('MAX(id)')->from('messages')->where('receiver_id', $id_pegawai)->groupBy('receiver_id');
            })
            ->latest()
            ->get();
        return view('home_pegawai.pegawai_all_message', compact('all_pesan', 'messages','balas'), ['title' => 'Pesan']);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'receiver_id' => 'required',
            'nilai' => 'required',
            'receiver_type' => 'required|string',
            'message' => 'required|string|',
        ]);
        $pegawai = Auth::guard('pegawai')->user(); // Pegawai yang sedang login
        $receiverId = $request->receiver_id;
        $receiverType = $request->receiver_type;
        $messageText = $request->message;
        $nilai = $request->nilai;
        // Ambil data pemilik berdasarkan id_user pegawai
        $pemilik = User::where('id', $pegawai->id_user)->first();

        if ($pemilik && $pegawai->id_user == $pemilik->id) {
            // Simpan pesan ke database
            Message::create([
                'sender_id' => $pegawai->id,
                'sender_type' => $pegawai->nama,
                'receiver_id' => $receiverId,
                'receiver_type' => $receiverType,
                'message' => $messageText,
            ]);

            return redirect()->route('pegawai_notifikasi', $nilai)->with('success', 'pesan berhasil di kirim');
        } else {
            dd('no'); // Jika tidak cocok
        }
    }
}