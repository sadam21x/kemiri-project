<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $first = $faker->firstName;
        $last = $faker->lastName;
        $name = $first." ".$last;

        for ($i=0; $i < 30; $i++) {

            // generate nama
            $namadepan = $faker->firstName;
            $namabelakang = $faker->lastName;
            $nama = $namadepan." ".$namabelakang;

            // memanggil function generate_id_kota
            $id_kota = $this->generate_id_kota();

            // memanggil function generate_id_jabatan
            $id_jabatan = $this->generate_id_jabatan();

            // insert database
            DB::table('user')->insert([
                'kode_kota' => $id_kota,
                'kode_jabatan' => $id_jabatan,
                'username_user' => substr(str_replace(' ', '',strtolower($nama)),0,20),
                'password_user' => encrypt(substr(str_replace(' ', '',strtolower($nama)),0,20)),
                'nama_user' => $nama,
                'alamat_user' => $faker->streetAddress,
                'jenis_kelamin_user' => $faker->randomElement($array = array('0', '1')),
                'no_telp_user' => $faker->phoneNumber,
                'email_user' => $faker->email
            ]);
        }

        DB::table('user')->insert([
            'kode_kota' => $this->generate_id_kota(),
            'kode_jabatan' => 1,
            'username_user' => substr(str_replace(' ', '',strtolower($name)),0,20),
            'password_user' => encrypt(substr(str_replace(' ', '',strtolower($name)),0,20)),
            'nama_user' => $name,
            'alamat_user' => $faker->streetAddress,
            'jenis_kelamin_user' => $faker->randomElement($array = array('0', '1')),
            'no_telp_user' => $faker->phoneNumber,
            'email_user' => $faker->email
        ]);
    }

    /*
    Generate id kota random
    */
    public function generate_id_kota()
    {
        $arr_id_kota = array(
            1101, 1102, 1103, 1104, 1105, 1106, 1107, 1108,
            1109, 1110, 1111, 1112, 1113, 1114, 1115, 1116,
            1117, 1118, 1171, 1172, 1173, 1174, 1175, 1201,
            1202, 1203, 1204, 1205, 1206, 1207, 1208, 1209,
            1210, 1211, 1212, 1213, 1214, 1215, 1216, 1217,
            1218, 1219, 1220, 1221, 1222, 1223, 1224, 1225,
            1271, 1272, 1273, 1274, 1275, 1276, 1277, 1278,
            1301, 1302, 1303, 1304, 1305, 1306, 1307, 1308,
            1309, 1310, 1311, 1312, 1371, 1372, 1373, 1374,
            1375, 1376, 1377, 1401, 1402, 1403, 1404, 1405
        );

        // mengahasilkan random index dari array arr_id_kota
        $index_idkota = array_rand($arr_id_kota);

        // menghasilkan value dari index random yang telah didapat
        $id_kota = $arr_id_kota[$index_idkota];

        return $id_kota;
    }

    /*
    Generate id jabatan random
    */
    public function generate_id_jabatan()
    {
        $arr_id_jabatan = array(
            2, 3, 4, 5, 6
        );

        // mengahasilkan random index dari array arr_id_jabatan
        $index_idjabatan = array_rand($arr_id_jabatan);

        // menghasilkan value dari index random yang telah didapat
        $id_jabatan = $arr_id_jabatan[$index_idjabatan];

        return $id_jabatan;
    }
}