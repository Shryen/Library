<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RateController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('books/index', [BookController::class, 'index']);
Route::get('book/{book:slug}', [BookController::class, 'show']);
Route::post('/book/{book:slug}/rates',[RateController::class,'store']);

Route::middleware('can:admin')->group(function () {
    Route::get('/admin/index', [AdminController::class, 'index']);
    Route::post('/admin/add', [AdminController::class, 'store']);
    Route::get('/admin/create', [AdminController::class, 'create']);
    Route::get('admin/book/{book:slug}/edit',[AdminController::class, 'edit']);
    Route::patch('admin/books/{book}',[AdminController::class, 'update']);
    Route::delete('admin/books/{book}',[AdminController::class, 'destroy']);
});


require __DIR__ . '/auth.php';
