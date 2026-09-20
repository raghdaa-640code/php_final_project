<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',HomeController::class);

Route::prefix('/user')->name('user.')->group(function(){
    Route::get('/',HomeController::class)->name('userhome');
    Route::controller(UserController::class)->group(function(){
        Route::get('/profile','profile')->name('profile');
        Route::get('/books','books')->name('books');
        Route::get('/addbook','addbook')->name('addbook');
    });
});



?>