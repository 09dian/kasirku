<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PosController extends Controller
{
    public function index()
    {
      $id_pemilik = Auth::user()->id;
      // Ambil hanya pesan terbaru untuk setiap receiver_id
      $produks = Produk::all();
      $messages = Message::where('sender_id', $id_pemilik)
          ->whereIn('id', function ($query) use ($id_pemilik) {
              $query->selectRaw('MAX(id)')->from('messages')->where('sender_id', $id_pemilik)->groupBy('receiver_id');
          })
          ->latest()
          ->get();
        return view('home.pos',compact('produks','messages'), ['title' => 'Pos']);
    }
}
