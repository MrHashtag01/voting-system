<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollController;
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('polls', PollController::class);

Route::post('polls/{id}/vote', [PollController::class, 'vote'])->name('polls.vote');

Route::get('polls/{slug}', [PollController::class, 'show'])->name('polls.show');



