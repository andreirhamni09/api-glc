<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\TanggalPendaftaran;
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
                'success'   => true,
                'message'   => 'null',
                'data'      => 'Belum Ada Pendaftaran Yang Dimasukan'
            ], 422);
        }

        return response()->json([
            'success'   => true,
            'message'   => 'success',
            'data'      => $pendaftarans
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
        # ~~ 1. Rules Pendaftarans
            $pendaftaranRules = [
                'id_jalurs'         => 'required|exists:jalur_pendaftarans,id',
                'angkatan'          => 'required|integer|min:1|max:9999',
                'syr_pendidikan'    => 'required|min:3|max:100',        
                'nma_angkatan'      => 'required|min:3|max:45'    
            ];

            $pendaftaranMessage = [
                'id_jalurs.required'        => 'Jalur Pendaftaran Wajib Diisi',
                'id_jalurs.exists'          => 'Jalur Pendaftaran Tidak Ditemukan',
                'angkatan.required'         => 'Angkatan Wajib Diisi',
                'angkatan.integer'          => 'Angkatan Diisi Dengan Angka',
                'angkatan.min'              => 'Angkatan Minimal Diisi Dengan Angka 1',
                'angkatan.max'              => 'Angkatan Maksimal Diisi Dengan Angka 9999',
                'syr_pendidikan.required'   => 'Syarat Pendidikan Wajib Diisi',        
                'syr_pendidikan.min'        => 'Syarat Pendidikan Minimal Diisi Dengan 3 Karakter', 
                'syr_pendidikan.max'        => 'Syarat Pendidikan Maksimal Diisi Dengan 100 Karakter', 
                'nma_angkatan.required'     => 'Nama Angkatan Wajib Diisi',    
                'nma_angkatan.min'          => 'Nama Angkatan Minimal Diisi Dengan 3 Karakter',    
                'nma_angkatan.max'          => 'Nama Angkatan Maksimal Diisi Dengan 45 Karakter'    
            ];

            $pendaftaranData       = [
                'id_jalurs'         => $request->input('id_jalurs'),
                'angkatan'          => $request->input('angkatan'),
                'syr_pendidikan'    => $request->input('syr_pendidikan'),
                'nma_angkatan'      => $request->input('nma_angkatan')
            ];
            $pendaftaranValidator  = Validator::make($pendaftaranData, $pendaftaranRules, $pendaftaranMessage);
        # ~~
        
        # ~~ Cek Validator Pendaftaran
         # ~~ Validator Pendaftaran Gagal
            if($pendaftaranValidator->fails())
            {
                return response()->json([
                    'success'       => false,
                    'message'       => 'failed',
                    'ins_message'   => 'Gagal Menambahkan Data Pendaftaran',
                    'data'          => $pendaftaranValidator->errors()
                ], 422); 
            }
         # ~~
        
         # ~~ Validator Pendaftaran Berhasil 
          # ~~ Cek Data Tanggal Pendaftaran Tidak Null 

           # ~~ Tanggal Pendaftaran Adalah Null & Array count = 0
            if( (
                    ( $request->input('gelombang')       === null OR !is_array($request->input('gelombang'))       OR count($request->input('gelombang'))       == 0 ) OR 
                    ( $request->input('tanggal_mulai')   === null OR !is_array($request->input('tanggal_mulai'))   OR count($request->input('tanggal_mulai'))   == 0 ) OR  
                    ( $request->input('tanggal_selesai') === null OR !is_array($request->input('tanggal_selesai')) OR count($request->input('tanggal_selesai')) == 0 ) OR 
                    ( $request->input('bya_pendidikan')  === null OR !is_array($request->input('bya_pendidikan'))  OR count($request->input('bya_pendidikan'))  == 0 ) OR 
                    ( $request->input('pot_pendidikan')  === null OR !is_array($request->input('pot_pendidikan'))  OR count($request->input('pot_pendidikan'))  == 0 ) 
                ) OR 
                (
                    ( count($request->input('gelombang')) != count($request->input('tanggal_mulai'))  	        ) OR
                    ( count($request->input('gelombang')) != count($request->input('tanggal_selesai'))	        ) OR
                    ( count($request->input('gelombang')) != count($request->input('bya_pendidikan'))	        ) OR
                    ( count($request->input('gelombang')) != count($request->input('pot_pendidikan'))	        ) OR
                    ( count($request->input('tanggal_mulai'))   != count($request->input('tanggal_selesai'))	) OR
                    ( count($request->input('tanggal_mulai'))   != count($request->input('bya_pendidikan'))     ) OR
                    ( count($request->input('tanggal_mulai'))   != count($request->input('pot_pendidikan'))     ) OR
                    ( count($request->input('tanggal_selesai')) != count($request->input('bya_pendidikan'))     ) OR
                    ( count($request->input('tanggal_selesai')) != count($request->input('pot_pendidikan'))     ) OR
                    ( count($request->input('bya_pendidikan'))  != count($request->input('pot_pendidikan'))     )
                )
            )
            {
                return response()->json([
                    'success'       => false,
                    'message'       => 'failed',
                    'ins_message'   => 'Pengisian Data Pendaftaran Tidak Lengkap',
                    'data'          => 'Data Gelombang, Tanggal Mulai, Tanggal Selesai, Biaya Pendidikan atau Potongan Pendidikan Harus ada'
                ], 422);
            }
           # ~~

        # ~~ Tanggal Pendaftaran Tidak Null & Array count != 0

            try {
                $insPendaftaran = new Pendaftaran;
                
                $insPendaftaran->id_jalurs          = $pendaftaranData['id_jalurs'];
                $insPendaftaran->angkatan           = $pendaftaranData['angkatan'];
                $insPendaftaran->syr_pendidikan     = $pendaftaranData['syr_pendidikan'];
                $insPendaftaran->nma_angkatan       = $pendaftaranData['nma_angkatan'];

                $insPendaftaran->save();
                try {
                    for ($i=0;  $i < count($request->input('gelombang')) ; $i++) {
                        $idPendaftaran      = $insPendaftaran->id;
                        
                        $tglPendaftaranData = [
                            'id_pendaftarans'   => $idPendaftaran,
                            'gelombang'         => $request->input('gelombang')[$i],
                            'tanggal_mulai'     => $request->input('tanggal_mulai')[$i],
                            'tanggal_selesai'   => $request->input('tanggal_selesai')[$i],
                            'bya_pendidikan'    => $request->input('bya_pendidikan')[$i],
                            'pot_pendidikan'    => $request->input('pot_pendidikan')[$i]
                        ];
        
                        $tglRules = [
                            'id_pendaftarans'   => 'required|exists:pendaftarans,id',
                            'gelombang'         => 'required|numeric|min:1|max:9999',
                            'tanggal_mulai'     => 'required|date|date_format:Y-m-d',
                            'tanggal_selesai'   => 'required|date|date_format:Y-m-d|after:tanggal_mulai',
                            'bya_pendidikan'    => 'required|numeric|min:1000000|max:999999999',
                            'pot_pendidikan'    => 'required|numeric|min:0|max:75',
                        ];
                        $tglMessage = [
                            'id_pendaftarans.required'      => 'Id Pendaftaran Wajib Diisi',
                            'id_pendaftarans.exists'         => 'Id Pendaftaran Tidak Ditemukan',
                            'gelombang.required'            => 'Gelombang Pendaftaran Wajib Diisi',
                            'gelombang.numeric'             => 'Gelombang Pendaftaran Diisi Dengan Angka',
                            'gelombang.min'                 => 'Gelombang Pendaftaran Diisi Dengan Angka Minimal 1',
                            'gelombang.max'                 => 'Gelombang Pendaftaran Diisi Dengan Angka Maksimal 9999',
                            'tanggal_mulai.required'        => 'Tanggal Mulai Pendaftaran Harus Diisi',
                            'tanggal_mulai.date'            => 'Pengisian Data Tanggal Mulai Pendaftaran Harus Diisi Dengan Tanggal',
                            'tanggal_mulai.date_format'     => 'Format Pengisian Tanggal Mulai YYYY-MM-DD',
                            'tanggal_selesai.required'      => 'Tanggal Selesai Pendaftaran Harus Diisi',
                            'tanggal_selesai.date'          => 'Pengisian Data Tanggal Selesai Pendaftaran Harus Diisi Dengan Tanggal',
                            'tanggal_selesai.date_format'   => 'Format Pengisian Tanggal Selesai YYYY-MM-DD',
                            'tanggal_selesai.after'         => 'Tanggal Selesai Harus Diisi Dengan Tanggal Yang Lebih Besar Dari Tanggal Mulai',
                            'bya_pendidikan.required'       => 'Biaya Pendidikan Harus Diisi',
                            'bya_pendidikan.numeric'        => 'Biaya Pendidikan Harus Diisi Dengan Angka',
                            'bya_pendidikan.min'            => 'Biaya Pendidikan Minimal Diisi Dengan Rp. 1.000.000',
                            'bya_pendidikan.max'            => 'Biaya Pendidikan Maksimal Diisi Dengan Rp. 999.999.999',
                            'pot_pendidikan.required'       => 'Potongan Pendidikan Wajib Diisi',
                            'pot_pendidikan.numeric'        => 'Potongan Pendidikan Diisi Dengan Angka',
                            'pot_pendidikan.min'            => 'Minimal Pengisian Potongan Pendidikan Adalah 0',
                            'pot_pendidikan.max'            => 'Maksimal Pengisian Potongan Pendidikan Adalah 75',
                        ];
        
                        $tglPendaftaranValidation = Validator::make($tglPendaftaranData, $tglRules, $tglMessage);
        
                        if($tglPendaftaranValidation->fails()){
                            return response()->json([
                                'success'       => false,
                                'message'       => 'failed',
                                'ins_message'   => 'Gagal Menambahkan Tanggal Pendaftaran',
                                'data'          => $tglPendaftaranValidation->errors()
                            ], 200);
                        }
                        $insTanggalPendaftaran = TanggalPendaftaran::create($tglPendaftaranData);


                        $dataInsert = [
                            'id_jalurs'         => $request->input('id_jalurs'),
                            'angkatan'          => $request->input('angkatan'),
                            'syr_pendidikan'    => $request->input('syr_pendidikan'),
                            'nma_angkatan'      => $request->input('nma_angkatan'),
                            'gelombang'         => implode(",", $request->input('gelombang')),
                            'tanggal_mulai'     => implode(",", $request->input('tanggal_mulai')),
                            'tanggal_selesai'   => implode(",", $request->input('tanggal_selesai')),
                            'bya_pendidikan'    => implode(",", $request->input('bya_pendidikan')),
                            'pot_pendidikan'    => implode(",", $request->input('pot_pendidikan'))
                        ];
                    }     
                    return response()->json([
                        'success'       => true,
                        'message'       => 'success',
                        'ins_message'   => 'Berhasil Menambahkan Data Pendaftaran',
                        'data'          => $dataInsert
                    ], 200);
                } catch (\Throwable $ex2) {
                    return response()->json([
                        'success'       => false,
                        'message'       => 'failed',
                        'ins_message'   => 'Gagal Menambahkan Tanggal Pendaftaran',
                        'data'          => $ex2->getMessage()
                    ], 422);
                }
            } catch (\Throwable $e1) {
                return response()->json([
                    'success'       => false,
                    'message'       => 'failed',
                    'ins_message'   => 'Gagal Menambahkan Data Pendaftaran',
                    'data'          => $e1->getMessage()
                ], 422);
            }
        # ~~
        # ~~
        # ~~
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
