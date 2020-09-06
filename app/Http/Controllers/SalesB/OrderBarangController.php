<?php

namespace App\Http\Controllers\SalesB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\DetilPenjualan;
use App\Models\DepoAirMinum;
use App\Models\JenisProduct;
use App\Models\Product;
use DB;

class OrderBarangController extends Controller
{
    public function index()
    {
    	$data = Penjualan::select('penjualan.*','p.KODE_PENGIRIMAN','pp.KODE_PEMBAYARAN_PENJUALAN')->leftjoin('pembayaran_penjualan as pp','penjualan.ID_PENJUALAN','=','pp.ID_PENJUALAN')->leftJoin('pengiriman as p','p.KODE_PEMBAYARAN_PENJUALAN','=','pp.KODE_PEMBAYARAN_PENJUALAN')->get();
    	return view('sales-b.order-barang')->with(compact("data"));
    }

    public function insert(Request $request)
    {
    	$customer = DepoAirMinum::find($request->KODE_DEPO);
    	$jenis =  JenisProduct::all();
        $products = Product::all();
        $ID_KONFIRMASI_PENJUALAN = $request->ID_KONFIRMASI_PENJUALAN;
        
    	return view('sales-b.input-order-barang')->with(compact("customer","jenis","products","ID_KONFIRMASI_PENJUALAN"));
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

    public function store(Request $request)
    {
        $request->validate([
            'KODE_DEPO' => 'required',
            'ID_SALES_B' => 'required',
            'METODE_KIRIM' => 'required',
            'ONGKOS_KIRIM' => 'required',
            'TOTAL_PENJUALAN' => 'required'
        ]);

        DB::transaction(function() use ($request){
            $penjualan = Penjualan::insertGetId([
                'KODE_DEPO' => $request->KODE_DEPO,
                'ID_SALES_B' => $request->ID_SALES_B,
                'TGL_PENJUALAN' => date("Y-m-d"),
                'TGL_KIRIM' => date("Y-m-d"),
                'METODE_KIRIM' => $request->METODE_KIRIM,
                'ONGKOS_KIRIM' => $request->ONGKOS_KIRIM,
                'TOTAL_PENJUALAN' => $request->TOTAL_PENJUALAN,
                'STATUS_PENJUALAN' => 0
            ]);

            $id = Penjualan::select("ID_PENJUALAN")->where([
                'KODE_DEPO' => $request->KODE_DEPO,
                'ID_SALES_B' => $request->ID_SALES_B,
                'TGL_PENJUALAN' => date("Y-m-d"),
                'TGL_KIRIM' => date("Y-m-d"),
                'METODE_KIRIM' => $request->METODE_KIRIM,
                'ONGKOS_KIRIM' => $request->ONGKOS_KIRIM,
                'TOTAL_PENJUALAN' => $request->TOTAL_PENJUALAN,
                'STATUS_PENJUALAN' => 0
            ])->first();

            $i = 0;

            foreach ($request->KODE_PRODUCT as $key) {
                $detil = DetilPenjualan::insert([
                    'ID_PENJUALAN' => $id->ID_PENJUALAN,
                    'KODE_PRODUCT' => $key,
                    'JUMLAH_SAK' => $request->JUMLAH_SAK[$i],
                    'JUMLAH_PCS' => $request->JUMLAH_PCS[$i],
                    'HARGA_BARANG' => $request->HARGA_BARANG[$i]
                ]);
                $i++;
            }
        });

        return redirect('/sales-b/order-barang');
    }
}
