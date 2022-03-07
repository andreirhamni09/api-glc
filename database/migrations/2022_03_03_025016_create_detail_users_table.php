<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_users');
            $table->string('nip', 15);
            $table->string('nmr_telepon_ortu', 15);
            $table->string('tmp_lahir', 45);
            $table->string('asl_sekolah', 45);
            $table->string('kecamatan', 45);
            $table->string('kde_pos', 45);
            $table->enum('wkt_belajar', ['pagi', 'siang', 'malam']);
            $table->text('alamat');
            $table->string('pekerjaan', 100);
            $table->string('nma_instansi', 100);
            $table->string('no_telepon_instansi', 15);
            $table->string('id_jurusans', 10);
            $table->text('alm_instansi');
            $table->unsignedInteger('id_pendaftarans');
            $table->enum('sts_peserta_didiks', ['pembayaran', 'upload_dokumen', 'siswa', 'lulus', 'dropout']);
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
        Schema::dropIfExists('detail_users');
    }
}
