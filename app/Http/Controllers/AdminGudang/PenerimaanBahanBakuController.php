<?php

namespace App\Http\Controllers\AdminGudang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PenerimaanBahanBaku;

class PenerimaanBahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PenerimaanBahanBaku::select('penerimaan_bahan_baku.*', 'supplier.nama_supplier AS SUPPLIER', 'ag.nama_admin_gudang as STAFF_GUDANG', 'bk.nama_bahan_baku')
                ->join('supplier', 'supplier.id_supplier', '=', 'penerimaan_bahan_baku.id_supplier')
                ->join('admin_gudang as ag', 'ag.id_admin_gudang', '=', 'penerimaan_bahan_baku.id_admin_gudang')
                ->join('bahan_baku as bk', 'bk.kode_bahan_baku', '=', 'penerimaan_bahan_baku.kode_bahan_baku')->get();
        return view('/admin-gudang/penerimaan-bahan-baku')->with(compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $penerimaan_bahan_baku->id_supplier = $request->id_supplier;
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
