<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDetailJalurPendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_jalur_pendaftarans', function (Blueprint $table) {
            # ~~ Foreign JalurPendaftaran
            $table->foreign('jalur_pendaftarans_id')->references('id')->on('jalur_pendaftarans');
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
        Schema::table('detail_jalur_pendaftarans', function (Blueprint $table) {
            $table->dropForeign(['jalur_pendaftarans_id']);
        });
    }
}
