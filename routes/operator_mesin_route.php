<?php

/*
    == Note ==
    Semua route ini bisa dialihkan ke controller. 
*/

Route::view('/operator-mesin', 'operator-mesin/dashboard');

//route dimas
Route::view('/operator-mesin/pengambilan-bahan-baku', 'operator-mesin/pengambilan-bahan-baku');




//route dea
Route::get('/operator-mesin/evaluasi-hasil-produksi', 'OperatorMesin\HasilProduksiController@index');
Route::post('/operator-mesin/evaluasi-hasil-produksi/store', 'OperatorMesin\HasilProduksiController@store');
Route::post('/operator-mesin/evaluasi-hasil-produksi/update', 'OperatorMesin\HasilProduksiController@update');

