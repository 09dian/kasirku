<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function settings()
    {
        $id_pemilik = Auth::user()->id;
        $messages = Message::where('sender_id', $id_pemilik)->selectRaw('*, MAX(created_at) as max_created_at')->groupBy('receiver_id')->orderBy('max_created_at', 'desc')->get();
        return view('home.settings', compact('messages'), ['title' => 'Settings']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Array untuk menampung pesan
        $pesan = [];

        // Update gambar
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($user->gambar && Storage::exists('public/' . $user->gambar)) {
                Storage::delete('public/' . $user->gambar);
            }
            // Simpan gambar baru
            $file = $request->file('gambar');
            $path = $file->store('profile_images', 'public');
            $user->gambar = $path;

            // Tambahkan pesan sukses
            $pesan[] = 'Foto berhasil diperbarui.';
        }

        // Update nama
        if ($request->has('name') && $request->input('name') !== $user->name) {
            $user->name = $request->input('name');
            $pesan[] = 'Nama berhasil diubah.';
        }

        // Update email
        if ($request->has('email') && $request->input('email') !== $user->email) {
            $user->email = $request->input('email');
            $pesan[] = 'Email berhasil diubah.';
        }

        // Update tanggal lahir
        if ($request->has('ttl') && $request->input('ttl') !== $user->ttl) {
            $user->ttl = $request->input('ttl');
            $pesan[] = 'Tanggal Lahir berhasil diubah.';
        }

        // Update alamat
        if ($request->has('alamat') && $request->input('alamat') !== $user->alamat) {
            $user->alamat = $request->input('alamat');
            $pesan[] = 'Alamat berhasil diubah.';
        }
        // Update nama toko
        if ($request->has('nama_toko') && $request->input('nama_toko') !== $user->nama_toko) {
            $user->nama_toko = $request->input('nama_toko');
            $pesan[] = 'Nama toko berhasil diubah.';
        }

        // Simpan perubahan
        $user->save();

        // Kirim pesan sukses
        $berhasil = implode(' ', $pesan);

        // Redirect halaman dengan pesan sukses
        return redirect()->route('settings')->with('success', $berhasil);
    }
}