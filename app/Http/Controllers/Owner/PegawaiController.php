<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SalesA;
use App\Models\SalesB;
use App\Models\User;

class PegawaiController extends Controller
{
       public function indexSales()
    {
    	$data_sales_a = SalesA::all();
    	$data_sales_b = SalesB::all();
    	return view('/owner/sales')->with(compact("data_sales_a","data_sales_b"));
    }

    public function viewSalesA($id)
    {
    	$data = SalesA::find($id);
    	$jabatan = "Sales A";
    	return view('/owner/detail-sales')->with(compact("data","jabatan"));
    }

    public function viewSalesB($id)
    {
    	$data = SalesB::find($id);
    	$jabatan = "Sales B";
    	return view('/owner/detail-sales')->with(compact("data","jabatan"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NAMA' => 'required',
            'JENIS_KELAMIN' => 'required',
            'KODE_JABATAN' => 'required',
            'ALAMAT' => 'required',
            'PROVINSI' => 'required',
            'KODE_KOTA' => 'required',
            'USERNAME_USER' => 'required',
            'PASSWORD_USER' => 'required',
            'KONFIRMASI_PASSWORD' => 'required',
        ]);

        // input ke sales A
        if($request->KODE_JABATAN == 4){

            $pegawai = SalesA::insert([
                'KODE_KOTA' => $request->KODE_KOTA,
                'NAMA_SALES_A' => $request->NAMA,
                'ALAMAT_SALES_A' => $request->ALAMAT,
                'JENIS_KELAMIN_SALES_A' => $request->JENIS_KELAMIN,
                'NO_TELP_SALES_A' => $request->NO_TELP,
                'EMAIL_SALES_A' => $request->EMAIL,
            ]);

        }

        elseif($request->KODE_JABATAN == 5){

            $pegawai = SalesB::insert([
                'KODE_KOTA' => $request->KODE_KOTA,
                'NAMA_SALES_B' => $request->NAMA,
                'ALAMAT_SALES_B' => $request->ALAMAT,
                'JENIS_KELAMIN_SALES_B' => $request->JENIS_KELAMIN,
                'NO_TELP_SALES_B' => $request->NO_TELP,
                'EMAIL_SALES_B' => $request->EMAIL,
            ]);

        }

        elseif($request->KODE_JABATAN == 6){

            //insert operator mesin
            $pegawai = OperatorMesin::insert([
                'KODE_KOTA' => $request->KODE_KOTA,
                'NAMA_OPERATOR_MESIN' => $request->NAMA,
                'ALAMAT_OPERATOR_MESIN' => $request->ALAMAT,
                'JENIS_KELAMIN_OPERATOR_MESIN' => $request->JENIS_KELAMIN,
                'NO_TELP_OPERATOR_MESIN' => $request->NO_TELP,
                'EMAIL_OPERATOR_MESIN' => $request->EMAIL,
            ]);

        }

        elseif($request->KODE_JABATAN == 3){

            //insert manajer marketing
            $pegawai = ManajerMarketing::insert([
                'KODE_KOTA' => $request->KODE_KOTA,
                'NAMA_MANAJER_MARKETING' => $request->NAMA,
                'ALAMAT_MANAJER_MARKETING' => $request->ALAMAT,
                'JENIS_KELAMIN_MANAJER_MARKETING' => $request->JENIS_KELAMIN,
                'NO_TELP_MANAJER_MARKETING' => $request->NO_TELP,
                'EMAIL_MANAJER_MARKETING' => $request->EMAIL,
            ]);

        }
        elseif($request->KODE_JABATAN == 2){

            //insert admin gudang
            $pegawai = AdminGudang::insert([
                'KODE_KOTA' => $request->KODE_KOTA,
                'NAMA_ADMIN_GUDANG' => $request->NAMA,
                'ALAMAT_ADMIN_GUDANG' => $request->ALAMAT,
                'JENIS_KELAMIN_ADMIN_GUDANG' => $request->JENIS_KELAMIN,
                'NO_TELP_ADMIN_GUDANG' => $request->NO_TELP,
                'EMAIL_ADMIN_GUDANG' => $request->EMAIL,
            ]);

        }

        $user = User::insert([
            'KODE_KOTA' => $request->KODE_KOTA,
            'KODE_JABATAN' => $request->KODE_JABATAN,
            'USERNAME_USER' => $request->USERNAME_USER,
            'PASSWORD_USER' => bcrypt($request->PASSWORD_USER),
            'NAMA_USER' => $request->NAMA,
            'ALAMAT_USER' => $request->ALAMAT,
            'JENIS_KELAMIN_USER' => $request->JENIS_KELAMIN,
            'NO_TELP_USER' => $request->NO_TELP,
            'EMAIL_USER' => $request->EMAIL,
        ]);


        return redirect('/owner/sales');
    }

}
