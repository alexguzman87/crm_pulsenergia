<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ConvertController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\TaskCotroller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\OportunityController;
use App\Http\Controllers\PostsaleController;
use App\Http\Controllers\SaveFilesController;
use App\Http\Controllers\WordpressFormController;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;
use Illuminate\Support\Facades\Artisan;

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
Route::get('home', [BasicController::class, 'home'])->name('home')->middleware('auth');

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
Route::get('lead',[ContactController::class,'index_lead'])->middleware('auth');
Route::get('client',[ContactController::class,'index_client'])->middleware('auth');
Route::get('lead_show_user/{user}',[ContactController::class,'show'])->middleware('auth')->name('lead_show_user');
Route::get('client_show_user/{user}',[ContactController::class,'show_client'])->middleware('auth')->name('client_show_user');
Route::get('lead_create',[ContactController::class,'create'])->middleware('auth');
Route::post('lead_create',[ContactController::class,'store'])->middleware('auth');
Route::get('lead_edit/{lead}',[ContactController::class,'edit'])->middleware('auth')->name('lead_edit');
Route::put('lead_edit/{lead}',[ContactController::class,'update'])->middleware('auth')->name('lead_update');
Route::put('lead_edit_user/{oportunity}',[ContactController::class,'updateUser'])->middleware('auth')->name('lead_edit_user');
Route::delete('lead_delete/{lead}',[ContactController::class,'destroy'])->middleware('auth')->name('lead_delete');

//CONFIGURACIONES

//Routes Notes - Task - Files
Route::post('task_lead_create',[TaskCotroller::class,'store_lead'])->middleware('auth')->name('task_lead_create');
Route::post('task_oportunity_create',[TaskCotroller::class,'store_oportunity'])->middleware('auth')->name('task_oportunity_create');
Route::post('notes_lead_create',[NotesController::class,'store_lead'])->middleware('auth')->name('notes_lead_create');
Route::post('notes_oportunity_create',[NotesController::class,'store_oportunity'])->middleware('auth')->name('notes_oportunity_create');
Route::post('store_file_lead',[SaveFilesController::class, 'store_file_lead'])->middleware('auth')->name('store_file_lead');
Route::get('download_file_lead/{file}',[SaveFilesController::class, 'download_file_lead'])->middleware('auth')->name('download_file_lead');
Route::post('store_file_oportunity',[SaveFilesController::class, 'store_file_oportunity'])->middleware('auth')->name('store_file_oportunity');
Route::get('download_file_oportunity/{file}',[SaveFilesController::class, 'download_file_oportunity'])->middleware('auth')->name('download_file_oportunity');


//OPORTUNITIES
Route::get('oportunity',[OportunityController::class,'index'])->middleware('auth')->name('oportunity');
Route::get('oportunity_list',[OportunityController::class,'index_list'])->middleware('auth')->name('oportunity_list');
Route::get('oportunity_create',[OportunityController::class,'create'])->middleware('auth');
Route::post('oportunity_create',[OportunityController::class,'store'])->middleware('auth');
Route::get('oportunity_show_user/{user}',[OportunityController::class,'show'])->middleware('auth')->name('oportunity_show_user');
Route::get('oportunity_show_list/{user}',[OportunityController::class,'show_list'])->middleware('auth')->name('oportunity_show_list');
Route::get('oportunity_edit/{oportunity}',[OportunityController::class,'edit'])->middleware('auth')->name('oportunity_edit');
Route::put('oportunity_edit/{oportunity}',[OportunityController::class,'update'])->middleware('auth')->name('oportunity_update');
Route::put('oportunity_edit_user/{oportunity}',[OportunityController::class,'updateUser'])->middleware('auth')->name('oportunity_edit_user');
Route::delete('oportunity_delete/{oportunity}',[OportunityController::class,'destroy'])->middleware('auth')->name('oportunity_delete');
Route::put('oportunity_change_status/{oportunity}',[OportunityController::class,'updateStatus'])->middleware('auth')->name('oportunity_change_status');


