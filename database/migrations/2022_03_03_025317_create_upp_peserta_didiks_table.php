<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUppPesertaDidiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upp_peserta_didiks', function (Blueprint $table) {
            $table->unsignedInteger('id_peserta_didik');
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
        Schema::dropIfExists('upp_peserta_didiks');
    }
}
