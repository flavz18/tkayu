<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\alert;

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
                return redirect('/admin')->with('success_login','Selamat Datang Admin');
            }elseif(Auth::user()->role == 'gudang'){
                return redirect('/gudang')->with('success_login','Selamat Datang Gudang');
            }
        }else {
            return back()->withInput()->with('error_login','Email atau Password yang anda masukkan tidak sesuai');
            }
        }

    public function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
