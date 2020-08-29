<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        DB::table('product')->insert([
            'KODE_HASIL_PRODUCT' => 1,
            'KODE_JENIS_PRODUCT' => 1,
            'NAMA_PRODUCT' => "Tutup Galon Aqua",
            'HARGA_PRODUCT' => 8000,
            'STOK_PRODUCT' => 500,
        ]);

        DB::table('product')->insert([
            'KODE_HASIL_PRODUCT' => 2,
            'KODE_JENIS_PRODUCT' => 2,
            'NAMA_PRODUCT' => "Tutup Galon Cleo",
            'HARGA_PRODUCT' => 7000,
            'STOK_PRODUCT' => 400,
        ]);

        DB::table('product')->insert([
            'KODE_HASIL_PRODUCT' => 3,
            'KODE_JENIS_PRODUCT' => 3,
            'NAMA_PRODUCT' => "AMDK Aqua",
            'HARGA_PRODUCT' => 200,
            'STOK_PRODUCT' => 800,
        ]);

        DB::table('product')->insert([
            'KODE_HASIL_PRODUCT' => 4,
            'KODE_JENIS_PRODUCT' => 4,
            'NAMA_PRODUCT' => "AMDK Cleo",
            'HARGA_PRODUCT' => 100,
            'STOK_PRODUCT' => 800,
        ]);

    }
}