<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendataransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendatarans', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('angkatan');
            $table->string('nama_angkatan', 45);
            $table->string('gelombang_1', 45);
            $table->string('gelombang_2', 45);
            $table->string('gelombang_3', 45);
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
        Schema::dropIfExists('pendatarans');
    }
}
