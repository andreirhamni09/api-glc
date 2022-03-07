<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUppPesertaDidiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('upp_peserta_didiks', function (Blueprint $table) {
            $table->foreign('id_peserta_didik')->references('id')->on('detail_users');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('upp_peserta_didiks', function (Blueprint $table) {
            $table->dropForeign(['id_peserta_didik']);
        });
    }
}
