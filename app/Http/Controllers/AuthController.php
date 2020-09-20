<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
    public function get_data()
    {
        $json['data']=Auth::user();
        $json['kode']=200;

        return response()->json($json);

    }
    public function login(Request $req)
    {
        if(Auth::attempt(['username' => $req->username, 'password' => $req->password]))
        {
            $json['data']=Auth::user();
            $json['token']=Auth::user()->CreateToken('POS')->accessToken;
            $json['pesan']='Selamat Datang '.Auth::user()->nama;
            $json['kode']=200;
        }
        else
        {
            $json['pesan']='maaf user atau password salah';
            $json['kode']=203;
        }

        return response()->json($json);

    }
}
