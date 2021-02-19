<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenerimaanBahanBakuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerimaan_bahan_baku', function (Blueprint $table) {
            $table->integer('ID_PENERIMAAN', true);
            $table->integer('ID_SUPPLIER')->index('FK_MENGIRIM');
            $table->integer('KODE_BAHAN_BAKU')->index('FK_TERDAPAT5579');
            $table->integer('ID_ADMIN_GUDANG')->index('FK_MENERIMA');
            $table->integer('ID_OWNER')->nullable()->index('FK_OWNER_PENERIMAAN');
            $table->date('TGL_KEDATANGAN');
            $table->string('SATUAN', 25);
            $table->double('TOTAL_BERAT');
            $table->double('JUMLAH_KARUNG_SAK');
            $table->double('ISI_KARUNG');
            $table->double('STOK_PENERIMAAN', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penerimaan_bahan_baku');
    }
}
