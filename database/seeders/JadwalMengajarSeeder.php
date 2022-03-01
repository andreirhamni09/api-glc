<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JadwalMengajar;

class JadwalMengajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jadwalMengajars                    = new JadwalMengajar;

        $jadwalMengajars->id_karyawans      = 2;
        $jadwalMengajars->id_mata_kuliahs   = 1;
        
        $jadwalMengajars->save();
    }
}
