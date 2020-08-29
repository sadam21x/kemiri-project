<?php

use Illuminate\Database\Seeder;

class PengambilanBahanBakuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengambilan_bahan_baku')->insert([
            'ID_PENERIMAAN' => rand(1,9),
			'ID_OPERATOR_MESIN' => rand(1,3),
			'KODE_MESIN' => rand(1,4),
			'WAKTU_PENGAMBILAN' => date("Y-m-d h:i:s",strtotime("2020-08-30 09:00:00")),
			'JUMLAH_KG' => 20,
			'JUMLAH_SAK_KARUNG' => 10,
			'STATUS_BAHAN_BAKU' => 1
        ]);

        DB::table('pengambilan_bahan_baku')->insert([
            'ID_PENERIMAAN' => rand(1,9),
			'ID_OPERATOR_MESIN' => rand(1,3),
			'KODE_MESIN' => rand(1,4),
			'WAKTU_PENGAMBILAN' => date("Y-m-d h:i:s",strtotime("2020-08-29 09:00:00")),
			'JUMLAH_KG' => 20,
			'JUMLAH_SAK_KARUNG' => 10,
			'STATUS_BAHAN_BAKU' => 1
        ]);

        DB::table('pengambilan_bahan_baku')->insert([
            'ID_PENERIMAAN' => rand(1,9),
			'ID_OPERATOR_MESIN' => rand(1,3),
			'KODE_MESIN' => rand(1,4),
			'WAKTU_PENGAMBILAN' => date("Y-m-d h:i:s",strtotime("2020-08-28 09:00:00")),
			'JUMLAH_KG' => 20,
			'JUMLAH_SAK_KARUNG' => 10,
			'STATUS_BAHAN_BAKU' => 0
        ]);

        DB::table('pengambilan_bahan_baku')->insert([
            'ID_PENERIMAAN' => rand(1,9),
			'ID_OPERATOR_MESIN' => rand(1,3),
			'KODE_MESIN' => rand(1,4),
			'WAKTU_PENGAMBILAN' => date("Y-m-d h:i:s",strtotime("2020-08-27 09:00:00")),
			'JUMLAH_KG' => 20,
			'JUMLAH_SAK_KARUNG' => 10,
			'STATUS_BAHAN_BAKU' => 0
        ]);
    }
}