<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\API\JurusanController;
use App\Http\Controllers\API\MatakuliahController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminMatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mataKuliah     = MatakuliahController::index();
        $dataMatakuliah = json_decode(json_encode($mataKuliah), true);
        $dataMatakuliah = $dataMatakuliah['original'];

        $jurusan        = JurusanController::index();
        $dataJurusan    = json_decode(json_encode($jurusan), true);
        $dataJurusan    = $dataJurusan['original'];
        return view('karyawan.admin.mata-kuliahs', ['matakuliah' => $dataMatakuliah, 'jurusan' => $dataJurusan]);
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
        $addMataKuliah  = MatakuliahController::store($request);
        $data           = json_decode(json_encode($addMataKuliah), true);
        $data           = $data['original'];

        // return $data;
        return redirect()->back()->with('addMataKuliah', $data);
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
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delMatakuliah  = MatakuliahController::destroy($id);
        $data           = json_decode(json_encode($delMatakuliah), true);
        $data           = $data['original'];
        
        return $data;
    }
}
