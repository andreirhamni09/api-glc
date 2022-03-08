<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JalurPendaftaran extends Model
{
    use HasFactory;

    public $primaryKey = 'id';

    protected $fillable = [
        'nama_jalur'
    ];

    static function getAll(){
        $jalurPendaftarans = DB::table('jalur_pendaftarans')->get();
        return $jalurPendaftarans;
    }

    static function findJalurPendaftaran($id)
    {
        $jalurPendaftarans = DB::table('jalur_pendaftarans')
                            ->where('id', '=', $id)
                            ->get();
        return $jalurPendaftarans;
    }
}
