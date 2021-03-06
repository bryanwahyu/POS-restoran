<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
class OrderController extends Controller
{
    public function index()
    {
        $json['data']=Order::with('detail.makanan','meja')->get();
        $json['kode']=200;

        return response()->json($json);
    }

    public function store(Request $req)
    {
        $order=new Order;
        $order->nama=$req->nama;
        $order->meja_id=$req->meja_id;
        $order->save();

        $json['kode']=200;

        return response()->json($json);
    }

    public function update(Order $order,Request $req)
    {

        $order->meja_id=$req->meja_id;
        $order->save();

        $json['kode']=200;

        return response()->json($json);

    }

    public function add_menu(Order $order,Request $req)
    {
        $detail=new Detail_Order;
        $detail->menu_id=$req->menu_id;
        $detail->jumlah=$req->jumlah;
        $detail->order_id=$order->id;
        $detail->save();

        $order->total= $order->total+$detail->menu->harga*$detail->jumlah;
        $order->save();

        $json['kode']=200;

        return response()->json($json);

    }
    
    public function remove_menu(Detail_order $det)
    {
        $det->order->total=$det->order->total-$det->menu->harga*$det->jumlah;
        $det->order->save();

        $det->delete();

        $json['kode']=200;

        return response()->json($json);
    }

}
