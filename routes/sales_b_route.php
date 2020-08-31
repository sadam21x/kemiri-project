<?php

/*
    == Note ==
    Semua proses di route ini bisa dialihkan ke controller. 
*/

Route::view('/sales-b', 'sales-b/dashboard');
//route dimas
Route::get('/sales-b/customer', 'SalesB\CustomerController@index');

//route dea
Route::view('/sales-b/order-barang', 'sales-b/order-barang');
Route::view('/sales-b/order-barang/input', 'sales-b/input-order-barang');
Route::view('/sales-b/order-barang/edit', 'sales-b/edit-order-barang');