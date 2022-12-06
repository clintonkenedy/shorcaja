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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/qrcheck', function () {
    return view('qr.qrcheck');
});

Route::get('/',[TicketController::class, 'invitacion']);
Route::get('qrcreate',[TicketController::class,'qrcreate']);
Route::get('generar',[TicketController::class,'qrinvitacion'])->name('qrinvitacion');
Route::put('validar/{id}',[TicketController::class,'update_ticket']);


Route::resource('estudiantes',EstudianteController::class);
Route::resource('tickets',TicketController::class);
Route::get('est',[EstudianteController::class,'est']);
//Route::post('gaa',[EstudianteController::class,'gaa']);
Route::get('formulary2',function(){
    return view('estudiante.prueba');
});
Route::post('proccess2',[EstudianteController::class,'gaa']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
