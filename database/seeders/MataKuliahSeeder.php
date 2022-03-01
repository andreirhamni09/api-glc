<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MataKuliah;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mataKuliahs = new MataKuliah;

        $mataKuliahs->id_jurusans   = '004';
        $mataKuliahs->matakuliah    = 'Bahasa Inggris';
        $mataKuliahs->hari          = 'Senin|Selasa';
        $mataKuliahs->jam_mulai     = '09:45|08:00';
        $mataKuliahs->jam_selesai   = '11:45|10:00';
        $mataKuliahs->semester      = 1;

        $mataKuliahs->save();
    }
}
