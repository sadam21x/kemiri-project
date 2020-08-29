<?php

/*
    == Note ==
    Semua proses di route ini bisa dialihkan ke controller. 
*/

Route::view('/admin-gudang', 'admin-gudang/dashboard');


// Route Dea
Route::get('/admin-gudang/pengiriman-barang','AdminGudang\PengirimanBarangController@index');
Route::get('/admin-gudang/pengiriman-barang/input', 'AdminGudang\PengirimanBarangController@insert');
Route::post('/admin-gudang/pengiriman-barang/store', 'AdminGudang\PengirimanBarangController@store');
Route::get('/admin-gudang/pengiriman-barang/edit', 'AdminGudang\PengirimanBarangController@edit');
Route::post('/admin-gudang/pengiriman-barang/update', 'AdminGudang\PengirimanBarangController@update');
Route::get('/admin-gudang/customer', 'AdminGudang\CustomerController@index');
//End of Route dea

//Route Dimas
Route::view('/admin-gudang/order-barang', 'admin-gudang/order-barang');

Route::get('/admin-gudang/penerimaan-bahan-baku', 'AdminGudang\PenerimaanBahanBakuController@index');
Route::post('/admin-gudang/penerimaan-bahan-baku/edit', 'AdminGudang\PenerimaanBahanBakuController@update');
Route::post('/admin-gudang/penerimaan-bahan-baku/insert', 'AdminGudang\PenerimaanBahanBakuController@create');

Route::get('/admin-gudang/supplier', 'AdminGudang\SupplierController@index');
Route::post('/admin-gudang/supplier/edit', 'AdminGudang\SupplierController@update');
Route::post('/admin-gudang/supplier/insert', 'AdminGudang\SupplierController@create');

// Route::get('/admin-gudang/supplier', function() {
//     $provinsi = \Laravolt\Indonesia\Models\Province::pluck('name', 'id');

//     return view('admin-gudang/supplier', compact('provinsi'));
// });

// handle ajax request data kota sesuai provinsi yang dipilih
Route::post('/admin-gudang/req-data-kota', function() {
    $id_provinsi = $_POST['id'];
    $kota = \Laravolt\Indonesia\Models\City::where('province_id', $id_provinsi)->pluck('name', 'id');

    return response()->json($kota);
});

// End of Route Dimas