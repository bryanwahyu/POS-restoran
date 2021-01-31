<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\menu;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $json['data']=Menu::all();
        $json['kode']=200;

        return response()->json($json);
    }
    public function menu_sedia()
    {
        $json['data']=menu::where('status',1)->get();
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
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {

        $menu=new Menu;
        $menu->harga=$req->harga;
        $menu->foto=$req->foto;
        $menu->nama=$req->nama;
        $menu->status='1';
        $menu->jenis=$req->jenis;
        $menu->save();

        $json['pesan']="Menu berhasil ditambahkan";
        $json['kode']=200;

        return response()->json($json);

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        $json['data']=$menu;
        $json['kode']=200;

        return response()->json($json);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req,Menu $menu)
    {
        $menu->harga=$req->harga;
        if($req->foto!=null){
            $menu->foto=$req->foto;
        }
        $menu->nama=$req->nama;
        $menu->status=$req->status;
        $menu->save();

        $json['pesan']="Data Menu  sudah diubah";
        $json['kode']=200;

        return response()->json($json);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        $json['pesan']="Menu dihapus";
        $json['kode']=200;

        return response()->json($json);
    }


}
