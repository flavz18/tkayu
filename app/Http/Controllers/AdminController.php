<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index()
    {
        $data = array(
            'title' => 'Admin Page',
            'role' => Auth::user()->name,
        );
        
        return view('layout.admindashboard', $data);
    }
}
