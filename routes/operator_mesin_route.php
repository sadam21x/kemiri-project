<?php

// Route dashboard
Route::view('/operator-mesin', 'operator-mesin/dashboard');

// Route baru, bisa dimodif
Route::get('/operator-mesin/edit-profil', function() {
    $provinsi = \Laravolt\Indonesia\Models\Province::pluck('name', 'id');

    return view('operator-mesin/edit-profil', compact('provinsi'));
});
// End Route baru, bisa dimodif

// Route pengambilan bahan baku
Route::get('/operator-mesin/pengambilan-bahan-baku', 'OperatorMesin\PengambilanBahanBakuController@index');
Route::get('/operator-mesin/pengambilan-bahan-baku/getBahanBaku', 'OperatorMesin\PengambilanBahanBakuController@getBahanBaku');
Route::get('/operator-mesin/pengambilan-bahan-baku/getSupplier', 'OperatorMesin\PengambilanBahanBakuController@getSupplier');
Route::post('/operator-mesin/pengambilan-bahan-baku/insert', 'OperatorMesin\PengambilanBahanBakuController@create');

// Route evaluasi hasil produksi
Route::get('/operator-mesin/evaluasi-hasil-produksi', 'OperatorMesin\HasilProduksiController@index');
Route::post('/operator-mesin/evaluasi-hasil-produksi/store', 'OperatorMesin\HasilProduksiController@store');
Route::post('/operator-mesin/evaluasi-hasil-produksi/update', 'OperatorMesin\HasilProduksiController@update');

