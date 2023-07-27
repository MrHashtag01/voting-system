<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollController;
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('polls/export', [PollController::class, 'export'])->name('polls.export');

// polls
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('polls/create', [PollController::class, 'create'])->name('polls.create');
    Route::get('polls/{id}/edit', [PollController::class, 'edit'])->name('polls.edit');
});

Route::resource('polls', PollController::class)->except('create', 'edit');

Route::group(['middleware' => ['role:admin|voter']], function () {
    Route::post('polls/{id}/vote', [PollController::class, 'vote'])->name('polls.vote');
    Route::get('polls/{slug}', [PollController::class, 'show'])->name('polls.show');
});

