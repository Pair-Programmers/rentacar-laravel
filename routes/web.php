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

Route::get('/about-us', function () {
    return view('pages.about-us');
})->name('about-us');
Route::get('/contact-us', function () {
    return view('pages.contact-us');
})->name('contact-us');
Route::get('/blogs', function () {
    return view('pages.blogs');
})->name('blogs');


Route::get('admin/login', [App\Http\Controllers\AdminController::class, 'showLoginPaage'])->name('admin.login.show');
Route::post('admin/login', [App\Http\Controllers\AdminController::class, 'login'])->name('admin.login');
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [App\Http\Controllers\AdminController::class, 'showLoginPaage']);

    Route::post('admin/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'showDashboardPaage'])->name('dashboard');

    Route::controller(App\Http\Controllers\UserController::class)->prefix('users')->name('user.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{user}/edit', 'edit')->name('edit');
        Route::put('/{user}', 'update')->name('update');
        Route::get('/{user:id}', 'destroy')->name('destroy');
    });
});
