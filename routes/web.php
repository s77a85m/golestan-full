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

Route::get('/', function () {
    return view('Home.index');
});

Route::controller(\App\Http\Controllers\Admin\RoleController::class)->group(function (){
    Route::get('/admin/role_gss_e_group/', 'index')->name('admin.role.index');
    Route::post('/admin/role_gss_e_group/create', 'store')->name('admin.role.create');
    Route::get('/show_permissions_of_role', 'permissions')->name('admin.role.show.permission');
    Route::patch('/admin/role_gss_e_group/update/{role}', 'update')->name('admin.role.update');
    Route::delete('/admin/role_gss_e_group/delete/{role}', 'destroy')->name('admin.role.delete');
});


