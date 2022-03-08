<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr_roles = array(
            'Admin',
            'Peserta Didik'
        );

        foreach ($arr_roles as $value) {
            $roles              = new Role;
            
            $roles->nama_roles  = $value;

            $roles->save();
        }
    }
}
