<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->integer('ID_PENJUALAN', true);
            $table->integer('KODE_DEPO')->index('FK_TERDAPAT959123');
            $table->integer('ID_MANAJER_MARKETING')->nullable()->index('FK_KONFIRMASI');
            $table->integer('ID_SALES_B')->nullable()->index('FK_MENGINPUTKAN');
            $table->integer('ID_OWNER')->nullable()->index('FK_OWNER_PENJUALAN');
            $table->integer('ID_METODE_KIRIM')->nullable()->index('FK_METODE_KIRIM3');
            $table->dateTime('TGL_PENJUALAN');
            $table->date('TGL_KIRIM');
            $table->integer('ONGKOS_KIRIM');
            $table->integer('TOTAL_PENJUALAN');
            $table->tinyInteger('STATUS_PENJUALAN');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
}
