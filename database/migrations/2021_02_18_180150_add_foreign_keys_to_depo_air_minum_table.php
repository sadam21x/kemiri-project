<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDepoAirMinumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('depo_air_minum', function (Blueprint $table) {
            $table->foreign('KODE_KOTA', 'FK_MEMILIKIE0R9')->references('id')->on('indonesia_cities')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('ID_SALES_A', 'FK_MENCATAT')->references('ID_SALES_A')->on('sales_a')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('ID_MANAJER_MARKETING', 'FK_MENCATAT1234')->references('ID_MANAJER_MARKETING')->on('manajer_marketing')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('ID_SALES_B', 'FK_MENCATAT1235')->references('ID_SALES_B')->on('sales_b')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('ID_OWNER', 'FK_OWNER_DEPO')->references('ID_OWNER')->on('owner')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('depo_air_minum', function (Blueprint $table) {
            $table->dropForeign('FK_MEMILIKIE0R9');
            $table->dropForeign('FK_MENCATAT');
            $table->dropForeign('FK_MENCATAT1234');
            $table->dropForeign('FK_MENCATAT1235');
            $table->dropForeign('FK_OWNER_DEPO');
        });
    }
}
