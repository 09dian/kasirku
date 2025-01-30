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
            'status' => 'required|string|min:1',
        ]);
    // Simpan data ke dalam tabel `kategoris`
    Kategori::create([
    'nama_kategori' => $validated['nama_kategori'],
    'deskripsi' => $validated['deskripsi'],
    'status' => $validated['status'],
]);
         // Redirect dengan pesan sukses
    return redirect()->route('kategori')->with('success', 'Kategori berhasil ditambahkan!');
}
}