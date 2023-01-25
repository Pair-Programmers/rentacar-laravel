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
    return view('pages.index');
})->name('index');


Route::get('/blogs/{category?}', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{blog}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');

Route::get('admin/login', [App\Http\Controllers\AdminController::class, 'show'])->name('admin.login.show');
Route::post('admin/login', [App\Http\Controllers\AdminController::class, 'login'])->name('admin.login');
Route::prefix('admin')->name('admin.')->group(function () {

    Route::post('admin/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('logout');
    Route::get('/', [App\Http\Controllers\AdminController::class, 'showDashboardPaage'])->name('dashboard');


    // user
    Route::controller(App\Http\Controllers\Adminpanel\UserController::class)->prefix('users')->name('user.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{user}', 'show')->name('show');
        Route::get('/{user}/edit', 'edit')->name('edit');
        Route::put('/{user}', 'update')->name('update');
        Route::delete('/{user:id}', 'destroy')->name('destroy');
    });
});
