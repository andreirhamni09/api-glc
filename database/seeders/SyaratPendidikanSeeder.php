<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SyaratPendidikan;

class SyaratPendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $syarat = array('sma', 'ma', 'paket_c', 's_1');
        
        foreach ($syarat as $value) {
            $syaratPendidikan = new SyaratPendidikan;
            $syaratPendidikan->syarat = $value;        
            $syaratPendidikan->save();
        }
    }
}
