<?php

namespace App\Http\Controllers\SalesB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KonfirmasiPenjualan;

class FollowUpController extends Controller
{
    public function index()
    {
    	$data = KonfirmasiPenjualan::all();
    	return view('sales-b/follow-up-customer')->with(compact("data"));
    }

    public function order(Request $request)
    {
    	$request->validate([
    		'ID_KONFIRMASI_PENJUALAN' => 'required'
    	]);

    	$konfirmasi = KonfirmasiPenjualan::find($request->ID_KONFIRMASI_PENJUALAN);
    	$konfirmasi->STATUS_KONFIRMASI_PENJUALAN = 1;
    	$konfirmasi->save();

    	return response()->json(["success" => true]);
    }

    public function tidakOrder(Request $request)
    {
    	$request->validate([
    		'alasan' => 'required',
    		'ID_KONFIRMASI_PENJUALAN' => 'required'
    	]);

    	$konfirmasi = KonfirmasiPenjualan::find($request->ID_KONFIRMASI_PENJUALAN);
    	$konfirmasi->STATUS_KONFIRMASI_PENJUALAN = 0;
    	$konfirmasi->CATATAN = $request->alasan;
    	$konfirmasi->save();

    	return response()->json(["success" => true]);
    }
}
