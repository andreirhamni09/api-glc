<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PermisionRole extends Model
{
    use HasFactory;

    public $primaryKey = 'id';
    protected $fillable = [
        'id_roles',
        'id_permisions'
    ];

    static function getAll(){
        $permisionRoles = DB::table('permision_roles')
                        ->join('roles', 'permision_roles.id_roles', '=', 'roles.id')
                        ->join('permisions', 'permision_roles.id_permisions', '=', 'permisions.id')
                        ->select('permision_roles.*', 'roles.nama_roles as roles', 'permisions.action as action', 'permisions.url as url')
                        ->get();
        return $permisionRoles;
    }

    static function findPermisionRoles($id){
        $permisionRoles = DB::table('permision_roles')
                        ->where('id', '=', $id)
                        ->get();

        return $permisionRoles;
    }
    
}
