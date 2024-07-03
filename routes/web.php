<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\TaskCotroller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\SaveFilesController;
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

Route::get('/', [BasicController::class, 'home'])->name('home')->middleware('auth');
Route::view('home', 'index')->name('home')->middleware('auth');

//Routes Login
Route::get('/login', [AuthController::class,'show']);
Route::post('/login', [AuthController::class,'login'])->name('login');
Route::get('/logout', [AuthController::class,'logout'])->middleware('auth');

//Routes de Usuario
Route::get('user',[UserController::class,'index'])->middleware('auth');
Route::get('user_create',[UserController::class,'create'])->middleware('auth');
Route::post('user_create',[UserController::class,'store'])->middleware('auth');
Route::get('user_edit/{user}',[UserController::class,'edit'])->middleware('auth')->name('user_edit');
Route::get('user_edit_pass/{user}',[UserController::class,'edit_pass'])->middleware('auth')->name('user_edit_pass');
Route::put('user_edit/{user}',[UserController::class,'update'])->middleware('auth')->name('user_update');
Route::put('user_edit_pass/{user}',[UserController::class,'update_pass'])->middleware('auth')->name('user_update_pass');
Route::delete('user_delete/{user}',[UserController::class,'destroy'])->middleware('auth')->name('user_delete');

//Routes Leads
Route::get('lead',[ContactController::class,'index'])->middleware('auth');
Route::get('lead_create',[ContactController::class,'create'])->middleware('auth');
Route::post('lead_create',[ContactController::class,'store'])->middleware('auth');
Route::get('lead_edit/{lead}',[ContactController::class,'edit'])->middleware('auth')->name('lead_edit');
Route::put('lead_edit/{lead}',[ContactController::class,'update'])->middleware('auth')->name('lead_update');
Route::delete('lead_delete/{lead}',[ContactController::class,'destroy'])->middleware('auth')->name('lead_delete');

//CONFIGURACIONES

//Routes Notes and Task
Route::post('task_create',[TaskCotroller::class,'store']);
Route::post('notes_create',[NotesController::class,'store']);


//ORIGIN
Route::get('config_origin',[ConfigController::class, 'index'])->name('config_origin');
Route::post('config_origin_create',[ConfigController::class,'store'])->name('config_origin_create');
Route::get('config_origin_edit/{origin}',[ConfigController::class,'edit'])->name('config_origin_edit');
Route::put('config_origin_update/{origin}',[ConfigController::class,'update'])->name('config_origin_update');
Route::delete('config_origin_delete/{origin}',[ConfigController::class,'destroy'])->name('config_origin_delete');


Route::view('leads', 'leadsWeb.contacts-list');
Route::view('oportunity', 'oportunity.apps-kanban-board');
Route::view('leadsWeb', 'viewName');




Route::get('client',[LeadController::class,'index']);
Route::get('client_create',[LeadController::class,'create']);
Route::post('client_create',[LeadController::class,'store']);
Route::get('client_edit/{lead}',[LeadController::class,'edit'])->name('client_edit');
Route::get('client_edit_pass/{lead}',[LeadController::class,'edit_pass'])->name('client_edit_pass');
Route::put('client_edit/{lead}',[LeadController::class,'update'])->name('client_update');
Route::put('client_edit_pass/{lead}',[LeadController::class,'update_pass'])->name('client_update_pass');




Route::get('task_create',[TaskCotroller::class,'create']);
Route::post('task_create',[TaskCotroller::class,'store']);

Route::get('contact_edit/{contact}',[ContactController::class,'edit'])->name('contact_edit');
Route::put('contact_edit/{contact}',[ContactController::class,'update'])->name('contact_update');

route::get('contact_web', [WordpressFormController::class,'ShowForm'])->name('formulario');

Route::get('send-mail', [MailController::class, 'index'])->name('send-mail');

Route::get('lead_export',[LeadController::class, 'export'])->name('lead_export');
Route::get('user_export',[UserController::class, 'export'])->name('user_export');



Route::get('loadFile',[SaveFilesController::class, 'loadFile'])->name('loadFile');
Route::post('storeFile',[SaveFilesController::class, 'storeFile'])->name('storeFile');
Route::get('downloadFile/{file}',[SaveFilesController::class, 'downloadFile'])->name('downloadFile');


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