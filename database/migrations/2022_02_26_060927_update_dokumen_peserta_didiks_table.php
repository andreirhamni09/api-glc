<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDokumenPesertaDidiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dokumen_peserta_didiks', function (Blueprint $table) {
            $table->foreign('nip_peserta_didik')->references('nip')->on('peserta_didiks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dokumen_peserta_didiks', function (Blueprint $table) {
            $table->dropForeign(['nip_peserta_didik']);
        });
    }
}
