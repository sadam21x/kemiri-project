<?php

/*
    == Note ==
    Semua proses di route ini bisa dialihkan ke controller. 
*/

Route::view('/sales-b', 'sales-b/dashboard');

//route dimas
Route::get('/sales-b/customer', 'SalesB\CustomerController@index');

//route dea
Route::get('/sales-b/order-barang', 'SalesB\OrderBarangController@index');
Route::post('/sales-b/order-barang/input', 'SalesB\OrderBarangController@insert');
Route::post('/sales-b/order-barang/store', 'SalesB\OrderBarangController@store');
Route::get('/sales-b/follow-up-customer', 'SalesB\FollowUpController@index');
Route::post('/sales-b/follow-up/order', 'SalesB\FollowUpController@order');
Route::post('/sales-b/follow-up/tidak-order', 'SalesB\FollowUpController@tidakOrder');