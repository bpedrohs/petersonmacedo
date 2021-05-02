<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

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

Route::get('/projects', [\App\Http\Controllers\Template\ProjectController::class, 'index']);

Route::get('/projects/{project:slug}', [\App\Http\Controllers\Template\ProjectController::class, 'show'])->name('project.show');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [Admin\AdminController::class,'index'])->name('index');

    Route::resource('/project', Admin\ProjectController::class);
    Route::resource('/category', Admin\CategoryController::class);
    Route::resource('/user', Admin\UserController::class);
    
    Route::get('/profile', function(){
        return view('auth.profile'); 
    })->name('profile');

    Route::put('/profile/{user}/update',  [\App\Http\Controllers\Auth\UpdateProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/{user}/remove-photo',  [\App\Http\Controllers\Auth\UpdateProfileController::class, 'removeProfilePhoto'])->name('profile.remove.photo');

    Route::post('photos/remove', [Admin\ProjectPhotoController::class, 'removePhoto'])->name('project.remove.photo');
});

require __DIR__.'/auth.php';
