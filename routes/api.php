<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\Jwt\UserController;
use App\Http\Controllers\Auth\Jwt\AuthenticateController;

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

Route::get('/user/info', [UserController::class,'show'])->middleware('jwt.verify');
Route::post('/user/info', [UserController::class,'update'])->middleware('jwt.verify');

Route::post('/login', [AuthenticateController::class,'login']);
