<?php

namespace App\Http\Controllers\OperatorMesin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailPengambilan;
use App\Models\Product;
use App\Models\PengambilanBahanBaku;

class PengambilanBahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::select('kode_product', 'nama_product')->get();
        $detail = DetailPengambilan::select('detail_pengambilan.jumlah_kg', 'detail_pengambilan.jumlah_sak_karung', 'pb.*', 'om.NAMA_OPERATOR_MESIN', 's.nama_supplier', 'm.nama_mesin', 'b.nama_bahan_baku')
                ->join('penerimaan_bahan_baku as p', 'p.id_penerimaan', '=' ,'detail_pengambilan.id_penerimaan')
                ->join('supplier as s', 's.id_supplier', '=', 'p.id_supplier')
                ->join('bahan_baku as b', 'b.kode_bahan_baku', '=', 'p.kode_bahan_baku')
                ->join('pengambilan_bahan_baku as pb', 'pb.kode_pengambilan_bahan_baku', '=', 'detail_pengambilan.kode_pengambilan')
                ->join('operator_mesin as om', 'om.id_operator_mesin', '=', 'pb.id_operator_mesin')
                ->join('mesin as m', 'm.kode_mesin', '=', 'pb.kode_mesin')
                ->get();
        
        $data = PengambilanBahanBaku::select('pengambilan_bahan_baku.*', 'om.NAMA_OPERATOR_MESIN')
                ->join('operator_mesin as om', 'om.id_operator_mesin', '=', 'pengambilan_bahan_baku.id_operator_mesin')
                ->get();
        
        return view('/operator-mesin/pengambilan-bahan-baku')->with(compact('data', 'product', 'detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $detail_pengambilan = new DetailPengambilan;
        // $detail_pengambilan->
    }

    /**
     * Take data penerimaan bahan baku
     */
    public function ambilPenerimaan(Request $request){

        $penerimaan = PenerimaanBahanBaku::select('total_berat', 'jumlah_karung_sak')
        ->where(['id_supplier' => $request->id_supplier, 'kode_bahan_baku' => $request->kode_bahan_baku])->first();
        return response()->json(['success' => true,'penerimaan' => $penerimaan]);
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
