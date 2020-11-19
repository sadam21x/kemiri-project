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
        $data = DepoAirMinum::all();

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
            'kota' => 'required|exists:App\Models\IndonesiaCity,id|integer',
            'id_manajer_marketing' => 'required|exists:App\Models\ManajerMarketing,id_manajer_marketing|integer',
            'nama_customer' => 'required|string|max:50|regex:/^[a-zA-Z ]+$/',
            'nama_depo' => 'required|string|max:50|regex:/^[a-zA-Z ]+$/',
            'alamat_depo' => 'required|string|max:100',
            'no_telp_depo' => 'nullable|string|max:50|regex:/^[0-9 ]+$/',
            'email_depo' => 'nullable|string|email'
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
    public function getKota($kode_depo)
    { 
        $depo = DepoAirMinum::where('KODE_DEPO',$kode_depo);

        return $depo->value('KODE_KOTA');
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
            'kota' => 'required|exists:App\Models\IndonesiaCity,id|integer',
            'id_manajer_marketing' => 'required|exist:App\Models\ManajerMarketing,id_manajer_marketing|integer',
            'nama_customer' => 'required|string|max:50|regex:/^[a-zA-Z ]+$/',
            'nama_depo' => 'required|string|max:50',
            'alamat_depo' => 'required|string|max:100',
            'no_telp_depo' => 'nullable|string|max:50|regex:/^[0-9 ]+$/',
            'email_depo' => 'nullable|string|email'
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
