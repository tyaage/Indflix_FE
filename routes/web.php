<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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
    Route::get('/register', 'indexRegister');
    Route::post('/register', 'register');
});

// Route::get('/login', function () {
//     return view('login.index');
// });


Route::get('/lupasandi', function () {
    return view('login.lupasandi');
});
Route::get('/lengkapiprofil', function () {
    return view('register.lengkapiprofil');
});
