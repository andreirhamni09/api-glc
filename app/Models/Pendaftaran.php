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
                        ->join('tanggal_pendaftarans', 'pendaftarans.id', '=', 'tanggal_pendaftarans.id_pendaftarans')
                        ->select('pendaftarans.*', 
                                'jalur_pendaftarans.nama_jalur as jalur', 
                                'tanggal_pendaftarans.gelombang as gelombang',
                                'tanggal_pendaftarans.tanggal_mulai as tanggal_mulai',
                                'tanggal_pendaftarans.tanggal_selesai as tanggal_selesai',
                                'tanggal_pendaftarans.bya_pendidikan as bya_pendidikan',
                                'tanggal_pendaftarans.pot_pendidikan as pot_pendidikan')
                        ->get();
        return $pendaftarans;
    }

}
