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
        $userI= auth()->id(); // ID kamu

        $messages = Message::where('sender_id', $userId)
            ->whereIn('id', function ($query) use ($userId) {
                $query->selectRaw('MAX(id)')->from('messages')->where('sender_id', $userId)->groupBy('receiver_id');
            })
            ->latest()
            ->get();

        $jumlahPesan = $messages->count();
        return view('home.home', compact('hasil', 'messages', 'produk', 'jumlahPesan'), ['title' => 'Home Pemilik']);
    }
}
