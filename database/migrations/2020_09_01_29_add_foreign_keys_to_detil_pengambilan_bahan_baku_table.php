<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetilPengambilanBahanBakuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detil_pengambilan_bahan_baku', function (Blueprint $table) {
            $table->foreign('ID_PENERIMAAN', 'FK_TERDAPAT999123')->references('ID_PENERIMAAN')->on('penerimaan_bahan_baku')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('KODE_PENGAMBILAN_BAHAN_BAKU', 'FK_TERDAPAT0101')->references('KODE_PENGAMBILAN_BAHAN_BAKU')->on('pengambilan_bahan_baku')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detil_pengambilan_bahan_baku', function (Blueprint $table) {
            $table->dropForeign('FK_TERDAPAT999123');
            $table->dropForeign('FK_TERDAPAT0101');
        });
    }
}
