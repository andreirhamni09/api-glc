<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Permision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermisionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permisions = Permision::getAll();
        if(count($permisions) == 0){
            return response()->json([
                'success'   => true,
                'message'   => 'null',
                'data'      => 'Belum Ada Data Permision Yang Diinputkan'
            ], 422);
        }

        return response()->json([
            'success'   => true,
            'message'   => 'success',
            'data'      => $permisions
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
    public function store(Request $request)
    {
        $rules      = [
            'action'            => 'required|unique:permisions,action|min:3|max:45',
            'url'               => 'required|unique:permisions,action|min:3|max:100',
        ];
        $messages   = [
            'action.required'   => 'Action Wajib Diisi',
            'action.unique'     => 'Action Telah Digunakan',
            'action.min'        => 'Action Diisi Minimal 3 Karakter',
            'action.max'        => 'Action Diisi Maksimal 45 Karakter',  
            'url.required'      => 'Url Wajib Diisi',
            'url.unique'        => 'Url Telah Digunakan',
            'url.min'           => 'Url Diisi Minimal 3 Karakter',
            'url.max'           => 'Url Diisi Maksimal 100 Karakter',  
        ];
        $validator  = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return response()->json([
                'success'       => true,
                'message'       => 'fails',
                'ins_message'   => $validator->errors()
            ], 422);
        }

        try {
            $permisions = Permision::create($request->all());

            return response()->json([
                'success'       => true,
                'message'       => 'success',
                'ins_message'   => 'Berhasil Memasukan data',
                'data'          => $request->all()
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'success'       => true,
                'message'       => 'failed',
                'ins_message'   => 'Gagal Memasukan data',
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
        $permisions = Permision::findPermision($id);

        if(count($permisions) == 0 )
        {
            return response()->json([
                'success'       => true,
                'message'       => 'failed',
                'upd_message'   => 'Data Tidak Ditemukan'
            ], 422);
        }
        
        $rules      = [
            'action'            => 'required|unique:permisions,action|min:3|max:45',
            'url'               => 'required|unique:permisions,action|min:3|max:100',
        ];
        $messages   = [
            'action.required'   => 'Action Wajib Diisi',
            'action.unique'     => 'Action Telah Digunakan',
            'action.min'        => 'Action Diisi Minimal 3 Karakter',
            'action.max'        => 'Action Diisi Maksimal 45 Karakter',  
            'url.required'      => 'Url Wajib Diisi',
            'url.unique'        => 'Url Telah Digunakan',
            'url.min'           => 'Url Diisi Minimal 3 Karakter',
            'url.max'           => 'Url Diisi Maksimal 100 Karakter',  
        ];
        $validator  = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return response()->json([
                'success'       => true,
                'message'       => 'fails',
                'upd_message'   => $validator->errors()
            ], 422);
        }

        try {
            $permisions = Permision::find($id);
            $permisions->update($request->all());

            return response()->json([
                'success'       => true,
                'message'       => 'success',
                'upd_message'   => 'Berhasil Update Data',
                'upd_detail'    => $request->all()
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'success'       => true,
                'message'       => 'failed',
                'upd_message'   => 'Gagal Update data',
                'upd_detail'    => $e->getMessage()
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
        $permisions = Permision::findPermision($id);

        if(count($permisions) == 0 )
        {
            return response()->json([
                'success'       => true,
                'message'       => 'failed',
                'del_message'   => 'Data Tidak Ditemukan'
            ], 422);
        }

        try {
            $del_permisions = Permision::find($id);
            $del_permisions->delete();

            return response()->json([
                'success'       => true,
                'message'       => 'success',
                'del_message'   => 'Berhasil Hapus Data Permisions'
            ], 200);

        } catch (\Throwable $e) {
            return response()->json([
                'success'       => true,
                'message'       => 'failed',
                'del_message'   => 'Gagal Hapus Data Permision',
                'det_message'   => $e->getMessage()
            ], 422);
        }
    }
}
