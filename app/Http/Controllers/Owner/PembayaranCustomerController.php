<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PembayaranPenjualan;

class PembayaranCustomerController extends Controller
{
    public function index()
    {
    	$data = PembayaranPenjualan::all();
    	return view('owner.pembayaran-customer')->with(compact("data"));
    }

    public function update(Request $request)
    {
    	$data = PembayaranPenjualan::find($request->id);
    	if($data->STATUS_PEMBAYARAN){
    		$data->STATUS_PEMBAYARAN = 0;
    	}
    	else{
    		$data->STATUS_PEMBAYARAN = 1;
    	}
    	$data->save();

    	return response()->json(["success" => true, "data" => $data]);
    }
}
