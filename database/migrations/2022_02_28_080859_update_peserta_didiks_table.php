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
            $table->foreign('id_jurusans')->references('id')->on('jurusans');
            $table->foreign('id_pendaftarans')->references('id')->on('pendaftarans');
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
            $table->dropForeign(['id_jurusans']);
            $table->dropForeign(['id_pendaftarans']);
        });
    }
}
