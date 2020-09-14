<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SalesA;
use App\Models\SalesB;
use App\Models\OperatorMesin;
use App\Models\ManajerMarketing;
use App\Models\AdminGudang;
use App\Models\User;
use DB;

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

    public function indexOperatorMesin(){
        $data = OperatorMesin::all();
        return view('/owner/operator-mesin')->with(compact("data"));
    }

    public function indexAdminGudang(){
        $data = AdminGudang::all();
        return view('/owner/admin-gudang')->with(compact("data"));
    }

    public function indexManajerMarketing(){
        $data = ManajerMarketing::all();
        return view('/owner/manajer-marketing')->with(compact("data"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NAMA' => 'required|string|regex:/^[a-zA-Z ]+$/',
            'JENIS_KELAMIN' => 'required|boolean',
            'KODE_JABATAN' => 'required|exists:App\Models\Jabatan,KODE_JABATAN|integer',
            'ALAMAT' => 'required|string|min:8|max:100',
            'PROVINSI' => 'required|exists:App\Models\IndonesiaProvince,id|integer',
            'KODE_KOTA' => 'required|exists:App\Models\IndonesiaCity,id|integer',
            'USERNAME_USER' => 'required|string|min:5',
            'PASSWORD_USER' => 'required|string|min:8',
            'KONFIRMASI_PASSWORD' => 'required|same:PASSWORD_USER',
            'FOTO_PROFILE' => 'required|integer|min:1|max:12',
            'NO_TELP' => 'nullable|string|regex:/^[0-9+]+$/',
            'EMAIL' => 'nullable|string|email',
        ]);

        $foto = '/assets/img/avatar/avatar-'.$request->FOTO_PROFILE.'.png';
        
        DB::transaction(function() use ($request,$foto){
            // input ke sales A
            if($request->KODE_JABATAN == 4){

                $pegawai = SalesA::insert([
                    'KODE_KOTA' => $request->KODE_KOTA,
                    'NAMA_SALES_A' => ucwords($request->NAMA),
                    'ALAMAT_SALES_A' => ucwords($request->ALAMAT),
                    'JENIS_KELAMIN_SALES_A' => $request->JENIS_KELAMIN,
                    'NO_TELP_SALES_A' => $request->NO_TELP,
                    'EMAIL_SALES_A' => strtolower($request->EMAIL),
                    'FOTO_PROFILE' => $foto
                ]);

            }
            // input ke sales B
            elseif($request->KODE_JABATAN == 5){

                $pegawai = SalesB::insert([
                    'KODE_KOTA' => $request->KODE_KOTA,
                    'NAMA_SALES_B' => ucwords($request->NAMA),
                    'ALAMAT_SALES_B' => ucwords($request->ALAMAT),
                    'JENIS_KELAMIN_SALES_B' => $request->JENIS_KELAMIN,
                    'NO_TELP_SALES_B' => $request->NO_TELP,
                    'EMAIL_SALES_B' => strtolower($request->EMAIL),
                    'FOTO_PROFILE' => $foto
                ]);

            }

            elseif($request->KODE_JABATAN == 6){

                //tested by dea (14/9/2020 16:40)

                //insert operator mesin
                $pegawai = OperatorMesin::insert([
                    'KODE_KOTA' => $request->KODE_KOTA,
                    'NAMA_OPERATOR_MESIN' => ucwords($request->NAMA),
                    'ALAMAT_OPERATOR_MESIN' => ucwords($request->ALAMAT),
                    'JENIS_KELAMIN_OPERATOR_MESIN' => $request->JENIS_KELAMIN,
                    'NO_TELP_OPERATOR_MESIN' => $request->NO_TELP,
                    'EMAIL_OPERATOR_MESIN' => strtolower($request->EMAIL),
                    'FOTO_PROFILE' => $foto
                ]);

            }

            elseif($request->KODE_JABATAN == 3){

                //insert manajer marketing
                $pegawai = ManajerMarketing::insert([
                    'KODE_KOTA' => $request->KODE_KOTA,
                    'NAMA_MANAJER_MARKETING' => ucwords($request->NAMA),
                    'ALAMAT_MANAJER_MARKETING' => ucwords($request->ALAMAT),
                    'JENIS_KELAMIN_MANAJER_MARKETING' => $request->JENIS_KELAMIN,
                    'NO_TELP_MANAJER_MARKETING' => $request->NO_TELP,
                    'EMAIL_MANAJER_MARKETING' => strtolower($request->EMAIL),
                    'FOTO_PROFILE' => $foto
                ]);

            }
            elseif($request->KODE_JABATAN == 2){

                //tested by dea (14/9/2020 16:40)

                //insert admin gudang
                $pegawai = AdminGudang::insert([
                    'KODE_KOTA' => $request->KODE_KOTA,
                    'NAMA_ADMIN_GUDANG' => ucwords($request->NAMA),
                    'ALAMAT_ADMIN_GUDANG' => ucwords($request->ALAMAT),
                    'JENIS_KELAMIN_ADMIN_GUDANG' => $request->JENIS_KELAMIN,
                    'NO_TELP_ADMIN_GUDANG' => $request->NO_TELP,
                    'EMAIL_ADMIN_GUDANG' => strtolower($request->EMAIL),
                    'FOTO_PROFILE' => $foto
                ]);

            }

            //tested by dea (14/9/2020 16:40)
            
            $user = User::insert([
                'KODE_KOTA' => $request->KODE_KOTA,
                'KODE_JABATAN' => $request->KODE_JABATAN,
                'USERNAME_USER' => strtolower($request->USERNAME_USER),
                'PASSWORD_USER' => bcrypt($request->PASSWORD_USER),
                'NAMA_USER' => ucwords($request->NAMA),
                'ALAMAT_USER' => ucwords($request->ALAMAT),
                'JENIS_KELAMIN_USER' => $request->JENIS_KELAMIN,
                'NO_TELP_USER' => $request->NO_TELP,
                'EMAIL_USER' => strtolower($request->EMAIL),
                'FOTO_PROFILE' => $foto
            ]);

        });

        if($request->KODE_JABATAN == 4 || $request->KODE_JABATAN == 5){
            return redirect('/owner/sales');
        }
        elseif($request->KODE_JABATAN == 6){
            return redirect('/owner/operator-mesin');
        }
        elseif($request->KODE_JABATAN == 3){
            return redirect('/owner/manajer-marketing');
        }
        elseif($request->KODE_JABATAN == 2){
            return redirect('/owner/admin-gudang');
        }
    }

}