//CONVERT LEAD TO OPORTUNITY
Route::get('convert_to_oportunity/{lead}',[ConvertController::class,'show'])->middleware('auth')->name('convert_to_oportunity');
Route::post('convert_lead_to_oportunity/{lead}',[ConvertController::class,'convert'])->middleware('auth')->name('convert_lead_to_oportunity');


//CONFIG - ORIGIN
Route::get('config_lead_origin',[ConfigController::class, 'index_origin'])->name('config_lead_origin');
Route::get('config_lead_origin_create',[ConfigController::class,'create_origin']);
Route::post('config_lead_origin_create',[ConfigController::class,'store_origin']);
Route::get('config_lead_origin_edit/{origin}',[ConfigController::class,'edit_origin'])->name('config_lead_origin_edit');
Route::put('config_lead_origin_update/{origin}',[ConfigController::class,'update_origin'])->name('config_lead_origin_update');
Route::delete('config_lead_origin_delete/{origin}',[ConfigController::class,'destroy_origin'])->name('config_lead_origin_delete');

//CONFIG - TypeLead
Route::get('config_type_lead',[ConfigController::class, 'index_type'])->name('config_type_lead');
Route::get('config_type_lead_create',[ConfigController::class,'create_type']);
Route::post('config_type_lead_create',[ConfigController::class,'store_type'])->name('config_type_lead_create');
Route::get('config_type_lead_edit/{origin}',[ConfigController::class,'edit_type'])->name('config_type_lead_edit');
Route::put('config_type_lead_update/{origin}',[ConfigController::class,'update_type'])->name('config_type_lead_update');
Route::delete('config_type_lead_delete/{origin}',[ConfigController::class,'destroy_type'])->name('config_type_lead_delete');

//CONFIG - LevelLead
Route::get('config_level_lead',[ConfigController::class, 'index_level'])->name('config_level_lead');
Route::get('config_level_lead_create',[ConfigController::class,'create_level']);
Route::post('config_level_lead_create',[ConfigController::class,'store_level']);
Route::get('config_level_lead_edit/{origin}',[ConfigController::class,'edit_level'])->name('config_level_lead_edit');
Route::put('config_level_lead_update/{origin}',[ConfigController::class,'update_level'])->name('config_level_lead_update');
Route::delete('config_level_lead_delete/{origin}',[ConfigController::class,'destroy_level'])->name('config_level_lead_delete');


//Wordpress Form
route::get('leadsWeb', [WordpressFormController::class,'ShowForm'])->name('leadsWeb');
Route::get('convert_to_lead/{lead}',[WordpressFormController::class,'show'])->middleware('auth')->name('convert_to_lead');


//generalTask
Route::get('general_task',[TaskCotroller::class,'index'])->middleware('auth')->name('general_task');
Route::get('task_edit/{task}',[TaskCotroller::class,'edit_task'])->name('task_edit');
Route::put('task_update/{task}',[TaskCotroller::class,'task_update'])->name('task_update');
Route::put('task_change_status/{task}',[TaskCotroller::class,'update_status'])->middleware('auth')->name('task_change_status');
Route::put('task_change_priority/{task}',[TaskCotroller::class,'update_priority'])->middleware('auth')->name('task_change_priority');
Route::delete('task_delete/{task}',[TaskCotroller::class,'destroy'])->middleware('auth')->name('task_delete');

//XPORT

Route::get('lead_export',[LeadController::class, 'export'])->name('lead_export');
Route::get('user_export',[UserController::class, 'export'])->name('user_export');

//POSTSALE
Route::post('postsales_create',[PostsaleController::class,'store'])->name('postsales_create');



Route::get('calendar',[CalendarController::class,'index_calendar']);
Route::get('calendar/{user}',[CalendarController::class,'index_calendar_user']);


Route::view('leads', 'leadsWeb.contacts-list');





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


Route::get('send-mail', [MailController::class, 'index'])->name('send-mail');


Route::get('/optimize-clear', function(){
    Artisan::call('optimize:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    echo 'Cache cleared successfully!';
});





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