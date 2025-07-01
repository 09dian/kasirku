<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    public function kategori()
    {
       $name = auth()->user()->name; // ID yang sedang login
        $data = Message::where('sender_type', $name)->orWhere('receiver_type', $name)->orderBy('created_at', 'asc')->get();
        $messages = $data->groupBy(function ($msg) use ($name) {
            return $msg->sender_type === $name ? $msg->receiver_type : $msg->sender_type;
        });
        $jumlahPesan = Message::where('is_read', 0)->count(); //menghitung jumlah pesan yang belum dibaca
        return view('home.tambah_kategori', compact('messages','jumlahPesan'), ['title' => 'Produk']);
    }
    public function index()
    {
        $kategori = Kategori::all();
       $name = auth()->user()->name; // ID yang sedang login
        $data = Message::where('sender_type', $name)->orWhere('receiver_type', $name)->orderBy('created_at', 'asc')->get();
        $messages = $data->groupBy(function ($msg) use ($name) {
            return $msg->sender_type === $name ? $msg->receiver_type : $msg->sender_type;
        });
        $jumlahPesan = Message::where('is_read', 0)->count(); //menghitung jumlah pesan yang belum dibaca
        return view('home.kategori', compact('kategori', 'messages','jumlahPesan'), ['title' => 'Produk']);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
        ]);

        // Tetapkan nilai default status ke 1
        $validated['status'] = 1;

        // Simpan data ke dalam tabel `kategoris`
        Kategori::create($validated);
        // Redirect dengan pesan sukses
        // Redirect dengan pesan sukses
        return redirect()->route('kategori')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori')->with('success', 'Kategori berhasil dihapus!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($validated);

        return redirect()->route('kategori')->with('success', 'Kategori berhasil diperbarui!');
    }
}