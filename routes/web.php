<?php

use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\BookController as UserBookController;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\HomeController;

use App\Http\Controllers\Auth\AuthController;

Route::get('/', function(){
    return view('home');
})->name('home');

Route::middleware(['auth','isadmin'])->prefix('/admin')->name('admin.')->group(function() {
    Route::controller(AdminUserController::class)->group(function(){
        Route::get('/users/dashboard','index')->name('users.dashboard');
    });
});

Route::middleware(['auth'])->prefix('/user')->name('user.')->group(function(){
    Route::controller(UserController::class)->group(function(){
        Route::get('/userhome','userhome')->name('userhome');
        Route::get('/{id}/profile','profile')->name('profile')->where(['id'=>'[0-9]+']);
    });
});

Route::middleware(['guest'])->controller(AuthController::class)->group(function() {
    Route::get('/login','showlogin')->name('auth.login');
    Route::post('/login','login')->name('auth.login.submit');
    Route::get('/register','register')->name('auth.register');
    Route::post('/handleregister','handleregister')->name('handleregister');
    Route::get('/logout','logout')->name('auth.logout')->withoutMiddleware('guest');
    
});

Route::middleware(['auth'])->controller(UserBookController::class)->group(function(){
    Route::get('/book/show','showbooks')->name('showbooks');
});

?>