<?php

namespace App\Http\Controllers\AdminGudang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = \Laravolt\Indonesia\Models\Province::pluck('name', 'id');
        $data = Supplier::select('supplier.*', 'k.name AS KOTA','p.name AS PROVINSI')
                ->join('indonesia_cities as k','k.id','=','supplier.KODE_KOTA')
                ->join('indonesia_provinces as p','p.id','=','k.province_id')->get();
        return view('/admin-gudang/supplier')->with(compact('data', 'provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat_supplier = $request->alamat_supplier;
        $supplier->no_telp_supplier = $request->no_telp_supplier;
        $supplier->email_supplier = $request->email_supplier;
        $supplier->jenis_kelamin_supplier = $request->jenis_kelamin_supplier;
        $supplier->kode_kota = $request->kota;
        $supplier->save();

        return redirect('/admin-gudang/supplier');
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
    public function update(Request $request)
    {
        $supplier = Supplier::find($request->id_supplier);
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat_supplier = $request->alamat_supplier;
        $supplier->no_telp_supplier = $request->no_telp_supplier;
        $supplier->email_supplier = $request->email_supplier;
        $supplier->kode_kota = $request->kota;
        $supplier->save();

        return redirect('/admin-gudang/supplier');
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
