<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetilPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detil_penjualan', function (Blueprint $table) {
            $table->integer('ID_PENJUALAN');
            $table->integer('KODE_PRODUCT')->index('FK_TERDAPAT12312311');
            $table->integer('JUMLAH_SAK');
            $table->integer('JUMLAH_PCS');
            $table->double('HARGA_BARANG');
            $table->primary(['ID_PENJUALAN', 'KODE_PRODUCT']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detil_penjualan');
    }
}
