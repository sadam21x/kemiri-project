<?php

/*
    == Note ==
    Semua route ini bisa dialihkan ke controller. 
*/

Route::view('/operator-mesin', 'operator-mesin/dashboard');
Route::view('/operator-mesin/pengambilan-bahan-baku', 'operator-mesin/pengambilan-bahan-baku');
Route::view('/operator-mesin/evaluasi-hasil-produksi', 'operator-mesin/evaluasi-hasil-produksi');