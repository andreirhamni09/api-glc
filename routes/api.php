<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


# ~~ ADMIN
 use App\Http\Controllers\API\JurusanController;
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
        #
        Route::post('jurusan/{id}', [JurusanController::class, 'update']);
       # ~~
    });
# ~~ ADMIN