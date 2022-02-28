<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateJadwalMengajarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jadwal_mengajars', function (Blueprint $table) {
            $table->foreign('id_karyawans')->references('id')->on('karyawans');
            $table->foreign('id_mata_kuliahs')->references('id')->on('mata_kuliahs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jadwal_mengajars', function (Blueprint $table) {
            $table->dropForeign(['id_karyawans']);
            $table->dropForeign(['id_mata_kuliahs']);
        });
    }
}
