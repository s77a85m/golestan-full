<?php

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


// homeController
Route::controller(\App\Http\Controllers\Client\HomeController::class)->group(function (){
    Route::get('/', 'index')->name('home');
    Route::get('/get_orientation_of_major', 'orientation')->name('get.orientation.major');
});

// RoleController
Route::controller(\App\Http\Controllers\Admin\RoleController::class)->group(function (){
    Route::get('/admin/role_gss_e_group/', 'index')->name('admin.role.index');
    Route::post('/admin/role_gss_e_group/create', 'store')->name('admin.role.create');
    Route::get('/show_permissions_of_role', 'permissions')->name('admin.role.show.permission');
    Route::patch('/admin/role_gss_e_group/update/{role}', 'update')->name('admin.role.update');
    Route::delete('/admin/role_gss_e_group/delete/{role}', 'destroy')->name('admin.role.delete');
});

// RegisterController
Route::controller(\App\Http\Controllers\Client\RegisterController::class)->group(function (){
    Route::post('/register', 'store')->name('register');
    Route::post('/student/login', 'login')->name('student.login');
    Route::delete('/student/logout', 'logout')->name('student.logout');
});

// Captcha
Route::controller(\App\Http\Controllers\Client\CaptchaController::class)->group(function (){
    Route::post('/captcha/reload', 'reload')->name('captcha.reload');
});

// Client dashboard
Route::controller(\App\Http\Controllers\Client\DashboardController::class)->group(function (){
    Route::get('/dashboard', 'index')->name('dashboard.info');
});


