<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailJalurPendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_jalur_pendaftarans', function (Blueprint $table) {
            $table->smallIncrements('id');
            # ~~ Foreign JalurPendaftaran
            $table->unsignedSmallInteger('jalur_pendaftarans_id');
            # ~~
            $table->string('detail_jalur', 30);
            $table->smallInteger('pot_gelombang_1');
            $table->smallInteger('pot_gelombang_2');
            $table->smallInteger('pot_gelombang_3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_jalur_pendaftarans');
    }
}
