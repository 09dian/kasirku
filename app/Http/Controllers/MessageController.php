<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        return view('home.pesan', ['title' => 'Pesan']); // Tampilkan view pesan.blade.php
    }
    public function store(Request $request)
   {
    
   }
    
    
    
}
