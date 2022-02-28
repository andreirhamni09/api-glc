<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kodeJurusan    = array('001', '002', '003', '004', '005', '006');
        $namaJurusan        = array('Manajemen Informatika', 'Administrasi Perkantoran', 'Parawisata & Perhotelan', 'Bahasa Inggris', 'Pemasaran', 'Akutansi');
        for ($i=0; $i < count($kodeJurusan) ; $i++) { 
            $jurusan            = new Jurusan;

            $jurusan->id        = $kodeJurusan[$i];
            $jurusan->jurusan   = $namaJurusan[$i];

            $jurusan->save();
        }
    }
}
