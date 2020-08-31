<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluasiKinerjaSalesATable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluasi_kinerja_sales_a', function (Blueprint $table) {
            $table->integer('ID_EVALUASI_KINERJA_SALES_A', true);
            $table->integer('ID_MANAJER_MARKETING')->index('FK_MELAKUKAN1');
            $table->integer('ID_SALES_A')->index('FK_MEMILIKI123');
            $table->date('TGL_EVALUASI_KINERJA_SALES_A');
            $table->string('EVALUASI_SALES_A', 300);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluasi_kinerja_sales_a');
    }
}
