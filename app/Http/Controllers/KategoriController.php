<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    public function kategori(){
        $id_pemilik = Auth::user()->id;
        $messages = Message::where('sender_id', $id_pemilik)->get();
        $total_message = count($messages);
        return view('home.tambah_kategori', compact('total_message'),['title' => 'Produk']);
    }
    public function index(){
        $kategori=Kategori::all();
        $id_pemilik = Auth::user()->id;
        $messages = Message::where('sender_id', $id_pemilik)->get();
        $total_message = count($messages);
        return view('home.kategori',compact('kategori','total_message'), ['title' => 'Produk']);
    }

    public function create(Request $request){
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

    public function destroy($id){
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori')->with('success', 'Kategori berhasil dihapus!');
    }

    public function update(Request $request, $id){
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
