<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaDidiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta_didiks', function (Blueprint $table) {
            $table->string('nip', 15)->primary();
            $table->string('gmb_profile', 100);
            $table->string('nama_lengkap', 100);
            $table->string('email', 100)->unique();
            $table->text('password');
            $table->char('no_telepon', 15);
            $table->char('no_telepon_ortu', 15);
            $table->string('tem_lahir', 45);
            $table->date('tgl_lahir');
            $table->string('jen_kelamin');
            $table->enum('agama', ['islam', 'kristen', 'hindu', 'budha']);
            $table->string('asl_sekolah', 25);
            $table->string('kecamatan', 45);
            $table->string('kod_pos', 10);
            $table->enum('wkt_belajar', ['pagi', 'siang', 'malam']);
            $table->text('alamat');
            $table->string('pekerjaan', 45)->nullable();
            $table->string('nama_instansi', 100)->nullable();
            $table->string('no_telepon_instansi', 15)->nullable();
            $table->text('alamat_instansi')->nullable();
            $table->enum('stat_peserta_didik', ['pembayaran', 'upload_dokumen', 'siswa']);
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
        Schema::dropIfExists('peserta_didiks');
    }
}
