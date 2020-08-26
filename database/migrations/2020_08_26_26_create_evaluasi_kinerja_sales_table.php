<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluasiKinerjaSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluasi_kinerja_sales', function (Blueprint $table) {
            $table->integer('ID_EVALUASI_KINERJA_SALES', true);
            $table->integer('ID_PENJUALAN')->index('FK_TERDAPAT99111');
            $table->date('TGL_EVALUASI_KINERJA_SALES');
            $table->string('EVALUASI_SALES_1', 50);
            $table->string('EVALUASI_SALES_2', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluasi_kinerja_sales');
    }
}
