<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SalesA;
use App\Models\SalesB;
use App\Models\User;

class SalesController extends Controller
{
       public function index()
    {
    	$data_sales_a = SalesA::all();
    	$data_sales_b = SalesB::all();
    	return view('/owner/sales')->with(compact("data_sales_a","data_sales_b"));
    }

    public function viewA($id)
    {
    	$data = SalesA::find($id);
    	$jabatan = "Sales A";
    	return view('/owner/detail-sales')->with(compact("data","jabatan"));
    }

    public function viewB($id)
    {
    	$data = SalesB::find($id);
    	$jabatan = "Sales B";
    	return view('/owner/detail-sales')->with(compact("data","jabatan"));
    }

    public function insert()
    {
        $provinsi = \Laravolt\Indonesia\Models\Province::pluck('name', 'id');
        return view('owner/tambah-sales', compact('provinsi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NAMA_SALES' => 'required',
            'JENIS_KELAMIN' => 'required',
            'KODE_JABATAN' => 'required',
            'ALAMAT_SALES' => 'required',
            'PROVINSI' => 'required',
            'KODE_KOTA' => 'required',
            'NO_TELP_SALES' => 'required',
            'EMAIL_SALES' => 'required',
            'USERNAME_USER' => 'required',
            'PASSWORD_USER' => 'required',
            'KONFIRMASI_PASSWORD' => 'required',
        ]);

        // input ke sales A
        if($request->KODE_JABATAN == 4){

            $salesa = SalesA::insert([
                'KODE_KOTA' => $request->KODE_KOTA,
                'NAMA_SALES_A' => $request->NAMA_SALES,
                'ALAMAT_SALES_A' => $request->ALAMAT_SALES,
                'JENIS_KELAMIN_SALES_A' => $request->JENIS_KELAMIN,
                'NO_TELP_SALES_A' => $request->NO_TELP_SALES,
                'EMAIL_SALES_A' => $request->EMAIL_SALES,
            ]);

        }

        else{

            $salesb = SalesB::insert([
                'KODE_KOTA' => $request->KODE_KOTA,
                'NAMA_SALES_B' => $request->NAMA_SALES,
                'ALAMAT_SALES_B' => $request->ALAMAT_SALES,
                'JENIS_KELAMIN_SALES_B' => $request->JENIS_KELAMIN,
                'NO_TELP_SALES_B' => $request->NO_TELP_SALES,
                'EMAIL_SALES_B' => $request->EMAIL_SALES,
            ]);

        }

        $user = User::insert([
            'KODE_KOTA' => $request->KODE_KOTA,
            'KODE_JABATAN' => $request->KODE_JABATAN,
            'USERNAME_USER' => $request->USERNAME_USER,
            'PASSWORD_USER' => bcrypt($request->PASSWORD_USER),
            'NAMA_USER' => $request->NAMA_SALES,
            'ALAMAT_USER' => $request->ALAMAT_SALES,
            'JENIS_KELAMIN_USER' => $request->JENIS_KELAMIN,
            'NO_TELP_USER' => $request->NO_TELP_SALES,
            'EMAIL_USER' => $request->EMAIL_SALES,
        ]);


        return redirect('/owner/sales');
    }

}
