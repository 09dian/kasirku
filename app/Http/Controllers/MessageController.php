<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        return view('home.pesan', ['title' => 'Pesan']);
    }
    public function sendMessage(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|integer',
            'receiver_type' => 'required|in:user,pegawai',
            'message' => 'required|string',
        ]);

        Message::create([
            'sender_id' => Auth::id(),
            'sender_type' => Auth::user() instanceof User ? 'user' : 'pegawai',
            'receiver_id' => $request->receiver_id,
            'receiver_type' => $request->receiver_type,
            'message' => $request->message,
        ]);

        return response()->json(['message' => 'Pesan terkirim!']);
    }

    public function getMessages($receiver_id, $receiver_type)
    {
        $messages = Message::where(function ($query) use ($receiver_id, $receiver_type) {
            $query->where('sender_id', Auth::id())
                ->where('sender_type', Auth::user() instanceof User ? 'user' : 'pegawai')
                ->where('receiver_id', $receiver_id)
                ->where('receiver_type', $receiver_type);
        })->orWhere(function ($query) use ($receiver_id, $receiver_type) {
            $query->where('receiver_id', Auth::id())
                ->where('receiver_type', Auth::user() instanceof User ? 'user' : 'pegawai')
                ->where('sender_id', $receiver_id)
                ->where('sender_type', $receiver_type);
        })->orderBy('created_at', 'asc')->get();

        return response()->json($messages);
    }
    
}