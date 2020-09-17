<?php

// Route dashboard
Route::view('/sales-a', 'sales-a/dashboard');

// Route baru, bisa dimodif
Route::get('/sales-a/edit-profil', function() {
    $provinsi = \Laravolt\Indonesia\Models\Province::pluck('name', 'id');

    return view('sales-a/edit-profil', compact('provinsi'));
});
// End Route baru, bisa dimodif

// Route customer
Route::get('/sales-a/customer', 'SalesA\CustomerController@index');
Route::post('/sales-a/customer/insert', 'SalesA\CustomerController@create');
Route::post('/sales-a/customer/edit', 'SalesA\CustomerController@update');

// handle ajax request data kota sesuai provinsi yang dipilih
Route::post('/sales-a/req-data-kota', function() {
    $id_provinsi = $_POST['id'];
    $kota = \Laravolt\Indonesia\Models\City::where('province_id', $id_provinsi)->pluck('name', 'id');

    return response()->json($kota);
});