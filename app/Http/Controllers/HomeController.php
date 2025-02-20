<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $hasil = Hasil::latest()->first();
        $id_pemilik = Auth::user()->id;
        // Ambil hanya pesan terbaru untuk setiap receiver_id
        $messages = Message::where('sender_id', $id_pemilik)
            ->whereIn('id', function ($query) use ($id_pemilik) {
                $query->selectRaw('MAX(id)')->from('messages')->where('sender_id', $id_pemilik)->groupBy('receiver_id');
            })
            ->latest()
            ->get();
        return view('home.home', compact('hasil', 'messages'), ['title' => 'Home Pemilik']);
    }
}