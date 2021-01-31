<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('v1/login','AuthController@login');

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('v1/auth','AuthController@get_data');
    //Kopi
    Route::get('v1/kopi','KopiController@index');
    Route::post('v1/kopi','KopiController@store');
    Route::get('v1/kopi/cek/{kode}','KopiController@cek_kode');
    Route::post('v1/kopi/masuk/{kopi}','KopiController@masuk_kopi');
    Route::post('v1/kopi/keluar/{kopi}','KopiController@keluar_kopi');
    Route::delete('v1/kopi/{kopi}','KopiController@destroy');
    Route::get('v1/kopi/{kopi}','KopiController@show');
    Route::put('v1/kopi/{kopi}','KopiController@update');
    Route::get('v1/kopi/masuk/{masuk}','KopiController@show_masuk');
    Route::get('v1/kopi/keluar/{kopi}','KopiController@show_keluar');
    Route::delete('v1/kopi/masuk/{kopi}','KopiController@destroy_in');
    Route::delete('v1/kopi/keluar/{kopi}','KopiController@destroy_out');
    //bahan
     Route::get('v1/bahan','BahanController@index');
     Route::post('v1/bahan','BahanController@store');
     Route::get('v1/bahan/cek/{kode}','BahanController@cek_kode');
     Route::get('v1/bahan/{bahan}','BahanController@show');

     Route::put('v1/bahan/{bahan}','BahanController@update');
     Route::delete('v1/bahan/{bahan}','BahanController@destroy');
     Route::post('v1/bahan/keluar/{bahan}','BahanController@keluar_bahan');
     Route::delete('v1/bahan/keluar/{keluar}','BahanController@destroy_out');
     Route::get('v1/bahan/keluar/{keluar}','BahanController@show_keluar');
     Route::post('v1/bahan/masuk/{bahan}','BahanController@bahan_masuk');
     Route::delete('v1/bahan/masuk/{masuk}','BahanController@hapus_data_Masuk');
     Route::get('v1/bahan/masuk/{masuk}','BahanController@show_masuk');
     //User
    Route::get('v1/user','UserController@index');
    Route::get('v1/user/{user}','UserController@show');
    Route::post('v1/user','UserController@store');
    Route::put('v1/user/{user}','UserController@update');
    Route::get('v1/user/reset/{user}','UserController@reset_password');
    Route::delete('v1/user/{user}','UserController@delete');
    Route::get('v1/user/cek/{username}','UserController@cek_username');
    //meja
    Route::get('v1/meja','MejaController@index');
    Route::post('v1/meja','MejaController@store');
    Route::get('v1/meja/{meja}','MejaController@show');
    Route::delete('v1/meja/{meja}','MejaController@destroy');
    Route::put('v1/meja/{meja}','MejaController@update');

    //menu
    Route::get('v1/menu','MenuController@index');
    Route::get('v1/menu/sedia','MenuController@menu_sedia');
    Route::post('v1/menu','MenuController@store');
    Route::put('v1/menu/{menu}','MenuController@update');
    Route::delete('v1/menu/{menu}','MenuController@destroy');
    Route::get('v1/menu/{menu}','MenuController@show');

    //
});
