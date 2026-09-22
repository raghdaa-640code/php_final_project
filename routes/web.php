<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/',HomeController::class);

Route::prefix('/user')->name('user.')->group(function(){
    Route::controller(UserController::class)->group(function(){
        Route::get('/userhome','userhome')->name('userhome');
        Route::get('/{id}/profile','profile')->name('profile')->where(['id'=>'[0-9]+']);;
        
    });

    Route::controller(BookController::class)->group(function(){
        Route::get('/book/show','showbooks')->name('showbooks');
        Route::get('book/addbook','addbook')->name('addbook');
        Route::post('book/storebook','storebook')->name('storebook');
        Route::get('/book/{id}/edit','editbook')->name('editbook')->where(['id'=>'[0-9]+']);
        Route::delete('/book/{id}/delete','deletebook')->name('deletebook')->where(['id'=>'[0-9]+']);
        Route::put('/book/{id}','updatebook')->name('updatebook')->where(['id'=>'[0-9]+']);
        Route::post('/book/{id}/accept','accept')->name('accept')->where(['id'=>'[0-9]+']);
        Route::post('{id}/book/showmybooks','showmybooks')->name('showmybooks')->where(['id'=>'[0-9]+']);
    });

});




?>