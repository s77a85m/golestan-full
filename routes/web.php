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
//////////////////////////////// admin
// RoleController
Route::controller(\App\Http\Controllers\Admin\RoleController::class)->group(function (){
    Route::get('/admin/role_gss_e_group/', 'index')->name('admin.role.index');
    Route::post('/admin/role_gss_e_group/create', 'store')->name('admin.role.create');
    Route::get('/show_permissions_of_role', 'permissions')->name('admin.role.show.permission');
    Route::patch('/admin/role_gss_e_group/update/{role}', 'update')->name('admin.role.update');
    Route::delete('/admin/role_gss_e_group/delete/{role}', 'destroy')->name('admin.role.delete');
});

// UnitController
Route::controller(\App\Http\Controllers\Admin\UnitController::class)->group(function (){
    Route::get('/admin/units', 'index')->name('admin.unit.index');
    Route::get('/show_old_unit', 'oldUnit')->name('old.unit.index');
    Route::post('/admin/units', 'store')->name('admin.unit.create');
    Route::get('/get_unit_of_orientation', 'parents')->name('admin.unit.show.parent');
    Route::patch('/admin/units/update/{unit}', 'update')->name('admin.unit.update');
    Route::delete('/admin/units/delete/{unit}', 'destroy')->name('admin.unit.delete');
});

///////////////////////////////  client
// homeController
Route::controller(\App\Http\Controllers\Client\HomeController::class)->group(function (){
    Route::get('/', 'index')->name('home');
    Route::get('/get_orientation_of_major', 'orientation')->name('get.orientation.major');
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


