<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        if(Auth::check()){
              return redirect('/home');
        }else{
            return view('login.login');
        }

        if(Auth::guest()){
            return view('login.login');
        }else{
              return redirect('/home');
        }
    }
    public function ActionLogin(Request $request){
        $email =$request->input('email');
        $password = $request->input('password');
        // tangkap data input user dan seleksi
    if (Auth::attempt(['email' => $email, 'password' => $password])) {
        return redirect('/home');
    }else{
         // Kirim pesan
         session()->flash('message', 'Email atau kata sandi leupat cobi di parios nutaliti');
         return redirect('/');

    }
}
public function logout()
    {
        Auth::logout();
        session()->flash('success', 'Akun atos kaluar');
        return redirect('/');
    }
    
}