<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Kopi;
use App\Masuk_Kopi;
use App\Keluar_kopi;
class KopiController extends Controller
{
    //
    public function index()
    {
        $json['data']=Kopi::with('masuk','keluar')->get();
        $json['kode']=200;

        return response()->json($json);
    }

    public function store(Request $req)
    {
        $kopi=New Kopi;
        $kopi->kode=$req->kode;
        $kopi->asal=$req->asal;
        $kopi->jenis=$req->jenis;
        $kopi->save();


        $json['pesan']="Data sudah disimpan";
        $json['kode']=200;

        return response()->json($json);
    }
    public function cek_kode($kode)
    {
        $count=Kopi::where('kode',$kode)->count();

        if($count==1){

            $json['kode']=201;
            $json['data']=Kopi::where('kode',$kode)->first();

        }else{
            $json['kode']=200;
        }

        return response()->json($json);
    }
    public function masuk_kopi(Kopi $kopi,Request $req)
    {
        $kopi->stok=$kopi->stok+$req->jumlah;
        $kopi->save();

        $masuk=new Masuk_Kopi;
        $masuk->kopi_id=$kopi->id;
        $masuk->nama=Auth::user()->nama;
        $masuk->jumlah=$req->jumlah;
        $masuk->keterangan=$req->keterangan;
        $masuk->save();

        $json['pesan']="stok kopi berhasil ditambahkan";
        $json['kode']=200;

        return response()->json($json);
    }

   public function keluar_kopi(Kopi $kopi,Request $req)
    {
        if($kopi->stok-$req->jumlah<0){
            $json['pesan']=" maaf jumlah yang  anda input  adalah salah";
            $json['kode']=203;
        }else
        {
            $kopi->stok=$kopi->stok-$req->jumlah;
            $kopi->save();

            $keluar=new Keluar_Kopi;
            $keluar->kopi_id=$kopi->id;
            $keluar->nama=Auth::User()->nama;
            $keluar->jumlah=$req->jumlah;
            $keluar->catatan=$req->keterangan;
            $keluar->save();

            $json['kode']=200;
            $json['pesan']="data sudah berhasil disimpan";


        }

         return response()->json($json);
    }
    public function show_keluar(Keluar_Kopi $kopi)
    {
        $json['data']=$kopi->load('kopi');
        $json['kode']=200;

        return response()->json($json);
    }
    public function show_masuk(Masuk_Kopi $masuk)
    {
        $json['data']=$masuk->load('kopi');
        $json['kode']=200;

        return response()->json($json);
    }

    public function destroy_in(Masuk_Kopi $kopi)
    {
        $kopi->kopi->stok=$kopi->kopi->stok-$kopi->jumlah;
        $kopi->kopi->save();

        $kopi->delete();

        $json['pesan']="Kopi berhasil di hapus";
        $json['kode']=200;

        return response()->json($json);
    }
    public function destroy_out(Keluar_Kopi $kopi)
    {

        $kopi->kopi->stok=$kopi->kopi->stok+$kopi->jumlah;
        $kopi->kopi->save();

        $kopi->delete();

        $json['pesan']="Kopi berhasil di hapus";
        $json['kode']=200;

        return response()->json($json);
    }

    public function show(Kopi $kopi)
    {
        $json['data']=$kopi->load('masuk','keluar');
        $json['kode']=200;

        return response()->json($json);
    }
    public function update(Kopi $kopi,Request $req)
    {
        $kopi->asal=$req->asal;
        $kopi->jenis=$req->jenis;
        $kopi->save();

        $json['pesan']='Kopi berhasil diganti';
        $json['kode']=200;

        return response()->json($json);
        
    }
    public function destroy(Kopi $kopi)
    {
        $kopi->delete();

        $json['pesan']="Data Kopi sudah dihapus";
        $json['kode']=200;

        return response()->json($json);
    }
}
