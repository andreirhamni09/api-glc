<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JalurPendaftaran;
use Illuminate\Support\Facades\Validator;

class JalurPendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jalurPendaftarans = JalurPendaftaran::getAll();
        if(count($jalurPendaftarans) == 0){
            return response()->json([
                'success'   => true,
                'message'   => 'null',
                'data'      => 'Belum Ada Data Jalur Pendaftaran Yang Diinputkan'
            ], 422);
        }
        return response()->json([
            'success'   => true,
            'message'   => 'success',
            'data'      => $jalurPendaftarans
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
            'nama_jalur' => 'required|unique:jalur_pendaftarans,nama_jalur|min:5|max:45'
        ];

        $messages    = [
            'nama_jalur.required'   => 'Nama Jalur Pendaftaran Wajin Diisi',
            'nama_jalur.unique'     => 'Nama Jalur Pendaftaran Tidak Boleh Sama',
            'nama_jalur.min'        => 'Nama Jalur Pendaftaran Minimal Diisi Dengan 5 Karakter',
            'nama_jalur.max'        => 'Nama Jalur Pendaftaran Maksimal Diisi Dengan 45 Karakter'
        ];

        $validator  = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return response()->json([
                'success'       => false,
                'message'       => 'Gagal Menambahkan Jalur Pendaftaran',
                'err_message'   => $validator->errors()
            ], 200);
        }

        try {
            $jalurPendaftarans = JalurPendaftaran::create($request->all());
            return response()->json([
                'success'       => true,
                'message'       => 'Jalur Pendaftaran Baru Telah Berhasil Ditambahkan',
                'data'          => $request->all()
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'success'       => true,
                'message'       => 'Jalur Pendaftarn Baru Gagal Ditambahkan',
                'err_message'   => $e->getMessage()
            ], 200);
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
        $jalurPendaftarans = JalurPendaftaran::findJalurPendaftaran($id);
        
        if(count($jalurPendaftarans) == 0)
        {
            return response()->json([
                'status'        => false,
                'message'       => 'Tidak Temukan Data',
                'err_message'   => 'Data Jalur Pendaftaran Dengan ID :'. $id.' Tidak Ditemukan'
            ]);
        }

        $rules      = [
            'nama_jalur' => 'required|unique:jalur_pendaftarans,nama_jalur,'.$request->input('nama_jalur').'|min:5|max:45'
        ];

        $messages    = [
            'nama_jalur.required'   => 'Nama Jalur Pendaftaran Wajib Diisi',
            'nama_jalur.unique'     => 'Nama Jalur Pendaftaran Sudah Digunakan',
            'nama_jalur.min'        => 'Nama Jalur Pendaftaran Minimal Diisi Dengan 5 Karakter',
            'nama_jalur.max'        => 'Nama Jalur Pendaftaran Maksimal Diisi Dengan 45 Karakter'
        ];

        $validator  = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return response()->json([
                'success'       => false,
                'message'       => 'Gagal Menambahkan Jalur Pendaftaran',
                'err_message'   => $validator->errors()
            ], 422);
        }

        try {
            $u_jalurPendaftarans = JalurPendaftaran::find($id);
            
            $u_jalurPendaftarans->update($request->all());

            return response()->json([
                'success'       => true,
                'message'       => 'Data Jalur Pendaftaran Berhasil Diupdate',
                'data'          => $request->all()
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'success'       => false,
                'message'       => 'Data Jalur Pendaftaran Berhasil Diupdate',
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
        try {
            $d_jalurPendaftarans = JalurPendaftaran::find($id);
            $d_jalurPendaftarans->delete();

            return response()->json([
                'success'       => true,
                'message'       => 'success',
                'data'          => 'Berhasil Hapus Data Jalur Pendaftaran'
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'success'       => false,
                'message'       => 'fail',
                'err_message'   => $e->getMessage()
            ], 422);
        }
    }
}
