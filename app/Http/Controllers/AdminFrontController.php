<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminFrontController extends Controller
{
    public function index()
    {
        $data['title'] = 'Home';
        $data['subTitle'] = 'Home';
        return view('admin.index',$data);
    }
    public function user()
    {
        return view('admin.user');
    }
    public function gudang_kopi()
    {
        return view('admin.kopi');
    }
    public function detail_kopi($id)
    {
        return view('admin.kopi.detail',compact('id'));
    }
    public function gudang_bahan()
    {
        return view('admin.bahan');
    }
    public function detail_bahan($id)
    {
        return view('admin.bahan.detail',compact('id'));
    }
    public function meja()
    {
        return view('admin.meja');
    }
    public function menu()
    {
        $data['title'] = 'Menu';
        $data['subTitle'] = 'List Menu';
        return view('admin.menu',$data);
    }
    public function order()
    {
        return view('admin.order');
    }
}
