<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProsesProduksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proses_produksi', function (Blueprint $table) {
            $table->integer('KODE_PRODUKSI', true);
            $table->integer('KODE_PENGAMBILAN_BAHAN_BAKU')->index('FK_TERDAPAT99');
            $table->dateTime('TGL_PRODUKSI');
            $table->double('HASIL_BAGUS_KG')->nullable();
            $table->double('HASIL_RUSAK_KG')->nullable();
            $table->string('EVALUASI_PRODUCT', 50)->nullable();
            $table->string('EVALUASI_MESIN', 50)->nullable();
            $table->longText('EVALUASI_BAHAN_BAKU')->nullable();
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
        Schema::dropIfExists('proses_produksi');
    }
}
