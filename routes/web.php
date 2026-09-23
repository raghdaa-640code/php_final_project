<?php

use Illuminate\Support\Facades\Route;

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