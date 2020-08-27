<?php

use Illuminate\Database\Seeder;

class JenisProductTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $jenisProduk = ['Tutup Galon A', 'Tutup Galon B', 'amdk A', 'amdk B'];

    	foreach($jenisProduk as $j){
    		DB::table('jenis_product')->insert([
	            'nama_jenis_product' => $j
            ]);
        } 
    }
}