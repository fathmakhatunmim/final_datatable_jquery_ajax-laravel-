<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});
 Route::get('/addBook', [BookController::class, 'index'])->name('avaBook.index');

 Route::post('/create/store',[BookController::class,'store'])->name('create.store');

Route::post('/create/book',[BookController::class,'create'])->name('create.create');

Route::get('/create/edit/{id}', [BookController::class,'edit'])->name('create.edit');

Route::delete('/categories/{id}/destroy', [BookController::class, 'destroy'])->name('categories.destroy');

Route::get('/create/show',[BookController::class,'show'])->name('create.show');

//bar bar somosahoiche
Route::get('/user-data',[BookController::class,'getdata'])->name('user.show');