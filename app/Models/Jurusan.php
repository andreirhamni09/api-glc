<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Jurusan extends Model
{
    use HasFactory;
    
    public $primaryKey  = 'id';
    protected $fillable = [
        'id', 'jurusan', 'updated_at'
    ];

    static function getAllJurusan(){
        $jurusan = DB::table('jurusans')->get();
        return $jurusan;
    }
}
