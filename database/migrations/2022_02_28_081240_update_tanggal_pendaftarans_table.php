<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTanggalPendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tanggal_pendaftarans', function (Blueprint $table) {
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
        Schema::table('tanggal_pendaftarans', function (Blueprint $table) {
            $table->dropForeign(['id_pendaftarans']);
        });
    }
}
