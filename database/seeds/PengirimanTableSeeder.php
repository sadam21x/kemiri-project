<?php

use Illuminate\Database\Seeder;

class PengirimanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengiriman')->insert([
            'KODE_PEMBAYARAN_PENJUALAN' => 1,
            'ID_ADMIN_GUDANG' => rand(1,3),
            'TGL_KIRIM_RILL' => date("Y-m-d",strtotime("2020-08-28"))
        ]);

        DB::table('pengiriman')->insert([
            'KODE_PEMBAYARAN_PENJUALAN' => 2,
            'ID_ADMIN_GUDANG' => rand(1,3),
            'TGL_KIRIM_RILL' => date("Y-m-d",strtotime("2020-08-29"))
        ]);

        DB::table('pengiriman')->insert([
            'KODE_PEMBAYARAN_PENJUALAN' => 3,
            'ID_ADMIN_GUDANG' => rand(1,3),
            'TGL_KIRIM_RILL' => date("Y-m-d",strtotime("2020-08-30"))
        ]);

        DB::table('pengiriman')->insert([
            'KODE_PEMBAYARAN_PENJUALAN' => 4,
            'ID_ADMIN_GUDANG' => rand(1,3),
            'TGL_KIRIM_RILL' => date("Y-m-d",strtotime("2020-08-31"))
        ]);
        
    }
}