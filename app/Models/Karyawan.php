<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Karyawan extends Model
{
    use HasFactory;

    public $primaryKey  = 'id';
    protected $fillable = [
        'nama_lengkap', 'gmb_profile', 'email', 'password', 'status', 'nmr_telepon', 'updated_at'
    ];

    static function getKaryawanAll(){
        $karyawan = DB::table('karyawans')->get();
        return $karyawan;
    }
}
