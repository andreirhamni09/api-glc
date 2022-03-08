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
                'success'   => true,
                'message'   => 'null',
                'data'      => 'Belum Ada Data Jurusan Yang Diinputkan'
            ], 422);
        }

        return response()->json([
            'success'   => true,
            'message'   => 'success',
            'data'      => $roles
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
                'message'       => 'fail',
                'err_message'   => $validator->errors()
            ], 422);
        }

        try {
            $roles = Role::create($request->all());

            return response()->json([
                'success'       => true,
                'message'       => 'success',
                'data'          => $request->all()
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'success'       => false,
                'message'       => 'fail',
                'err_message'   => $e->getMessage()
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
                'message'       => 'fail',
                'err_message'      => 'Data Tidak Ditemukan'
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
                'success'       => true,
                'message'       => 'Gagal Updata Data Role',
                'err_message'      => $validator->errors()
            ], 422);
        }

        try {
            $u_roles = Role::find($id);
            $u_roles->update($request->all());
            return response()->json([
                'success'       => true,
                'message'       => 'Berhasil Update Data Role',
                'data'          => $request->all()
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'success'       => true,
                'message'       => 'Gagal Update Data Role',
                'err_message'   => $e->getMessage()
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
                'success'       => true,
                'message'       => 'fail',
                'err_message'      => 'Data Tidak Ditemukan'
            ], 422);
        }

        try {
            $d_roles = Role::find($id);
            $d_roles->delete($id);
            return response()->json([
                'success'       => true,
                'message'       => 'success',
                'data'          => 'Berhasil Hapus Data Role'
            ], 200);

        } catch (\Throwable $e) {
            return response()->json([
                'success'       => true,
                'message'       => 'Gagal Hapus Data',
                'err_message'   => $e->getMessage()
            ], 422);
        }
    }
}
