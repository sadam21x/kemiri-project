<?php

Route::view('/manajer-marketing', 'manajer-marketing/dashboard');
Route::view('/manajer-marketing/order-barang', 'manajer-marketing/order-barang');
Route::view('/manajer-marketing/order-barang/input', 'manajer-marketing/input-order-barang');

Route::get('/manajer-marketing/customer', 'ManajerMarketing\CustomerController@index');
Route::post('/manajer-marketing/customer/insert', 'ManajerMarketing\CustomerController@create');
Route::post('/manajer-marketing/customer/edit', 'ManajerMarketing\CustomerController@update');

Route::get('/manajer-marketing/evaluasi-kinerja-sales', 'ManajerMarketing\EvaluasiKinerjaSalesController@index');

// handle ajax request data kota sesuai provinsi yang dipilih
Route::post('/manajer-marketing/req-data-kota', function() {
    $id_provinsi = $_POST['id'];
    $kota = \Laravolt\Indonesia\Models\City::where('province_id', $id_provinsi)->pluck('name', 'id');

    return response()->json($kota);
});

//route dea
Route::get('/manajer-marketing/sales', 'ManajerMarketing\SalesController@index');

Route::get('/manajer-marketing/detail-sales-a/{id}', 'ManajerMarketing\SalesController@viewA');
Route::get('/manajer-marketing/detail-sales-b/{id}', 'ManajerMarketing\SalesController@viewB');

Route::get('/manajer-marketing/evaluasi-kinerja-sales-a/{id}/input', 'ManajerMarketing\SalesController@insertA');
Route::get('/manajer-marketing/evaluasi-kinerja-sales-b/{id}/input', 'ManajerMarketing\SalesController@insertB');

Route::post('/manajer-marketing/evaluasi-kinerja-sales-a/store', 'ManajerMarketing\SalesController@storeA');
Route::post('/manajer-marketing/evaluasi-kinerja-sales-b/store', 'ManajerMarketing\SalesController@storeB');