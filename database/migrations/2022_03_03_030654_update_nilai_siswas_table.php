<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNilaiSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nilai_siswas', function (Blueprint $table) {
            $table->foreign('id_matakuliahs')->references('id')->on('mata_kuliahs');
            $table->foreign('id_peserta_didiks')->references('id')->on('detail_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nilai_siswas', function (Blueprint $table) {
            $table->dropForeign(['id_matakuliahs']);
            $table->dropForeign(['id_peserta_didiks']);
        });
    }
}
