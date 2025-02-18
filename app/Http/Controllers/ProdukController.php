<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Message;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCreateProdukRequest;
use App\Http\Requests\UpdateCreateProdukRequest;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function produk(){
        $kategori= Kategori::all();
        $id_pemilik = Auth::user()->id;
        $messages = Message::where('sender_id', $id_pemilik)->get();
        $total_message = count($messages);
        return view('home.tambah_produk', compact('kategori','total_message'),['title' => 'Produk']);
    }
    
    public function index()
    {
        $produks = Produk::all();
        $kategoris = Kategori::all();
        $id_pemilik = Auth::user()->id;
        $messages = Message::where('sender_id', $id_pemilik)->get();
        $total_message = count($messages);
        return view('home.produk', compact('produks', 'kategoris','total_message'), ['title' => 'Produk']);
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'kategori_produk' => 'required|string|max:255',
            'nama_produk' => 'required|string|max:255',
            'stok_produk' => 'required|integer|min:1',
            'harga_produk' => 'required|integer|min:1',
            'img_produk' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Set nilai default status ke 1
        $validated['status'] = 1;

        if ($request->file('img_produk')) {
            $validated['img_produk'] = $request->file('img_produk')->store('post_image');
            if (!$validated['img_produk']) {
                return redirect()->route('produk')->with('error', 'Gagal mengunggah gambar!');
            }
        }

        // Simpan data ke database
        Produk::create($validated);
        return redirect()->route('produk')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kategori_produk' => 'required|string|max:255',
            'nama_produk' => 'required|string|max:255',
            'stok_produk' => 'required|integer|min:1',
            'harga_produk' => 'required|integer|min:1',
            'img_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|string|min:1',
        ]);

        $produk = Produk::findOrFail($id);

        // Jika ada file baru yang diunggah
        if ($request->hasFile('img_produk')) {
            // Hapus gambar lama jika ada
            if ($produk->img_produk) {
                Storage::delete($produk->img_produk);
            }
            // Simpan gambar baru
            $validated['img_produk'] = $request->file('img_produk')->store('post_image');
        } else {
            // Jika tidak ada file baru, gunakan gambar lama
            $validated['img_produk'] = $request->old_img_produk;
        }

        // Update produk
        $produk->update($validated);

        return redirect()->route('produk')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('produk')->with('success', 'Produk berhasil dihapus!');
    }
}
