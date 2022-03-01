<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MateriPerkuliahan;

class MateriPerkuliahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materiPerkuliahan                  = new MateriPerkuliahan;

        $materiPerkuliahan->id_mata_kuliahs = 1;
        $materiPerkuliahan->pertemuan       = 'Pertemuan 1';
        $materiPerkuliahan->jud_materi      = 'NOUN dalam Bahasa Inggris Jenis & Fungsinya';
        $materiPerkuliahan->file_materi     = '1_1_noun_dalam_bahasa_inggris_jenis_dan_fungsinya.png';

        $materiPerkuliahan->save();
    }
}
