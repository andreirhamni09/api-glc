<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenPesertaDidiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_peserta_didiks', function (Blueprint $table) {
            $table->increments('id');
            # ~~ Foreign Peserta Didiks NIP
            $table->string('nip_peserta_didiks', 15);
            # ~~
            $table->text('daf_dokumen');
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
        Schema::dropIfExists('dokumen_peserta_didiks');
    }
}
