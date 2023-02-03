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
Route::middleware(['auth:admin',])->controller(\App\Http\Controllers\Admin\RoleController::class)->group(function (){
    Route::get('/admin/role_gss_e_group/', 'index')->name('admin.role.index');
    Route::post('/admin/role_gss_e_group/create', 'store')->name('admin.role.create');
    Route::get('/show_permissions_of_role', 'permissions')->name('admin.role.show.permission');
    Route::patch('/admin/role_gss_e_group/update/{role}', 'update')->name('admin.role.update');
    Route::delete('/admin/role_gss_e_group/delete/{role}', 'destroy')->name('admin.role.delete');
});

// UnitController
Route::middleware(['auth:admin', \App\Http\Middleware\CheckPermission::class . ':index_unit'])->controller(\App\Http\Controllers\Admin\UnitController::class)->group(function (){
    Route::get('/admin/units', 'index')->name('admin.unit.index');
    Route::get('/show_old_unit', 'oldUnit')->name('old.unit.index');
    Route::post('/admin/units', 'store')->name('admin.unit.create');
    Route::get('/get_unit_of_orientation', 'parents')->name('admin.unit.show.parent');
    Route::patch('/admin/units/update/{unit}', 'update')->name('admin.unit.update');
    Route::delete('/admin/units/delete/{unit}', 'destroy')->name('admin.unit.delete');
});

// ProfessorController
Route::middleware('auth:admin')->controller(\App\Http\Controllers\Admin\ProfessorController::class)->group(function (){
    Route::get('/admin/professors', 'index')->name('admin.professor.index');
    Route::post('/admin/professors', 'store')->name('admin.professor.store');
    Route::get('/show_old_professor', 'oldProfessor')->name('old.professor.index');
    Route::patch('/admin/professors/update/{professor}', 'update')->name('admin.professor.update');
    Route::delete('/admin/professors/delete/{professor}', 'destroy')->name('admin.professor.delete');
});

// SelectUnitController
Route::middleware('auth:admin')->controller(\App\Http\Controllers\Admin\SelectUnitController::class)->group(function (){
    Route::get('/admin/selectUnit', 'index')->name('admin.selectUnit.index');
    Route::post('/admin/selectUnit', 'store')->name('admin.selectUnit.store');
});

// UnitOfSelectUnitController
Route::middleware('auth:admin')->controller(\App\Http\Controllers\Admin\UnitOfSelectUnitController::class)->group(function (){
    Route::post('/admin/UnitOfSelectUnit', 'store')->name('admin.UnitOfSelectUnit.store');
    Route::delete('/admin/UnitOfSelectUnit/delete/{unitOfSelectUnit}', 'destroy')->name('admin.UnitOfSelectUnit.delete');
});

// AdminLoginController
Route::controller(\App\Http\Controllers\Admin\AdminLoginController::class)->group(function (){
    Route::get('/admin/login/panel', 'index')->name('admin.login.panel')->middleware('guest:admin');
    Route::post('/admin/login', 'login')->name('admin.login')->middleware('guest:admin');
    Route::delete('/admin/logout', 'logout')->name('admin.logout')->middleware('auth:admin');
});


///////////////////////////////  client
// homeController
Route::middleware('guest')->controller(\App\Http\Controllers\Client\HomeController::class)->group(function (){
    Route::get('/', 'index')->name('home');
    Route::get('/get_orientation_of_major', 'orientation')->name('get.orientation.major');
});

// RegisterController
Route::controller(\App\Http\Controllers\Client\RegisterController::class)->group(function (){
    Route::post('/register', 'store')->name('register')->middleware('guest');
    Route::post('/student/login', 'login')->name('student.login')->middleware('guest');
    Route::delete('/student/logout', 'logout')->name('student.logout')->middleware('auth');
});

// Captcha
Route::controller(\App\Http\Controllers\Client\CaptchaController::class)->group(function (){
    Route::post('/captcha/reload', 'reload')->name('captcha.reload');
});

// Client dashboard
Route::middleware('auth')->controller(\App\Http\Controllers\Client\DashboardController::class)->group(function (){
    Route::get('/dashboard', 'index')->name('dashboard.info');
});

// UnitOfSelectUnit
Route::middleware('auth')->controller(\App\Http\Controllers\Client\UnitOfSelectUnitController::class)->group(function (){
    Route::get('/dashboard/selectUnit/available', 'index')->name('client.selectUnit.available');
});

