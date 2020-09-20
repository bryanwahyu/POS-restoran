<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthFrontController extends Controller
{
    public function login()
    {
        return view('login');
        
    }
}
