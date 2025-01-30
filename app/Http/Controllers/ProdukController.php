<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreCreateProdukRequest;
use App\Http\Requests\UpdateCreateProdukRequest;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::all();
        return view('home.produk', compact('produks'), ['title' => 'Produk']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'kategori_produk'=> 'required|string|max:255',
            'nama_produk' => 'required|string|max:255',
            'stok_produk' => 'required|integer|min:1',
            'harga_produk' => 'required|integer|min:1',
            'img_produk' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|string|min:1',
        ]);

        if ($request->file('img_produk')) {
            $validated['img_produk']=$request->file('img_produk')->store('post_image');
        }
    
        // Simpan data ke database
        Produk::create($validated);
        return redirect()->route('produk')->with('success', 'Produk berhasil ditambahkan!');
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCreateProdukRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CreateProduk $createProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CreateProduk $createProduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCreateProdukRequest $request, CreateProduk $createProduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CreateProduk $createProduk)
    {
        //
    }
}