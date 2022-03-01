<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('nama_lengkap', 100);
            $table->text('gmb_profile');
            $table->string('email', 100)->unique();
            $table->text('password');
            $table->enum('status', ['admin', 'dosen']);
            $table->string('nmr_telepon', 15);
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
        Schema::dropIfExists('karyawans');
    }
}
