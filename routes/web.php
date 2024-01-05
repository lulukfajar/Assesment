<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;

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

Route::get('/foods', [FoodController::class, 'index'])->name('foods.index');
Route::get('/foods/create', [FoodController::class, 'create'])->name('foods.create');
Route::get('/foods/{food}/edit', [FoodController::class, 'update'])->name('foods.edit');
Route::post('/foods/store', [FoodController::class, 'store'])->name('foods.store');
Route::put('/foods/{food}', [FoodController::class, 'saveupdate'])->name('foods.update');
Route::get('/foods/{id}/delete', [FoodController::class, 'destroy'])->name('foods.destroy');
