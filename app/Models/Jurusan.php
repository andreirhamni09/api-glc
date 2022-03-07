<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Jurusan extends Model
{
    use HasFactory;

    public $primaryKey = 'id';
    protected $fillable = [
        'id',
        'jurusan',
        'updated_at',
    ];

    static function getAll(){
        $jurusanAll = DB::table('jurusans')->get();
        return $jurusanAll;
    }

    static function findJurusan($id)
    {
        $f_jurusan = DB::table('jurusans')->where('id', '=', $id)->get();
        return $f_jurusan;
    }


}
