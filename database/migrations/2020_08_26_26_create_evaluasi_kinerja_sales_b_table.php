<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluasiKinerjaSalesBTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluasi_kinerja_sales_b', function (Blueprint $table) {
            $table->integer('ID_EVALUASI_KINERJA_SALES_B', true);
            $table->integer('ID_MANAJER_MARKETING')->index('FK_MELAKUKAN2');
            $table->integer('ID_SALES_B')->index('FK_MEMILIKI1234');
            $table->date('TGL_EVALUASI_KINERJA_SALES_B');
            $table->string('EVALUASI_SALES_B', 300);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluasi_kinerja_sales_b');
    }
}
