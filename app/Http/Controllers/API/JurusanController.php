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
    public static function index()
    {
        $jurusans = Jurusan::getAll();
        if(count($jurusans) == 0)
        {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'get_message'   => 'Belum Ada Data Jurusan Yang Diinputkan',
                'data'          => false
            ], 422);
        }
        
        return response()->json([
            'success'       => true,
            'message'       => 'success',
            'get_message'   => 'Data Jurusan',
            'data'          => $jurusans
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
    public static function store(Request $request)
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
                'message'       => 'failed',
                'ins_message'   => 'Gagal Menambahkan Data Baru',
                'data'          => $validate->errors()
            ], 422);
        }
        
        try {
            $n_jurusan = Jurusan::create($request->all());
            return response()->json([
                'success'       => true,
                'message'       => 'success',
                'ins_message'   => 'Berhasil Menambahkan Jurusan Baru',
                'data'          => $request->all()
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'ins_message'   => 'Gagal Menambahkan Data Baru',
                'data'          => $e->getMessage()
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
    public static function update(Request $request, $id)
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
                'message'       => 'failed',
                'upd_message'   => 'Gagal Update Jurusan',
                'data'          => $validate->errors()
            ], 422);
        }

        try {
            $u_jurusan = Jurusan::find($id);

            $u_jurusan->update($request->all());

            return response()->json([
                'success'       => true,
                'message'       => 'success',
                'upd_message'   => 'Berhasil Update Data',
                'data'          => $request->all()
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'upd_message'   => 'Gagal Update Data',
                'data'          => $e->getMessage()
            ]);
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
        try {
            $jurusans = Jurusan::find($id);
            $jurusans->delete();
            return response()->json([
                'success'       => true,
                'message'       => 'success',
                'del_message'   => 'Jurusan Berhasil Dihapus',
                'data'          => true
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'del_message'   => 'Gagal Hapus Data',
                'data'          => $e->getMessage()
            ]);
        }        
    }
}
