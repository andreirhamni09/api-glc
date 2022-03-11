<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


# ~~ ADMIN

 # ~~ Jurusan 
  use App\Http\Controllers\API\JurusanController;
 # ~~

 # ~~ JalurPendaftaran
  use App\Http\Controllers\API\JalurPendaftaranController;
 # ~~

 
 # ~~ Pendaftaran 
  use App\Http\Controllers\API\PendaftaranController;
 # ~~ 

 # ~~ Role 
  use App\Http\Controllers\API\RoleController;
 # ~~ 

 # ~~ Permision
  use App\Http\Controllers\API\PermisionsController;
 # ~~

  # ~~ Permision Role
  use App\Http\Controllers\API\PermisionRoleController;
use App\Http\Controllers\API\TanggalPendaftaranController;
use App\Models\TanggalPendaftaran;

 # ~~
# ~~




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    
});


# ~~PESERTA DIDIK

# ~~

# ~~ ADMIN

    // Route::resources('jurusan', JurusanController::class);

    Route::prefix('admin')->group(function(){
       # ~~ Jurusan
        Route::resource('jurusan', JurusanController::class);
       # ~~

       # ~~ Jalur Pendaftaran
        Route::resource('jalurpendaftaran', JalurPendaftaranController::class);
       # ~~

       # ~~ Pendaftaran
        Route::resource('pendaftaran', PendaftaranController::class);
       # ~~ 

       # ~~ TanggalPendaftaran
        Route::resource('tanggal-pendaftaran', TanggalPendaftaranController::class);
        /* Route::post('add-tanggal-pendaftaran/{idPendaftaran}', [TanggalPendaftaran::class, 'index']);
        Route::post('upd-tanggal-pendaftaran/{idPendaftaran}', [TanggalPendaftaran::class, 'index']); */
       # ~~

       # ~~ Role
        Route::resource('role', RoleController::class);
       # ~~

       # ~~ Permision
        Route::resource('permision', PermisionsController::class);
       # ~~ 

       # ~~ Permision Role
       Route::resource('permisionrole', PermisionRoleController::class);
       # ~~ 
    });
# ~~ ADMIN