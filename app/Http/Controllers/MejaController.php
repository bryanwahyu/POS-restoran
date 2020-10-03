<?php

namespace App\Http\Controllers;

use App\Meja;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $json['data']=Meja::with('order')->get();
        $json['kode']=200;

        return response()->json($json);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
         $this->validate($req,[
             'nama'=>['required'],
             'kapasistas'=>['required']
         ]);

         $meja=new Meja;
         $meja->nama=$req->nama;
         $meja->kapasistas=$req->kapasistas;
         $meja->save();

         $json['pesan']="meja berhasil ditambahkan";
         $json['kode']=200;

         return response()->json($json);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function show(Meja $meja)
    {
        $json['data']=$meja->load('order');
        $json['kode']=200;

        return response()->json($json);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function edit(Meja $meja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Meja $meja)
    {
        $meja->nama=$req->nama;
        $meja->kapasistas=$req->kapasistas;
        $meja->save();

        $json['kode']=200;
        $json['pesan']='kapasistas meja berhasil di update';

        return response()->json($json);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meja $meja)
    {
        $meja->delete();

         $json['pesan']="Meja sudah dihapus";
         $json['kode']=200;

         return response()->json($json);

    }
}
