<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JokeController;

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


Route::get('/',[JokeController::class,'index'])->name('jokes');
Route::get('/rating/{id}',[JokeController::class,'jokePage'])->name('joke.detail');
Route::post('/add-rating/{id}',[JokeController::class,'addRatingToJoke'])->name('add.rating.to.joke');
