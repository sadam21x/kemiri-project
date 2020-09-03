<?php

Route::view('/manajer-marketing', 'manajer-marketing/dashboard');
Route::view('/manajer-marketing/order-barang', 'manajer-marketing/order-barang');
Route::view('/manajer-marketing/order-barang/input', 'manajer-marketing/input-order-barang');

Route::get('/manajer-marketing/customer', function(){
    $provinsi = \Laravolt\Indonesia\Models\Province::pluck('name', 'id');
    $data = \App\Models\DepoAirMinum::select('depo_air_minum.*','k.name AS KOTA','p.name AS PROVINSI')
                ->join('indonesia_cities as k','k.id','=','depo_air_minum.KODE_KOTA')
                ->join('indonesia_provinces as p','p.id','=','k.province_id')->get();

    return view('manajer-marketing/customer', compact('data', 'provinsi'));
});

// handle ajax request data kota sesuai provinsi yang dipilih
Route::post('/manajer-marketing/req-data-kota', function() {
    $id_provinsi = $_POST['id'];
    $kota = \Laravolt\Indonesia\Models\City::where('province_id', $id_provinsi)->pluck('name', 'id');

    return response()->json($kota);
});

Route::view('/manajer-marketing/sales', 'manajer-marketing/sales');
Route::view('/manajer-marketing/detail-sales', 'manajer-marketing/detail-sales');
Route::view('/manajer-marketing/evaluasi-kinerja-sales', 'manajer-marketing/evaluasi-kinerja-sales');
Route::view('/manajer-marketing/evaluasi-kinerja-sales/input', 'manajer-marketing/input-evaluasi-kinerja-sales');