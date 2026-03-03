<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/books')->name('home');

Route::resource('books', BookController::class);
