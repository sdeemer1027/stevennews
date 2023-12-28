<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArtistController;


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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::resource('roles', RoleController::class); //->name('admin.roles.index');
    Route::resource('permissions', PermissionController::class);

//    Route::get('admin/roles/create', [RoleController::class, 'create'])->name('admin.roles.create');

    Route::get('roles/{role}/assign-permission', [RoleController::class, 'assignPermission'])->name('admin.roles.assign-permission');
    Route::post('roles/{role}/assign-permission', [RoleController::class, 'processAssignPermission'])->name('admin.roles.process-assign-permission');
    // Other routes go here...
});



Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
//    Route::resource('roles', RoleController::class);
//    Route::resource('permissions', PermissionController::class);

//    Route::get('roles/{role}/assign-permission', [RoleController::class, 'assignPermission'])->name('admin.roles.assign-permission');
//    Route::post('roles/{role}/assign-permission', [RoleController::class, 'processAssignPermission'])->name('admin.roles.process-assign-permission');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    // Add other dashboard-related routes as needed
});

Route::middleware(['auth'])->group(function () {
    Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');
    Route::post('/artists/upload-picture', [ArtistController::class, 'uploadPicture'])->name('artists.upload-picture');
    // Add other artist-related routes as needed
});

