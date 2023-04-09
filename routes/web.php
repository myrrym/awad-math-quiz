<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MathCatController;

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

Route::get('/example', [MathCatController::class, 'viewExample']);
Route::get('/quiz', [MathCatController::class, 'viewQuiz']);
Route::get('/home', [MathCatController::class, 'viewHomePage']);
Route::get('/login', [MathCatController::class, 'viewLogin']);
Route::get('/', [MathCatController::class, 'viewHomePage']);