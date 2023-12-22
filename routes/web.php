<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
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

Route::get('', function () {
    return view('welcome');
});

// Route::group(['middleware' =>['auth', 'pangkat:admin,user']],function(){
//     Route::get('/admin', [GuruController::class,'admin']);
//     Route::get('/user', [SiswaController::class,'user']);
// });


Route::get('/', [LoginController::class,'formlogin']);
Route::post('/login', [LoginController::class,'login'])->name('login');
Route::get('/logout', [LoginController::class,'logout']);
Route::group(['middleware'=>['auth', 'pangkat:admin,user']], function(){
    Route::get('/admin', [GuruController::class,'admin']);
    //user
    Route::get('/user', [GuruController::class,'user']);
    //kepsek
    Route::get('/kepsek', [GuruController::class,'kepsek']);
});

Route::post('/tambah', [GuruController::class,'store']);
Route::post('/edit', [GuruController::class,'edit']);
Route::get('/delete/{id}', [GuruController::class,'delete']);
