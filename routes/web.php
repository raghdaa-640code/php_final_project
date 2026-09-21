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

        // Route::get('/students','index')->name('students.index');
        // Route::get('/students/create','create')->name('students.create');
        // Route::get('/students/{id}','show')->name('students.show')->where(['id'=>'[0-9]+']);
        // Route::post('/students/store','store')->name('students.store');
        // Route::delete('/students/{id}',"destroy")->name('students.destroy')->where(['id'=>'[0-9]+']);
        // Route::get('/students/{id}/edit',"edit")->name('students.edit')->where(['id'=>'[0-9]+']);
        // Route::put('/students/{id}','update')->name('students.update')->where(['id'=>'[0-9]+']);
        
        });
        
        Route::controller(BookController::class)->group(function(){
            Route::get('/dashboard','index')->name('dashboard');

            
            // Route::get('/departments', 'index')->name('departments.index');
            // Route::get('/departments/create', 'create')->name('departments.create');
            // Route::get('/departments/{id}','show')->name('departments.show')->where(['id'=>'[0-9]+']);
            // Route::post('/departments/store','store')->name('departments.store');
            // Route::delete('/departments/{id}',"destroy")->name('departments.destroy')->where(['id'=>'[0-9]+']);
            // Route::get('/departments/{id}/edit',"edit")->name('departments.edit')->where(['id'=>'[0-9]+']);
            // Route::put('/departments/{id}','update')->name('departments.update')->where(['id'=>'[0-9]+']);
    
    });

});