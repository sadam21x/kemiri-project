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
        

        DB::table('proses_produksi')->insert([
            'KODE_PENGAMBILAN_BAHAN_BAKU' => rand(1,4),
            'TGL_PRODUKSI' => date("Y-m-d",strtotime("2020-08-28")),
            'HASIL_BAGUS_KG' => 20,
            'HASIL_RUSAK_KG' => 2,
            'EVALUASI_PRODUCT' => "Sedang",
            'EVALUASI_MESIN' => "Baik",
            'EVALUASI_BAHAN_BAKU' => "Baik"
        ]);

        DB::table('proses_produksi')->insert([
            'KODE_PENGAMBILAN_BAHAN_BAKU' => rand(1,4),
            'TGL_PRODUKSI' => date("Y-m-d",strtotime("2020-08-29")),
            'HASIL_BAGUS_KG' => 20,
            'HASIL_RUSAK_KG' => 5,
            'EVALUASI_PRODUCT' => "Jelek",
            'EVALUASI_MESIN' => "Sedang",
            'EVALUASI_BAHAN_BAKU' => "Baik"
        ]);

        DB::table('proses_produksi')->insert([
            'KODE_PENGAMBILAN_BAHAN_BAKU' => rand(1,4),
            'TGL_PRODUKSI' => date("Y-m-d",strtotime("2020-08-30")),
            'HASIL_BAGUS_KG' => 20,
            'HASIL_RUSAK_KG' => 2,
            'EVALUASI_PRODUCT' => "Baik",
            'EVALUASI_MESIN' => "Baik",
            'EVALUASI_BAHAN_BAKU' => "Baik"
        ]);

        DB::table('proses_produksi')->insert([
            'KODE_PENGAMBILAN_BAHAN_BAKU' => rand(1,4),
            'TGL_PRODUKSI' => date("Y-m-d",strtotime("2020-08-28")),
            'HASIL_BAGUS_KG' => 10,
            'HASIL_RUSAK_KG' => 2,
            'EVALUASI_PRODUCT' => "Baik",
            'EVALUASI_MESIN' => "Sedang",
            'EVALUASI_BAHAN_BAKU' => "Baik"
        ]);

        DB::table('proses_produksi')->insert([
            'KODE_PENGAMBILAN_BAHAN_BAKU' => rand(1,4),
            'TGL_PRODUKSI' => date("Y-m-d",strtotime("2020-08-29")),
            'HASIL_BAGUS_KG' => 5,
            'HASIL_RUSAK_KG' => 2,
            'EVALUASI_PRODUCT' => "Baik",
            'EVALUASI_MESIN' => "Baik",
            'EVALUASI_BAHAN_BAKU' => "Baik"
        ]);
        
    }
}