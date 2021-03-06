<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriPerkuliahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi_perkuliahans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedMediumInteger('id_matakuliahs');
            $table->string('pertemuan', 45);
            $table->text('jud_materi');
            $table->text('file_materi');
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
        Schema::dropIfExists('materi_perkuliahans');
    }
}
