<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pendaftaran;

class PendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pendaftarans = new Pendaftaran;
        $pendaftarans->id_jalurs        = 1;
        $pendaftarans->angkatan         = 15;
        $pendaftarans->syr_pendidikan   = 'SMA, MA, PAKET C, SARJANA';
        $pendaftarans->nma_angkatan     = 'GEC 15';

        $pendaftarans->save();
    }
}
