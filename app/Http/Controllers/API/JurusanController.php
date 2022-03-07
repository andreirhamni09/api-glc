<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Transformers\JurusanTransformer;
use Illuminate\Support\Facades\Validator;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusans = Jurusan::getAll();

        return response()->json([
            'success' => true,
            'message' => 'success',
            'data'    => $jurusans
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
        $rules = [
            'id'        => 'required|unique:jurusans,id|min:3|max:10',
            'jurusan'   => 'required|min:3|max:25'
        ];

        $messages = [
            'id.required'       => 'Id Jurusan Wajib Diisi',
            'id.unique'         => 'Id '.$request->input('id').' Sudah Ada',
            'id.min'            => 'Id Jurusan Minimal 3 Karakter',
            'id.max'            => 'Id Jurusan Maksimal 10 Karakter',
            'jurusan.required'  => 'Nama Jurusan Harus Diisi',
            'jurusan.min'       => 'Nama Jurusan Diisi Minimal 3 Karakter',
            'jurusan.max'       => 'Nama Jurusan Diisi Maksimal 25 Karakter'
        ];

        $validate = Validator::make($request->all(), $rules, $messages);

        if($validate->fails()){
            return response()->json([
                'success'       => false,
                'message'       => 'Gagal Menambahkan Data',
                'err_message'   => $validate->errors()
            ], 422);
        }
        
        try {
            $n_jurusan = Jurusan::create($request->all());
            return response()->json([
                'success'   => true,
                'message'   => 'Berhasil Menambahkan Jurusan Baru',
                'data'      => $request->all()
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success'       => false,
                'message'       => 'Gagal Menambahkan Jurusan Baru',
                'err_message'   => $e->getMessage()
            ]);
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
        $jurusans = Jurusan::findJurusan($id);

        if(count($jurusans) == 0){
            return response()->json([
                'status'        => false,
                'message'       => 'Tidak Temukan Data',
                'err_message'   => 'Data Jurusan Dengan ID :'. $id.' Tidak Ditemukan'
            ]);
        }

        $rules = [
            'id'        => 'required|unique:jurusans,id,'.$id.'|min:3|max:10',
            'jurusan'   => 'required|min:3|max:25'
        ];

        $messages = [
            'id.required'       => 'Id Jurusan Wajib Diisi',
            'id.unique'         => 'Id '.$request->input('id').' Sudah Ada',
            'id.min'            => 'Id Jurusan Minimal 3 Karakter',
            'id.max'            => 'Id Jurusan Maksimal 10 Karakter',
            'jurusan.required'  => 'Nama Jurusan Harus Diisi',
            'jurusan.min'       => 'Nama Jurusan Diisi Minimal 3 Karakter',
            'jurusan.max'       => 'Nama Jurusan Diisi Maksimal 25 Karakter'
        ];
        $validate = Validator::make($request->all(), $rules, $messages);

        if($validate->fails()){
            return response()->json([
                'success'       => false,
                'message'       => 'Gagal Update Jurusan',
                'err_message'   => $validate->errors()
            ], 422);
        }

        try {
            $n_jurusan = Jurusan::find($id);

            $n_jurusan->update($request->all());

            return response()->json([
                'success'   => true,
                'message'   => 'Berhasil Update Jurusan',
                'data'      => $request->all()
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success'       => false,
                'message'       => 'Gagal Update Jurusan',
                'err_message'   => $e->getMessage()
            ]);
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
        try {
            $jurusans = Jurusan::find($id);
            $jurusans->delete();
            return response()->json([
                'success'       => false,
                'message'       => 'Berhasil Hapus Data Jurusan Dengan ID: '.$id,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success'       => false,
                'message'       => 'Gagal Hapus Data Jurusan Dengan ID: '.$id,
                'err_message'   => $e->getMessage()
            ]);
        }        
    }
}
