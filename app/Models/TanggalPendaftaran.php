<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TanggalPendaftaran extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_pendaftarans',
        'gelombang',
        'tanggal_mulai',
        'tanggal_selesai',
        'bya_pendidikan',
        'pot_pendidikan'
    ];

    static function getAll(){
        $tanggalPendaftaran = DB::table('tanggal_pendaftarans')->get();
        return $tanggalPendaftaran;
    }

    static function findTanggalPendaftaran($id){
        $findTanggalPendaftaran = DB::table('tanggal_pendaftarans')
                                ->where('id', '=', $id)
                                ->get();
        return $findTanggalPendaftaran;
    }
}
