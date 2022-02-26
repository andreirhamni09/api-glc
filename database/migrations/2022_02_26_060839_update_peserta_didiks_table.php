<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePesertaDidiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('peserta_didiks', function (Blueprint $table) {
            $table->foreign('syarat_pendaftaran_id')->references('id')->on('syarat_pendaftarans');
            $table->foreign('jurusan_id')->references('id')->on('jurusans');
            $table->foreign('pendaftaran_id')->references('id')->on('pendaftarans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peserta_didiks', function (Blueprint $table) {
            $table->dropForeign(['syarat_pendaftaran_id']);

            $table->dropForeign(['jurusan_id']);

            $table->dropForeign(['pendaftaran_id']);
        });
    }
}
