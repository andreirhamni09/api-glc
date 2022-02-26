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
            # ~~ Foreign MataKuliahs
            $table->foreign('matakuliahs_id')->references('id')->on('mata_kuliahs');
            # ~~
            # ~~ Foreign PesertaDidiks
            $table->foreign('peserta_didiks_nip')->references('nip')->on('peserta_didiks');
            # ~~
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
            $table->dropForeign(['matakuliahs_id']);
            $table->dropForeign(['peserta_didiks_nip']);
        });
    }
}
