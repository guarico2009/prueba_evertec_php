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

Route::get('/', function () {
    return view('client.shop');
});

Route::get('/orden', function () {
    return view('client.order');
});

Route::post('/orden','OrderController@comprar');
Route::post('/orden/pago','OrderController@pago');

Route::get('/admin/ordenes', function () {
    return view('admin.orders');
});
