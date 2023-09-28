<?php

use App\Http\Controllers\admin\FilmController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/films', [FilmController::class, 'index'])->name('index');
Route::get('/films/create', [FilmController::class, 'create'])->name('create');
Route::post('/films/create', [FilmController::class, 'store'])->name('store');
Route::get('/films/edit/{id}', [FilmController::class, 'edit'])->name('edit');
Route::put('/films/edit/{id}',[FilmController::class, 'update'])->name('update');
Route::delete('films/destroy/{id}',[FilmController::class, 'destroy'])->name('destroy');
