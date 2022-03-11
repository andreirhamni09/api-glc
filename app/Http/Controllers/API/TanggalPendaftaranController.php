<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TanggalPendaftaran;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TanggalPendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanggalPendaftaran = TanggalPendaftaran::getAll();
        if(count($tanggalPendaftaran) == 0)
        {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'get_message'   => 'Gagal Get Tanggal Pendaftaran',
                'data'          => 'Belum Ada Tanggal Pendaftaran Yang Diinputkan'
            ], 422);
        }
        return response()->json([
            'success'       => true,
            'message'       => 'success',
            'get_message'   => 'Data Tanggal Pendaftaran',
            'data'          => $tanggalPendaftaran
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
        if( (   $request->input('id_pendaftarans')  === null OR $request->input('gelombang')        === null OR 
                $request->input('tanggal_mulai')    === null OR $request->input('tanggal_selesai')  === null OR 
                $request->input('bya_pendidikan')   === null OR $request->input('pot_pendidikan')   === null     
            )   OR
            (
                is_array($request->input('gelombang'))         === false OR
                is_array($request->input('tanggal_mulai'))     === false OR
                is_array($request->input('tanggal_selesai'))   === false OR
                is_array($request->input('bya_pendidikan'))    === false OR
                is_array($request->input('pot_pendidikan'))    === false 
            ) OR
            (
                empty($request->input('gelombang'))       === true OR
                empty($request->input('tanggal_mulai'))   === true OR
                empty($request->input('tanggal_selesai')) === true OR
                empty($request->input('bya_pendidikan'))  === true OR
                empty($request->input('pot_pendidikan'))  === true 
            )
        )
        {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'ins_message'   => 'Gagal Menambahkan Tanggal Pendaftaran',
                'data'          => 'Pengisian Data Tidak Valid'
            ], 422);
        }

        if(
            (
                #A
                count($request->input('gelombang')) !== count($request->input('tanggal_mulai'))         OR
                count($request->input('gelombang')) !== count($request->input('tanggal_selesai'))       OR
                count($request->input('gelombang')) !== count($request->input('bya_pendidikan'))        OR
                count($request->input('gelombang')) !== count($request->input('pot_pendidikan'))        OR
                #B
                count($request->input('tanggal_mulai')) !== count($request->input('tanggal_selesai'))   OR 
                count($request->input('tanggal_mulai')) !== count($request->input('bya_pendidikan'))    OR
                count($request->input('tanggal_mulai')) !== count($request->input('pot_pendidikan'))    OR
                #C
                count($request->input('tanggal_selesai')) !== count($request->input('bya_pendidikan'))  OR
                count($request->input('tanggal_selesai')) !== count($request->input('pot_pendidikan'))  OR
                #D
                count($request->input('bya_pendidikan')) !== count($request->input('pot_pendidikan'))      
            )   
        )
        {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'ins_message'   => 'Gagal Menambahkan Tanggal Pendaftaran',
                'data'          => 'Ada Data Yang Kosong'
            ], 422);
        }

        try {
            for ($i=0; $i < count($request->input('gelombang')); $i++) {
                $dataTanggalPendaftaran = [
                    'id_pendaftarans'   => $request->input('id_pendaftarans'),
                    'gelombang'         => $request->input('gelombang')[$i],
                    'tanggal_mulai'     => $request->input('tanggal_mulai')[$i],
                    'tanggal_selesai'   => $request->input('tanggal_selesai')[$i],
                    'bya_pendidikan'    => $request->input('bya_pendidikan')[$i],
                    'pot_pendidikan'    => $request->input('pot_pendidikan')[$i]
                ];                
                $rules      = [
                    'id_pendaftarans'   => ['required', 'exists:pendaftarans,id'],
                    'gelombang'         => ['required', 'numeric', 'min:1', 'max:9999', 'unique:tanggal_pendaftarans,gelombang'],
                    'tanggal_mulai'     => ['required', 'date', 'date_format:Y-m-d'],
                    'tanggal_selesai'   => ['required', 'date', 'date_format:Y-m-d', 'after:tanggal_mulai'],
                    'bya_pendidikan'    => ['required', 'numeric', 'min:1000000', 'max:99999999'],
                    'pot_pendidikan'    => ['required', 'numeric', 'min:1', 'max:75']
                ];
                $message    = [
                    'id_pendaftarans.required'      => 'Pandaftaran Wajib Diisi',
                    'id_pendaftarans.exists'        => 'Pandaftaran Tidak Ditemukan',
                    'gelombang.required'            => 'Gelombang Wajib Diisi',
                    'gelombang.numeric'             => 'Gelombang Diisi Dengan Angka',
                    'gelombang.min'                 => 'Gelombang Minimal Diisi Dengan 1',
                    'gelombang.max'                 => 'Gelombang Maksimal Diisi Dengan 9999',
                    'gelombang.unique'              => 'Gelombang Sudah Digunakan '.$request->input('gelombang')[$i].'',
                    'tanggal_mulai.required'        => 'Tanggal Mulai Wajib Diisi',
                    'tanggal_mulai.date'            => 'Tanggal Mulai Diisi Dengan Tanggal',
                    'tanggal_mulai.date_format'     => 'Format Tanggal Mulai Adalah 2022-10-15',
                    'tanggal_selesai.required'      => 'Tanggal Selesai Wajib Diisi',
                    'tanggal_selesai.date'          => 'Tanggal Selesai Diisi Dengan Tanggal',
                    'tanggal_selesai.date_format'   => 'Format Tanggal Selesai Adalah 2022-10-15',
                    'tanggal_selesai.after'         => 'Tanggal Selesai Harus Diisi Melewati Tanggal Mulai',
                    'bya_pendidikan.required'       => 'Biaya Pendidikan Wajib Diisi',
                    'bya_pendidikan.numeric'        => 'Biaya Pendidikan Wajib Diisi Dengan Angka',
                    'bya_pendidikan.min'            => 'Biaya Pendidikan Diisi Dengan Minimal Rp. 1.000.000',
                    'bya_pendidikan.max'            => 'Biaya Pendidikan Diisi Dengan Maksimal Rp. 99.999.999',
                    'pot_pendidikan.required'       => 'Potongan Pendidikan Wajib Diisi',
                    'pot_pendidikan.numeric'        => 'Potongan Pendidikan Diisi Dengan Angka',
                    'pot_pendidikan.min'            => 'Potongan Pendidikan Diisi Dengan Angka Minimal 0',
                    'pot_pendidikan.max'            => 'Potongan Pendidikan Diisi Dengan Angka Maksimal 75'
                ];
                $validator  = Validator::make($dataTanggalPendaftaran, $rules, $message);
                if($validator->fails())
                {
                    return response()->json([
                        'success'       => false,
                        'message'       => 'failed',
                        'ins_message'   => 'Gagal Menambahkan Tanggal Pendaftaran',
                        'data'          => $validator->errors()
                    ], 422);
                }
                $tanggalPendaftaran = TanggalPendaftaran::create($dataTanggalPendaftaran);
            }

            $arrTanggalPendaftaran = [
                'id_pendaftarans'   => $request->input('id_pendaftarans'),
                'gelombang'         => implode(',', $request->input('gelombang')),
                'tanggal_mulai'     => implode(',', $request->input('tanggal_mulai')),
                'tanggal_selesai'   => implode(',', $request->input('tanggal_selesai')),
                'bya_pendidikan'    => implode(',', $request->input('bya_pendidikan')),
                'pot_pendidikan'    => implode(',', $request->input('pot_pendidikan'))
            ];
            return response()->json([
                'success'       => true,
                'message'       => 'success',
                'ins_message'   => 'Berhasil Menambahkan Tanggal Pendaftaran',
                'data'          => $arrTanggalPendaftaran
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'ins_message'   => 'Gagal Menambahkan Tanggal Pendaftaran',
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
        $findTanggalPendaftaran = TanggalPendaftaran::findTanggalPendaftaran($id);
        if(count($findTanggalPendaftaran) == 0)
        {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'upd_message'   => 'Gagal Update Tanggal Pendaftaran',
                'data'          => 'Data Tidak Ditemukan'
            ], 422);
        }
        try {
            $rules      = [
                'gelombang'         => ['required', 'numeric', 'min:1', 'max:9999', 'unique:tanggal_pendaftarans,gelombang'],
                'tanggal_mulai'     => ['required', 'date', 'date_format:Y-m-d'],
                'tanggal_selesai'   => ['required', 'date', 'date_format:Y-m-d', 'after:tanggal_mulai'],
                'bya_pendidikan'    => ['required', 'numeric', 'min:1000000', 'max:99999999'],
                'pot_pendidikan'    => ['required', 'numeric', 'min:1', 'max:75']
            ];
            $message    = [
                'gelombang.required'            => 'Gelombang Wajib Diisi',
                'gelombang.numeric'             => 'Gelombang Diisi Dengan Angka',
                'gelombang.min'                 => 'Gelombang Minimal Diisi Dengan 1',
                'gelombang.max'                 => 'Gelombang Maksimal Diisi Dengan 9999',
                'gelombang.unique'              => 'Gelombang Sudah Digunakan '.$request->input('gelombang').'',
                'tanggal_mulai.required'        => 'Tanggal Mulai Wajib Diisi',
                'tanggal_mulai.date'            => 'Tanggal Mulai Diisi Dengan Tanggal',
                'tanggal_mulai.date_format'     => 'Format Tanggal Mulai Adalah 2022-10-15',
                'tanggal_selesai.required'      => 'Tanggal Selesai Wajib Diisi',
                'tanggal_selesai.date'          => 'Tanggal Selesai Diisi Dengan Tanggal',
                'tanggal_selesai.date_format'   => 'Format Tanggal Selesai Adalah 2022-10-15',
                'tanggal_selesai.after'         => 'Tanggal Selesai Harus Diisi Melewati Tanggal Mulai',
                'bya_pendidikan.required'       => 'Biaya Pendidikan Wajib Diisi',
                'bya_pendidikan.numeric'        => 'Biaya Pendidikan Wajib Diisi Dengan Angka',
                'bya_pendidikan.min'            => 'Biaya Pendidikan Diisi Dengan Minimal Rp. 1.000.000',
                'bya_pendidikan.max'            => 'Biaya Pendidikan Diisi Dengan Maksimal Rp. 99.999.999',
                'pot_pendidikan.required'       => 'Potongan Pendidikan Wajib Diisi',
                'pot_pendidikan.numeric'        => 'Potongan Pendidikan Diisi Dengan Angka',
                'pot_pendidikan.min'            => 'Potongan Pendidikan Diisi Dengan Angka Minimal 0',
                'pot_pendidikan.max'            => 'Potongan Pendidikan Diisi Dengan Angka Maksimal 75'
            ];
            $validator  = Validator::make($request->all(), $rules, $message);
            if($validator->fails())
            {
                return response()->json([
                    'success'       => false,
                    'message'       => 'failed',
                    'upd_message'   => 'Gagal Update Tanggal Pendaftaran',
                    'data'          => $validator->errors()
                ], 422);
            }
            $tanggalPendaftaran = TanggalPendaftaran::find($id);
            $tanggalPendaftaran->update($request->all());

            return response()->json([
                'success'       => true,
                'message'       => 'success',
                'upd_message'   => 'Berhasil Update Tanggal Pendaftaran',
                'data'          => $request->all()
            ], 200);

        } catch (\Throwable $e) {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'upd_message'   => 'Gagal Update Tanggal Pendaftaran',
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
        $findTanggalPendaftaran = TanggalPendaftaran::findTanggalPendaftaran($id);
        if (count($findTanggalPendaftaran) == 0) {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'del_message'   => 'Gagal Hapus Tanggal Pendaftaran',
                'data'          => 'Data Tidak Ditemukan'
            ], 422);
        }
        try {
            $delTanggalPendaftaran = TanggalPendaftaran::find($id);
            $delTanggalPendaftaran->delete();  
            
            return response()->json([
                'success'       => true,
                'message'       => 'success',
                'del_message'   => 'Hapus Tanggal Pendaftaran',
                'data'          => 'Berhasil'
            ], 200);      
        } catch (\Throwable $e) {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'del_message'   => 'Gagal Hapus Tanggal Pendaftaran',
                'data'          => $e->getMessage()
            ], 422);
        }
    }
}
