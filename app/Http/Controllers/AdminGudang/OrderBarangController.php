<?php

namespace App\Http\Controllers\AdminGudang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Pengiriman;

class OrderBarangController extends Controller
{
    public function index(){
    	$data = Penjualan::select('penjualan.*','p.*','pp.*')->join('pembayaran_penjualan as pp','penjualan.ID_PENJUALAN','=','pp.ID_PENJUALAN')->leftJoin('pengiriman as p','p.KODE_PEMBAYARAN_PENJUALAN','=','pp.KODE_PEMBAYARAN_PENJUALAN')->where('pp.STATUS_PEMBAYARAN','=',1)->get();
    	return view('/admin-gudang/order-barang')->with(compact("data"));
    }

    public function store(Request $request){
    	$request->validate([
    		'ID_ADMIN_GUDANG' => 'required',
			'TGL_KIRIM' => 'required',
			'KODE_PEMBAYARAN_PENJUALAN' => 'required',
            'TIPE_KENDARAAN' => 'required',
            'NOPOL' => 'required'
    	]);
    	Pengiriman::insert([
    		'KODE_PEMBAYARAN_PENJUALAN' => $request->KODE_PEMBAYARAN_PENJUALAN,
    		'ID_ADMIN_GUDANG' => $request->ID_ADMIN_GUDANG,
    		'TGL_KIRIM_RIIL' => date('Y-m-d',strtotime($request->TGL_KIRIM)),
            'TIPE_KENDARAAN' => $request->TIPE_KENDARAAN,
            'NOPOL' => $request->NOPOL,
    	]);
    	return redirect('/admin-gudang/order-barang');
    }
}
