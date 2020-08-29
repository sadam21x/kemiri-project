<?php

use Illuminate\Database\Seeder;

class DetilPenjualanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('detil_penjualan')->insert([
            'ID_PENJUALAN' => 1,
            'KODE_PRODUCT' => 1,
            'JUMLAH_SAK' => 5,
            'JUMLAH_PCS' => 125,
            'HARGA_BARANG' => 8000,
        ]);

        DB::table('detil_penjualan')->insert([
            'ID_PENJUALAN' => 2,
            'KODE_PRODUCT' => 2,
            'JUMLAH_SAK' => 5,
            'JUMLAH_PCS' => 100,
            'HARGA_BARANG' => 7000,
        ]);

        DB::table('detil_penjualan')->insert([
            'ID_PENJUALAN' => 3,
            'KODE_PRODUCT' => 3,
            'JUMLAH_SAK' => 5,
            'JUMLAH_PCS' => 500,
            'HARGA_BARANG' => 200,
        ]);

        DB::table('detil_penjualan')->insert([
            'ID_PENJUALAN' => 4,
            'KODE_PRODUCT' => 4,
            'JUMLAH_SAK' => 5,
            'JUMLAH_PCS' => 500,
            'HARGA_BARANG' => 100,
        ]);
    }
}