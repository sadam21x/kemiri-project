<?php

use Illuminate\Database\Seeder;

class ProsesProduksiTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        KODE_PRODUKSI   KODE_PENGAMBILAN_BAHAN_BAKU     TGL_PRODUKSI    HASIL_BAGUS_KG  HASIL_RUSAK_KG 
        DB::table('proses_produksi')->insert([
            'KODE_PENGAMBILAN_BAHAN_BAKU' => rand(1,4),
            'TGL_PRODUKSI' => date("Y-m-d",strtotime("2020-08-28")),
            'HASIL_BAGUS_KG' => 20,
            'HASIL_RUSAK_KG' => 2,
            'EVALUASI_PRODUCT' => "Sedang",
            'EVALUASI_MESIN' => "Bagus",
            'EVALUASI_BAHAN_BAKU' => "Bagus"
        ]);
        
    }
}