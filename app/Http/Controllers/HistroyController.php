<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Message;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HistroyController extends Controller
{
    public function index(){
        $pembayaran = pembayaran::all();
        // Ambil hanya pesan terbaru untuk setiap receiver_id
        $produks = Produk::all();
      $name = auth()->user()->name; // ID yang sedang login
        $data = Message::where('sender_type', $name)->orWhere('receiver_type', $name)->orderBy('created_at', 'asc')->get();
        $messages = $data->groupBy(function ($msg) use ($name) {
            return $msg->sender_type === $name ? $msg->receiver_type : $msg->sender_type;
        });
        $jumlahPesan = Message::where('is_read', 0)->count(); //menghitung jumlah pesan yang belum dibaca
        return view('home.history', compact('produks', 'messages','pembayaran','jumlahPesan'), ['title' => 'History']);
    }
}
