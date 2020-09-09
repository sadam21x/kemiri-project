<?php

Route::view('/owner', 'owner/dashboard');

Route::view('/owner/admin-gudang', 'owner/admin-gudang');
Route::view('/owner/manajer-marketing', 'owner/manajer-marketing');
Route::view('/owner/operator-mesin', 'owner/operator-mesin');
Route::view('/owner/detail-pegawai', 'owner/detail-pegawai');

Route::get('/owner/tambah-pegawai', function() {
    $provinsi = \Laravolt\Indonesia\Models\Province::pluck('name', 'id');
    return view('owner/tambah-pegawai', compact('provinsi'));
});

// route dea
Route::get('/owner/sales', 'Owner\PegawaiController@indexSales');
Route::get('/owner/sales-a/detail/{id}', 'Owner\PegawaiController@viewSalesA');
Route::get('/owner/sales-b/detail/{id}', 'Owner\PegawaiController@viewSalesB');
Route::post('/owner/pegawai/store', 'Owner\PegawaiController@store');

//route dimas
Route::get('/owner/pembayaran-supplier', 'Owner\PembayaranSupplierController@index');
Route::post('/owner/pembayaran-supplier/update', 'Owner\PembayaranSupplierController@update');

// handle ajax request data kota sesuai provinsi yang dipilih
Route::post('/owner/req-data-kota', function() {
    $id_provinsi = $_POST['id'];
    $kota = \Laravolt\Indonesia\Models\City::where('province_id', $id_provinsi)->pluck('name', 'id');

    return response()->json($kota);
});

//route dea
Route::get('/owner/pembayaran-customer', 'Owner\PembayaranCustomerController@index');
Route::post('/owner/pembayaran-customer/update', 'Owner\PembayaranCustomerController@update');