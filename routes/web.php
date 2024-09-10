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

//Routes Login
Route::get('/login', [AuthController::class,'show']);
Route::post('/login', [AuthController::class,'login'])->name('login');
Route::get('/logout', [AuthController::class,'logout'])->middleware('auth');

Route::middleware('auth')->group(function() {

    //ROUTES PRINCIPALES
    Route::get('/', [BasicController::class, 'home'])->name('home');
    Route::get('home', [BasicController::class, 'home'])->name('home');

    Route::middleware('admin')->group(function() {
        
        //Routes de Usuario
        Route::get('user',[UserController::class,'index']);
        Route::get('user_create',[UserController::class,'create']);
        Route::post('user_create',[UserController::class,'store']);
        Route::get('user_edit/{user}',[UserController::class,'edit'])->name('user_edit');
        Route::get('user_edit_pass/{user}',[UserController::class,'edit_pass'])->name('user_edit_pass');
        Route::put('user_edit/{user}',[UserController::class,'update'])->name('user_update');
        Route::put('user_edit_pass/{user}',[UserController::class,'update_pass'])->name('user_update_pass');
        Route::delete('user_delete/{user}',[UserController::class,'destroy'])->name('user_delete');

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
    });
    
    //Routes Leads
    Route::get('lead',[ContactController::class,'index_lead'])->middleware('admin');
    Route::get('client',[ContactController::class,'index_client'])->middleware('admin');
    Route::get('lead_show_user/{user}',[ContactController::class,'show'])->name('lead_show_user');
    Route::get('client_show_user/{user}',[ContactController::class,'show_client'])->name('client_show_user');
    Route::get('lead_create',[ContactController::class,'create'])->name('lead_create');
    Route::get('client_create',[ContactController::class,'create'])->name('client_create');
    Route::post('lead_create',[ContactController::class,'store']);
    Route::get('lead_edit/{lead}',[ContactController::class,'edit'])->name('lead_edit');
    Route::put('lead_edit/{lead}',[ContactController::class,'update'])->name('lead_update');
    Route::put('lead_edit_user/{oportunity}',[ContactController::class,'updateUser'])->name('lead_edit_user');
    Route::delete('lead_delete/{lead}',[ContactController::class,'destroy'])->name('lead_delete');

    //Routes Notes - Task - Files
    Route::post('task_lead_create',[TaskCotroller::class,'store_lead'])->name('task_lead_create');
    Route::post('task_oportunity_create',[TaskCotroller::class,'store_oportunity'])->name('task_oportunity_create');
    Route::post('notes_lead_create',[NotesController::class,'store_lead'])->name('notes_lead_create');
    Route::post('notes_oportunity_create',[NotesController::class,'store_oportunity'])->name('notes_oportunity_create');
    Route::post('store_file_lead',[SaveFilesController::class, 'store_file_lead'])->name('store_file_lead');
    Route::get('download_file_lead/{file}',[SaveFilesController::class, 'download_file_lead'])->name('download_file_lead');
    Route::post('store_file_oportunity',[SaveFilesController::class, 'store_file_oportunity'])->name('store_file_oportunity');
    Route::get('download_file_oportunity/{file}',[SaveFilesController::class, 'download_file_oportunity'])->name('download_file_oportunity');

    //OPORTUNITIES
    Route::get('oportunity',[OportunityController::class,'index'])->middleware('admin')->name('oportunity');
    Route::get('oportunity_list',[OportunityController::class,'index_list'])->middleware('admin')->name('oportunity_list');
    Route::get('oportunity_create',[OportunityController::class,'create']);
    Route::post('oportunity_create',[OportunityController::class,'store']);
    Route::get('oportunity_show_user/{user}',[OportunityController::class,'show'])->name('oportunity_show_user');
    Route::get('oportunity_show_list/{user}',[OportunityController::class,'show_list'])->name('oportunity_show_list');
    Route::get('oportunity_edit/{oportunity}',[OportunityController::class,'edit'])->name('oportunity_edit');
    Route::put('oportunity_edit/{oportunity}',[OportunityController::class,'update'])->name('oportunity_update');
    Route::put('oportunity_edit_user/{oportunity}',[OportunityController::class,'updateUser'])->name('oportunity_edit_user');
    Route::delete('oportunity_delete/{oportunity}',[OportunityController::class,'destroy'])->name('oportunity_delete');
    Route::put('oportunity_change_status/{oportunity}',[OportunityController::class,'updateStatus'])->name('oportunity_change_status');


    //CONVERT LEAD TO OPORTUNITY
    Route::get('convert_to_oportunity/{lead}',[ConvertController::class,'show'])->name('convert_to_oportunity');
    Route::post('convert_lead_to_oportunity/{lead}',[ConvertController::class,'convert'])->name('convert_lead_to_oportunity');

    //Wordpress Form
    route::get('leadsWeb', [WordpressFormController::class,'ShowForm'])->name('leadsWeb');
    Route::get('convert_to_lead/{lead}',[WordpressFormController::class,'show'])->name('convert_to_lead');

    //generalTask
    Route::get('general_task',[TaskCotroller::class,'index'])->name('general_task');
    Route::get('task_edit/{task}',[TaskCotroller::class,'edit_task'])->name('task_edit');
    Route::put('task_update/{task}',[TaskCotroller::class,'task_update'])->name('task_update');
    Route::put('task_change_status/{task}',[TaskCotroller::class,'update_status'])->name('task_change_status');
    Route::put('task_change_priority/{task}',[TaskCotroller::class,'update_priority'])->name('task_change_priority');
    Route::delete('task_delete/{task}',[TaskCotroller::class,'destroy'])->name('task_delete');

    //XPORT
    Route::get('lead_export',[LeadController::class, 'export'])->name('lead_export');
    Route::get('user_export',[UserController::class, 'export'])->name('user_export');

    //POSTSALE
    Route::post('postsales_create',[PostsaleController::class,'store'])->name('postsales_create');

    //CALENDAR
    Route::get('calendar',[CalendarController::class,'index_calendar']);

    Route::view('leads', 'leadsWeb.contacts-list');
    
    Route::get('client_edit/{lead}',[LeadController::class,'edit'])->name('client_edit');
    Route::get('client_edit_pass/{lead}',[LeadController::class,'edit_pass'])->name('client_edit_pass');
    Route::put('client_edit/{lead}',[LeadController::class,'update'])->name('client_update');
    Route::put('client_edit_pass/{lead}',[LeadController::class,'update_pass'])->name('client_update_pass');


    Route::get('task_create',[TaskCotroller::class,'create']);
    Route::post('task_create',[TaskCotroller::class,'store']);

    Route::get('contact_edit/{contact}',[ContactController::class,'edit'])->name('contact_edit');
    Route::put('contact_edit/{contact}',[ContactController::class,'update'])->name('contact_update');


    Route::get('send-mail', [MailController::class, 'index'])->name('send-mail');

    /*
    Route::get('/optimize-clear', function(){
        Artisan::call('optimize:clear');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        echo 'Cache cleared successfully!';
    });*/

    route::get('test', [UserController::class,'test'])->name('test');

});
