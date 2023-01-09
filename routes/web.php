<?php

use App\Http\Controllers\FacilityController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
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
    return view('pages.homepage');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/**
 * User Management Routes
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'role:admin'], function () {
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', [UserController::class, 'index'])->name('users.index');
            Route::get('/getUsers', [UserController::class, 'getUsers']);
            Route::get('/create', [UserController::class, 'create'])->name('users.create');
            Route::post('/create', [UserController::class, 'store'])->name('users.store');
            Route::get('/{user}/show', [UserController::class, 'show'])->name('users.show');
            Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
            Route::patch('/{user}/update', [UserController::class, 'update'])->name('users.update');
            Route::delete('/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');
        });
        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);
    });
    /**
     * Post Routes
     */
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', [PostController::class, 'index'])->name('posts.index');
        Route::get('/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/create', [PostController::class, 'store'])->name('posts.store');
        Route::get('/{post}/show', [PostController::class, 'show'])->name('posts.show');
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::patch('/{post}/update', [PostController::class, 'update'])->name('posts.update');
        Route::delete('/{post}/delete', [PostController::class, 'destroy'])->name('posts.destroy');
    });


    Route::group(['prefix' => 'rooms', 'as' => 'rooms.'], function () {
        Route::resource('/', RoomController::class);
        Route::resource('facilities', FacilityController::class);
    });

    Route::resource('images', ImageController::class);
});
require __DIR__ . '/auth.php';
