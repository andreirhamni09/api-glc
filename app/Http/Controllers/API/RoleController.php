<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::getAll();

        if(count($roles) == 0){
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'get_message'   => 'Data Belum Diinputkan',
                'data'          => null
            ], 422);
        }

        return response()->json([
            'success'       => true,
            'message'       => 'success',
            'get_message'   => 'Data Role',
            'data'          => $roles
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules      = [
            'nama_roles' => 'required|unique:roles,nama_roles|min:3|max:25'
        ];
        $messages   = [
            'nama_roles.required'   => 'Nama Role Wajib Diisi',
            'nama_roles.unique'     => 'Nama Role Telah Digunakan',
            'nama_roles.min'        => 'Nama Role Minimal Diisi Dengan 3 Karakter',
            'nama_roles.max'        => 'Nama Role Maksimal Diisi Dengan 25 Karakter',
        ];
        $validator  = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'ins_message'   => 'Gagal Menambahkan Data Role',
                'data'          => $validator->errors()
            ], 422);
        }

        try {
            $roles = Role::create($request->all());

            return response()->json([
                'success'       => true,
                'message'       => 'success',
                'ins_message'   => 'Berhasil Menambahkan Data Role',
                'data'          => $request->all()
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'ins_message'   => 'Gagal Menambahkan Data Role',
                'data'          => $e->getMessage()
            ], 422);
        }
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
    public function update(Request $request, $id)
    {
        $roles = Role::findRoles($id);

        if(count($roles) == 0){
            return response()->json([
                'success'       => true,
                'message'       => 'failed',
                'upd_message'   => 'failed',
                'data'          => 'Data Tidak Ditemukan'
            ], 422);
        }
        
        $rules      = [
            'nama_roles' => 'required|unique:roles,nama_roles|min:3|max:25'
        ];
        $messages   = [
            'nama_roles.required'   => 'Nama Role Wajib Diisi',
            'nama_roles.unique'     => 'Nama Role Telah Digunakan',
            'nama_roles.min'        => 'Nama Role Minimal Diisi Dengan 3 Karakter',
            'nama_roles.max'        => 'Nama Role Maksimal Diisi Dengan 25 Karakter',
        ];
        $validator  = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'upd_message'   => 'Gagal Update Role',
                'data'          => $validator->errors()
            ], 422);
        }

        try {
            $u_roles = Role::find($id);
            $u_roles->update($request->all());
            return response()->json([
                'success'       => true,
                'message'       => 'failed',
                'upd_message'   => 'Berhasil Update Role',
                'data'          => $request->all()
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'upd_message'   => 'Gagal Update Role',
                'data'          => $e->getMessage()
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roles = Role::findRoles($id);

        if(count($roles) == 0){
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'del_message'   => 'Gagal Update Role',
                'data'          => 'Data Tidak Ditemukan'
            ], 422);
        }

        try {
            $d_roles = Role::find($id);
            $d_roles->delete($id);
            return response()->json([
                'success'       => true,
                'message'       => 'success',
                'del_message'   => 'Gagal Update Role',
                'data'          => 'Berhasil Hapus Data Role'
            ], 200);

        } catch (\Throwable $e) {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'del_message'   => 'Gagal Update Role',
                'data'          => $e->getMessage()
            ], 422);
        }
    }
}
