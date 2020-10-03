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
        $json['data']=Bahan::with('masuk','keluar')->get();
        $json['kode']=200;

        return response()->json($json);
    }
    public function update(Bahan $bahan,Request $req)
    {
        $bahan->nama=$req->nama;
        $bahan->save();

        $json['pesan']="Bahan berhasil diedit";
        $json['kode']=200;

        return response()->json($json);
    }
    public function store(Request $req)
    {

        $bahan=new Bahan;
        $bahan->nama=$req->nama;
        $bahan->kode=$req->kode;
        $bahan->save();

        $json['pesan']="bahan berhasil ditambahkan";
        $json['kode']=200;

        return response()->json($json);

    }
    public function cek_kode($kode)
    {
        $count=Bahan::where('kode',$kode)->count();

        if($count==1){

            $json['kode']=201;
            $json['data']=Bahan::where('kode',$kode)->first();

        }else{
            $json['kode']=200;
        }

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

    public function keluar_bahan(Bahan $bahan,Request $req)
    {
        if($bahan->stok-$req->jumlah<0){
            $json['pesan']=" maaf jumlah yang  anda input  adalah salah";
            $json['kode']=203;
        }else
        {
            $bahan->stok=$bahan->stok-$req->jumlah;
            $bahan->save();

            $keluar=new Keluar_bahan;
            $keluar->bahan_id=$bahan->id;
            $keluar->nama=Auth::User()->nama;
            $keluar->jumlah=$req->jumlah;
            $keluar->catatan=$req->keterangan;
            $keluar->save();

            $json['kode']=200;
            $json['pesan']="data sudah berhasil disimpan";

        }

         return response()->json($json);
    }
    public function destroy_out(Keluar_bahan $keluar)
    {

        $keluar->bahan->stok=$keluar->bahan->stok+$keluar->jumlah;
        $keluar->bahan->save();

        $keluar->delete();

        $json['pesan']="Kopi berhasil di hapus";
        $json['kode']=200;

        return response()->json($json);
    }

    public function show(Bahan $bahan)
    {
        $json['data']=$bahan->load('masuk','keluar');
        $json['kode']=200;

        return response()->json($json);
    }
    public function show_keluar(Keluar_bahan $keluar)
    {
        $json['data']=$keluar->load('bahan');
        $json['kode']=200;

        return response()->json($json);
    }
    public function show_masuk(Masuk_bahan $masuk)
    {
        $json['data']=$masuk->load('bahan');
        $json['kode']=200;

        return response()->json($json);
    }
    public function destroy(Bahan $bahan)
    {
        $bahan->delete();

        $json['pesan']='Data Bahan sudah dihapus';
        $json['kode']=200;

        return response()->json($json);
    }


}
