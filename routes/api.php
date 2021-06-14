<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ShopsController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\ReviewsController;

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

Route::post('/register',[RegisterController::class, 'post']);
Route::post('/login',[LoginController::class, 'post']);
Route::post('/logout', [LogoutController::class, 'post']);
Route::get('/users/{id}', [UsersController::class, 'get']);
Route::get('/shops', [ShopsController::class, 'getAll']);
Route::get('/shops/{id}', [ShopsController::class, 'get']);
Route::post('/likes', [LikesController::class, 'post']);
Route::delete('/likes/{id}', [LikesController::class, 'delete']);
Route::get('/likes', [LikesController::class, 'get']);
Route::post('/reservations', [ReservationsController::class, 'post']); 
Route::delete('/reservations/{id}', [ReservationsController::class, 'delete']);
Route::put('/reservations/{id}', [ReservationsController::class, 'put']); 
Route::get('/reservations', [ReservationsController::class, 'get']);
Route::post('/reviews', [ReviewsController::class, 'post']);
Route::delete('/reviews/{id}', [ReviewsController::class, 'delete']);
Route::put('/reviews/{id}', [ReviewsController::class, 'put']);
Route::get('/reviews', [ReviewsController::class, 'get']);