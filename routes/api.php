<?php

use App\Http\Controllers\LoginController as ControllersLoginController;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Controllers\ResesController;
use Illuminate\Http\Controllers\RegisterController;
use Illuminate\Http\Controllers\LoginController;
use Illuminate\Http\Controllers\LogoutController;
use Illuminate\Http\Controllers\UsersController;
use Illuminate\Http\Controllers\ShopsController;
use Illuminate\Http\Controllers\LikesController;
use Illuminate\Http\Controllers\ReservationsController;



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

Route::apiResource('/rese', ResesController::class);
Route::post('/register',[RegisterController::class, 'post']);
Route::post('/login',[LoginController::class, 'post']);
Route::post('/logout', [LogoutController::class, 'post']);
Route::get('/users', [UsersController::class, 'get']);
Route::get('/shops', [ShopsController::class, 'get']);
Route::get('/shops/:id', [ShopsController::class, 'get']);
Route::post('/likes', [LikesController::class, 'post']);
Route::delete('/likes/:id', [LikesController::class, 'delete']);
Route::get('/likes', [LikesController::class, 'get']);
Route::post('/reservations', [ReservationsController::class, 'post']);
Route::delete('/resrvations/:id', [ReservationsController::class, 'delete']);
Route::get('/reservations', [ReservationsController::class, 'get']);