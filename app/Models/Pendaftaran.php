<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pendaftaran extends Model
{
    use HasFactory;

    public $primaryKey = 'id';
    protected $fillable = [
        'id_jalurs',
        'angkatan',
        'syr_pendidikan',
        'nma_angkatan'
    ];
    
    static function getAll(){
        $pendaftarans = DB::table('pendaftarans')
                        ->join('jalur_pendaftarans', 'pendaftarans.id_jalurs', '=', 'jalur_pendaftarans.id')
                        ->select('pendaftarans.*', 'jalur_pendaftarans.nama_jalur as jalur')
                        ->get();
        return $pendaftarans;
    }

    static function findPendaftaran($id){
        $pendaftarans = DB::table('pendaftarans')
                        ->where('id', '=', $id)
                        ->get();
        /* $pendaftarans = Pendaftaran::find($id); */
        return $pendaftarans;
    }

}

