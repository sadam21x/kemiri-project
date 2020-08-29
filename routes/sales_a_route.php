<?php

/*
    == Note ==
    Semua proses di route ini bisa dialihkan ke controller. 
*/

Route::view('/sales-a', 'sales-a/dashboard');

Route::get('/sales-a/customer', function() {
    $provinsi = \Laravolt\Indonesia\Models\Province::pluck('name', 'id');

    return view('sales-a/customer', compact('provinsi'));
});

// handle ajax request data kota sesuai provinsi yang dipilih
Route::post('/sales-a/req-data-kota', function() {
    $id_provinsi = $_POST['id'];
    $kota = \Laravolt\Indonesia\Models\City::where('province_id', $id_provinsi)->pluck('name', 'id');

    return response()->json($kota);
});