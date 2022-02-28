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
            $table->foreign('id_mata_kuliahs')->references('id')->on('mata_kuliahs');
            $table->foreign('nip_peserta_didiks')->references('nip')->on('peserta_didiks');
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
            $table->dropForeign(['id_mata_kuliahs']);
            $table->dropForeign(['nip_peserta_didiks']);
        });
    }
}
