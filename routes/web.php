<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\TaskCotroller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\WordpressFormController;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

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
Route::get('user_edit_pass/{user}',[UserController::class,'edit_pass'])->name('user_edit_pass');
Route::put('user_edit/{user}',[UserController::class,'update'])->name('user_update');
Route::put('user_edit_pass/{user}',[UserController::class,'update_pass'])->name('user_update_pass');

Route::get('client',[LeadController::class,'index']);
Route::get('client_create',[LeadController::class,'create']);
Route::post('client_create',[LeadController::class,'store']);
Route::get('client_edit/{lead}',[LeadController::class,'edit'])->name('client_edit');
Route::get('client_edit_pass/{lead}',[LeadController::class,'edit_pass'])->name('client_edit_pass');
Route::put('client_edit/{lead}',[LeadController::class,'update'])->name('client_update');
Route::put('client_edit_pass/{lead}',[LeadController::class,'update_pass'])->name('client_update_pass');


Route::get('lead',[ContactController::class,'index']);
Route::get('lead_create',[ContactController::class,'create']);
Route::post('lead_create',[ContactController::class,'store']);
Route::get('lead_edit/{contact}',[ContactController::class,'edit'])->name('lead_edit');
Route::put('lead_edit/{contact}',[ContactController::class,'update'])->name('lead_update');

Route::get('task_create',[TaskCotroller::class,'create']);
Route::post('task_create',[TaskCotroller::class,'store']);
Route::get('contact_edit/{contact}',[ContactController::class,'edit'])->name('contact_edit');
Route::put('contact_edit/{contact}',[ContactController::class,'update'])->name('contact_update');

route::get('contact_web', [WordpressFormController::class,'ShowForm'])->name('formulario');

Route::get('send-mail', [MailController::class, 'index'])->name('send-mail');

Route::get('lead_export',[LeadController::class, 'export'])->name('lead_export');
Route::get('user_export',[UserController::class, 'export'])->name('user_export');

route::view('icons1','templates.icons-boxicons');
route::view('icons2','templates.icons-feathericons');
route::view('icons3','templates.icons-fontawesome');
route::view('icons4','templates.icons-materialdesign');
route::view('icons5','templates.icons-unicons.blade');
route::view('contactos1','templates.contacts-grid');
route::view('contactos2','templates.contacts-list');
route::view('contactos3','templates.contacts-settings');
route::view('contactos4','templates.pages-profile');
route::view('formulario1','templates.form-advanced');
route::view('formulario2','templates.form-editors');
route::view('formulario3','templates.form-elements');
route::view('formulario4','templates.form-mask');
route::view('formulario5','templates.form-uploads');
route::view('formulario6','templates.form-validation');
route::view('formulario7','templates.form-wizard');

// Esta es la ruta de prueba de nuevos componentes




route::get('test', [UserController::class,'test'])->name('test');