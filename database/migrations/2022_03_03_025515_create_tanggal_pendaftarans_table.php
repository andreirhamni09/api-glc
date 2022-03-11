<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanggalPendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanggal_pendaftarans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_pendaftarans');
            $table->string('gelombang', 45);
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->integer('bya_pendidikan');
            $table->tinyInteger('pot_pendidikan');
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
        Schema::dropIfExists('tanggal_pendaftarans');
    }
}
