<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\API\PermisionsController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPermisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getPermision   = PermisionsController::index();
        $dataPermision  = json_decode(json_encode($getPermision), true);
        $dataPermision  = $dataPermision['original'];
        
        return view('karyawan.admin.permisions', ['permision' => $dataPermision]);
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
        $addPermision   = PermisionsController::store($request);
        $addPermision   = json_decode(json_encode($addPermision), true);

        $dataPermision  = $addPermision['original']; 
        return redirect()->back()->with('addPermision', $dataPermision);
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
        $updatePermision    = PermisionsController::update($request, $id);
        $updatePermision    = json_decode(json_encode($updatePermision), true);

        $dataPermision      = $updatePermision['original'];
        return redirect()->back()->with('updatePermision', $dataPermision);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletePermision    = PermisionsController::destroy($id);
        $deletePermision    = json_decode(json_encode($deletePermision), true);

        $dataPermision      = $deletePermision['original'];
        return $dataPermision;
    }
}
