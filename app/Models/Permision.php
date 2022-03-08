<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Permision extends Model
{
    use HasFactory;

    public $primaryKey = 'id';
    protected $fillable = [
        'action',
        'url'
    ];

    static function getAll(){
        $permisions = DB::table('permisions')
                    ->get();
        return $permisions;
    }

    static function findPermision($id)
    {
        $permisions = DB::table('permisions')
                    ->where('id', '=', $id)
                    ->get();
        return $permisions;
    }
}
