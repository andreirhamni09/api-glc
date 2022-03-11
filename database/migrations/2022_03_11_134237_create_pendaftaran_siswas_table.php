<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran_siswas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_peserta_didiks');
            $table->string('jlr_pendaftaran');
            $table->string('gelombang');
            $table->string('bya_pendidikan');
            $table->string('pot_pendidikan');
            $table->date('tgl_daftar');
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
        Schema::dropIfExists('pendaftaran_siswas');
    }
}
