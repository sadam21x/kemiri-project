<?php

/*
    == Note ==
    Semua route ini bisa dialihkan ke controller. 
*/
// Route dashboard
Route::view('/operator-mesin', 'operator-mesin/dashboard');

// Route pengambilan bahan baku
Route::get('/operator-mesin/pengambilan-bahan-baku', 'OperatorMesin\PengambilanBahanBakuController@index');
Route::get('/operator-mesin/pengambilan-bahan-baku/getBahanBaku', 'OperatorMesin\PengambilanBahanBakuController@getBahanBaku');
Route::get('/operator-mesin/pengambilan-bahan-baku/getSupplier', 'OperatorMesin\PengambilanBahanBakuController@getSupplier');
Route::post('/operator-mesin/pengambilan-bahan-baku/insert', 'OperatorMesin\PengambilanBahanBakuController@create');

// Route evaluasi hasil produksi
Route::get('/operator-mesin/evaluasi-hasil-produksi', 'OperatorMesin\HasilProduksiController@index');
Route::post('/operator-mesin/evaluasi-hasil-produksi/store', 'OperatorMesin\HasilProduksiController@store');
Route::post('/operator-mesin/evaluasi-hasil-produksi/update', 'OperatorMesin\HasilProduksiController@update');

