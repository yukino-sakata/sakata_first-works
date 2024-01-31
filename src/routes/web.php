<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\RestController;
use App\Http\Controllers\StampController;
use App\Http\Controllers\DateController;

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

Route::get('/', [AuthController::class, 'index']);
Route::get('/register', [AuthController::class, 'register']);
Route::middleware('auth')->group(function () {
    Route::get('/stamp', [StampController::class, 'stamp']);
});
Route::get('/date',[DateController::class,'date']);
Route::post('/date',[DateController::class,'date']);
//Route::post('/date-next',[DateController::class,'dateNext']);
Route::post('/work-start', [WorkController::class, 'workStart']);
Route::post('/work-finish', [WorkController::class, 'workFinish']);
Route::post('/rest-start', [RestController::class, 'restStart']);
Route::post('/rest-end', [RestController::class, 'restEnd']);