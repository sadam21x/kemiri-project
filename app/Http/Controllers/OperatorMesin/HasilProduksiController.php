<?php

namespace App\Http\Controllers\OperatorMesin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProsesProduksi;

class HasilProduksiController extends Controller
{
    public function index()
    {
    	$data = ProsesProduksi::all();
    	return view('operator-mesin.evaluasi-hasil-produksi')->with(compact("data"));
    }

    public function store(Request $request)
    {
    	$request->validate([
    		""
    	]);
    }

    public function update(Request $request)
    {

    }
}
