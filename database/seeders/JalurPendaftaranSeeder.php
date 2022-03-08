<?php

namespace Database\Seeders;

use App\Models\JalurPendaftaran;
use Illuminate\Database\Seeder;
class JalurPendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr_jalurPendaftarans = array(
            'Mandiri',
            'Paket A Akademik',
            'Paket A Nonakademik',
            'Paket B Akademik',
        );

        foreach ($arr_jalurPendaftarans as $value) {
            $jalurPendaftarans = new JalurPendaftaran;

            $jalurPendaftarans->nama_jalur = $value;

            $jalurPendaftarans->save();
        }

        
    }
}
