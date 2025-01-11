<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(){
        return view('login.register');
    }
    
    public function store(Request $request)
    {
        // Validasi input pendaftar
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'ttl'=> 'required|string|max:255',
            'alamat'=>'required|string|max:255',
           'password' => 'required|min:8|max:255|confirmed',
        ], [
            'email.unique' => 'Email tos diangge, cobi angge email nu sanes.',
        ]);

        // Buat pengguna baru
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'ttl'=>$validated['ttl'],
            'alamat'=> $validated['alamat'],
            'password' => Hash::make($validated['password']),
            
        ]);

        // Kirim pesan
        session()->flash('success', 'Akun anjeun parantos kasimpen sareng suksés didaptarkeun!');

        // pindahkan tampilan jika berhasil daftar
        return redirect('/');
    }
}