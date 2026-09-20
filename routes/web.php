<?php

use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\Admin\HomeController;

use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('home');
});

Route::controller(UserController::class)->group(function() {
    Route::get('/admin/users/login','showlogin')->name('admin.users.login');
    Route::post('/admin/users/login','login');
});

?>