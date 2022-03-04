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
            $table->foreign('id_users')->references('id')->on('users');
            $table->foreign('id_matakuliah')->references('id')->on('mata_kuliahs');
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
            $table->dropForeign(['id_users']);
            $table->dropForeign(['id_matakuliah']);
        });
    }
}
