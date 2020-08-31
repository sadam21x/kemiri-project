<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_product', function (Blueprint $table) {
            $table->integer('KODE_HASIL_PRODUCT', true);
            $table->integer('KODE_PRODUKSI')->index('FK_TERDAPAT999');
            $table->integer('KODE_PRODUCT')->index('FK_TERDAPAT93312');
            $table->float('HASIL_BAGUS_PCS', 10, 0)->nullable();
            $table->float('HASIL_RUSAK_PCS', 10, 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_product');
    }
}
