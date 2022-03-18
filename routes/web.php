<?php

use App\Http\Controllers\Admin\AdminJurusanController;
use App\Http\Controllers\Admin\AdminMatakuliahController;
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
    Route::get('', function(){
        return view('test');
    });
 });

 Route::prefix('/admin')->group(function(){
    Route::resource('jurusan', AdminJurusanController::class);   
    Route::resource('mata-kuliahs', AdminMatakuliahController::class);
 });
# ~~

Route::post('del-jurusan', function(){
    return 'Mantap'; 
});


Route::get('/test', function(){
    return view('test');
});

Route::post('/profile/{id}', function(Request $request, $id){
    return $id;
});
