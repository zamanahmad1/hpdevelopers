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
    return view('welcome');
});

Auth::routes();
//for users
Route::Resource('users', App\Http\Controllers\Users\UserController::class);
Route::put('users/restore/{id}',[App\Http\Controllers\Users\UserController::class, 'restore']);
//for roles
Route::Resource('roles',\App\Http\Controllers\Users\RolesController::class);
//for permissions
Route::Resource('permissions',\App\Http\Controllers\Users\PermissionController::class);
//for user roles
Route::get('userroles',[App\Http\Controllers\Users\UserRolesController::class, 'index'])->name('userroles');
Route::get('userroles/{user}/edit',[App\Http\Controllers\Users\UserRolesController::class, 'edit']);
Route::put('userroles/{user}',[App\Http\Controllers\Users\UserRolesController::class, 'update']);
//for role permissions
Route::get('rolepermissions',[App\Http\Controllers\Users\RolePermissionsController::class,'index'])->name('rolepermissions');
Route::get('rolepermissions/{role}/edit',[App\Http\Controllers\Users\RolePermissionsController::class,'edit']);
Route::put('rolepermissions/{role}',[App\Http\Controllers\Users\RolePermissionsController::class,'update']);
//Dashboard
Route::get('/Dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('Dashboard');

