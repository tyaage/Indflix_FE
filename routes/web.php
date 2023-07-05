<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('token')->group(function () {

});
Route::get('/', [HomeController::class, 'getData']);
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'indexLogin');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout');

    Route::get('/register', 'indexRegister');
    Route::post('/register', 'register');

    Route::middleware('loggedin')->group(function () {
        Route::get('/akun', 'pengaturan');
        Route::post('/ubah-password', 'ubahPassword');
        Route::post('/ubah-profile', 'ubahProfile');
    });
});

Route::prefix('admin')->middleware(['loggedin', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('/movie', MovieController::class);
    Route::resource('/genre', GenreController::class);
});

Route::get('/{movie}', [MovieController::class, 'show'])->middleware('loggedin');
Route::post('/{slug}/like', [MovieController::class, 'like']);
