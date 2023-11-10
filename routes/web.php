<?php

use App\Http\Controllers\AssignController;
use App\Http\Controllers\PrediksiController;
use App\Http\Controllers\UserController;
use App\Models\Assign;
use App\Models\User;
use App\Models\Prediksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\Input;

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
        if (isset($_GET['name'])) {
            $data = Assign::join('users', 'users.id', '=', 'assign.user_id')->where('dokter_id', Auth::user()->id)->where('nama_lengkap', 'like', '%' . $_GET['name'] . '%')->get();
        } else {
            $data = Assign::join('users', 'users.id', '=', 'assign.user_id')->where('assign.dokter_id', Auth::user()->id)->get();
            $data_hitung = Assign::join('users', 'users.id', '=', 'assign.user_id')->join('prediksi', 'users.id', '=', 'prediksi.user_id')->where('assign.dokter_id', Auth::user()->id)->get();
            $mvp_count = $data_hitung->where('result', "3")->count();
            $n_count = $data_hitung->where('result', "4")->count();
            $ms_count = $data_hitung->where('result', "2")->count();
            $mr_count = $data_hitung->where('result', "1")->count();
            $as_count = $data_hitung->where('result', "0")->count();

            $verify_count = $data_hitung->where('status', "1")->count();
            $nonverify_count = $data_hitung->where('status', "0")->count();

            $male_count = $data->where('jenis_kelamin', "Male")->count();
            $female_count = $data->where('jenis_kelamin', "Female")->count();
        }
        return view('dashboard_dokter', ['data' => $data, 'male_count' => $male_count,'female_count' => $female_count,'n_count' => $n_count, 'mvp_count' => $mvp_count, 'ms_count' => $ms_count, 'mr_count' => $mr_count, 'as_count' => $as_count, 'verify_count' => $verify_count, 'nonverify_count' => $nonverify_count]);
    }
    if (Auth::user()->role == "pasien") {
        $id = Auth::user()->id;
        $history = Prediksi::where('user_id', $id);

        $data = $history->orderBy('created_at', 'desc')->get();
        $mvp_count = $data->where('result', "3")->count();
        $n_count = $data->where('result', "4")->count();
        $ms_count = $data->where('result', "2")->count();
        $mr_count = $data->where('result', "1")->count();
        $as_count = $data->where('result', "0")->count();

        $verify_count = $data->where('status', "1")->count();
        $nonverify_count = $data->where('status', "0")->count();
        return view('dashboard_pasien', ['data' => $data, 'n_count' => $n_count, 'mvp_count' => $mvp_count, 'ms_count' => $ms_count, 'mr_count' => $mr_count, 'as_count' => $as_count, 'verify_count' => $verify_count, 'nonverify_count' => $nonverify_count]);
    }
})->name('dashboard')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'login_action')->name('login.action');

    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'store')->name('register.action');

    Route::get('/register-dokter', 'register_dokter')->name('register_dokter');
    Route::post('/register-dokter', 'store_dokter')->name('register_dokter.action');

    Route::get('/logout', 'logout')->name('logout');

    Route::get('/user/show/{id}', 'show')->name('user.show')->middleware('auth');
    Route::get('/user/profile', 'edit')->name('user.edit')->middleware('auth');

    Route::put('/user/show/{id}', 'update')->name('user.update')->middleware('auth');
    Route::put('/user/show/change/{id}', 'change_password')->name('user.change_password')->middleware('auth');
});

Route::controller(PrediksiController::class)->group(function () {
    Route::get('/result/{id}', 'result')->name('prediksi.result')->middleware('auth');
    Route::get('/ownCheck', 'check_index')->name('prediksi.check_index')->middleware('auth');
    Route::post('/ownCheck/{user_id}', 'run')->name('prediksi.run')->middleware('auth');

    Route::post('/verify/{id}', 'verification')->name('prediksi.verification')->middleware('auth');

    Route::get('/detail/{id}', 'detail')->name('prediksi.detail')->middleware('auth');
    
    Route::put('/result/{id}', 'update')->name('prediksi.update')->middleware('auth');
});

Route::controller(AssignController::class)->group(function () {
    Route::get('/assign', 'index')->name('assign.index')->middleware('admin');
    Route::post('/assign', 'store')->name('assign.store')->middleware('admin');
});
