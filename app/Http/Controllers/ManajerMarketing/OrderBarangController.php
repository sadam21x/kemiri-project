<?php

namespace App\Http\Controllers\ManajerMarketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\DepoAirMinum;
use App\Models\JenisProduct;
use App\Models\Product;

class OrderBarangController extends Controller
{
    public function index()
    {
    	$data = Penjualan::select('penjualan.*','p.KODE_PENGIRIMAN')->join('pembayaran_penjualan as pp','penjualan.ID_PENJUALAN','=','pp.ID_PENJUALAN')->leftJoin('pengiriman as p','p.KODE_PEMBAYARAN_PENJUALAN','=','pp.KODE_PEMBAYARAN_PENJUALAN')->get();
    	return view('manajer-marketing.order-barang')->with(compact("data"));
    }

    public function insert(Request $request)
    {
    	$customer = DepoAirMinum::all();
    	$jenis =  JenisProduct::all();
        $products = Product::all();
        
    	return view('manajer-marketing.input-order-barang')->with(compact("customer","jenis","products"));
    }

    public function getProducts($jenis)
    {
        $product = JenisProduct::find($jenis)->products()->get();
        return response()->json(["success" => true, "data" => $product]);
    }

    public function getAllProduct()
    {
        $product = Product::all();
        return response()->json(["success" => true, "data" => $product]);
    }
}
