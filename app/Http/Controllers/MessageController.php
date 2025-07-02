<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(Request $request, $receiver_id)
    {
        $pegawaiId = $receiver_id; // ID pegawai
        $pegawai = Pegawai::where('id', $pegawaiId)->first(); // ambil nama Pegawai

        $name = auth()->user()->name; // ID yang sedang login
        $data = Message::where('sender_type', $name)->orWhere('receiver_type', $name)->orderBy('created_at', 'asc')->get();
        $messages = $data->groupBy(function ($msg) use ($name) {
            return $msg->sender_type === $name ? $msg->receiver_type : $msg->sender_type;
        });

        $jumlahPesan = Message::where('is_read', 0)->count(); //menghitung jumlah pesan yang belum dibaca
        if ($pegawai->id == $pegawaiId) {
            Message::where('receiver_type', $pegawai->nama)->update(['is_read' => 1]);
        } else {
            Message::where('receiver_type', $pegawai->nama)->update(['is_read' => 0]);
        }
        // if ($pegawai->id == $name) {
        //     $all_pesan = Message::where('sender_id', $name)->where('receiver_id', $name)->orderBy('created_at', 'asc')->get();
        // } else {
        //     $all_pesan = Message::where(function ($query) use ($name, $pegawaiId) {
        //         $query->where('sender_id', $name)->where('receiver_id', $pegawaiId);
        //     })
        //         ->orWhere(function ($query) use ($name, $pegawaiId) {
        //             $query->where('sender_id', $pegawaiId)->where('receiver_id', $name);
        //         })
        //         ->orderBy('created_at', 'asc') // Urutkan berdasarkan waktu
        //         ->get();
        // }
        // Tampilkan view pesan.blade.php
dd("ok");
        // return view('home.pesan', compact('messages', 'all_pesan', 'pegawaiId', 'pegawai', 'jumlahPesan'), ['title' => 'Pesan']);
    }

    public function storeMessage(Request $request, $pegawaiId)
    {
        // Validasi input
        $request->validate([
            'message' => 'required|string',
            'receiver_id' => 'required|integer',
            'receiver_type' => 'required|string',
        ]);
        $sender = auth()->user()->name; // Ambil user yang sedang login
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

        return redirect()->route('notifikasi', $pegawaiId)->with('success', 'pesan berhasil di kirim');
    }

    public function delete($id, $receiver_id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->route('notifikasi', $receiver_id)->with('success', 'pesan berhasil di hapus');
    }
}
