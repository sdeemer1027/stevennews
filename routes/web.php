<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PictureLibraryController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', [HomeController::class , 'index'])->name('welcome');


Route::get('/aboutsteve', [ArtistController::class, 'aboutsteve'])->name('aboutsteve');

Route::get('/articles', [ArticleController::class, 'indexGuest'])->name('articles');
Route::get('/articles/category/{category}', [ArticleController::class, 'indexGuestcategory'])->name('articlescategory');




Auth::routes();

Route::get('/home', [DashboardController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::resource('roles', RoleController::class); //->name('admin.roles.index');
    Route::resource('permissions', PermissionController::class);

//    Route::get('admin/roles/create', [RoleController::class, 'create'])->name('admin.roles.create');

    Route::get('roles/{role}/assign-permission', [RoleController::class, 'assignPermission'])->name('admin.roles.assign-permission');
    Route::post('roles/{role}/assign-permission', [RoleController::class, 'processAssignPermission'])->name('admin.roles.process-assign-permission');
    // Other routes go here...
});



Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');

    Route::get('/admin/articles', [ArticleController::class, 'index'])->name('admin.articles.index');
    Route::get('/admin/articles/create', [ArticleController::class, 'create'])->name('admin.articles.create');
    Route::post('/admin/articles', [ArticleController::class, 'store'])->name('admin.articles.store');
    Route::get('/admin/articles/{article}', [ArticleController::class, 'show'])->name('admin.articles.show');
    Route::get('/admin/articles/{article}/edit', [ArticleController::class, 'edit'])->name('admin.articles.edit');
    Route::put('/admin/articles/{article}', [ArticleController::class, 'update'])->name('admin.articles.update');
    Route::delete('/admin/articles/{article}', [ArticleController::class, 'destroy'])->name('admin.articles.destroy');

Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
 Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');


//    Route::resource('roles', RoleController::class);
//    Route::resource('permissions', PermissionController::class);

//    Route::get('roles/{role}/assign-permission', [RoleController::class, 'assignPermission'])->name('admin.roles.assign-permission');
//    Route::post('roles/{role}/assign-permission', [RoleController::class, 'processAssignPermission'])->name('admin.roles.process-assign-permission');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/upload-picture', [ProfileController::class, 'showPictureUploadForm'])->name('profile.upload-picture-form');
    Route::post('/profile/upload-picture', [ProfileController::class, 'uploadPicture'])->name('profile.upload-picture');
    Route::get('/profile/picture-library', [ProfileController::class, 'showPictureLibrary'])->name('profile.picture-library');
 //Route::delete('/delete-picture/{id}', [PictureLibraryController::class, 'delete'])->name('delete-picture');

    Route::delete('/delete-picture/{id}', [PictureLibraryController::class, 'delete'])->name('delete-picture');

//    Route::get('/picture-library', [PictureLibraryController::class, 'index'])->name('picture-library.index');
    Route::post('/picture-library/upload', [PictureLibraryController::class, 'upload'])->name('picture-library.upload');
//    Route::delete('/picture-library/delete/{id}', [PictureLibraryController::class, 'delete'])->name('picture-library.delete');
    Route::post('/change-profile-picture', [ProfileController::class, 'changeProfilePicture'])->name('change-profile-picture');

    // Add other dashboard-related routes as needed

    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

    Route::post('/send-friend-request/{friend}', [FriendController::class, 'sendRequest'])->name('send-friend-request');
    Route::post('/approve-friend-request/{friend}', [FriendController::class, 'approveRequest'])->name('approve-friend-request');
    Route::get('/cancel-friend-request/{friend}', [FriendController::class, 'cancelRequest'])->name('cancel-friend-request');
    Route::get('/remove-friend/{friend}', [FriendController::class, 'removeFriend'])->name('remove-friend');

Route::get('/users', [UserController::class, 'index'])->name('users.index');


});

Route::middleware(['auth'])->group(function () {
    Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');
    Route::post('/artists/upload-picture', [ArtistController::class, 'uploadPicture'])->name('artists.upload-picture');
    // Add other artist-related routes as needed
});

