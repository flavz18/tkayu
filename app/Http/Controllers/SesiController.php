<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    //
    public function index() {
        $data = array(
            'title' => 'Login Page'
        );

        return view('login', $data);
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        
        if(Auth::attempt($infologin)) {
            $request->session()->regenerate();
            if(Auth::user()->role == 'admin'){
                return redirect('/admin')->with('Login Berhasil','Selamat Datang Admin');
            }elseif(Auth::user()->role == 'gudang'){
                return redirect('/gudang')->with('Login Berhasil','Selamat Datang Gudang');
            }
        }else {
            return back()->with('loginGagal','Email atau Password yang anda masukkan tidak sesuai')->withInput();
            }
        }

    public function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
