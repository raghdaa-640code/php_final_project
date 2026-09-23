<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\User\ReviewController as UserReviewController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('reviews.index');
});

Route::get('/reviews', [UserReviewController::class, 'index'])->name('reviews.index');

Route::middleware('auth')->group(function () {
    Route::post('/reviews', [UserReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reviews/{review}/edit', [UserReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('/reviews/{review}', [UserReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{review}', [UserReviewController::class, 'destroy'])->name('reviews.destroy');
});

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/', HomeController::class)->name('home');

    Route::controller(UserController::class)->group(function () {
        Route::get('/users/create', 'create')->name('users.create');
        Route::post('/users/store', 'store')->name('users.store');
        Route::delete('/users/{id}', 'destroy')->name('users.destroy')->where(['id' => '[0-9]+']);
        Route::get('/users/{id}/edit', 'edit')->name('users.edit')->where(['id' => '[0-9]+']);
        Route::put('/users/{id}', 'update')->name('users.update')->where(['id' => '[0-9]+']);
    });

    Route::controller(BookController::class)->group(function () {
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