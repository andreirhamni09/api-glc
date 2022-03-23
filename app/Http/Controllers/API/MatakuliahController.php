<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        $mata_kuliah = MataKuliah::getAll();
        if (count($mata_kuliah) == 0) {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'get_message'   => 'Gagal Mendaftarkan Matakuliah',
                'data'          => false
            ], 422);
        }

        return response()->json([
            'success'       => true,
            'message'       => 'success',
            'get_message'   => 'Data Matakuliah',
            'data'          => $mata_kuliah
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

    function cekArray($array)
    {
    	$status = false;
        for ($i=0; $i < count($array) ; $i++) { 
        	$dataCek = $array[$i];
            unset($array[$i]);
            if(in_array($dataCek, $array)){
            	$status = false;
                break;
            }
            else{
            	$status = true;
            }
        }
        return $status;
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
            is_array($request->input('hari')) === false OR is_array($request->input('jam_mulai')) === false OR
            is_array($request->input('jam_selesai')) === false            
        )
        {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'ins_message'   => 'Gagal Memasukan Data Matakuliah',
                'data'          => 'Format Data Hari, Jam Mulai, atau Jam Selesai Salah'
            ], 422);
        }

        if(
             #A
             count($request->input('hari'))          != count($request->input('jam_mulai'))      OR
             count($request->input('hari'))          != count($request->input('jam_selesai'))    OR
             #B
             count($request->input('jam_mulai'))     != count($request->input('jam_selesai'))
            )   
        {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'ins_message'   => 'Gagal Memasukan Data Matakuliah',
                'data'          => 'Jumlah Data Hari, Jam Mulai, dan Jam Selesai Tidak Sama'
            ], 422);
        }

        $cekArray = Self::cekArray($request->input('hari'));
        if($cekArray === false){
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'ins_message'   => 'Gagal Memasukan Data Matakuliah',
                'data'          => 'Hari Yang Dimasukan Sama'
            ], 422);
        }

        for ($i=0; $i < count($request->input('hari')); $i++) { 
            $dataMatakuliah = [
                'id_jurusans'   => $request->input('id_jurusans'),        
                'matakuliah'    => $request->input('matakuliah'),        
                'hari'          => $request->input('hari')[$i],
                'jam_mulai'     => $request->input('jam_mulai')[$i],    
                'jam_selesai'   => $request->input('jam_selesai')[$i],        
                'semester'      => $request->input('semester')    
            ];
            
            $rules = [
                'id_jurusans'   => ['required', 'exists:jurusans,id'],        
                'matakuliah'    => ['required', 'min:3', 'max:100'],        
                'hari'          => ['required', 'in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu'],
                'jam_mulai'     => ['required', 'date_format:H:i'],    
                'jam_selesai'   => ['required', 'date_format:H:i', 'after:jam_mulai'],        
                'semester'      => ['required', 'numeric', 'min:1', 'max:2']    
            ];
            
            $message = [ 
                'id_jurusans.required'      => 'Jurusan Wajib Diisi',  
                'id_jurusans.exists'        => 'Jurusan Tidak Ditemukan',       
                'matakuliah.required'       => 'Matakuliah Wajib Diisi',       
                'matakuliah.min'            => 'Matakuliah Diisi Dengan Minimal 3 Karakter',       
                'matakuliah.max'            => 'Matakuliah Diisi Dengan Maksimal 100 Karakter',        
                'hari.required'             => 'Hari Wajib Diisi',    
                'hari.in'                   => 'Hari Tidak Ditemukan',
                'jam_mulai.required'        => 'Jam Mulai Wajib Diisi',    
                'jam_mulai.date_format'     => 'Format Jam Mulai Adalah 24:00', 
                'jam_selesai.required'      => 'Jam Selesai Wajib Diisi',   
                'jam_selesai.date_format'   => 'Format Jam Selesai Adalah 24:00', 
                'jam_selesai.after'         => 'Jam Selesai Tidak Boleh Sama Atau Lebih Awal Dari Jam Mulai',        
                'semester.required'         => 'Semester Wajib Diisi',
                'semester.numeric'          => 'Semester Diisi Dengan Angka',     
                'semester.min'              => 'Semester Minimal Diisi Dengan 1', 
                'semester.max'              => 'Semester Maksimal Diisi Dengan 2' 
            ];
            $validator = Validator::make($dataMatakuliah, $rules, $message);
            if($validator->fails())
            {
                return response()->json([
                    'success'       => false,
                    'message'       => 'failed',
                    'ins_message'   => 'Gagal Memasukan Data Matakuliah',
                    'data'          => $validator->errors()
                ], 422);
            }  
        }
        try {
            $dataInsMataKuliah = [
                'id_jurusans'   => $request->input('id_jurusans'),
                'matakuliah'    => $request->input('matakuliah'),
                'hari'          => implode('|', $request->input('hari')),
                'jam_mulai'     => implode('|', $request->input('jam_mulai')),
                'jam_selesai'   => implode('|', $request->input('jam_selesai')),
                'semester'      => $request->input('semester'),
            ];

            $insMataKuliah = MataKuliah::create($dataInsMataKuliah);
            return response()->json([
                'success'       => true,
                'message'       => 'success',
                'ins_message'   => 'Berhasil Memasukan Data Matakuliah',
                'data'          => $dataInsMataKuliah
            ], 200);

        } catch (\Throwable $e) {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'ins_message'   => 'Gagal Memasukan Data Matakuliah',
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
    public static function update(Request $request, $id)
    {
        $findMatakuliah = MataKuliah::findMataKuliah($id);
        if(count($findMatakuliah) == 0)
        {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'upd_message'   => 'Gagal Update Data Matakuliah',
                'data'          => 'Data Tidak Ditemukan'
            ], 422);
        }

        if(
            is_array($request->input('hari')) === false OR is_array($request->input('jam_mulai')) === false OR
            is_array($request->input('jam_selesai')) === false            
        )
        {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'upd_message'   => 'Gagal Update Data Matakuliah',
                'data'          => 'Format Data Hari, Jam Mulai, atau Jam Selesai Salah'
            ], 422);
        }

        if(
             #A
             count($request->input('hari'))          != count($request->input('jam_mulai'))      OR
             count($request->input('hari'))          != count($request->input('jam_selesai'))    OR
             #B
             count($request->input('jam_mulai'))     != count($request->input('jam_selesai'))
            )   
        {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'upd_message'   => 'Gagal Update Data Matakuliah',
                'data'          => 'Jumlah Data Hari, Jam Mulai, dan Jam Selesai Tidak Sama'
            ], 422);
        }

        $cekArray = Self::cekArray($request->input('hari'));
        if($cekArray === false){
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'ins_message'   => 'Gagal Memasukan Data Matakuliah',
                'data'          => 'Hari Yang Dimasukan Sama'
            ], 422);
        }

        for ($i=0; $i < count($request->input('hari')); $i++) { 
            $dataMatakuliah = [
                'id_jurusans'   => $request->input('id_jurusans'),        
                'matakuliah'    => $request->input('matakuliah'),        
                'hari'          => $request->input('hari')[$i],
                'jam_mulai'     => $request->input('jam_mulai')[$i],    
                'jam_selesai'   => $request->input('jam_selesai')[$i],        
                'semester'      => $request->input('semester')    
            ];
            
            $rules = [
                'id_jurusans'   => ['required', 'exists:jurusans,id'],        
                'matakuliah'    => ['required', 'min:3', 'max:100'],        
                'hari'          => ['required', 'in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu'],
                'jam_mulai'     => ['required', 'date_format:H:i'],    
                'jam_selesai'   => ['required', 'date_format:H:i', 'after:jam_mulai'],        
                'semester'      => ['required', 'numeric', 'min:1', 'max:2']    
            ];
            $message = [ 
                'id_jurusans.required'      => 'Jurusan Wajib Diisi',  
                'id_jurusans.exists'        => 'Jurusan Tidak Ditemukan',       
                'matakuliah.required'       => 'Matakuliah Wajib Diisi',       
                'matakuliah.min'            => 'Matakuliah Diisi Dengan Minimal 3 Karakter',       
                'matakuliah.max'            => 'Matakuliah Diisi Dengan Maksimal 100 Karakter',     
                'matakuliah.max'            => 'Matakuliah Diisi Dengan Maksimal 100 Karakter',       
                'hari.required'             => 'Hari Wajib Diisi',    
                'hari.in'                   => 'Hari Tidak Ditemukan',
                'jam_mulai.required'        => 'Jam Mulai Wajib Diisi',    
                'jam_mulai.date_format'     => 'Format Jam Mulai Adalah 24:00', 
                'jam_selesai.required'      => 'Jam Selesai Wajib Diisi',   
                'jam_selesai.date_format'   => 'Format Jam Selesai Adalah 24:00', 
                'jam_selesai.after'         => 'Jam Selesai Tidak Boleh Sama Atau Lebih Awal Dari Jam Mulai',        
                'semester.required'         => 'Semester Wajib Diisi',
                'semester.numeric'          => 'Semester Diisi Dengan Angka',     
                'semester.min'              => 'Semester Minimal Diisi Dengan 1', 
                'semester.max'              => 'Semester Maksimal Diisi Dengan 2' 
            ];
            $validator = Validator::make($dataMatakuliah, $rules, $message);
            if($validator->fails())
            {
                return response()->json([
                    'success'       => false,
                    'message'       => 'failed',
                    'upd_message'   => 'Gagal Update Data Matakuliah',
                    'data'          => $validator->errors()
                ], 422);
            }  
        }
        try {
            $dataUpdMataKuliah = [
                'id_jurusans'   => $request->input('id_jurusans'),
                'matakuliah'    => $request->input('matakuliah'),
                'hari'          => implode('|', $request->input('hari')),
                'jam_mulai'     => implode('|', $request->input('jam_mulai')),
                'jam_selesai'   => implode('|', $request->input('jam_selesai')),
                'semester'      => $request->input('semester'),
            ];

            $updMataKuliah = MataKuliah::find($id);

            $updMataKuliah->update($dataUpdMataKuliah);
            return response()->json([
                'success'       => true,
                'message'       => 'success',
                'upd_message'   => 'Berhasil Update Data Matakuliah',
                'data'          => $dataUpdMataKuliah
            ], 200);

        } catch (\Throwable $e) {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'upd_message'   => 'Gagal Update Data Matakuliah',
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
    public static function destroy($id)
    {
        $findMatakuliah = MataKuliah::findMataKuliah($id);
        if(count($findMatakuliah) == 0)
        {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'del_message'   => 'Gagal Hapus Matakuliah',
                'data'          => 'Data Tidak Ditemukan'
            ], 422);
        }
        try {
            $delMataKuliah = MataKuliah::find($id);
            $delMataKuliah->delete();

            return response()->json([
                'success'       => true,
                'message'       => 'success',
                'del_message'   => 'Hapus Matakuliah',
                'data'          => 'Berhasil'
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'success'       => false,
                'message'       => 'failed',
                'del_message'   => 'Gagal Hapus Matakuliah',
                'data'          => $e->getMessage()
            ], 422);
        }

    }
}
