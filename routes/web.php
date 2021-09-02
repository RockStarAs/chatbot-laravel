<?php

use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/casa', [App\Http\Controllers\HomeController::class, 'index2']);

Route::get('/auth/google/redirect',[GoogleController::class,'redirect']);
Route::get('/auth/google/callback',[GoogleController::class,'callback']);

Route::post('chatify/replyBot',[App\Http\Controllers\MessagesController::class,'mensajeBot']);

