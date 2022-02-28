<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiayaPendidikanPerGelombangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biaya_pendidikan_per_gelombangs', function (Blueprint $table) {
            $table->smallIncrements('id');
            # ~~ Foreign Jalur Pendaftaran
            $table->unsignedSmallInteger('id_jalur_pendaftarans');
            # ~~
            $table->string('gelombang', 45);
            $table->integer('cicilan_1');
            $table->integer('cicilan_2');
            $table->integer('cicilan_3');
            $table->integer('cicilan_4');
            $table->integer('cicilan_5');
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
        Schema::dropIfExists('biaya_pendidikan_per_gelombangs');
    }
}
