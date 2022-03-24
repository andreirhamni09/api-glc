<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\API\PermisionRoleController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPermisionRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getPermisionRole   = json_decode(json_encode(PermisionRoleController::index()), true);
        
        $dataPermisionRoles = [];
        $arrIdPermisionRole = [];
        $arrRole            = [];
        $arrPermision       = [];

        if($getPermisionRole['original']['success'] == true)
        {
            foreach ($getPermisionRole['original']['data'] as $dataPermisionRole) {
                $arrRole[$dataPermisionRole['id_roles']]        = $dataPermisionRole['roles'];
            }
    
            foreach ($arrRole as $key => $value) {
                $arrCekPermision            = [];
                $arrCekIdPermisionRole      = [];
                foreach ($getPermisionRole['original']['data'] as $dataPermisionRole) {
                    if($value == $dataPermisionRole['roles'])
                    {
                        array_push($arrCekPermision, $dataPermisionRole['action']);
                        array_push($arrCekIdPermisionRole, $dataPermisionRole['id']);
                    }
                }
                $arrIdPermisionRole[$key] = $arrCekIdPermisionRole;
                $arrCekIdPermisionRole = [];
    
                $arrPermision[$key] = $arrCekPermision;
                $arrCekPermision = [];
            }

            $dataPermisionRoles = [
                'idPermisionRoleByRole' => $arrIdPermisionRole,
                'roleByRole'            => $arrRole,
                'permisionByRole'       => $arrPermision 
            ];
        }
        return view('karyawan.admin.permisions-roles', ['permisionsroles' => $dataPermisionRoles]);
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
        //
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
        $delPermisionRole = json_decode(json_encode(PermisionRoleController::destroy($id)), true);
        
        return $delPermisionRole['original'];
    }
}
