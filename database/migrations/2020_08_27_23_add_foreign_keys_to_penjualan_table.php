<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penjualan', function (Blueprint $table) {
            $table->foreign('ID_MANAJER_MARKETING', 'FK_KONFIRMASI')->references('ID_MANAJER_MARKETING')->on('manajer_marketing')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('ID_SALES_B', 'FK_MENGINPUTKAN')->references('ID_SALES_B')->on('sales_b')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('ID_KONFIRMASI_PENJUALAN', 'FK_TERDAPAT1123')->references('ID_KONFIRMASI_PENJUALAN')->on('konfirmasi_penjualan')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penjualan', function (Blueprint $table) {
            $table->dropForeign('FK_KONFIRMASI');
            $table->dropForeign('FK_MENGINPUTKAN');
            $table->dropForeign('FK_TERDAPAT1123');
        });
    }
}
