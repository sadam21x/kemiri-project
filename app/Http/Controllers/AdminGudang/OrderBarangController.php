<?php

namespace App\Http\Controllers\AdminGudang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Pengiriman;

class OrderBarangController extends Controller
{
    public function index(){
    	$data = Penjualan::select('penjualan.*','p.KODE_PENGIRIMAN')->join('pembayaran_penjualan as pp','penjualan.ID_PENJUALAN','=','pp.ID_PENJUALAN')->leftJoin('pengiriman as p','p.KODE_PEMBAYARAN_PENJUALAN','=','pp.KODE_PEMBAYARAN_PENJUALAN')->get();
    	return view('/admin-gudang/order-barang')->with(compact("data"));
    }

    public function store(Request $request){
    	$request->validate([
    		'ID_ADMIN_GUDANG' => 'required',
			'TGL_KIRIM' => 'required',
			'KODE_PEMBAYARAN_PENJUALAN' => 'required'
    	]);
    	Pengiriman::insert([
    		'KODE_PEMBAYARAN_PENJUALAN' => $request->KODE_PEMBAYARAN_PENJUALAN,
    		'ID_ADMIN_GUDANG' => $request->ID_ADMIN_GUDANG,
    		'TGL_KIRIM_RIIL' => date('Y-m-d',strtotime($request->TGL_KIRIM))
    	]);
    	return redirect('/admin-gudang/order-barang');
    }
}
