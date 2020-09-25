<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','AuthFrontController@login');
Route::group(['prefix' => 'admin'], function () {
 Route::get('/index','AdminFrontController@index');
 Route::get('/gudang/kopi','AdminFrontController@gudang_kopi');
 Route::get('/gudang/kopi/{id}','AdminFrontController@detail_kopi');
 
});
Route::group(['prefix' => 'kasir'], function () {
 Route::get('/index','KasirFrontController@index');
});
