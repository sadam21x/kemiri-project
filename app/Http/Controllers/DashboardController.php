<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepoAirMinum;
use App\Models\Penjualan;
use App\Models\KonfirmasiPenjualan;
use Illuminate\Support\Carbon;
use DB;

class DashboardController extends Controller
{
    public function salesA(){
    	$data = DepoAirMinum::all();
    	return view('sales-a/dashboard')->with(compact("data"));
    }

    public function salesB(){
    	$data_customer = DepoAirMinum::all();
    	$data_order = [];
    	//jumlah penjualan yang selesai diproses
    	$data_order[0] = Penjualan::rightJoin('pembayaran_penjualan as pp',["pp.ID_PENJUALAN" => "penjualan.ID_PENJUALAN"])->rightJoin('pengiriman as pi',["pi.KODE_PEMBAYARAN_PENJUALAN" => "pp.KODE_PEMBAYARAN_PENJUALAN"])->where(["pp.STATUS_PEMBAYARAN" => 1])->count('pp.ID_PENJUALAN');

    	//jumlah penjualan yang diproses
    	$data_order[1] = Penjualan::rightJoin('pembayaran_penjualan as pp',["pp.ID_PENJUALAN" => "penjualan.ID_PENJUALAN"])->where(["pp.STATUS_PEMBAYARAN" => 1])->count('pp.ID_PENJUALAN');

    	//Jumlah order
    	$data_order[2] = Penjualan::count('ID_PENJUALAN');

    	//tanggal pertama bulan ini
    	$date = Carbon::now()->startOfMonth();

	    //tanggal terakhir bulan ini
	    $date_end = Carbon::now()->endOfMonth();

    	//total penjualan bulan ini
    	$data_order[3] = Penjualan::whereBetween(DB::raw('DATE(TGL_PENJUALAN)'),[$date,$date_end])->sum('TOTAL_PENJUALAN');

    	//tanggal pertama minggu ini
    	$date = Carbon::now()->startOfWeek();

	    //tanggal terakhir minggu ini
	    $date_end = Carbon::now()->endOfWeek();

    	//total penjualan minggu ini
    	$data_order[4] = Penjualan::whereBetween(DB::raw('DATE(TGL_PENJUALAN)'),[$date,$date_end])->sum('TOTAL_PENJUALAN');

    	
    	$data_konfirmasi = [];

    	//Jumlah depo yang jadi order hasil follow up
    	$data_konfirmasi[0] = KonfirmasiPenjualan::where('STATUS_KONFIRMASI_PENJUALAN','=','1')->whereNull('CATATAN')->count('KODE_DEPO');

    	//Jumlah depo yang tidak jadi order hasil follow up
    	$data_konfirmasi[1] = KonfirmasiPenjualan::where('STATUS_KONFIRMASI_PENJUALAN','=','1')->whereNotNull('CATATAN')->count('KODE_DEPO');

    	//Jumlah depo yang belum di follow up status ordernya
    	$data_konfirmasi[2] = KonfirmasiPenjualan::where('STATUS_KONFIRMASI_PENJUALAN','=','0')->count('KODE_DEPO');

    	//Daftar Depo Telah Di Follow Up
    	$data_konfirmasi[3] = KonfirmasiPenjualan::select('d.NAMA_DEPO','d.KODE_DEPO','d.ALAMAT_DEPO','c.name')->join('depo_air_minum as d','d.KODE_DEPO','=','konfirmasi_penjualan.KODE_DEPO')->join('indonesia_cities as c','c.id','=','d.KODE_KOTA')->where('STATUS_KONFIRMASI_PENJUALAN','=','1')->whereNull('CATATAN')->get();

    	//Daftar Depo Belum Di Follow Up
    	$data_konfirmasi[4] = KonfirmasiPenjualan::join('depo_air_minum as d','d.KODE_DEPO','=','konfirmasi_penjualan.KODE_DEPO')->join('indonesia_cities as c','c.id','=','d.KODE_KOTA')->where('STATUS_KONFIRMASI_PENJUALAN','=','1')->whereNotNull('CATATAN')->get();
    	
    	return view('sales-b/dashboard')->with(compact("data_customer","data_konfirmasi","data_order"));
    }
}
