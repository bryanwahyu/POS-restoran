<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KasirFrontController extends Controller
{
    public function index()
    {
        return view('kasir.index');
    }
}
