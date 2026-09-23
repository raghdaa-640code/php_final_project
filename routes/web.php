<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
// use App\Http\Controllers\BookController;

use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\BookController as UserBookController;
use App\Http\Controllers\Auth\AuthController;


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


Route::get('/',HomeController::class);

// Route::prefix('/user')->name('user.')->group(function(){
    // Route::controller(UserController::class)->group(function(){
    //     Route::get('/userhome','userhome')->name('userhome');
    //     Route::get('/{id}/profile','profile')->name('profile')->where(['id'=>'[0-9]+']);
    //     Route::get('/{id}/profile/edit','editprofile')->name('editprofile')->where(['id'=>'[0-9]+']);
    //     Route::put('/{id}/profile/update','updateuser')->name('updateuser')->where(['id'=>'[0-9]+']);
    //     Route::delete('/profile/{id}/delete','deleteuser')->name('deleteuser')->where(['id'=>'[0-9]+']);

    // });

    // Route::controller(UserBookController::class)->group(function(){
    //     Route::get('/book/show','showbooks')->name('showbooks');
    //     Route::get('book/addbook','addbook')->name('addbook');
    //     Route::post('book/storebook','storebook')->name('storebook');
    //     Route::get('/book/{id}/edit','editbook')->name('editbook')->where(['id'=>'[0-9]+']);
    //     Route::delete('/book/{id}/delete','deletebook')->name('deletebook')->where(['id'=>'[0-9]+']);
    //     Route::put('/book/{id}','updatebook')->name('updatebook')->where(['id'=>'[0-9]+']);
    //     Route::post('/book/{id}/accept','accept')->name('accept')->where(['id'=>'[0-9]+']);
    //     Route::post('{id}/book/showmybooks','showmybooks')->name('showmybooks')->where(['id'=>'[0-9]+']);
    //     Route::post('{id}/book/request','request')->name('request')->where(['id'=>'[0-9]+']);
    // });

// });


// Route::get('/', function(){
//     return view('home');
// });

Route::middleware(['auth','isadmin'])->prefix('/admin')->name('admin.')->group(function() {
    Route::controller(AdminUserController::class)->group(function(){
        Route::get('/users/dashboard','index')->name('users.dashboard');
    });
});

Route::middleware(['auth'])->prefix('/user')->name('user.')->group(function(){
    Route::controller(UserController::class)->group(function(){
        Route::get('/userhome','userhome')->name('userhome');
        Route::get('/{id}/profile','profile')->name('profile')->where(['id'=>'[0-9]+']);
        Route::get('/{id}/profile/edit','editprofile')->name('editprofile')->where(['id'=>'[0-9]+']);
        Route::put('/{id}/profile/update','updateuser')->name('updateuser')->where(['id'=>'[0-9]+']);
        Route::delete('/profile/{id}/delete','deleteuser')->name('deleteuser')->where(['id'=>'[0-9]+']);
    });
});

Route::middleware(['guest'])->controller(AuthController::class)->group(function() {
    Route::get('/login','showlogin')->name('auth.login');
    Route::post('/login','login')->name('auth.login.submit');
    Route::get('/register','register')->name('auth.register');
    Route::post('/handleregister','handleregister')->name('handleregister');
    Route::get('/logout','logout')->name('auth.logout')->withoutMiddleware('guest');
    
});

Route::middleware(['auth'])->prefix('/user')->controller(UserBookController::class)->group(function(){
    Route::get('/book/show','showbooks')->name('showbooks');
        Route::get('book/addbook','addbook')->name('addbook');
        Route::post('book/storebook','storebook')->name('storebook');
        Route::get('/book/{id}/edit','editbook')->name('editbook')->where(['id'=>'[0-9]+']);
        Route::delete('/book/{id}/delete','deletebook')->name('deletebook')->where(['id'=>'[0-9]+']);
        Route::put('/book/{id}','updatebook')->name('updatebook')->where(['id'=>'[0-9]+']);
        Route::get('/book/{id}/accept','accept')->name('accept')->where(['id'=>'[0-9]+']);
        Route::get('{id}/book/showmybooks','showmybooks')->name('showmybooks')->where(['id'=>'[0-9]+']);
        Route::get('{id}/book/request','request')->name('request')->where(['id'=>'[0-9]+']);
});

?>
