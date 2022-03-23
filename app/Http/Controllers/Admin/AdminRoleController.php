<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getRoles   = RoleController::index();
        $dataRoles  = json_decode(json_encode($getRoles), true);
        $dataRoles  = $dataRoles['original'];
        
        return view('karyawan.admin.roles', ['role' => $dataRoles]);
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
        $addRole    = RoleController::store($request);
        $dataRole   = json_decode(json_encode($addRole), true);
        $dataRole   = $dataRole['original'];

        // return $dataRole;

        return redirect()->back()->with('addRole', $dataRole);
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
        $updRole = RoleController::update($request, $id);
        $updRole = json_decode(json_encode($updRole), true);

        $dataRole = $updRole['original'];

        return redirect()->back()->with('updRole', $dataRole);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delRole    = RoleController::destroy($id);
        $delRole    = json_decode(json_encode($delRole), true);

        $dataRole   = $delRole['original'];

        return $dataRole;
    }
}
