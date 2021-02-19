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
            $table->foreign('ID_METODE_KIRIM', 'FK_METODE_KIRIM3')->references('ID_METODE_KIRIM')->on('metode_kirim')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('ID_OWNER', 'FK_OWNER_PENJUALAN')->references('ID_OWNER')->on('owner')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('KODE_DEPO', 'FK_TERDAPAT959123')->references('KODE_DEPO')->on('depo_air_minum')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
            $table->dropForeign('FK_METODE_KIRIM3');
            $table->dropForeign('FK_OWNER_PENJUALAN');
            $table->dropForeign('FK_TERDAPAT959123');
        });
    }
}
