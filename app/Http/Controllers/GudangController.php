<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GudangController extends Controller
{
    //
    public function index()
    {
        $data = array(
            'title' => 'Gudang Page',
            'role' => Auth::user()->name,
        );

        return view('layout.gudangdashboard', $data);
    }
}
