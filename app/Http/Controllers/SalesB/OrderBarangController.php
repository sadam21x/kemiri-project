<?php

namespace App\Http\Controllers\SalesB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\DepoAirMinum;
use App\Models\JenisProduct;

class OrderBarangController extends Controller
{
    public function index()
    {
    	$data = Penjualan::select('penjualan.*','p.KODE_PENGIRIMAN')->join('pembayaran_penjualan as pp','penjualan.ID_PENJUALAN','=','pp.ID_PENJUALAN')->leftJoin('pengiriman as p','p.KODE_PEMBAYARAN_PENJUALAN','=','pp.KODE_PEMBAYARAN_PENJUALAN')->get();
    	return view('sales-b.order-barang')->with(compact("data"));
    }

    public function insert()
    {
    	$customer = DepoAirMinum::all();
    	$jenis =  JenisProduct::all();
    	return view('sales-b.input-order-barang');
    }

    public function getProduct(Request $request)
    {

    }
}
