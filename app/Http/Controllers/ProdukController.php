<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.produk', [
            'title' => 'Produk',
            'produk' => Produk::all(),
            'categories' => Category::all(),  // Tambahkan kategori ke view
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validate = $request->validate([
        'nama_produk' => 'required|max:255',
        'id_category' => 'required|string|max:255',
        'harga' => 'required|numeric|min:0',
        'stok' => 'required|integer|min:0',
    ]);

   Produk::create($validate);
   return redirect()->route('produk.index')->with('success', 'Data berhasil disimpan!');
}


    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $validate = $request->validate([
            'nama_produk' => 'required|max:255',
            'harga' => 'required|numeric|min:0',
            'id_category' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
        ]);
        $produk->update($validate);
        return redirect()->route('produk.index')->with('success', 'Data berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Data berhasil dihapus!');
    }
}
