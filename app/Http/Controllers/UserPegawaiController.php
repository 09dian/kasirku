<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPegawaiController extends Controller
{
    public function index(){
        return view('home_pegawai.user_pegawai');
    }
}