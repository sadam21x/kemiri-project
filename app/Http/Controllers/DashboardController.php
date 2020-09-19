<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepoAirMinum;
use App\Models\Penjualan;
use App\Models\KonfirmasiPenjualan;
use App\Models\BahanBaku;
use App\Models\ProsesProduksi;
use App\Models\PembayaranPenjualan;
use App\Models\PenerimaanBahanBaku;
use App\Models\Supplier;
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
	
	public function OperatorMesin(){
        $StockPlastikBekas = BahanBaku::select('STOK_BAHAN_BAKU')
                            ->where('NAMA_BAHAN_BAKU', '=', 'Plastik Bekas')
                            ->first();
        $StockPlastikVirgin = BahanBaku::select('STOK_BAHAN_BAKU')
                            ->where('NAMA_BAHAN_BAKU', '=', 'Plastik Virgin')
                            ->first();
        $StockPewarna = BahanBaku::select('STOK_BAHAN_BAKU')
                            ->where('NAMA_BAHAN_BAKU', '=', 'Pewarna')
                            ->first();
        $BelumSelesai = ProsesProduksi::select('*')
                        ->where(DB::Raw('IFNULL( EVALUASI_PRODUCT, null )', 'IFNULL( EVALUASI_MESIN, null )', 'IFNULL( EVALUASI_BAHAN_BAKU, null )'))
                        ->count();
        $Check = ProsesProduksi::select('*')->count();
        $Selesai = $Check - $BelumSelesai;

        $data = ProsesProduksi::select('*')
                        ->where(DB::Raw('IFNULL( EVALUASI_PRODUCT, null )', 'IFNULL( EVALUASI_MESIN, null )', 'IFNULL( EVALUASI_BAHAN_BAKU, null )'))
                        ->get();

        return view('operator-mesin.dashboard')->with(compact('data', 'StockPlastikBekas', 'StockPlastikVirgin', 'StockPewarna', 'Selesai', 'BelumSelesai'));
	}
	
	public function AdminGudang(){
        $StockPlastikBekas = BahanBaku::select('STOK_BAHAN_BAKU')
                            ->where('NAMA_BAHAN_BAKU', '=', 'Plastik Bekas')
                            ->first();
        $StockPlastikVirgin = BahanBaku::select('STOK_BAHAN_BAKU')
                            ->where('NAMA_BAHAN_BAKU', '=', 'Plastik Virgin')
                            ->first();
        $StockPewarna = BahanBaku::select('STOK_BAHAN_BAKU')
                            ->where('NAMA_BAHAN_BAKU', '=', 'Pewarna')
                            ->first();

    	$date_month = Carbon::now()->startOfMonth();

	    $date_month_end = Carbon::now()->endOfMonth();

    	$date_week = Carbon::now()->startOfWeek();

		$date_week_end = Carbon::now()->endOfWeek();

		$data_penjualan = [];
		
        $data_penjualan[1] = PembayaranPenjualan::select('p.TOTAL_PENJUALAN')
                            ->join('penjualan as p', 'p.ID_PENJUALAN', '=', 'pembayaran_penjualan.ID_PENJUALAN')
                            ->where('pembayaran_penjualan.STATUS_PEMBAYARAN', '=', 1)
                            ->whereBetween(DB::raw('DATE(pembayaran_penjualan.TGL_PEMBAYARAN)'), [$date_month, $date_month_end])
							->sum('p.TOTAL_PENJUALAN');
        $data_penjualan[2] = PembayaranPenjualan::select('p.TOTAL_PENJUALAN')
                            ->join('penjualan as p', 'p.ID_PENJUALAN', '=', 'pembayaran_penjualan.ID_PENJUALAN')
                            ->where('pembayaran_penjualan.STATUS_PEMBAYARAN', '=', 1)
                            ->whereBetween(DB::raw('DATE(pembayaran_penjualan.TGL_PEMBAYARAN)'), [$date_week, $date_week_end])
							->sum('p.TOTAL_PENJUALAN');
						
		$supplier = [];
		$supplier[1] = PenerimaanBahanBaku::whereBetween(DB::raw('DATE(TGL_KEDATANGAN)'), [$date_week, $date_week_end])
							->get();
        
        $Order = Penjualan::select(DB::raw('DATE_FORMAT(TGL_PENJUALAN, "%d/%m/%Y") AS TANGGAL'), 'KODE_DEPO')
                ->where('STATUS_PENJUALAN', '=', 0)
				->get();

		$pengiriman = Penjualan::select('penjualan.*','p.*','pp.*')
					->join('pembayaran_penjualan as pp','penjualan.ID_PENJUALAN','=','pp.ID_PENJUALAN')
					->leftJoin('pengiriman as p','p.KODE_PEMBAYARAN_PENJUALAN','=','pp.KODE_PEMBAYARAN_PENJUALAN')
					->where('pp.STATUS_PEMBAYARAN', '=', 1)
					->whereNull('p.KODE_PENGIRIMAN')
					->get();

        $supplier[2] = Supplier::select('NAMA_SUPPLIER', 'ALAMAT_SUPPLIER')->get();
        $customer = DepoAirMinum::select('NAMA_CUSTOMER', 'ALAMAT_DEPO')->get();
        
        return view('admin-gudang.dashboard')->with(compact('StockPlastikBekas', 'StockPlastikVirgin', 'StockPewarna', 'data_penjualan', 'Order', 'supplier', 'customer', 'pengiriman'));
    }
}
