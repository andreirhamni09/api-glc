<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMateriPerkuliahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('materi_perkuliahans', function (Blueprint $table) {
            # ~~ Foreign MataKuliah
            $table->foreign('matakuliahs_id')->references('id')->on('mata_kuliahs');
            # ~~
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('materi_perkuliahans', function (Blueprint $table) {
            $table->dropForeign(['matakuliahs_id']);
        });
    }
}
