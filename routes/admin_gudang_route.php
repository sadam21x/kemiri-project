<?php

/*
    == Note ==
    Semua route ini bisa dialihkan ke controller. 
*/

Route::view('/admin-gudang', 'admin-gudang/dashboard');
Route::view('/admin-gudang/penerimaan-bahan-baku', 'admin-gudang/penerimaan-bahan-baku');
Route::view('/admin-gudang/pengiriman-barang', 'admin-gudang/pengiriman-barang');
Route::view('/admin-gudang/pengiriman-barang/input', 'admin-gudang/input-pengiriman-barang');
Route::view('/admin-gudang/pengiriman-barang/edit', 'admin-gudang/edit-pengiriman-barang');
Route::view('/admin-gudang/customer', 'admin-gudang/customer');

Route::get('/admin-gudang/supplier', function() {
    $provinsi = \Laravolt\Indonesia\Models\Province::pluck('name', 'id');

    return view('admin-gudang/supplier', compact('provinsi'));
});

// handle ajax request data kota sesuai provinsi yang dipilih
Route::post('/admin-gudang/req-data-kota', function() {
    $id_provinsi = $_POST['id'];
    $kota = \Laravolt\Indonesia\Models\City::where('province_id', $id_provinsi)->pluck('name', 'id');

    return response()->json($kota);
});