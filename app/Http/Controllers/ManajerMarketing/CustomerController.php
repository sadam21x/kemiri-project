<?php

namespace App\Http\Controllers\ManajerMarketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DepoAirMinum;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = \Laravolt\Indonesia\Models\Province::pluck('name', 'id');
        $data = DepoAirMinum::select('depo_air_minum.*','k.name AS KOTA','p.name AS PROVINSI')
                ->join('indonesia_cities as k','k.id','=','depo_air_minum.KODE_KOTA')
                ->join('indonesia_provinces as p','p.id','=','k.province_id')->get();

        return view('manajer-marketing/customer', compact('data', 'provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $r)
    {
        $r->validate([
            'kota' => 'required',
            'id_manajer_marketing' => 'required',
            'nama_customer' => 'required',
            'nama_depo' => 'required',
            'alamat_depo' => 'required'
        ]);

        $depo_air_minum = new DepoAirMinum;
        $depo_air_minum->nama_depo = $r->nama_depo;
        $depo_air_minum->alamat_depo = $r->alamat_depo;
        $depo_air_minum->id_manajer_marketing = $r->id_manajer_marketing;
        $depo_air_minum->kode_kota = $r->kota;
        $depo_air_minum->no_telp_depo = $r->no_telp_depo;
        $depo_air_minum->email_depo = $r->email_depo;
        $depo_air_minum->nama_customer = $r->nama_customer;
        $depo_air_minum->save();

        return redirect('/manajer-marketing/customer');
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
    public function update(Request $r)
    {
        $r->validate([
            'kota' => 'required',
            'nama_customer' => 'required',
            'nama_depo' => 'required',
            'alamat_depo' => 'required'
        ]);

        $depo_air_minum = DepoAirMinum::find($r->kode_depo);
        $depo_air_minum->nama_depo = $r->nama_depo;
        $depo_air_minum->alamat_depo = $r->alamat_depo;
        $depo_air_minum->kode_kota = $r->kota;
        $depo_air_minum->no_telp_depo = $r->no_telp_depo;
        $depo_air_minum->email_depo = $r->email_depo;
        $depo_air_minum->nama_customer = $r->nama_customer;
        $depo_air_minum->save();

        return redirect('/manajer-marketing/customer');
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
