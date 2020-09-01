<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetilPengambilanBahanBakuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detil_pengambilan_bahan_baku', function (Blueprint $table) {
            $table->integer('ID_PENERIMAAN')->index('FK_TERDAPAT999123');
            $table->integer('KODE_PENGAMBILAN_BAHAN_BAKU')->index('FK_TERDAPAT0101');
            $table->float('JUMLAH_KG', 10, 0);
            $table->float('JUMLAH_SAK_KARUNG', 10, 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detil_pengambilan_bahan_baku');
    }
}
