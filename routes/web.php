<?php

use App\Http\Controllers\AnimeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/anim/{category}', [AnimeController::class, 'showAll'])->name('show.all');
Route::get('/anime/{id}', [AnimeController::class, 'details'])->name('anime.details');


