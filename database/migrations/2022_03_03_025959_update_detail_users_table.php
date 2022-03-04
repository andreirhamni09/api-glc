<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDetailUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_users', function (Blueprint $table) {
            $table->foreign('id_users')->references('id')->on('users');            
            $table->foreign('id_jurusans')->references('id')->on('jurusans');            
            $table->foreign('id_pendaftarans')->references('id')->on('pendaftarans');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_users', function (Blueprint $table) {
            $table->dropForeign(['id_users']);
            $table->dropForeign(['id_jurusans']);
            $table->dropForeign(['id_pendaftarans']);
        });
    }
}
