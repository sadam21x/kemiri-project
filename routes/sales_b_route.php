<?php

/*
    == Note ==
    Semua proses di route ini bisa dialihkan ke controller. 
*/

Route::view('/sales-b', 'sales-b/dashboard');
Route::view('/sales-b/follow-up-customer', 'sales-b/follow-up-customer');
//route dimas
Route::get('/sales-b/customer', 'SalesB\CustomerController@index');

//route dea
Route::get('/sales-b/order-barang', 'SalesB\OrderBarangController@index');
Route::get('/sales-b/order-barang/input', 'SalesB\OrderBarangController@insert');
Route::post('/sales-b/order-barang/input', 'SalesB\OrderBarangController@store');