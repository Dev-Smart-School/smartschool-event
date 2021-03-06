<?php

use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\DashboardController;
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
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('auth/{type}/{token}/{id}', [AuthUserController::class, 'logged'])->name('check-logged');
Route::get('/competition', [CompetitionController::class, 'index'])->name('competition');
Route::post('/competition', [CompetitionController::class, 'store'])->name('competition.store');
