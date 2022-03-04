<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedMediumInteger('id_roles');
            $table->text('gmb_profile');
            $table->string('nmr_telepon', 15);
            $table->enum('agama', ['islam', 'kriten', 'kriten_katolik', 'hindu', 'budha']);
            $table->enum('jen_kelamin', ['pria', 'wanita']);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
