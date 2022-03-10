<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
