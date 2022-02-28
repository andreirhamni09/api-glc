<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalMengajarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_mengajars', function (Blueprint $table) {
            # ~~ Foreign Karyawan
            $table->unsignedInteger('id_karyawans');
            # ~~
            # ~~ Foreign Matakuliah
            $table->unsignedMediumInteger('id_mata_kuliahs');
            # ~~
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
        Schema::dropIfExists('jadwal_mengajars');
    }
}
