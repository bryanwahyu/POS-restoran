<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KasirFrontController extends Controller
{
    public function index()
    {
        return view('kasir.index');
    }
    public function menu()
    {
        return view('kasir.menu');
    }
    public function meja()
    {
        return view('kasir.meja');
    }

}
