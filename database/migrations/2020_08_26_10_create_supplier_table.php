<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier', function (Blueprint $table) {
            $table->integer('ID_SUPPLIER', true);
            $table->string('KODE_KOTA', 13)->index('FK_MEMILIKI623');
            $table->string('NAMA_SUPPLIER', 50);
            $table->string('ALAMAT_SUPPLIER', 100);
            $table->tinyInteger('JENIS_KELAMIN_SUPPLIER');
            $table->string('NO_TELP_SUPPLIER', 13);
            $table->string('EMAIL_SUPPLIER', 75)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier');
    }
}
