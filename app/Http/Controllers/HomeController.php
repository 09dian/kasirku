<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Message;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $produk = Produk::count();

        $hasil = Hasil::latest()->first();
        $name = auth()->user()->name; // ID yang sedang login


        $data = Message::where('sender_type', $name)->orWhere('receiver_type', $name)->orderBy('created_at', 'asc')->get();

        $messages = $data->groupBy(function ($msg) use ($name) {
            return $msg->sender_type === $name ? $msg->receiver_type : $msg->sender_type;
        });

        $jumlahPesan = Message::where('is_read', 0)->count(); //menghitung jumlah pesan yang belum dibaca

       return view('home.home', compact('messages','hasil', 'produk', 'jumlahPesan'), ['title' => 'Home Pemilik']);
    }
}
