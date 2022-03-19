<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\API\JurusanController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminJurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = JurusanController::index();
        
        $data    = json_decode(json_encode($jurusan), true);

        $data    = $data['original'];
        return view('karyawan.admin.jurusans', ['jurusan' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo 'mantap1';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addJurusan   = JurusanController::store($request);

        $data         = json_decode(json_encode($addJurusan), true);
        $data         = $data['original'];
        return redirect()->back()->with('AddJurusanStatus', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo 'mantap2';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo 'mantap3';
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
        $updateJurusan = JurusanController::update($request, $id);
        
        $data         = json_decode(json_encode($updateJurusan), true);
        $data         = $data['original'];
        
        return redirect()->back()->with('UpdJurusanStatus', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteJurusan  = JurusanController::destroy($id);
        $data           = json_decode(json_encode($deleteJurusan), true);
        $data           = $data['original'];
        return $data;
    }
}
