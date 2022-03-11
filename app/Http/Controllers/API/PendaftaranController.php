<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendaftarans = Pendaftaran::getAll();
        
        if(count($pendaftarans) == 0)
        {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'get_message'   => 'Gagal Get Pendaftaran',
                'data'          => 'Belum Ada Pendaftaran Yang Diinputkan'
            ], 422);
        }

        return response()->json([
            'success'       => true,
            'message'       => 'success',
            'get_message'   => 'List Data Pendaftaran',
            'data'          => $pendaftarans
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
        $rules = [
            'id_jalurs'         => ['required', 'exists:jalur_pendaftarans,id'],
            'angkatan'          => ['required' , 'numeric', 'min:1', 'max:9999'],
            'syr_pendidikan'    => ['required', 'min:3', 'max:100'],
            'nma_angkatan'      => ['required', 'min:3', 'max:45']    
        ];
        $message = [
            'id_jalurs.required'        => 'Jalur Wajib Diisi',
            'id_jalurs.exists'          => 'Jalur Tidak Valid',
            'angkatan.required'         => 'Angkatan Wajib Diisi',
            'angkatan.numeric'          => 'Angkatan Diisi Dengan Angka',
            'angkatan.min'              => 'Angkatan Diisi Dengan Minimal 1',
            'angkatan.max'              => 'Angkatan Diisi Dengan Maksimal 999',
            'syr_pendidikan.required'   => 'Syarat Angkatan Wajib Diisi',
            'syr_pendidikan.min'        => 'Syarat Angkatan Minimal Diisi 3 Karakter',
            'syr_pendidikan.max'        => 'Syarat Angkatan Maksimal Disii 100 Karakter',
            'nma_angkatan.required'     => 'Nama Angkatan Wajib Diisi',
            'nma_angkatan.min'          => 'Nama Angkatan Minimal Diisi Dengan 3 Karakter',
            'nma_angkatan.max'          => 'Nama Angkatan Minimal Diisi Dengan 45 Karakter'
        ];
        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()){
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'ins_message'   => 'Gagal Memasukan Data Pendaftaran',
                'data'          => $validator->errors()
            ], 422);
        }

        try {
            $insPendaftarans = Pendaftaran::create($request->all());
            return response()->json([
                'success'       => true,
                'message'       => 'success',
                'ins_message'   => 'Pendaftaran Berhasil Ditambahkan',
                'data'          => $request->all()
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'ins_message'   => 'Gagal Memasukan Data Pendaftaran',
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
        $pendaftarans = Pendaftaran::findPendaftaran($id);
        if(count($pendaftarans) == 0)
        {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'upd_message'   => 'Gagal Update Pendaftaran',
                'data'          => 'Data Pendaftaran Tidak Ditemukan'
            ], 422);
        }
        
        $rules = [
            'id_jalurs'         => ['required', 'exists:jalur_pendaftarans,id'],
            'angkatan'          => ['required' , 'numeric', 'min:1', 'max:9999'],
            'syr_pendidikan'    => ['required', 'min:3', 'max:100'],
            'nma_angkatan'      => ['required', 'min:3', 'max:45']    
        ];
        $message = [
            'id_jalurs.required'        => 'Jalur Wajib Diisi',
            'id_jalurs.exists'          => 'Jalur Tidak Valid',
            'angkatan.required'         => 'Angkatan Wajib Diisi',
            'angkatan.numeric'          => 'Angkatan Diisi Dengan Angka',
            'angkatan.min'              => 'Angkatan Diisi Dengan Minimal 1',
            'angkatan.max'              => 'Angkatan Diisi Dengan Maksimal 999',
            'syr_pendidikan.required'   => 'Syarat Angkatan Wajib Diisi',
            'syr_pendidikan.min'        => 'Syarat Angkatan Minimal Diisi 3 Karakter',
            'syr_pendidikan.max'        => 'Syarat Angkatan Maksimal Disii 100 Karakter',
            'nma_angkatan.required'     => 'Nama Angkatan Wajib Diisi',
            'nma_angkatan.min'          => 'Nama Angkatan Minimal Diisi Dengan 3 Karakter',
            'nma_angkatan.max'          => 'Nama Angkatan Minimal Diisi Dengan 45 Karakter'
        ];
        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()){
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'ins_message'   => 'Gagal Memasukan Data Pendaftaran',
                'data'          => $validator->errors()
            ], 422);
        }

        try {
            $updPendaftaran = Pendaftaran::find($id);
            $updPendaftaran->update($request->all());
            return response()->json([
                'success'       => true,
                'message'       => 'success',
                'upd_message'   => 'Pendaftaran Berhasil Diubah',
                'data'          => $request->all()
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'upd_message'   => 'Gagal Ubah Data Pendaftaran',
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
        try {
            $delPendaftaran = Pendaftaran::find($id);
            $delPendaftaran->delete();
            return response()->json([
                'success'       => true,
                'message'       => 'success',
                'del_message'   => 'Hapus Pendaftaran',
                'data'          => 'Data Berhasil Dihapus'
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'del_message'   => 'Gagal Hapus Pendaftaran',
                'data'          => $e->getMessage()
            ], 422);
        }
    }
}
