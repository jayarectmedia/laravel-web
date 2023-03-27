<?php

use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\DashboardController::class, 'index']);
Route::get('/about', [App\Http\Controllers\DashboardController::class, 'about']);
Route::get('/contact', [App\Http\Controllers\DashboardController::class, 'contact']);

// Route::get('/siswa', [App\Http\Controllers\SiswaController::class, 'index']);
// Route::get('/siswa/{id}', [\App\Http\Controllers\SiswaController::class, 'detail'])->where('id', '[0-9]+');


//route menggunakan resource
Route::resource('siswa', App\Http\Controllers\SiswaController::class);

Route::get('/login', [App\Http\Controllers\SessionController::class, 'index']);
Route::post('/post/login', [App\Http\Controllers\SessionController::class, 'login']);
Route::get('/logout', [App\Http\Controllers\SessionController::class, 'logout']);
