<?php
# ~~ Peserta didik
use App\Http\Controllers\Siswa\LoginPesertaDidikController;
# ~~ Peserta didik


use App\Http\Controllers\Admin\AdminJurusanController;
use App\Http\Controllers\Admin\AdminMatakuliahController;
use App\Http\Controllers\Admin\AdminPermisionController;
use App\Http\Controllers\Admin\AdminPermisionRoleController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\API\JurusanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

# ~~ Peserta Didik
 Route::prefix('/')->group(function(){
    Route::get('', [LoginPesertaDidikController::class, 'Login']);
 });
# ~~

 Route::prefix('/admin')->group(function(){
    Route::resource('jurusan', AdminJurusanController::class);   
    Route::resource('mata-kuliahs', AdminMatakuliahController::class);
    Route::resource('permision', AdminPermisionController::class);
    Route::resource('role', AdminRoleController::class);
    Route::resource('permision-role', AdminPermisionRoleController::class);


 });
# ~~



Route::get('getJurusan', [AdminJurusanController::class, 'getJurusan']);
