<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\ReportController as UserReportController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\BookController as UserBookController;
use App\Http\Controllers\User\ReviewController as UserReviewController;
use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::controller(UserReportController::class)->group(function () {

    Route::get('/search', 'search')->name('search');
    Route::get('/show', 'show')->name('report.show');
    Route::get('/report', 'report')->name('report');
    Route::post('/report', 'submitReport')->name('report.submit');

    Route::middleware(['auth'])->group(function(){
        Route::get('/edit/{id}', 'edit')->name('report.edit');
        Route::post('/edit/{id}', 'update')->name('report.update');
        Route::get('/delete/{id}', 'destroy')->name('report.destroy');
        Route::post('/delete/{id}', 'destroy')->name('report.delete');
    });
    
});


Route::middleware(['guest'])->controller(AuthController::class)->group(function () {
    Route::get('/login', 'showlogin')->name('auth.login');
    Route::post('/login', 'login')->name('auth.login.submit');
    Route::get('/register', 'register')->name('auth.register');
    Route::post('/handleregister', 'handleregister')->name('handleregister');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');



Route::middleware(['auth', 'isadmin'])->prefix('/admin')->name('admin.')->group(function () {

    Route::controller(AdminUserController::class)->group(function () {
        Route::get('/users/dashboard', 'index')->name('users.dashboard');
        Route::get('/users/create', 'create')->name('users.create');
        Route::post('/users/store', 'store')->name('users.store');
        Route::delete('/users/{id}', 'destroy')->name('users.destroy')->where(['id' => '[0-9]+']);
        Route::get('/users/{id}/edit', 'edit')->name('users.edit')->where(['id' => '[0-9]+']);
        Route::put('/users/{id}', 'update')->name('users.update')->where(['id' => '[0-9]+']);
    });

    
    Route::controller(AdminBookController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::delete('/books/{id}', 'destroy')->name('books.destroy')->where(['id' => '[0-9]+']);
    });

    
    Route::get('/reports', [AdminReportController::class, 'index'])->name('reports.index');
    Route::put('/reports/{report}/reply', [AdminReportController::class, 'reply'])->name('reports.reply');

    
    Route::get('/reviews', [AdminReviewController::class, 'index'])->name('reviews.index');
    Route::post('/reviews', [AdminReviewController::class, 'store'])->name('reviews.store');
    Route::delete('/reviews/{review}', [AdminReviewController::class, 'destroy'])->name('reviews.destroy');
    Route::delete('/reviews', [AdminReviewController::class, 'destroyAll'])->name('reviews.destroyAll');
});


Route::middleware(['auth'])->group(function () {

    Route::prefix('/user')->name('user.')->controller(UserController::class)->group(function () {
        Route::get('/userhome', 'userhome')->name('userhome');
        Route::get('/{id}/profile', 'profile')->name('profile')->where(['id' => '[0-9]+']);
        Route::get('/{id}/profile/edit', 'editprofile')->name('editprofile')->where(['id' => '[0-9]+']);
        Route::put('/{id}/profile/update', 'updateuser')->name('updateuser')->where(['id' => '[0-9]+']);
        Route::delete('/{id}/profile/delete', 'deleteuser')->name('deleteuser')->where(['id' => '[0-9]+']);
    });

    Route::controller(UserBookController::class)->group(function () {
        Route::get('/book/show', 'showbooks')->name('showbooks');
        Route::get('/book/addbook', 'addbook')->name('addbook');
        Route::post('/book/storebook', 'storebook')->name('storebook');
        Route::get('/book/{id}/edit', 'editbook')->name('editbook')->where(['id' => '[0-9]+']);
        Route::delete('/book/{id}/delete', 'deletebook')->name('deletebook')->where(['id' => '[0-9]+']);
        Route::put('/book/{id}', 'updatebook')->name('updatebook')->where(['id' => '[0-9]+']);
        Route::get('/book/{id}/accept', 'accept')->name('accept')->where(['id' => '[0-9]+']);
        Route::get('/{id}/book/showmybooks', 'showmybooks')->name('showmybooks')->where(['id' => '[0-9]+']);
        Route::get('/{id}/book/request', 'request')->name('request')->where(['id' => '[0-9]+']);
    });

    Route::post('/reviews', [UserReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reviews/{review}/edit', [UserReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('/reviews/{review}', [UserReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{review}', [UserReviewController::class, 'destroy'])->name('reviews.destroy');
});


Route::get('/reviews', [UserReviewController::class, 'index'])->name('reviews.index');