<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Permision;
use Illuminate\Http\Request;
use App\Models\PermisionRole;
use Illuminate\Auth\Events\Failed;
use Illuminate\Support\Facades\Validator;

class PermisionRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        $permisionRoles = PermisionRole::getAll();
        if(count($permisionRoles) == 0)
        {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'get_message'   => 'Data Tidak Ditemukan',
                'data'          => null
            ], 422);
        }
        return response()->json([
            'success'       => true,
            'message'       => 'success',
            'get_message'   => 'Berikut Data Permision Role',
            'data'          => $permisionRoles
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request)
    {
        if(
            $request->input('id_roles') == null OR $request->input('id_permisions') == null OR
            is_array($request->input('id_permisions')) === false OR count($request->input('id_permisions')) == 0
        )
        {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'ins_message'   => 'Gagal Menambahkan Data Permision Role',
                'data'          => 'Data Role atau Permision Tidak Dimasukan Dengan Benar'
            ], 422);
        }

        for ($i=0; $i < count($request->input('id_permisions')); $i++) { 
            $dataPermisionRoles     = [
                'id_roles'          => $request->input('id_roles'),
                'id_permisions'     => $request->input('id_permisions')[$i]
            ];
            $rules                  = [
                'id_roles'          => ['required', 'exists:roles,id'],
                'id_permisions'     => ['required', 'exists:permisions,id']  
            ];
            $messages               = [
                'id_roles.required'         => 'Roles Harus Diisi',
                'id_roles.exists'           => 'Roles Tidak Ditemukan',
                'id_permisions.required'    => 'Permision Harus Diisi',
                'id_permisions.exists'      => 'Permision Tidak Ditemukan',
            ];

            $validator          = Validator::make($dataPermisionRoles, $rules, $messages);

            if($validator->fails())
            {
                return response()->json([
                    'success'       => false,
                    'message'       => 'false',
                    'ins_message'   => 'Gagal Memasukan Data Permision role',
                    'data'          => $validator->errors()
                ], 422);
            }

            try {
                $insPermisionRoles = new PermisionRole;
                $insPermisionRoles->id_roles        = $dataPermisionRoles['id_roles'];
                $insPermisionRoles->id_permisions   = $dataPermisionRoles['id_permisions'];
                $insPermisionRoles->save();
            } catch (\Throwable $ex) {
                return response()->json([
                    'success'       => false,
                    'message'       => 'failed',
                    'ins_message'   => 'Gagal Memasukan Data Permision Roles 2',
                    'data'          => $ex->getMessage()
                ], 422);
            }
        }
        
        $dataInsPermisions = [
            'id_roles'      => $request->input('id_roles'),
            'id_permisions' => implode(',', $request->input('id_permisions'))
        ];
        return response()->json([
            'success'       => true,
            'message'       => 'success',
            'ins_message'   => 'Berhasil Memasukan Data Permision Roles',
            'data'          => $dataInsPermisions
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function update(Request $request, $id)
    {
        $cekData = PermisionRole::findPermisionRoles($id);
        
        if(count($cekData) == 0){
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'upd_message'   => 'Permision Roles Tidak Ditemukan',
                'data'          => 'Not Found'
            ], 422);
        }

        $rules      = [
            'id_roles'          => ['required', 'exists:permision_roles,id_roles'],
            'id_permisions'     => ['required', 'unique:permision_roles,id_permisions']
        ];
        $messages   = [
            'id_roles.required'          => ['required', 'exists:permision_roles,id_roles'],
            'id_roles.exists'            => ['required', 'exists:permision_roles,id_roles'],
            'id_permisions.required'     => ['required', 'unique:permision_roles,id_permisions'],
            'id_permisions.unique'       => ['required', 'unique:permision_roles,id_permisions']
        ];
        $validator  = Validator::make($request->all(), $rules, $messages);
        if($validator->fails())
        {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'upd_message'   => 'Gagal Update Permision Role',
                'data'          => $validator->errors()
            ], 422);
        }

        try {
            $findPermisionRole = PermisionRole::find($id);
            $findPermisionRole->update($request->all());
            return response()->json([
                'success'       => true,
                'message'       => 'success',
                'upd_message'   => 'Berhasil Melakukan Update Data',
                'data'          => $request->all()
            ], 200);
        } catch (\Throwable $ex) {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'upd_message'   => 'Gagal Update Permision Role',
                'data'          => $ex->getMessage()
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function destroy($id)
    {
        $findPermisionRole = PermisionRole::findPermisionRoleByIdRoles($id);
        if(count($findPermisionRole) == 0)
        {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'del_message'   => 'Gagal Hapus Permision Role',
                'data'          => 'Data Tidak Ditemukan'
            ], 422);
        }
        
        try {
            $delPermisionRoles = PermisionRole::deletePermisionRole($id);
            return response()->json([
                'success'       => true,
                'message'       => 'success',
                'del_message'   => 'Berhasil Hapus Permision Role',
                'data'          => 'Data Telah Dihapus'
            ], 200);
        } catch (\Throwable $ex) {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'del_message'   => 'Gagal Hapus Permision Role',
                'data'          => $ex->getMessage()
            ], 422);
        }
    }
}
