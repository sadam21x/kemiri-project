<?php

/*
    == Note ==
    Semua proses di route ini bisa dialihkan ke controller. 
*/

Route::view('/sales-b', 'sales-b/dashboard');

//route dimas
Route::get('/sales-b/customer', 'SalesB\CustomerController@index');

//route order barang
Route::get('/sales-b/order-barang', 'SalesB\OrderBarangController@index');
Route::post('/sales-b/order-barang/input', 'SalesB\OrderBarangController@insert');
Route::post('/sales-b/order-barang/store', 'SalesB\OrderBarangController@store');
Route::get('/sales-b/order-barang/products/{jenis}', 'SalesB\OrderBarangController@getProducts');
Route::get('/sales-b/order-barang/products/', 'SalesB\OrderBarangController@getAllProduct');

//route follow up
Route::get('/sales-b/follow-up-customer', 'SalesB\FollowUpController@index');
Route::post('/sales-b/follow-up/order', 'SalesB\FollowUpController@order');
Route::post('/sales-b/follow-up/tidak-order', 'SalesB\FollowUpController@tidakOrder');