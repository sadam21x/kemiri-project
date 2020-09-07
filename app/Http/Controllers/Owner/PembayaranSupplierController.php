<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PembayaranPenerimaanBahanBaku;

class PembayaranSupplierController extends Controller
{
    public function index()
    {
    	$data = PembayaranPenerimaanBahanBaku::all();
    	return view('owner.pembayaran-supplier')->with(compact("data"));
    }

    public function update(Request $request)
    {
    	$data = PembayaranPenerimaanBahanBaku::find($request->id);
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
