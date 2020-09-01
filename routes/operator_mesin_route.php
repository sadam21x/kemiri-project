<?php

/*
    == Note ==
    Semua route ini bisa dialihkan ke controller. 
*/

Route::view('/operator-mesin', 'operator-mesin/dashboard');
Route::view('/operator-mesin/pengambilan-bahan-baku', 'operator-mesin/pengambilan-bahan-baku');

//route dimas
// Route::get('/operator-mesin/pengambilan-bahan-baku', 'OperatorMesin\PengambilanBahanBakuController@index');




//route dea
Route::get('/operator-mesin/evaluasi-hasil-produksi', 'OperatorMesin\HasilProduksiController@index');
Route::post('/operator-mesin/evaluasi-hasil-produksi/store', 'OperatorMesin\HasilProduksiController@store');
Route::post('/operator-mesin/evaluasi-hasil-produksi/update', 'OperatorMesin\HasilProduksiController@update');

