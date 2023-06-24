<?php

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

Route::get('/dashboard', function () {
    return view('dashboard_pasien');
})->name('welcome');


Route::controller(UserController::class)->group(function () {
    Route::get('/', 'login')->name('login');
    Route::post('/', 'login_action')->name('login.action');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'store')->name('register.action');
    Route::get('/register-dokter', 'register_dokter')->name('register_dokter');
    Route::post('/register-dokter', 'store_dokter')->name('register_dokter.action');
    Route::post('/logout', 'logout')->name('logout');
});
