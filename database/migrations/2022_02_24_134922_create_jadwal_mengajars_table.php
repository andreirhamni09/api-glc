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
            $table->unsignedMediumInteger('matakuliah_id');
            $table->foreign('matakuliah_id')->references('id')->on('mata_kuliahs');      
            $table->unsignedInteger('karyawan_id');
            $table->foreign('karyawan_id')->references('id')->on('karyawans');         
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
