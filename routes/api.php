<?php

use App\Http\Controllers\API\CompetitionController;
use App\Http\Controllers\API\PodcastController;
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

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/kompetisi', [CompetitionController::class, 'index']);
    Route::post('/kompetisi', [CompetitionController::class, 'store']);
    Route::prefix('submit')->group(function () {
        Route::post('/kompetisi', [CompetitionController::class, 'submitCompetition']);
        Route::get('/kompetisi/{id}', [CompetitionController::class, 'competitionParticipant']);
    });

    // podcast
    Route::get('/podcast', [PodcastController::class, 'index']);
    Route::post('/podcast', [PodcastController::class, 'store']);
});