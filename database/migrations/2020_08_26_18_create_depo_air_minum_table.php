<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepoAirMinumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depo_air_minum', function (Blueprint $table) {
            $table->integer('KODE_DEPO', true);
            $table->string('KODE_KOTA', 13)->index('FK_MEMILIKIE0R9');
            $table->integer('ID_SALES_A')->index('FK_MENCATAT');
            $table->string('NAMA_CUSTOMER', 50);
            $table->string('NAMA_DEPO', 50);
            $table->string('ALAMAT_DEPO', 100);
            $table->string('NO_TELP_DEPO', 20)->nullable();
            $table->string('EMAIL_DEPO', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('depo_air_minum');
    }
}
