<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Pembayaran;
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
        $pembayaran = pembayaran::all();
        $name = auth()->user()->name; // ID yang sedang login
        $data = Message::where('sender_type', $name)->orWhere('receiver_type', $name)->orderBy('created_at', 'asc')->get();
        $messages = $data->groupBy(function ($msg) use ($name) {
            return $msg->sender_type === $name ? $msg->receiver_type : $msg->sender_type;
        });
        $jumlahPesan = Message::where('is_read', 0)->count(); //menghitung jumlah pesan yang belum dibaca
        return view('home.settings', compact('messages', 'pembayaran', 'jumlahPesan'), ['title' => 'Settings']);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function update(Request $request)
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Array untuk menampung pesan
        $pesan = [];

        // Update gambar
        if ($request->hasFile('gambar')) {
            if ($user->gambar && Storage::disk('public')->exists($user->gambar)) {
                Storage::disk('public')->delete($user->gambar);
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
    public function update_pembayaran(Request $request)
    {
        //priksa inputan file atau string
        if ($request->hasFile('pilihanPembayaran') && $request->file('pilihanPembayaran')->isValid()) {
            $validated = $request->validate([
                'namePembayaran' => 'required|in:QRIS,CASH,TRANSFER',
                'namaPemilik' => 'required|string',
                'pilihanPembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'codePembayaran' => 'required|string',
            ]);
            if ($request->file('pilihanPembayaran')) {
                $validated['pilihanPembayaran'] = $request->file('pilihanPembayaran')->store('post_image', 'public');

                if (!$validated['pilihanPembayaran']) {
                    $pesan[] = 'gagal uplod gambar';
                    $berhasil = implode(' ', $pesan);
                    return redirect()->route('settings')->with('danger', $berhasil);
                }
            }
            Pembayaran::create($validated);

            $pesan[] = 'Pembayaran berhasil ditambahkan.';
            $berhasil = implode(' ', $pesan);
            return redirect()->route('settings')->with('success', $berhasil);
        } else {
            $validated = $request->validate([
                'namePembayaran' => 'required|in:QRIS,CASH,TRANSFER',
                'namaPemilik' => 'required|string',
                'pilihanPembayaran' => 'nullable|string',
                'codePembayaran' => 'required|string',
            ]);
            Pembayaran::create($validated);

            $pesan[] = 'Pembayaran berhasil ditambahkan.';
            $berhasil = implode(' ', $pesan);
            return redirect()->route('settings')->with('success', $berhasil);
        }
    }
}
