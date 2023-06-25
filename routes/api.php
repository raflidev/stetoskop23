<?php

use App\Http\Controllers\PrediksiController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [UserController::class, 'login_api']);
Route::post('/register_dokter', [UserController::class, 'register_api_dokter']);
Route::post('/register_pasien', [UserController::class, 'register_api_pasien']);
Route::post('/logout', [UserController::class, 'logout_api']);
Route::post('/refresh', [UserController::class, 'refresh_api']);

Route::post('/ownCheck', [PrediksiController::class, 'run_api']);
