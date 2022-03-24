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
        $getPermisionRole   = PermisionRoleController::index();
        $getPermisionRole   = json_decode(json_encode($getPermisionRole), true);

        $arrIdPermisionRole = [];
        $arrRole            = [];
        $arrPermision       = [];
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
        print_r($arrIdPermisionRole); echo '<br>';
        print_r($arrRole); echo '<br>';
        print_r($arrPermision);echo '<br>';echo '<br>';

        $dataPermisionRole = [
            'idPermisionRoleByRole' => $arrIdPermisionRole,
            'roleByRole'            => $arrRole,
            'permisionByRole'       => $arrPermision 
        ];

        foreach ($dataPermisionRole['roleByRole'] as $keyRole => $valueRole) {
            $id         = '';
            $permision  = '';
            foreach ($dataPermisionRole['idPermisionRoleByRole'] as $keyId => $valueId) {
                if($keyRole == $keyId)
                {
                    $id = implode(',', $valueId);
                }
            }
            echo $id.'<br>';
            
            foreach ($dataPermisionRole['permisionByRole'] as $keyAction => $valueAction) {
                if($keyRole == $keyAction)
                {
                    $permision = implode(',', $valueAction);
                }
            }
            echo $permision.'<br>';
        }
        //return view('karyawan.admin.permisions-roles', ['permisionsroles' => $getPermisionRole['original']]);
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
        //
    }
}
