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

Route::view('/manajer-marketing/sales', 'manajer-marketing/sales');
Route::view('/manajer-marketing/detail-sales', 'manajer-marketing/detail-sales');
Route::view('/manajer-marketing/evaluasi-kinerja-sales/input', 'manajer-marketing/input-evaluasi-kinerja-sales');