<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MathCatController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\ActivityController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MathCatController::class, 'viewHomePage']);
Route::get('/home', [MathCatController::class, 'viewHomePage']);
Route::get('/example', [MathCatController::class, 'viewExample']);
Route::get('/quiz/{diff}', [MathCatController::class, 'viewQuiz']);
Route::get('/quiz-results', [MathCatController::class, 'viewQuizResults']);
Route::get('/user', [MathCatController::class, 'viewUser']);
Route::get('/leaderboard', function () {
    return redirect('/leaderboard/Easy');
})->middleware('auth:sanctum');
Route::get('/leaderboard/{difficulty}', [MathCatController::class, 'viewLeaderboard']);
// Route::get('user/{username}', [UserController::class, 'loadView']);
Route::get('/privacy', [MathCatController::class, 'viewPrivacy']);
// Route::get('/history', function () {
//     return redirect('/history/Easy');
// });
// Route::get('/history/{difficulty?}', [MathCatController::class, 'viewHistory']);
Route::get('/history', [MathCatController::class, 'viewHistory']);
Route::get('/achievement', [MathCatController::class, 'viewAchievement']);

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

Route::fallback([MathCatController::class, 'view404']);
Auth::routes();
