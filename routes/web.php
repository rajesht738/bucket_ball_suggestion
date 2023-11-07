<?php

use App\Http\Controllers\BallController;
use App\Http\Controllers\BucketController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SuggestionController;
use Illuminate\Support\Facades\Route;

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

//  Bucket creation routes
Route::get('/', [BucketController::class, 'index'])->name('bucket.index');
Route::get('/bucket/create', [BucketController::class, 'create'])->name('bucket.create');
Route::post('/bucket/store', [BucketController::class, 'store'])->name('bucket.store');
Route::get('/bucket/{id}', [BucketController::class, 'edit'])->name('bucket.edit');
Route::put('/bucket/{id}', [BucketController::class, 'update'])->name('bucket.update');
Route::delete('/bucket/{id}/delete', [BucketController::class, 'destroy'])->name('bucket.destroy');

// ball Color creation routes
Route::get('/color', [ColorController::class, 'index'])->name('color.index');
Route::get('/color/create', [ColorController::class, 'create'])->name('color.create');
Route::post('/color/store', [ColorController::class, 'store'])->name('color.store');
Route::get('/color/{id}', [ColorController::class, 'edit'])->name('color.edit');
Route::put('/color/{id}', [ColorController::class, 'update'])->name('color.update');
Route::delete('/color/{id}/delete', [ColorController::class, 'destroy'])->name('color.destroy');

// ball creation routes
Route::get('/ball', [BallController::class, 'index'])->name('ball.index');
Route::get('/ball/create', [BallController::class, 'create'])->name('ball.create');
Route::post('/ball/store', [BallController::class, 'store'])->name('ball.store');
Route::get('/ball/{id}', [BallController::class, 'edit'])->name('ball.edit');
Route::put('/ball/{id}', [BallController::class, 'update'])->name('ball.update');
Route::delete('/ball/{id}/delete', [BallController::class, 'destroy'])->name('ball.destroy');


// Route for calculating suggested buckets
Route::get('/suggestion', [SuggestionController::class, 'index'])->name('suggestion.index');
Route::post('suggestions/suggest-buckets', [SuggestionController::class, 'suggestBuckets'])->name('suggestion.suggest-buckets');