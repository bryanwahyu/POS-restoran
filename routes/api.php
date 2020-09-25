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
    

});
