<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PegawaiProdukController extends Controller
{
    public function index()
    {
        $pegawai = Auth::guard('pegawai')->user(); // Pegawai yang sedang login
        $id_pegawai = $pegawai->id;

        $messages = Message::where('receiver_id', $id_pegawai)
            ->whereIn('id', function ($query) use ($id_pegawai) {
                $query->selectRaw('MAX(id)')->from('messages')->where('receiver_id', $id_pegawai)->groupBy('receiver_id');
            })
            ->latest()
            ->get();
        return view('home_pegawai.produkPegawai', compact('messages'), ['title' => 'Produk']);
    }
}
