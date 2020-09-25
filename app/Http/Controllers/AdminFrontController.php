<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminFrontController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function gudang_kopi()
    {
        return view('admin.kopi');
    }
    public function detail_kopi($id)
    {
        return view('admin.kopi.detail',compact('id'));
    }
}
