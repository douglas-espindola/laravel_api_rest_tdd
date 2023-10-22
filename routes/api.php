<?php

use App\Http\Controllers\BooksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('books', [BooksController::class, 'index'])->name('books.index');
Route::post('book', [BooksController::class, 'store'])->name('books.store');
Route::get('book/{id}', [BooksController::class, 'show'])->name('books.show');
Route::match(['put', 'patch'],'book/{id}', [BooksController::class, 'update'])->name('books.update');
Route::delete('book/{id}', [BooksController::class, 'destroy'])->name('books.destroy');

