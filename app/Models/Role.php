<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    use HasFactory;
    
    public $primaryKey = 'id';
    protected $fillable = [
        'nama_roles'
    ];

    static function getAll(){
        $roles = DB::table('roles')->get();
        return $roles;
    }

    static function findRoles($id)
    {
        $roles = DB::table('roles')
                 ->get();
        return $roles;
    }
}
