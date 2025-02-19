<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index($id)
    {
        $id_pemilik = Auth::user()->id;
        // Ambil hanya pesan terbaru untuk setiap receiver_id
$messages = Message::where('sender_id', $id_pemilik)
    ->whereIn('id', function ($query) use ($id_pemilik) {
        $query->selectRaw('MAX(id)')
            ->from('messages')
            ->where('sender_id', $id_pemilik)
            ->groupBy('receiver_id');
    })
    ->latest()
    ->get();
        return view('home.pesan', compact('messages'), ['title' => 'Pesan']); // Tampilkan view pesan.blade.php
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|integer', // ID penerima
            'receiver_type' => 'required|string', // Tipe penerima (pegawai atau user)
            'message' => 'required|string', // Isi pesan
        ]);

        $sender = Auth::user(); // Ambil user yang sedang login
        $receiverId = $request->receiver_id;
        $receiverType = $request->receiver_type;
        $messageText = $request->message;

        // Cek apakah pengirim adalah user atau pegawai
        if ($sender instanceof User) {
            // Jika pengirim adalah User (Pemilik), pastikan hanya bisa mengirim ke Pegawai dengan id_user yang sama
            $receiver = Pegawai::where('id', $receiverId)->where('id_user', $sender->id)->first();
        } elseif ($sender instanceof Pegawai) {
            // Jika pengirim adalah Pegawai, pastikan hanya bisa mengirim ke User dengan id_user yang sesuai
            $receiver = User::where('id', $receiverId)->where('id', $sender->id_user)->first();
        } else {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengirim pesan ini.');
        }

        // Jika tidak menemukan penerima yang valid, tolak pengiriman pesan
        if (!$receiver) {
            return redirect()->back()->with('error', 'Pesan hanya dapat dikirim antara pemilik dan pegawai yang sesuai.');
        }

        // Simpan pesan ke database
        Message::create([
            'sender_id' => $sender->id,
            'sender_type' => $sender instanceof User ? $sender->name : Pegawai::find($sender->id)->name,
            'receiver_id' => $receiverId,
            'receiver_type' => $receiverType,
            'message' => $messageText,
        ]);

        return redirect()->route('pegawai')->with('success', 'pesan berhasil di kirim');
    }
    public function all_pesan()
    {
        $id_pemilik = Auth::user()->id;
        // Ambil pesan terbaru untuk setiap receiver_id
        // Ambil hanya pesan terbaru untuk setiap receiver_id
$messages = Message::where('sender_id', $id_pemilik)
    ->whereIn('id', function ($query) use ($id_pemilik) {
        $query->selectRaw('MAX(id)')
            ->from('messages')
            ->where('sender_id', $id_pemilik)
            ->groupBy('receiver_id');
    })
    ->latest()
    ->get(); return view('home.all_pesan', compact('messages'), ['title' => 'Semua Pesan']);
    }
}