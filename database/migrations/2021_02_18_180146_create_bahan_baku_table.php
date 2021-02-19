<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBahanBakuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahan_baku', function (Blueprint $table) {
            $table->integer('KODE_BAHAN_BAKU', true);
            $table->integer('ID_JENIS_BAHAN_BAKU')->index('FK_TERDAPAT');
            $table->string('NAMA_BAHAN_BAKU', 75);
            $table->double('STOK_BAHAN_BAKU');
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
        Schema::dropIfExists('bahan_baku');
    }
}
