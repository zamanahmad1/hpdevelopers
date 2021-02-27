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
Route::get('projects',[\App\Http\Controllers\Company\ProjectController::class,'index'])->middleware('permission:view projects')->name('projects.index');
Route::get('projects/create',[\App\Http\Controllers\Company\ProjectController::class,'create'])->middleware('permission:create projects')->name('projects.create');
Route::post('projects',[\App\Http\Controllers\Company\ProjectController::class,'store'])->middleware('permission:store projects')->name('projects.store');
Route::get('projects/{project}/edit',[\App\Http\Controllers\Company\ProjectController::class,'edit'])->middleware('permission:edit projects')->name('projects.edit');
Route::put('projects/{project}',[\App\Http\Controllers\Company\ProjectController::class,'update'])->middleware('permission:update projects')->name('projects.update');
Route::delete('projects/{project}',[\App\Http\Controllers\Company\ProjectController::class ,'destroy'])->middleware('permission:delete projects')->name('projects.destroy');
Route::put('project/restore/{project}',[\App\Http\Controllers\Company\ProjectController::class,'restore'])->middleware('permission:restore projects')->name('projects.restore');
//for Societies
Route::get('societies',[\App\Http\Controllers\Company\SocietyController::class,'index'])->middleware('permission:view societies')->name('societies.index');
Route::get('societies/create',[\App\Http\Controllers\Company\SocietyController::class,'create'])->middleware('permission:create societies')->name('societies.create');
Route::post('societies',[\App\Http\Controllers\Company\SocietyController::class,'store'])->middleware('permission:store societies')->name('societies.store');
Route::get('societies/{society}/edit',[\App\Http\Controllers\Company\SocietyController::class,'edit'])->middleware('permission:edit societies')->name('societies.edit');
Route::put('societies/{society}',[\App\Http\Controllers\Company\SocietyController::class,'update'])->middleware('permission:update societies')->name('societies.update');
Route::delete('societies/{society}',[\App\Http\Controllers\Company\SocietyController::class ,'destroy'])->middleware('permission:delete societies')->name('societies.destroy');
Route::put('societies/restore/{society}',[\App\Http\Controllers\Company\SocietyController::class,'restore'])->middleware('permission:restore societies')->name('societies.restore');
//for Sectors
Route::get('sectors',[\App\Http\Controllers\Company\SectorController::class,'index'])->middleware('permission:view sectors')->name('sectors.index');
Route::get('sectors/create',[\App\Http\Controllers\Company\SectorController::class,'create'])->middleware('permission:create sectors')->name('sectors.create');
Route::post('sectors',[\App\Http\Controllers\Company\SectorController::class,'store'])->middleware('permission:store sectors')->name('sectors.store');
Route::get('sectors/{sector}/edit',[\App\Http\Controllers\Company\SectorController::class,'edit'])->middleware('permission:edit sectors')->name('sectors.edit');
Route::put('sectors/{sector}',[\App\Http\Controllers\Company\SectorController::class,'update'])->middleware('permission:update sectors')->name('sectors.update');
Route::delete('sectors/{sector}',[\App\Http\Controllers\Company\SectorController::class ,'destroy'])->middleware('permission:delete sectors')->name('sectors.destroy');
Route::put('sectors/restore/{sector}',[\App\Http\Controllers\Company\SectorController::class,'restore'])->middleware('permission:restore sectors')->name('sectors.restore');
//for Blocks
Route::get('blocks',[\App\Http\Controllers\Company\BlockController::class,'index'])->middleware('permission:view blocks')->name('blocks.index');
Route::get('blocks/create',[\App\Http\Controllers\Company\BlockController::class,'create'])->middleware('permission:create blocks')->name('blocks.create');
Route::post('blocks',[\App\Http\Controllers\Company\BlockController::class,'store'])->middleware('permission:store blocks')->name('blocks.store');
Route::get('blocks/{block}/edit',[\App\Http\Controllers\Company\BlockController::class,'edit'])->middleware('permission:edit blocks')->name('blocks.edit');
Route::put('blocks/{block}',[\App\Http\Controllers\Company\BlockController::class,'update'])->middleware('permission:update blocks')->name('blocks.update');
Route::delete('blocks/{block}',[\App\Http\Controllers\Company\BlockController::class ,'destroy'])->middleware('permission:delete blocks')->name('blocks.destroy');
Route::put('blocks/restore/{block}',[\App\Http\Controllers\Company\BlockController::class,'restore'])->middleware('permission:restore blocks')->name('blocks.restore');
//for Streets
Route::get('streets',[\App\Http\Controllers\Company\StreetController::class,'index'])->middleware('permission:view streets')->name('streets.index');
Route::get('streets/create',[\App\Http\Controllers\Company\StreetController::class,'create'])->middleware('permission:create streets')->name('streets.create');
Route::post('streets',[\App\Http\Controllers\Company\StreetController::class,'store'])->middleware('permission:store streets')->name('streets.store');
Route::get('streets/{street}/edit',[\App\Http\Controllers\Company\StreetController::class,'edit'])->middleware('permission:edit streets')->name('streets.edit');
Route::put('streets/{street}',[\App\Http\Controllers\Company\StreetController::class,'update'])->middleware('permission:update streets')->name('streets.update');
Route::delete('streets/{street}',[\App\Http\Controllers\Company\StreetController::class ,'destroy'])->middleware('permission:delete streets')->name('streets.destroy');
Route::put('streets/restore/{street}',[\App\Http\Controllers\Company\StreetController::class,'restore'])->middleware('permission:restore streets')->name('streets.restore');
//for Plot Type
Route::get('plottypes',[\App\Http\Controllers\Plots\PlotTypeController::class,'index'])->middleware('permission:view plot types')->name('plottypes.index');
Route::get('plottypes/create',[\App\Http\Controllers\Plots\PlotTypeController::class,'create'])->middleware('permission:create plot types')->name('plottypes.create');
Route::post('plottypes',[\App\Http\Controllers\Plots\PlotTypeController::class,'store'])->middleware('permission:store plot types')->name('plottypes.store');
Route::get('plottypes/{plotType}/edit',[\App\Http\Controllers\Plots\PlotTypeController::class,'edit'])->middleware('permission:edit plot types')->name('plottypes.edit');
Route::put('plottypes/{plotType}',[\App\Http\Controllers\Plots\PlotTypeController::class,'update'])->middleware('permission:update plot types')->name('plottypes.update');
Route::delete('plottypes/{plotType}',[\App\Http\Controllers\Plots\PlotTypeController::class ,'destroy'])->middleware('permission:delete plot types')->name('plottypes.destroy');
Route::put('plottypes/restore/{plotType}',[\App\Http\Controllers\Plots\PlotTypeController::class,'restore'])->middleware('permission:restore plot types')->name('plottypes.restore');
//Dashboard
Route::get('/Dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('Dashboard');

