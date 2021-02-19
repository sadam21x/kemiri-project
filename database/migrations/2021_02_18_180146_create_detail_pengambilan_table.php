<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPengambilanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pengambilan', function (Blueprint $table) {
            $table->integer('ID_PENERIMAAN');
            $table->integer('KODE_PENGAMBILAN')->index('FK_TERDAPAT633');
            $table->double('JUMLAH_KG')->nullable();
            $table->double('JUMLAH_SAK_KARUNG')->nullable();
            $table->primary(['ID_PENERIMAAN', 'KODE_PENGAMBILAN']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pengambilan');
    }
}
