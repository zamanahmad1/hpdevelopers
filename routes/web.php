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
Route::get('users',[\App\Http\Controllers\Users\UserController::class,'index'])->middleware('permission:view users')->name('users.index');
Route::get('users/{user}/edit',[\App\Http\Controllers\Users\UserController::class,'edit'])->middleware('permission:edit users')->name('users.edit');
Route::put('users/{user}',[\App\Http\Controllers\Users\UserController::class,'update'])->middleware('permission:update users')->name('users.update');
Route::delete('users/{user}',[\App\Http\Controllers\Users\UserController::class,'destroy'])->middleware('permission:delete users')->name('users.destroy');
Route::put('users/restore/{id}',[\App\Http\Controllers\Users\UserController::class, 'restore'])->middleware('permission:restore users')->name('users.restore');
//for roles
Route::get('roles',[\App\Http\Controllers\Users\RolesController::class,'index'])->middleware('permission:view roles')->name('roles.index');
Route::get('roles/create',[\App\Http\Controllers\Users\RolesController::class,'create'])->middleware('permission:create roles')->name('roles.create');
Route::post('roles',[\App\Http\Controllers\Users\RolesController::class,'store'])->middleware('permission:store roles')->name('roles.store');
Route::get('roles/{role}/edit',[\App\Http\Controllers\Users\RolesController::class,'edit'])->middleware('permission:edit roles')->name('roles.edit');
Route::put('roles/{role}',[\App\Http\Controllers\Users\RolesController::class,'update'])->middleware('permission:update roles')->name('roles.update');
Route::delete('roles/{role}',[\App\Http\Controllers\Users\RolesController::class,'destroy'])->middleware('permission:delete roles')->name('roles.destroy');
//for permissions
Route::get('permissions',[\App\Http\Controllers\Users\PermissionController::class,'index'])->middleware('permission:view permissions')->name('permissions.index');
Route::get('permissions/create',[\App\Http\Controllers\Users\PermissionController::class,'create'])->middleware('permission:create permissions')->name('permissions.create');
Route::post('permissions',[\App\Http\Controllers\Users\PermissionController::class,'store'])->middleware('permission:store permissions')->name('permissions.store');
Route::get('permissions/{permission}/edit',[\App\Http\Controllers\Users\PermissionController::class,'edit'])->middleware('permission:edit permissions')->name('permissions.edit');
Route::put('permissions/{permission}',[\App\Http\Controllers\Users\PermissionController::class,'update'])->middleware('permission:update permissions')->name('permissions.update');
Route::delete('permissions/{permission}',[\App\Http\Controllers\Users\PermissionController::class,'destroy'])->middleware('permission:delete permissions')->name('permissions.destroy');
//for user roles
Route::get('userroles',[\App\Http\Controllers\Users\UserRolesController::class, 'index'])->middleware('permission:view user roles')->name('userroles.index');
Route::get('userroles/{user}/edit',[\App\Http\Controllers\Users\UserRolesController::class, 'edit'])->middleware('permission:edit user roles')->name('userroles.edit');
Route::put('userroles/{user}',[\App\Http\Controllers\Users\UserRolesController::class, 'update'])->middleware('permission:update user roles')->name('userroles.update');
//for role permissions
Route::get('rolepermissions',[\App\Http\Controllers\Users\RolePermissionsController::class,'index'])->middleware('permission:view role permissions')->name('rolepermissions.index');
Route::get('rolepermissions/{role}/edit',[\App\Http\Controllers\Users\RolePermissionsController::class,'edit'])->middleware('permission:edit role permissions')->name('rolepermissions.edit');
Route::put('rolepermissions/{role}',[\App\Http\Controllers\Users\RolePermissionsController::class,'update'])->middleware('permission:update role permissions')->name('rolepermissions.update');
//for user direct permissions
Route::get('userpermissions',[\App\Http\Controllers\Users\UserDirectPermissionsController::class, 'index'])->middleware('permission:view user permissions')->name('userpermissions.index');
Route::get('userpermissions/{user}/edit',[\App\Http\Controllers\Users\UserDirectPermissionsController::class, 'edit'])->middleware('permission:edit user permissions')->name('userpermissions.edit');
Route::put('userpermissions/{user}' , [\App\Http\Controllers\Users\UserDirectPermissionsController::class, 'update'])->middleware('permission:update user permissions')->name('userpermissions.update');
//for projects
Route::get('projects',[\App\Http\Controllers\Company\ProjectController::class,'index'])->middlewares('permission:view projects')->name('projects.index');
Route::get('projects/create',[\App\Http\Controllers\Company\ProjectController::class,'create'])->middlewares('permission:create projects')->name('projects.create');
Route::post('projects',[\App\Http\Controllers\Company\ProjectController::class,'store'])->middlewares('permission:store projects')->name('projects.store');
Route::get('projects/{project}/edit',[\App\Http\Controllers\Company\ProjectController::class,'edit'])->middlewares('permission:edit projects')->name('projects.edit');
Route::put('projects/{project}',[\App\Http\Controllers\Company\ProjectController::class,'update'])->middlewares('permission:update projects')->name('projects.update');
Route::delete('project/{project}',[\App\Http\Controllers\Company\ProjectController::class ,'destroy'])->middlewares('permission:delete projects')->name('projects.destroy');
Route::put('project/restore/{project}',[\App\Http\Controllers\Company\ProjectController::class,'restore'])->middlewares('permission:restore projects')->name('projects.restore');
//Dashboard
Route::get('/Dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('Dashboard');

