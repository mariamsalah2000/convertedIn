<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\StatisticController;
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

Route::get('/', [TaskController::class, 'index']);
Route::resource('tasks', TaskController::class);
Route::resource('statistics', StatisticController::class);
