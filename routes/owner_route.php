<?php

Route::view('/owner', 'owner/dashboard');
Route::view('/owner/sales', 'owner/sales');
Route::view('/owner/sales/detail', 'owner/detail-sales');

//route dimas
Route::view('/owner/pembayaran-supplier', 'owner/pembayaran-supplier');


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
Route::view('/owner/pembayaran-customer', 'owner/pembayaran-customer');