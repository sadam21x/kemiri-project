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
            $table->float('JUMLAH_KG', 10, 0)->nullable();
            $table->float('JUMLAH_SAK_KARUNG', 10, 0)->nullable();
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
