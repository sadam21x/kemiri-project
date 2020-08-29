<?php

use Illuminate\Database\Seeder;

class PenjualanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('penjualan')->insert([
            'ID_MANAJER_MARKETING' => rand(1,5),
            'ID_KONFIRMASI_PENJUALAN' => 1,
            'ID_SALES_B' => rand(1,5),
            'TGL_PENJUALAN' => date("Y-m-d",strtotime("2020-08-28")),
            'TGL_KIRIM' => date("Y-m-d",strtotime("2020-08-28")),
            'METODE_KIRIM' => "JNE",
            'ONGKOS_KIRIM' => 20000,
            'TOTAL_PENJUALAN' => 1000000,
            'STATUS_PENJUALAN' => 1
        ]);

        DB::table('penjualan')->insert([
            'ID_MANAJER_MARKETING' => rand(1,5),
            'ID_KONFIRMASI_PENJUALAN' => 2,
            'ID_SALES_B' => rand(1,5),
            'TGL_PENJUALAN' => date("Y-m-d",strtotime("2020-08-29")),
            'TGL_KIRIM' => date("Y-m-d",strtotime("2020-08-29")),
            'METODE_KIRIM' => "JNE",
            'ONGKOS_KIRIM' => 10000,
            'TOTAL_PENJUALAN' => 500000,
            'STATUS_PENJUALAN' => 1
        ]);

        DB::table('penjualan')->insert([
            'ID_MANAJER_MARKETING' => rand(1,5),
            'ID_KONFIRMASI_PENJUALAN' => 3,
            'ID_SALES_B' => rand(1,5),
            'TGL_PENJUALAN' => date("Y-m-d",strtotime("2020-08-30")),
            'TGL_KIRIM' => date("Y-m-d",strtotime("2020-08-30")),
            'METODE_KIRIM' => "POS",
            'ONGKOS_KIRIM' => 22000,
            'TOTAL_PENJUALAN' => 1000000,
            'STATUS_PENJUALAN' => 1
        ]);

        DB::table('penjualan')->insert([
            'ID_MANAJER_MARKETING' => rand(1,5),
            'ID_KONFIRMASI_PENJUALAN' => 4,
            'ID_SALES_B' => rand(1,5),
            'TGL_PENJUALAN' => date("Y-m-d",strtotime("2020-08-31")),
            'TGL_KIRIM' => date("Y-m-d",strtotime("2020-08-31")),
            'METODE_KIRIM' => "TIKI",
            'ONGKOS_KIRIM' => 15000,
            'TOTAL_PENJUALAN' => 1000000,
            'STATUS_PENJUALAN' => 1
        ]);
    }
}