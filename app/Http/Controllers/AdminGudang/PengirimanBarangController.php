<?php

namespace App\Http\Controllers\AdminGudang;
use App\Http\Controllers\Controller;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use App\Models\PembayaranPenjualan;
use App\Models\AdminGudang;
use App\Models\JenisProduct;
use App\Models\Product;

class PengirimanBarangController extends Controller
{

    public function index()
    {
        $data = Pengiriman::all();
        return view('/admin-gudang/pengiriman-barang')->with(compact("data"));
    }

    public function insert(){
    	$cust = PembayaranPenjualan::leftjoin('pengiriman as p','pembayaran_penjualan.KODE_PEMBAYARAN_PENJUALAN','=','p.KODE_PEMBAYARAN_PENJUALAN')
    	->where('STATUS_PEMBAYARAN','=',1)
    	->whereNull('p.KODE_PENGIRIMAN')
    	->get();
    	$admin = AdminGudang::find(1);
    	$kategori = JenisProduct::all();
    	$produk = Product::all();

    	return view('/admin-gudang/input-pengiriman-barang')->with(compact("cust","admin","kategori","produk"));
    }

}
