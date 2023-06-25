<?php

use App\Http\Controllers\AssignController;
use App\Http\Controllers\PrediksiController;
use App\Http\Controllers\UserController;
use App\Models\Assign;
use App\Models\Prediksi;
use Illuminate\Support\Facades\Auth;
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
    if (Auth::user()->role == "admin") {
        return redirect()->route('assign.index');
    }
    if (Auth::user()->role == "dokter") {
        $data = Assign::join('users', 'users.id', '=', 'assign.user_id')->where('dokter_id', Auth::user()->id)->get();
        return view('dashboard_dokter', ['data' => $data]);
    }
    if (Auth::user()->role == "pasien") {
        $data = Prediksi::where('user_id', Auth::user()->id)->get();
        return view('dashboard_pasien', ['data' => $data]);
    }
})->name('dashboard')->middleware('auth');


Route::controller(UserController::class)->group(function () {
    Route::get('/', 'login')->name('login');
    Route::post('/', 'login_action')->name('login.action');

    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'store')->name('register.action');

    Route::get('/register-dokter', 'register_dokter')->name('register_dokter');
    Route::post('/register-dokter', 'store_dokter')->name('register_dokter.action');

    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(PrediksiController::class)->group(function () {
    Route::get('/result/{id}', 'result')->name('prediksi.result')->middleware('auth');
    Route::get('/ownCheck', 'check_index')->name('prediksi.check_index')->middleware('auth');
    Route::post('/ownCheck', 'run')->name('prediksi.run')->middleware('auth');

    Route::get('/detail/{id}', 'detail')->name('prediksi.detail')->middleware('auth');
});

Route::controller(AssignController::class)->group(function () {
    Route::get('/assign', 'index')->name('assign.index')->middleware('admin');
    Route::post('/assign', 'store')->name('assign.store')->middleware('admin');
});
