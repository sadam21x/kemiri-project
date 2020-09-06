<?php

namespace App\Http\Controllers\OperatorMesin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\BahanBaku;
use App\Models\PengambilanBahanBaku;
use App\Models\Mesin;
use App\Models\Supplier;
use App\Models\DetailPengambilan;
use App\Models\PenerimaanBahanBaku;
use App\Models\ProsesProduksi;
use App\Models\HasilProduct;

class PengambilanBahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesin = Mesin::All();
        $bahan_baku = BahanBaku::all();
        $supplier = Supplier::all();
        $product = Product::select('kode_product', 'nama_product')->get();
        $data = PengambilanBahanBaku::all();
        
        return view('/operator-mesin/pengambilan-bahan-baku')->with(compact('data', 'product', 'mesin', 'bahan_baku', 'supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $r)
    {
        $r->validate([
            'id_operator_mesin' => 'required',
            'mesin' => 'required',
            'product' => 'required' 
        ]);

        PengambilanBahanBaku::insert([
            'id_operator_mesin' => $r->id_operator_mesin,
            'kode_mesin' => $r->mesin,
            'waktu_pengambilan' => date("Y-m-d h:i:s"),
            'hasil_produk' => $r->product
        ]);

        $nama_produk = Product::select('NAMA_PRODUCT')->where(['kode_product' => $r->product])->first();

        $id = PengambilanBahanBaku::select("KODE_PENGAMBILAN_BAHAN_BAKU")->where([
                'id_operator_mesin' => $r->id_operator_mesin,
                'kode_mesin' => $r->mesin,
                'waktu_pengambilan' => date("Y-m-d h:i:s"),
                'hasil_produk' => $nama_produk
                ])->first();
        
        $idp = PenerimaanBahanBaku::select("ID_PENERIMAAN")->where([
                'id_supplier' => $r->supplier,
                'kode_bahan_baku' => $r->bahan_baku
                ])->first();

        $i = 0;

        foreach($r->bahan_baku as $key){
            DetailPengambilan::insert([
                'id_penerimaan' => $idp->ID_PENERIMAAN,
                'kode_pengambilan' => $id->KODE_PENGAMBILAN_BAHAN_BAKU,
                'jumlah_kg' => $r->jumlah_bahan_baku,
                'jumlah_sak_karung' => $r->jumlah_karung_sak
            ]);
            $i++;
        }

        ProsesProduksi::insert([
            'kode_pengambilan_bahan_baku' => $id,
            'tgl_produksi' => date("Y-m-d")
        ]);

        $kode_produksi = ProsesProduksi::select('KODE_PRODUKSI')->where(['kode_pengambilan_bahan_baku' => $id])->first();

        HasilProduct::insert([
            'kode_produksi' => $kode_produksi,
            'kode_product' => $r->product
        ]);
    }

    /**
     * Get bahan baku
     */
    public function getBahanBaku()
    {
        $bahan_baku = BahanBaku::select('KODE_BAHAN_BAKU', 'NAMA_BAHAN_BAKU')->get();
        
        return response()->json(['success' => true,'data' => $bahan_baku]);
    }

    /**
     * Get Supplier
     */
    public function getSupplier()
    {
        $supplier = Supplier::select('ID_SUPPLIER', 'NAMA_SUPPLIER')->get();
        
        return response()->json(['success' => true,'data' => $supplier]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
