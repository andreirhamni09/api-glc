<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBiayaPendidikanPerGelombangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('biaya_pendidikan_per_gelombangs', function (Blueprint $table) {
            $table->foreign('id_jalur_pendaftarans')->references('id')->on('jalur_pendaftarans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('biaya_pendidikan_per_gelombangs', function (Blueprint $table) {
            $table->dropForeign(['id_jalur_pendaftarans']);
        });
    }
}
