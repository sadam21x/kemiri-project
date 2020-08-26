<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEvaluasiKinerjaSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evaluasi_kinerja_sales', function (Blueprint $table) {
            $table->foreign('ID_PENJUALAN', 'FK_TERDAPAT99111')->references('ID_PENJUALAN')->on('penjualan')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evaluasi_kinerja_sales', function (Blueprint $table) {
            $table->dropForeign('FK_TERDAPAT99111');
        });
    }
}
