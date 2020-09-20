<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bahan;
use App\Masuk_bahan;
use App\Keluar_bahan;
use Auth;
class BahanController extends Controller
{

    public function index()
    {
        $json['data']=Bahan::with('masuk','kelua

        r')->get();
        $json['kode']=200;

        return response()->json($json);
    }
    public function store(Request $req)
    {
        $this->validate($req,[
            'kode'=>'required,unique:bahan',
            'nama'=>'required'
        ]);

        $bahan=new Bahan;
        $bahan->nama=$req->nama;
        $bahan->kode=$req->kode;
        $bahan->save();

        if($req->masuk!=null)
        {
            $masuk=new Masuk_bahan;
            $masuk->nama=Auth::user()->nama;
            $masuk->bahan_id=$bahan->id;
            $masuk->jumlah=$req->jumlah;
            $masuk->keterangan=$req->keterangan;
            $masuk->save();

            $bahan->stok=$req->jumlah;
            $bahan->save();

        }

        $json['pesan']="bahan berhasil ditambahkan";
        $json['kode']=200;

        return response()->json($json);

    }
    public function bahan_masuk(Bahan $bahan,Request $req)
    {
        $masuk=new Masuk_bahan;
        $masuk->nama=Auth::user()->nama;
        $masuk->bahan_id=$bahan->id;
        $masuk->jumlah=$req->jumlah;
        $masuk->keterangan=$req->keterangan;
        $masuk->save();

        $bahan->stok=$bahan->stok+$req->jumlah;
        $bahan->save();

        $json['pesan']='Bahan telah masuk ke gudang';
        $json['kode']=200;

        return response()->json($json);

    }
    public function hapus_data_Masuk(Masuk_bahan $masuk)
    {
        $masuk->bahan->stok=$masuk->bahan->stok-$masuk->jumlah;
        $masuk->bahan->save();

        $masuk->delete();

        $json['pesan']='bahan sudah dibatalkan';
        $json['kode']=200;

        return response()->json($json);
    }
    public function show(Bahan $bahan)
    {
        $json['data']=$bahan->load('masuk','keluar');
        $json['kode']=200;

        return response()->json($json);
    }

    
}
