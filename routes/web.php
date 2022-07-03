<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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




Route::controller(AdminController::class)->middleware(['auth'])->group(function() {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');

    Route::post('/store/profile', 'storeProfile')->name('store.profile');
    Route::get('/edit/profile', 'editProfile')->name('edit.profile');

    Route::get('/edit/password', 'editPassword')->name('edit.password');
    Route::post('/store/password', 'storePassword')->name('store.password');
});



Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');






require __DIR__.'/auth.php';
