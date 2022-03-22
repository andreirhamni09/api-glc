<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MataKuliah extends Model
{
    use HasFactory;

    public $primaryKey = 'id';
    protected $fillable = [
        'id_jurusans',
        'matakuliah',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'semester'
    ];

    static function getAll(){
        $matakuliah = DB::table('mata_kuliahs')
                    ->join('jurusans', 'mata_kuliahs.id_jurusans', '=', 'jurusans.id')
                    ->select('mata_kuliahs.*', 'jurusans.jurusan as jurusan')
                    ->get();
        return $matakuliah;
    }

    static function findMataKuliah($id)
    {
        $matakuliah = DB::table('mata_kuliahs')
                    ->join('jurusans', 'mata_kuliahs.id_jurusans', '=', 'jurusans.id')
                    ->select('mata_kuliahs.*', 'jurusans.jurusan')
                    ->where('mata_kuliahs.id', '=', $id)
                    ->get();
        return $matakuliah;
    }
}
