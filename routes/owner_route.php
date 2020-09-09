<?php

Route::view('/owner', 'owner/dashboard');

Route::view('/owner/detail-pegawai', 'owner/detail-pegawai');

Route::get('/owner/tambah-pegawai', function() {
    $provinsi = \Laravolt\Indonesia\Models\Province::pluck('name', 'id');
    return view('owner/tambah-pegawai', compact('provinsi'));
});

// route pegawai
Route::get('/owner/sales', 'Owner\PegawaiController@indexSales');
Route::get('/owner/sales-a/detail/{id}', 'Owner\PegawaiController@viewSalesA');
Route::get('/owner/sales-b/detail/{id}', 'Owner\PegawaiController@viewSalesB');
Route::get('/owner/admin-gudang', 'Owner\PegawaiController@indexAdminGudang');
Route::get('/owner/manajer-marketing', 'Owner\PegawaiController@indexManajerMarketing');
Route::get('/owner/operator-mesin', 'Owner\PegawaiController@indexOperatorMesin');
Route::post('/owner/pegawai/store', 'Owner\PegawaiController@store');

//route pembayaran
Route::get('/owner/pembayaran-supplier', 'Owner\PembayaranSupplierController@index');
Route::post('/owner/pembayaran-supplier/update', 'Owner\PembayaranSupplierController@update');

Route::get('/owner/pembayaran-customer', 'Owner\PembayaranCustomerController@index');
Route::post('/owner/pembayaran-customer/update', 'Owner\PembayaranCustomerController@update');

// handle ajax request data kota sesuai provinsi yang dipilih
Route::post('/owner/req-data-kota', function() {
    $id_provinsi = $_POST['id'];
    $kota = \Laravolt\Indonesia\Models\City::where('province_id', $id_provinsi)->pluck('name', 'id');

    return response()->json($kota);
});