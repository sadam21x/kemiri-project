<?php

namespace App\Http\Controllers\ManajerMarketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SalesA;
use App\Models\SalesB;
use App\Models\EvaluasiKinerjaSalesa;
use App\Models\EvaluasiKinerjaSalesb;

class SalesController extends Controller
{
    public function index()
    {
    	$data_sales_a = SalesA::all();
    	$data_sales_b = SalesB::all();
    	return view('/manajer-marketing/sales')->with(compact("data_sales_a","data_sales_b"));
    }

    public function viewA($id)
    {
    	$data = SalesA::find($id);
    	$jabatan = "Sales A";
    	return view('/manajer-marketing/detail-sales')->with(compact("data","jabatan"));
    }

    public function viewB($id)
    {
    	$data = SalesB::find($id);
    	$jabatan = "Sales B";
    	return view('/manajer-marketing/detail-sales')->with(compact("data","jabatan"));
    }

    public function insertA($id)
    {
        $data = SalesA::find($id);
        $jabatan = "Sales A";
        return view('/manajer-marketing/input-evaluasi-kinerja-sales')->with(compact("data","jabatan"));
    }

    public function insertB($id)
    {
        $data = SalesB::find($id);
        $jabatan = "Sales B";
        return view('/manajer-marketing/input-evaluasi-kinerja-sales')->with(compact("data","jabatan"));
    }

    public function storeA(Request $request)
    {
        $request->validate([
            'ID_MANAJER_MARKETING' => 'required',
            'TGL_EVALUASI_KINERJA_SALESA' => 'required',
            'ID_SALES_A' => 'required',
            'EVALUASI_SALESA' => 'required',
        ]);

        $data = EvaluasiKinerjaSalesa::insert([
            'ID_MANAJER_MARKETING' => $request->ID_MANAJER_MARKETING,
            'TGL_EVALUASI_KINERJA_SALESA' => date("Y-m-d",strtotime($request->TGL_EVALUASI_KINERJA_SALESA)),
            'ID_SALES_A' => $request->ID_SALES_A,
            'EVALUASI_SALESA' => $request->EVALUASI_SALESA
        ]);

        return redirect('/manajer-marketing/evaluasi-kinerja-sales');
    }

    public function storeB(Request $request)
    {
        $request->validate([
            'ID_MANAJER_MARKETING' => 'required',
            'TGL_EVALUASI_KINERJA_SALESB' => 'required',
            'ID_SALES_B' => 'required',
            'EVALUASI_SALESB' => 'required',
        ]);

        $data = EvaluasiKinerjaSalesb::insert([
            'ID_MANAJER_MARKETING' => $request->ID_MANAJER_MARKETING,
            'TGL_EVALUASI_KINERJA_SALESB' => date("Y-m-d",strtotime($request->TGL_EVALUASI_KINERJA_SALESB)),
            'ID_SALES_B' => $request->ID_SALES_B,
            'EVALUASI_SALESB' => $request->EVALUASI_SALESB
        ]);

        return redirect('/manajer-marketing/evaluasi-kinerja-sales');
    }
}
