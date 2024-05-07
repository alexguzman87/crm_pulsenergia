<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WordpressFormController;

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
Route::get('/logout', [AuthController::class,'logout'])->middleware('auth');

Route::view('home', 'index')->middleware('auth');;

Route::get('user',[UserController::class,'index']);
Route::get('user_create',[UserController::class,'create']);
Route::post('user_create',[UserController::class,'store']);
Route::get('user_edit/{user}',[UserController::class,'edit'])->name('user_edit');
Route::put('user_edit/{user}',[UserController::class,'update'])->name('user_update');

Route::get('contact',[ContactController::class,'index']);
Route::get('contact_create',[ContactController::class,'create']);
Route::post('contact_create',[ContactController::class,'store']);
Route::get('contact_edit/{contact}',[ContactController::class,'edit'])->name('contact_edit');
Route::put('contact_edit/{contact}',[ContactController::class,'update'])->name('contact_update');


route::get('contact_web', [WordpressFormController::class,'ShowForm'])->name('formulario');

route::view('icons1','templates.icons-boxicons');
route::view('icons2','templates.icons-feathericons');
route::view('icons3','templates.icons-fontawesome');
route::view('icons4','templates.icons-materialdesign');
route::view('icons5','templates.icons-unicons.blade');
route::view('contacts-grid','templates.contacts-list');
route::view('formulario1','templates.form-advanced');
route::view('formulario2','templates.form-editors');
route::view('formulario3','templates.form-elements');
route::view('formulario4','templates.form-mask');
route::view('formulario5','templates.form-uploads');
route::view('formulario6','templates.form-validation');
route::view('formulario7','templates.form-wizard');

// Esta es la ruta de prueba de nuevos componentes

route::get('test', [UserController::class,'test'])->name('test');