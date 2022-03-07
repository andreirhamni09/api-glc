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
        $arr_jurusan = array(
            '001' => 'Manajamen Informatika',
            '002' => 'Parawisata & Perhotelan',
            '003' => 'Pemasaran',
            '004' => 'Administrasi Perkantoran',
            '005' => 'Bahasa Inggris (GES)',
            '006' => 'Akutansi', 
        );
        foreach ($arr_jurusan as $key => $value) {
            $jurusans = new Jurusan;
            
            $jurusans->id       = $key;
            $jurusans->jurusan  = $value;

            $jurusans->save();
        }

    }
}
