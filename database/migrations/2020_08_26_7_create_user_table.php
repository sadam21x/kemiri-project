<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->integer('ID_USER', true);
            $table->string('KODE_KOTA', 13)->index('FK_MEMILIKI0384');
            $table->integer('KODE_JABATAN')->index('FK_TERDAPAT545');
            $table->string('USERNAME_USER', 100);
            $table->string('PASSWORD_USER', 50);
            $table->string('NAMA_USER', 100);
            $table->string('ALAMAT_USER', 100);
            $table->tinyInteger('JENIS_KELAMIN_USER');
            $table->string('NO_TELP_USER', 13)->nullable();
            $table->string('EMAIL_USER', 75);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
