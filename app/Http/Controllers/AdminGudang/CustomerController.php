<?php

namespace App\Http\Controllers\AdminGudang;

use App\Models\DepoAirMinum;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DepoAirMinum::all();
        return view('/admin-gudang/customer')->with(compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\DepoAirMinum  $depoAirMinum
     * @return \Illuminate\Http\Response
     */
    public function show(DepoAirMinum $depoAirMinum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DepoAirMinum  $depoAirMinum
     * @return \Illuminate\Http\Response
     */
    public function edit(DepoAirMinum $depoAirMinum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DepoAirMinum  $depoAirMinum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DepoAirMinum $depoAirMinum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DepoAirMinum  $depoAirMinum
     * @return \Illuminate\Http\Response
     */
    public function destroy(DepoAirMinum $depoAirMinum)
    {
        //
    }
}
