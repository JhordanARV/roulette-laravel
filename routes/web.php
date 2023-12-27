<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\UserController;

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
//     // return view('welcome');
// });

Route::get('/', HomeController::class)->name('home');

Route::get('players', [PlayerController::class, 'index'])->name('players.index');

Route::get('players/create', [PlayerController::class, 'create'])->name('players.create');

Route::get('players/{id}', [PlayerController::class, 'show'])->name('players.show');

Route::get('players/{player}/edit', [PlayerController::class, 'edit'])->name('players.edit');

Route::post('players', [PlayerController::class, 'store'])->name('players.store');

Route::put('players/{player}', [PlayerController::class, 'update'])->name('players.update');

Route::delete('players/{player}', [PlayerController::class, 'destroy'])->name('players.destroy');


