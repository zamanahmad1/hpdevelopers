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
//for Plot Statuses
Route::get('plotstatus',[\App\Http\Controllers\Plots\PlotStatusController::class,'index'])->middleware('permission:view plot status')->name('plotstatus.index');
Route::get('plotstatus/create',[\App\Http\Controllers\Plots\PlotStatusController::class,'create'])->middleware('permission:create plot status')->name('plotstatus.create');
Route::post('plotstatus',[\App\Http\Controllers\Plots\PlotStatusController::class,'store'])->middleware('permission:store plot status')->name('plotstatus.store');
Route::get('plotstatus/{plotStatus}/edit',[\App\Http\Controllers\Plots\PlotStatusController::class,'edit'])->middleware('permission:edit plot status')->name('plotstatus.edit');
Route::put('plotstatus/{plotStatus}',[\App\Http\Controllers\Plots\PlotStatusController::class,'update'])->middleware('permission:update plot status')->name('plotstatus.update');
Route::delete('plotstatus/{plotStatus}',[\App\Http\Controllers\Plots\PlotStatusController::class ,'destroy'])->middleware('permission:delete plot status')->name('plotstatus.destroy');
Route::put('plotstatus/restore/{plotStatus}',[\App\Http\Controllers\Plots\PlotStatusController::class,'restore'])->middleware('permission:restore plot status')->name('plotstatus.restore');
//for Plot Categories
Route::get('plotcategories',[\App\Http\Controllers\Plots\PlotCategoryController::class,'index'])->middleware('permission:view plot categories')->name('plotcategories.index');
Route::get('plotcategories/create',[\App\Http\Controllers\Plots\PlotCategoryController::class,'create'])->middleware('permission:create plot categories')->name('plotcategories.create');
Route::post('plotcategories',[\App\Http\Controllers\Plots\PlotCategoryController::class,'store'])->middleware('permission:store plot categories')->name('plotcategories.store');
Route::get('plotcategories/{plotCategory}/edit',[\App\Http\Controllers\Plots\PlotCategoryController::class,'edit'])->middleware('permission:edit plot categories')->name('plotcategories.edit');
Route::put('plotcategories/{plotCategory}',[\App\Http\Controllers\Plots\PlotCategoryController::class,'update'])->middleware('permission:update plot categories')->name('plotcategories.update');
Route::delete('plotcategories/{plotCategory}',[\App\Http\Controllers\Plots\PlotCategoryController::class ,'destroy'])->middleware('permission:delete plot categories')->name('plotcategories.destroy');
Route::put('plotcategories/restore/{plotCategory}',[\App\Http\Controllers\Plots\PlotCategoryController::class,'restore'])->middleware('permission:restore plot categories')->name('plotcategories.restore');
//for Plot Shapes
Route::get('plotshapes',[\App\Http\Controllers\Plots\PlotShapeController::class,'index'])->middleware('permission:view plot shapes')->name('plotshapes.index');
Route::get('plotshapes/create',[\App\Http\Controllers\Plots\PlotShapeController::class,'create'])->middleware('permission:create plot shapes')->name('plotshapes.create');
Route::post('plotshapes',[\App\Http\Controllers\Plots\PlotShapeController::class,'store'])->middleware('permission:store plot shapes')->name('plotshapes.store');
Route::get('plotshapes/{plotShape}/edit',[\App\Http\Controllers\Plots\PlotShapeController::class,'edit'])->middleware('permission:edit plot shapes')->name('plotshapes.edit');
Route::put('plotshapes/{plotShape}',[\App\Http\Controllers\Plots\PlotShapeController::class,'update'])->middleware('permission:update plot shapes')->name('plotshapes.update');
Route::delete('plotshapes/{plotShape}',[\App\Http\Controllers\Plots\PlotShapeController::class ,'destroy'])->middleware('permission:delete plot shapes')->name('plotshapes.destroy');
Route::put('plotshapes/restore/{plotShape}',[\App\Http\Controllers\Plots\PlotShapeController::class,'restore'])->middleware('permission:restore plot shapes')->name('plotshapes.restore');
//for Plot Availabilities
Route::get('plotavailabilities',[\App\Http\Controllers\Plots\PlotAvailabilityController::class,'index'])->middleware('permission:view plot availabilities')->name('plotavailabilities.index');
Route::get('plotavailabilities/create',[\App\Http\Controllers\Plots\PlotAvailabilityController::class,'create'])->middleware('permission:create plot availabilities')->name('plotavailabilities.create');
Route::post('plotavailabilities',[\App\Http\Controllers\Plots\PlotAvailabilityController::class,'store'])->middleware('permission:store plot availabilities')->name('plotavailabilities.store');
Route::get('plotavailabilities/{plotAvailability}/edit',[\App\Http\Controllers\Plots\PlotAvailabilityController::class,'edit'])->middleware('permission:edit plot availabilities')->name('plotavailabilities.edit');
Route::put('plotavailabilities/{plotAvailability}',[\App\Http\Controllers\Plots\PlotAvailabilityController::class,'update'])->middleware('permission:update plot availabilities')->name('plotavailabilities.update');
Route::delete('plotavailabilities/{plotAvailability}',[\App\Http\Controllers\Plots\PlotAvailabilityController::class ,'destroy'])->middleware('permission:delete plot availabilities')->name('plotavailabilities.destroy');
Route::put('plotavailabilities/restore/{plotAvailability}',[\App\Http\Controllers\Plots\PlotAvailabilityController::class,'restore'])->middleware('permission:restore plot availabilities')->name('plotavailabilities.restore');
//for Plot Inhensive Features
Route::get('plotinhensivefeatures',[\App\Http\Controllers\Plots\PlotInhensiveFeatureController::class,'index'])->middleware('permission:view plot inhensive features')->name('plotinhensivefeatures.index');
Route::get('plotinhensivefeatures/create',[\App\Http\Controllers\Plots\PlotInhensiveFeatureController::class,'create'])->middleware('permission:create plot inhensive features')->name('plotinhensivefeatures.create');
Route::post('plotinhensivefeatures',[\App\Http\Controllers\Plots\PlotInhensiveFeatureController::class,'store'])->middleware('permission:store plot inhensive features')->name('plotinhensivefeatures.store');
Route::get('plotinhensivefeatures/{plotInhensiveFeature}/edit',[\App\Http\Controllers\Plots\PlotInhensiveFeatureController::class,'edit'])->middleware('permission:edit plot inhensive features')->name('plotinhensivefeatures.edit');
Route::put('plotinhensivefeatures/{plotInhensiveFeature}',[\App\Http\Controllers\Plots\PlotInhensiveFeatureController::class,'update'])->middleware('permission:update plot inhensive features')->name('plotinhensivefeatures.update');
Route::delete('plotinhensivefeatures/{plotInhensiveFeature}',[\App\Http\Controllers\Plots\PlotInhensiveFeatureController::class ,'destroy'])->middleware('permission:delete plot inhensive features')->name('plotinhensivefeatures.destroy');
Route::put('plotinhensivefeatures/restore/{plotInhensiveFeature}',[\App\Http\Controllers\Plots\PlotInhensiveFeatureController::class,'restore'])->middleware('permission:restore plot inhensive features')->name('plotinhensivefeatures.restore');
//for Plot Size
Route::get('plotsizes',[\App\Http\Controllers\Plots\PlotSizeController::class,'index'])->middleware('permission:view plot sizes')->name('plotsizes.index');
Route::get('plotsizes/create',[\App\Http\Controllers\Plots\PlotSizeController::class,'create'])->middleware('permission:create plot sizes')->name('plotsizes.create');
Route::post('plotsizes',[\App\Http\Controllers\Plots\PlotSizeController::class,'store'])->middleware('permission:store plot sizes')->name('plotsizes.store');
Route::get('plotsizes/{plotSize}/edit',[\App\Http\Controllers\Plots\PlotSizeController::class,'edit'])->middleware('permission:edit plot sizes')->name('plotsizes.edit');
Route::put('plotsizes/{plotSize}',[\App\Http\Controllers\Plots\PlotSizeController::class,'update'])->middleware('permission:update plot sizes')->name('plotsizes.update');
Route::delete('plotsizes/{plotSize}',[\App\Http\Controllers\Plots\PlotSizeController::class ,'destroy'])->middleware('permission:delete plot sizes')->name('plotsizes.destroy');
Route::put('plotsizes/restore/{plotSize}',[\App\Http\Controllers\Plots\PlotSizeController::class,'restore'])->middleware('permission:restore plot sizes')->name('plotsizes.restore');
//for Plot Inhensive Features
Route::get('plotinventories',[\App\Http\Controllers\Plots\PlotInventoryController::class,'index'])->middleware('permission:view plot inventories')->name('plotinventories.index');
Route::get('plotinventories/create',[\App\Http\Controllers\Plots\PlotInventoryController::class,'create'])->middleware('permission:create plot inventories')->name('plotinventories.create');
Route::post('plotinventories',[\App\Http\Controllers\Plots\PlotInventoryController::class,'store'])->middleware('permission:store plot inventories')->name('plotinventories.store');
Route::get('plotinventories/{plotInventory}/edit',[\App\Http\Controllers\Plots\PlotInventoryController::class,'edit'])->middleware('permission:edit plot inventories')->name('plotinventories.edit');
Route::put('plotinventories/{plotInventory}',[\App\Http\Controllers\Plots\PlotInventoryController::class,'update'])->middleware('permission:update plot inventories')->name('plotinventories.update');
Route::delete('plotinventories/{plotInventory}',[\App\Http\Controllers\Plots\PlotInventoryController::class ,'destroy'])->middleware('permission:delete plot inventories')->name('plotinventories.destroy');
Route::put('plotinventories/restore/{plotInventory}',[\App\Http\Controllers\Plots\PlotInventoryController::class,'restore'])->middleware('permission:restore plot inventories')->name('plotinventories.restore');
Route::get('plotinventories/{plotInventory}/details',[\App\Http\Controllers\plots\PlotInventoryController::class,'show'])->middleware('permission:show plot inventories')->name('plotinventories.show');
//for Plot Price
Route::get('plotprices',[\App\Http\Controllers\Plots\PlotPriceController::class,'index'])->middleware('permission:view plot prices')->name('plotprices.index');
Route::get('plotprices/update',[\App\Http\Controllers\Plots\PlotPriceController::class,'update'])->middleware('permission:update plot prices')->name('plotprices.update');
//for Plot Dimensios
Route::get('plotdimensions',[\App\Http\Controllers\Plots\PlotDimensionController::class,'index'])->middleware('permission:view plot dimensions')->name('plotdimensions.index');
Route::get('plotdimensions/create',[\App\Http\Controllers\Plots\PlotDimensionController::class,'create'])->middleware('permission:create plot dimensions')->name('plotdimensions.create');
Route::post('plotdimensions',[\App\Http\Controllers\Plots\PlotDimensionController::class,'store'])->middleware('permission:store plot dimensions')->name('plotdimensions.store');
Route::get('plotdimensions/{plotDimension}/edit',[\App\Http\Controllers\Plots\PlotDimensionController::class,'edit'])->middleware('permission:edit plot dimensions')->name('plotdimensions.edit');
Route::put('plotdimensions/{plotDimension}',[\App\Http\Controllers\Plots\PlotDimensionController::class,'update'])->middleware('permission:update plot dimensions')->name('plotdimensions.update');
//Route::delete('plotdimensions/{plotDimension}',[\App\Http\Controllers\Plots\PlotDimensionController::class ,'destroy'])->middleware('permission:delete plot dimensions')->name('plotdimensions.destroy');
//Route::put('plotdimensions/restore/{plotDimension}',[\App\Http\Controllers\Plots\PlotDimensionController::class,'restore'])->middleware('permission:restore plot dimensions')->name('plotdimensions.restore');
//for Countries
Route::get('countries',[\App\Http\Controllers\Location\CountryController::class,'index'])->middleware('permission:view countries')->name('countries.index');
Route::get('countries/create',[\App\Http\Controllers\Location\CountryController::class,'create'])->middleware('permission:create countries')->name('countries.create');
Route::post('countries',[\App\Http\Controllers\Location\CountryController::class,'store'])->middleware('permission:store countries')->name('countries.store');
Route::get('countries/{country}/edit',[\App\Http\Controllers\Location\CountryController::class,'edit'])->middleware('permission:edit countries')->name('countries.edit');
Route::put('countries/{country}',[\App\Http\Controllers\Location\CountryController::class,'update'])->middleware('permission:update countries')->name('countries.update');
Route::delete('countries/{country}',[\App\Http\Controllers\Location\CountryController::class ,'destroy'])->middleware('permission:delete countries')->name('countries.destroy');
Route::put('countries/restore/{country}',[\App\Http\Controllers\Location\CountryController::class,'restore'])->middleware('permission:restore countries')->name('countries.restore');
//for Provinces
Route::get('provinces',[\App\Http\Controllers\Location\ProvinceController::class,'index'])->middleware('permission:view provinces')->name('provinces.index');
Route::get('provinces/create',[\App\Http\Controllers\Location\ProvinceController::class,'create'])->middleware('permission:create provinces')->name('provinces.create');
Route::post('provinces',[\App\Http\Controllers\Location\ProvinceController::class,'store'])->middleware('permission:store provinces')->name('provinces.store');
Route::get('provinces/{province}/edit',[\App\Http\Controllers\Location\ProvinceController::class,'edit'])->middleware('permission:edit provinces')->name('provinces.edit');
Route::put('provinces/{province}',[\App\Http\Controllers\Location\ProvinceController::class,'update'])->middleware('permission:update provinces')->name('provinces.update');
Route::delete('provinces/{province}',[\App\Http\Controllers\Location\ProvinceController::class ,'destroy'])->middleware('permission:delete provinces')->name('provinces.destroy');
Route::put('provinces/restore/{province}',[\App\Http\Controllers\Location\ProvinceController::class,'restore'])->middleware('permission:restore provinces')->name('provinces.restore');
//for Cities
Route::get('cities',[\App\Http\Controllers\Location\CityController::class,'index'])->middleware('permission:view cities')->name('cities.index');
Route::get('cities/create',[\App\Http\Controllers\Location\CityController::class,'create'])->middleware('permission:create cities')->name('cities.create');
Route::post('cities',[\App\Http\Controllers\Location\CityController::class,'store'])->middleware('permission:store cities')->name('cities.store');
Route::get('cities/{city}/edit',[\App\Http\Controllers\Location\CityController::class,'edit'])->middleware('permission:edit cities')->name('cities.edit');
Route::put('cities/{city}',[\App\Http\Controllers\Location\CityController::class,'update'])->middleware('permission:update cities')->name('cities.update');
Route::delete('cities/{city}',[\App\Http\Controllers\Location\CityController::class ,'destroy'])->middleware('permission:delete cities')->name('cities.destroy');
Route::put('cities/restore/{city}',[\App\Http\Controllers\Location\CityController::class,'restore'])->middleware('permission:restore cities')->name('cities.restore');
//for Member Profile
Route::get('memberprofiles',[\App\Http\Controllers\Members\MemberProfileController::class,'index'])->middleware('permission:view member profiles')->name('memberprofiles.index');
Route::get('memberprofiles/create',[\App\Http\Controllers\Members\MemberProfileController::class,'create'])->middleware('permission:create member profiles')->name('memberprofiles.create');
Route::post('memberprofiles',[\App\Http\Controllers\Members\MemberProfileController::class,'store'])->middleware('permission:store member profiles')->name('memberprofiles.store');
Route::get('memberprofiles/{memberProfile}/edit',[\App\Http\Controllers\Members\MemberProfileController::class,'edit'])->middleware('permission:edit member profiles')->name('memberprofiles.edit');
Route::put('memberprofiles/{memberProfile}',[\App\Http\Controllers\Members\MemberProfileController::class,'update'])->middleware('permission:update member profiles')->name('memberprofiles.update');
Route::delete('memberprofiles/{memberProfile}',[\App\Http\Controllers\Members\MemberProfileController::class ,'destroy'])->middleware('permission:delete member profiles')->name('memberprofiles.destroy');
Route::put('memberprofiles/restore/{memberProfile}',[\App\Http\Controllers\Members\MemberProfileController::class,'restore'])->middleware('permission:restore member profiles')->name('memberprofiles.restore');
Route::get('memberprofiles/{memberProfile}/details',[\App\Http\Controllers\Members\MemberProfileController::class,'show'])->middleware('permission:show member profiles')->name('memberprofiles.show');
Route::post('memberprofileslist',[\App\Http\Controllers\Members\MemberProfileController::class,'memberProfileList'])->name('memberprofiles.list');
Route::post('dealerprofileslist',[\App\Http\Controllers\Members\MemberProfileController::class,'dealerProfileList'])->name('dealerprofiles.list');
Route::post('memberprofiledetails',[\App\Http\Controllers\Members\MemberProfileController::class,'memberProfileDetails'])->name('memberprofiledetails');
//for MemberShips
Route::get('memberships',[\App\Http\Controllers\Members\MemberShipController::class,'index'])->middleware('permission:view memberships')->name('memberships.index');
Route::get('memberships/create',[\App\Http\Controllers\Members\MemberShipController::class,'create'])->middleware('permission:create memberships')->name('memberships.create');
Route::post('memberships',[\App\Http\Controllers\Members\MemberShipController::class,'store'])->middleware('permission:store memberships')->name('memberships.store');
Route::get('memberships/{memberShip}/edit',[\App\Http\Controllers\Members\MemberShipController::class,'edit'])->middleware('permission:edit memberships')->name('memberships.edit');
Route::put('memberships/{memberShip}',[\App\Http\Controllers\Members\MemberShipController::class,'update'])->middleware('permission:update memberships')->name('memberships.update');
Route::delete('memberships/{memberShip}',[\App\Http\Controllers\Members\MemberShipController::class ,'destroy'])->middleware('permission:delete memberships')->name('memberships.destroy');
Route::put('memberships/restore/{memberShip}',[\App\Http\Controllers\Members\MemberShipController::class,'restore'])->middleware('permission:restore memberships')->name('memberships.restore');
//for Dealerships
Route::get('dealerships',[\App\Http\Controllers\Members\DealerShipController::class,'index'])->middleware('permission:view dealerships')->name('dealerships.index');
Route::get('dealerships/create',[\App\Http\Controllers\Members\DealerShipController::class,'create'])->middleware('permission:create dealerships')->name('dealerships.create');
Route::post('dealerships',[\App\Http\Controllers\Members\DealerShipController::class,'store'])->middleware('permission:store dealerships')->name('dealerships.store');
Route::get('dealerships/{dealerShip}/edit',[\App\Http\Controllers\Members\DealerShipController::class,'edit'])->middleware('permission:edit dealerships')->name('dealerships.edit');
Route::put('dealerships/{dealerShip}',[\App\Http\Controllers\Members\DealerShipController::class,'update'])->middleware('permission:update dealerships')->name('dealerships.update');
Route::delete('dealerships/{dealerShip}',[\App\Http\Controllers\Members\DealerShipController::class ,'destroy'])->middleware('permission:delete dealerships')->name('dealerships.destroy');
Route::put('dealerships/restore/{dealerShip}',[\App\Http\Controllers\Members\DealerShipController::class,'restore'])->middleware('permission:restore dealerships')->name('dealerships.restore');
//for Reservation Status
Route::get('reservationstatus',[\App\Http\Controllers\SAMS\ReservationStatusController::class,'index'])->middleware('permission:view reservation status')->name('reservationstatus.index');
Route::get('reservationstatus/create',[\App\Http\Controllers\SAMS\ReservationStatusController::class,'create'])->middleware('permission:create reservation status')->name('reservationstatus.create');
Route::post('reservationstatus',[\App\Http\Controllers\SAMS\ReservationStatusController::class,'store'])->middleware('permission:store reservation status')->name('reservationstatus.store');
Route::get('reservationstatus/{reservationStatus}/edit',[\App\Http\Controllers\SAMS\ReservationStatusController::class,'edit'])->middleware('permission:edit reservation status')->name('reservationstatus.edit');
Route::put('reservationstatus/{reservationStatus}',[\App\Http\Controllers\SAMS\ReservationStatusController::class,'update'])->middleware('permission:update reservation status')->name('reservationstatus.update');
Route::delete('reservationstatus/{reservationStatus}',[\App\Http\Controllers\SAMS\ReservationStatusController::class ,'destroy'])->middleware('permission:delete reservation status')->name('reservationstatus.destroy');
Route::put('reservationstatus/restore/{reservationStatus}',[\App\Http\Controllers\SAMS\ReservationStatusController::class,'restore'])->middleware('permission:restore reservation status')->name('reservationstatus.restore');
//for Reservation
Route::get('reservations',[\App\Http\Controllers\SAMS\ReservationController::class,'index'])->middleware('permission:view reservations')->name('reservations.index');
Route::get('reservations/create',[\App\Http\Controllers\SAMS\ReservationController::class,'create'])->middleware('permission:create reservations')->name('reservations.create');
Route::post('reservations',[\App\Http\Controllers\SAMS\ReservationController::class,'store'])->middleware('permission:store reservations')->name('reservations.store');
Route::get('reservations/{reservation}/edit',[\App\Http\Controllers\SAMS\ReservationController::class,'edit'])->middleware('permission:edit reservations')->name('reservations.edit');
Route::put('reservations/{reservation}',[\App\Http\Controllers\SAMS\ReservationController::class,'update'])->middleware('permission:update reservations')->name('reservations.update');
Route::delete('reservations/{reservation}',[\App\Http\Controllers\SAMS\ReservationController::class ,'destroy'])->middleware('permission:delete reservations')->name('reservations.destroy');
Route::put('reservations/restore/{reservation}',[\App\Http\Controllers\SAMS\ReservationController::class,'restore'])->middleware('permission:restore reservations')->name('reservations.restore');
//for Installment Plan
Route::get('installmentplans',[\App\Http\Controllers\SAMS\InstallmentPlans\InstallmentController::class,'index'])->middleware('permission:view installment plans')->name('installmentplans.index');
Route::get('installmentplans/create',[\App\Http\Controllers\SAMS\InstallmentPlans\InstallmentController::class,'create'])->middleware('permission:create installment plans')->name('installmentplans.create');
Route::post('installmentplans',[\App\Http\Controllers\SAMS\InstallmentPlans\InstallmentController::class,'store'])->middleware('permission:store installment plans')->name('installmentplans.store');
Route::get('installmentplans/{installmentPlan}/edit',[\App\Http\Controllers\SAMS\InstallmentPlans\InstallmentController::class,'edit'])->middleware('permission:edit installment plans')->name('installmentplans.edit');
Route::put('installmentplans/{installmentPlan}',[\App\Http\Controllers\SAMS\InstallmentPlans\InstallmentController::class,'update'])->middleware('permission:update installment plans')->name('installmentplans.update');
Route::delete('installmentplans/{installmentPlan}',[\App\Http\Controllers\SAMS\InstallmentPlans\InstallmentController::class,'destroy'])->middleware('permission:delete installment plans')->name('installmentplans.destroy');
Route::put('installmentplans/restore/{installmentPlan}',[\App\Http\Controllers\SAMS\InstallmentPlans\InstallmentController::class,'restore'])->middleware('permission:restore installment plans')->name('installmentplans.restore');

//Dashboard
Route::get('/Dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('Dashboard');

