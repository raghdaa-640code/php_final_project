<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BookController as UserBookController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\User\ReviewController as UserReviewController;
use App\Http\Controllers\User\UserController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/search', function () {
    return view('search');
});

Route::get('/report', function () {
    return view('report');
});

Route::post('/report', function () {
    return view('report');
});

Route::get('/show', function () {
    return view('show');
});

Route::get('/edit/{id}', function ($id) {
    return view('edit', compact('id'));
});

Route::post('/edit/{id}', function ($id) {
    return view('edit', compact('id'));
});

Route::get('/delete/{id}', function ($id) {
    return view('delete', compact('id'));
});

Route::post('/delete/{id}', function ($id) {
    return view('delete', compact('id'));
});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')
    ->controller(AuthController::class)
    ->group(function () {
        Route::get('/login', 'showlogin')->name('auth.login');
        Route::post('/login', 'login')->name('auth.login.submit');

        Route::get('/register', 'register')->name('auth.register');
        Route::post('/handleregister', 'handleregister')->name('handleregister');
    });

Route::get('/logout', [AuthController::class, 'logout'])
    ->name('auth.logout')
    ->middleware('auth');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('auth.logout.submit')
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'isadmin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::controller(AdminUserController::class)->group(function () {
            Route::get('/users/dashboard', 'index')->name('users.dashboard');
            Route::get('/users/create', 'create')->name('users.create');
            Route::post('/users/store', 'store')->name('users.store');

            Route::delete('/users/{id}', 'destroy')
                ->name('users.destroy')
                ->whereNumber('id');

            Route::get('/users/{id}/edit', 'edit')
                ->name('users.edit')
                ->whereNumber('id');

            Route::put('/users/{id}', 'update')
                ->name('users.update')
                ->whereNumber('id');
        });

        Route::controller(AdminBookController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('dashboard');

            Route::delete('/books/{id}', 'destroy')
                ->name('books.destroy')
                ->whereNumber('id');
        });

        Route::get('/reports', [AdminReportController::class, 'index'])
            ->name('reports.index');

        Route::put('/reports/{report}/reply', [AdminReportController::class, 'reply'])
            ->name('reports.reply');

        Route::get('/reviews', [AdminReviewController::class, 'index'])
            ->name('reviews.index');

        Route::post('/reviews', [AdminReviewController::class, 'store'])
            ->name('reviews.store');

        Route::delete('/reviews/{review}', [AdminReviewController::class, 'destroy'])
            ->name('reviews.destroy');

        Route::delete('/reviews', [AdminReviewController::class, 'destroyAll'])
            ->name('reviews.destroyAll');
    });

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')
    ->prefix('user')
    ->name('user.')
    ->group(function () {

        Route::controller(UserController::class)->group(function () {
            Route::get('/userhome', 'userhome')->name('userhome');

            Route::get('/{id}/profile', 'profile')
                ->name('profile')
                ->whereNumber('id');

            Route::get('/{id}/profile/edit', 'editprofile')
                ->name('editprofile')
                ->whereNumber('id');

            Route::put('/{id}/profile/update', 'updateuser')
                ->name('updateuser')
                ->whereNumber('id');

            Route::delete('/{id}/profile/delete', 'deleteuser')
                ->name('deleteuser')
                ->whereNumber('id');
        });

        Route::controller(UserBookController::class)->group(function () {
            Route::get('/book/show', 'showbooks')->name('showbooks');
            Route::get('/book/addbook', 'addbook')->name('addbook');
            Route::post('/book/storebook', 'storebook')->name('storebook');

            Route::get('/book/{id}/edit', 'editbook')
                ->name('editbook')
                ->whereNumber('id');

            Route::delete('/book/{id}/delete', 'deletebook')
                ->name('deletebook')
                ->whereNumber('id');

            Route::put('/book/{id}', 'updatebook')
                ->name('updatebook')
                ->whereNumber('id');

            Route::get('/book/{id}/accept', 'accept')
                ->name('accept')
                ->whereNumber('id');

            Route::get('/{id}/book/showmybooks', 'showmybooks')
                ->name('showmybooks')
                ->whereNumber('id');

            Route::get('/{id}/book/request', 'request')
                ->name('request')
                ->whereNumber('id');
        });
    });

/*
|--------------------------------------------------------------------------
| Reviews Routes
|--------------------------------------------------------------------------
*/

Route::get('/reviews', [UserReviewController::class, 'index'])
    ->name('reviews.index');

Route::middleware('auth')->group(function () {
    Route::post('/reviews', [UserReviewController::class, 'store'])
        ->name('reviews.store');

    Route::get('/reviews/{review}/edit', [UserReviewController::class, 'edit'])
        ->name('reviews.edit');

    Route::put('/reviews/{review}', [UserReviewController::class, 'update'])
        ->name('reviews.update');

    Route::delete('/reviews/{review}', [UserReviewController::class, 'destroy'])
        ->name('reviews.destroy');
});
