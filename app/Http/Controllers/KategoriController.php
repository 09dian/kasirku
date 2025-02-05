<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        $kategori=Kategori::all();
        return view('home.kategori',compact('kategori'), ['title' => 'Produk']);
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