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
    public function produk()
    {
        $kategori = Kategori::all();
       $name = auth()->user()->name; // ID yang sedang login
        $data = Message::where('sender_type', $name)->orWhere('receiver_type', $name)->orderBy('created_at', 'asc')->get();
        $messages = $data->groupBy(function ($msg) use ($name) {
            return $msg->sender_type === $name ? $msg->receiver_type : $msg->sender_type;
        });
        $jumlahPesan = Message::where('is_read', 0)->count(); //menghitung jumlah pesan yang belum dibaca
        return view('home.tambah_produk', compact('kategori', 'messages','jumlahPesan'), ['title' => 'Produk']);
    }

    public function index()
    {
        $produks = Produk::all();
        $kategoris = Kategori::all();
       $name = auth()->user()->name; // ID yang sedang login
        $data = Message::where('sender_type', $name)->orWhere('receiver_type', $name)->orderBy('created_at', 'asc')->get();
        $messages = $data->groupBy(function ($msg) use ($name) {
            return $msg->sender_type === $name ? $msg->receiver_type : $msg->sender_type;
        });
        $jumlahPesan = Message::where('is_read', 0)->count(); //menghitung jumlah pesan yang belum dibaca
        return view('home.produk', compact('produks', 'kategoris', 'messages','jumlahPesan'), ['title' => 'Produk']);
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
            $validated['img_produk'] = $request->file('img_produk')->store('post_image', 'public');

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
