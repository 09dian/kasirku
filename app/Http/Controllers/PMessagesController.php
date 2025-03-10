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
        $pegawai = Auth::guard('pegawai')->user(); // Pegawai yang sedang login
        $id_pegawai = $pegawai->id;
        $re = User::where('id', $pegawai->id_user)->first(); //ambil data pemilik yang sesuai dengan id_user pegawai

        if ($re->id == $id_pegawai) {
            $all_pesan = Message::where(function ($query) use ($id_pegawai, $receiver_id) {
                $query->where('sender_id', $id_pegawai)->where('receiver_id', $receiver_id);
            })
                ->orWhere(function ($query) use ($id_pegawai, $receiver_id) {
                    $query->where('sender_id', $receiver_id)->where('receiver_id', $id_pegawai);
                })
                ->orderBy('created_at', 'asc')
                ->get();
        } else {
            $all_pesan = Message::where(function ($query) use ($pegawai) {
                // Pesan di mana pegawai sebagai penerima
                $query->where('receiver_id', $pegawai->id)->where('receiver_type', $pegawai->nama);
            })
                ->orWhere(function ($query) use ($pegawai) {
                    // Pesan di mana pegawai sebagai pengirim
                    $query->where('sender_id', $pegawai->id)->where('sender_type', $pegawai->nama);
                })
                ->orderBy('created_at', 'asc')
                ->get();
        }

   

        $messages = Message::where('receiver_id', $id_pegawai)
            ->whereIn('id', function ($query) use ($id_pegawai) {
                $query->selectRaw('MAX(id)')->from('messages')->where('receiver_id', $id_pegawai)->groupBy('receiver_id');
            })
            ->latest()
            ->get();

        return view('home_pegawai.pegawai_all_message', compact('all_pesan', 'messages', 'pegawai', 're', 'pegawai'), ['title' => 'Pesan']);
    }

    public function store(Request $request, $id)
    {
        $pegawai = Auth::guard('pegawai')->user(); // Pegawai yang sedang login
        $request->validate([
            'receiver_id' => 'required|integer', // ID penerima
            'receiver_type' => 'required|string', // Tipe penerima (pegawai atau user)
            'message' => 'required|string', // Isi pesan
        ]);

        // Simpan pesan ke database
        Message::create([
            'sender_id' => $pegawai->id,
            'sender_type' => $pegawai->nama,
            'receiver_id' => $request->receiver_id,
            'receiver_type' => $request->receiver_type,
            'message' => $request->message,
        ]);

        return redirect()->route('pegawai_notifikasi', $pegawai->id)->with('success', 'pesan berhasil di kirim');
    }

    public function delete($id,$sender_id){
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->route('pegawai_notifikasi', $sender_id)->with('success', 'pesan berhasil di hapus');
    }
    
}