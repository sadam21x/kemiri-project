<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Penjualan;

class SuratController extends Controller
{
    public function nota_penjualan()
    {
        $nota_penjualan = PDF::loadView('surat/nota_penjualan');
        return $nota_penjualan->stream();
    }

    public function surat_jalan($id)
    {
        $data = Penjualan::find($id);
        $surat_jalan = PDF::loadView('surat/surat_jalan',compact("data"));
        return $surat_jalan->stream();
    }
}
