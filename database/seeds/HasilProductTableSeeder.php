<?php

use Illuminate\Database\Seeder;

class HasilProductTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
		DB::table('hasil_product')->insert([
            'KODE_PRODUKSI' => 1,
            'NAMA_PRODUCT' => "Tutup Galon",
            'HASIL_BAGUS_PCS' => 100,
            'HASIL_RUSAK_PCS' => 10,
        ]);

        DB::table('hasil_product')->insert([
            'KODE_PRODUKSI' => 2,
            'NAMA_PRODUCT' => "Amdk",
            'HASIL_BAGUS_PCS' => 120,
            'HASIL_RUSAK_PCS' => 8,
        ]);

        DB::table('hasil_product')->insert([
            'KODE_PRODUKSI' => 3,
            'NAMA_PRODUCT' => "Amdk" ,
            'HASIL_BAGUS_PCS' => 130,
            'HASIL_RUSAK_PCS' => 5,
        ]);

        DB::table('hasil_product')->insert([
            'KODE_PRODUKSI' => 4,
            'NAMA_PRODUCT' => "Tutup Galon" ,
            'HASIL_BAGUS_PCS' => 100,
            'HASIL_RUSAK_PCS' => 7,
        ]);
        
    }
}