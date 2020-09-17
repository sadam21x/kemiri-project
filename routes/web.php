<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/login');

Route::view('/login', 'login');

Route::any('/aktor', function () {
    return view('aktor');
});

Route::get('/nota-penjualan', 'SuratController@nota_penjualan');
Route::get('/surat-jalan/{id}', 'SuratController@surat_jalan');

// (Global) - handle ajax request data kota sesuai provinsi yang dipilih
Route::post('/req-data-kota', function() {
    $id_provinsi = $_POST['id'];
    $kota = \Laravolt\Indonesia\Models\City::where('province_id', $id_provinsi)->pluck('name', 'id');

    return response()->json($kota);
});