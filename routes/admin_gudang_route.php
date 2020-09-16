<?php

// Route dashboard
Route::view('/admin-gudang', 'admin-gudang/dashboard');

// Route baru, bisa dimodif
Route::get('/admin-gudang/edit-profil', function() {
    $provinsi = \Laravolt\Indonesia\Models\Province::pluck('name', 'id');

    return view('admin-gudang/edit-profil', compact('provinsi'));
});
// End Route baru, bisa dimodif

// Route penerimaan
Route::get('/admin-gudang/penerimaan-bahan-baku', 'AdminGudang\PenerimaanBahanBakuController@index');
Route::post('/admin-gudang/penerimaan-bahan-baku/edit', 'AdminGudang\PenerimaanBahanBakuController@update');
Route::post('/admin-gudang/penerimaan-bahan-baku/insert', 'AdminGudang\PenerimaanBahanBakuController@create');

// Route supplier
Route::get('/admin-gudang/supplier', 'AdminGudang\SupplierController@index');
Route::post('/admin-gudang/supplier/edit', 'AdminGudang\SupplierController@update');
Route::post('/admin-gudang/supplier/insert', 'AdminGudang\SupplierController@create');

// Route pengiriman
Route::get('/admin-gudang/pengiriman-barang','AdminGudang\PengirimanBarangController@index');
Route::get('/admin-gudang/pengiriman-barang/edit', 'AdminGudang\PengirimanBarangController@edit');
Route::post('/admin-gudang/pengiriman-barang/store', 'AdminGudang\OrderBarangController@store');

// Route customer
Route::get('/admin-gudang/customer', 'AdminGudang\CustomerController@index');

// Route order barang
Route::get('/admin-gudang/order-barang', 'AdminGudang\OrderBarangController@index');

// handle ajax request data kota sesuai provinsi yang dipilih
Route::post('/admin-gudang/req-data-kota', function() {
    $id_provinsi = $_POST['id'];
    $kota = \Laravolt\Indonesia\Models\City::where('province_id', $id_provinsi)->pluck('name', 'id');

    return response()->json($kota);
});