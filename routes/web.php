<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/',function(){
    return view('welcome');
});

// Route::get('/admin/dashboard', function () {
//     return view('admin.users.admin_dasboard.app');
// });

Route::prefix('/admin')->name('admin.')->group(function(){

    Route::get('/',HomeController::class)->name('home');

    Route::controller(UserController::class)->group(function(){

        Route::get('/users/create','create')->name('users.create');
        Route::post('/users/store','store')->name('users.store');
        Route::delete('/users/{id}',"destroy")->name('users.destroy')->where(['id'=>'[0-9]+']);
        Route::get('/users/{id}/edit',"edit")->name('users.edit')->where(['id'=>'[0-9]+']);
        Route::put('/users/{id}','update')->name('users.update')->where(['id'=>'[0-9]+']);

        // Route::get('/students','index')->name('students.index');
        // Route::get('/students/{id}','show')->name('students.show')->where(['id'=>'[0-9]+']);
        
        });
        
        Route::controller(BookController::class)->group(function(){
            Route::get('/dashboard','index')->name('dashboard');
            Route::delete('/books/{id}',"destroy")->name('books.destroy')->where(['id'=>'[0-9]+']);
            Route::get('/books/{id}/edit',"edit")->name('books.edit')->where(['id'=>'[0-9]+']);
            Route::put('/books/{id}','update')->name('books.update')->where(['id'=>'[0-9]+']);

            
            // Route::get('/departments', 'index')->name('departments.index');
            // Route::get('/departments/{id}','show')->name('departments.show')->where(['id'=>'[0-9]+']);
    
    });

});