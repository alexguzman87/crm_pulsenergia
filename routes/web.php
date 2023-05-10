<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

Route::get('/', [BasicController::class, 'home'])->middleware('auth');;

Route::get('/login', [AuthController::class,'show']);
Route::post('/login', [AuthController::class,'login'])->name('login');
Route::post('/logout', [AuthController::class,'logout'])->middleware('auth');

Route::view('home', 'index')->middleware('auth');;

Route::get('user',[UserController::class,'index']);
Route::get('user_create',[UserController::class,'create']);
Route::post('user_create',[UserController::class,'store']);