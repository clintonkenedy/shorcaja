<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\QrCodeController;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/qrcheck', function () {
    return view('qr.qrcheck');
});



Route::resource('estudiantes',EstudianteController::class);
Route::resource('tickets',TicketController::class);
Route::get('est',[EstudianteController::class,'est']);
Route::get('qrcreate',[QrCodeController::class,'index']);
//Route::post('gaa',[EstudianteController::class,'gaa']);
Route::get('formulary2',function(){
    return view('estudiante.prueba');
});
Route::post('proccess2',[EstudianteController::class,'gaa']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
