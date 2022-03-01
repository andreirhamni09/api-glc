<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Karyawan;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $d_gmb_profile              = array('1_admin_gec.png', '2_soviana_diana_arnanda.png');
        $d_nama_lengkap             = array('Admin Gec', 'Soviana Diana Arnanda');    
        $d_email                    = array('geniuscollegepbun@gmail.com', 'soviadyana@gmail.com');
        $d_password                 = array(crypt('admingec', '753'), crypt('dosengec', '753'));
        $d_status                   = array('admin', 'dosen');
        $d_nmr_telepon              = array('081996605018', '085821048369');   

        for ($i=0; $i < count($d_email); $i++) {
            $karyawans                  = new Karyawan;
        
            $karyawans->gmb_profile     = $d_gmb_profile[$i];
            $karyawans->nama_lengkap    = $d_nama_lengkap[$i];
            $karyawans->email           = $d_email[$i];
            $karyawans->password        = $d_password[$i];
            $karyawans->status          = $d_status[$i];
            $karyawans->nmr_telepon     = $d_nmr_telepon[$i];
    
            $karyawans->save();
        }
        
    }
}
