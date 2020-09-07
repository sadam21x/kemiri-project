<?php

Route::view('/owner', 'owner/dashboard');

Route::get('/owner/sales', 'Owner\SalesController@index');
Route::get('/owner/sales-a/detail/{id}', 'Owner\SalesController@viewA');
Route::get('/owner/sales-b/detail/{id}', 'Owner\SalesController@viewB');

//route dimas
Route::get('/owner/pembayaran-supplier', 'Owner\PembayaranSupplierController@index');
Route::post('/owner/pembayaran-supplier/update', 'Owner\PembayaranSupplierController@update');

// Route::view('/owner/sales/tambah', 'owner/tambah-sales');
Route::get('/owner/sales/tambah', function() {
    $provinsi = \Laravolt\Indonesia\Models\Province::pluck('name', 'id');

    return view('owner/tambah-sales', compact('provinsi'));
});

// handle ajax request data kota sesuai provinsi yang dipilih
Route::post('/owner/req-data-kota', function() {
    $id_provinsi = $_POST['id'];
    $kota = \Laravolt\Indonesia\Models\City::where('province_id', $id_provinsi)->pluck('name', 'id');

    return response()->json($kota);
});

//route dea
Route::get('/owner/pembayaran-customer', 'Owner\PembayaranCustomerController@index');
Route::post('/owner/pembayaran-customer/update', 'Owner\PembayaranCustomerController@update');