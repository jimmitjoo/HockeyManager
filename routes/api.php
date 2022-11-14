<?php

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

Route::get('/games', [App\Http\Controllers\API\GameController::class, 'index']);
Route::get('/games/{game}', [App\Http\Controllers\API\GameController::class, 'show']);

Route::get('/teams', [App\Http\Controllers\API\TeamController::class, 'index']);
Route::get('/teams/{team}', [App\Http\Controllers\API\TeamController::class, 'show']);
Route::get('/teams/{team}/schedule', [App\Http\Controllers\API\TeamController::class, 'schedule']);
Route::post('/teams/become-team-manager', [App\Http\Controllers\API\TeamManagerController::class, 'store'])
    ->name('api.teams.manager.store');

Route::get('/competitions', [\App\Http\Controllers\API\CompetitionController::class, 'index']);
