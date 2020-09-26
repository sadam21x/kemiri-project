<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function editPegawai(Request $req){
        $request->validate([
            'NAMA' => 'required|string|regex:/^[a-zA-Z ]+$/',
            'JENIS_KELAMIN' => 'required|boolean',
            'KODE_JABATAN' => 'required|exists:App\Models\Jabatan,KODE_JABATAN|integer',
            'ALAMAT' => 'required|string|min:8|max:100',
            'PROVINSI' => 'required|exists:App\Models\IndonesiaProvince,id|integer',
            'KODE_KOTA' => 'required|exists:App\Models\IndonesiaCity,id|integer',
            'USERNAME_USER' => 'required|string|min:5|max:100',
            'PASSWORD_USER' => 'required|string|min:8',
            'KONFIRMASI_PASSWORD' => 'required|same:PASSWORD_USER',
            'FOTO_PROFILE' => 'required|integer|min:1|max:12',
            'NO_TELP' => 'nullable|string|regex:/^[0-9+]+$/',
            'EMAIL' => 'nullable|string|email',
        ]);

        $data = User::find($req->ID_USER);

        $foto = '/assets/img/avatar/avatar-'.$request->FOTO_PROFILE.'.png';
        
        DB::transaction(function() use ($request,$foto){
            // input ke sales A
            if($request->KODE_JABATAN == 4){

                $pegawai = SalesA::update([
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

                $pegawai = SalesB::update([
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
                $pegawai = OperatorMesin::update([
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
                $pegawai = ManajerMarketing::update([
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
                $pegawai = AdminGudang::update([
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

            $user = User::update([
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
