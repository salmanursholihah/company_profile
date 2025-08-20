<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/portfolio', function () {
    return view('portfolio');
})->name('portfolio');

Route::get('/team', function () {
    return view('team');
})->name('team');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/e-katalog', function () {
    return view('e-katalog');
})->name('e-katalog');








/////routing untuk admin
// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard', [
            'usersCount' => 120,
            'subsCount' => 45,
        ]);
    })->name('admin.dashboard');

    Route::get('/users', function () {
        return view('admin.users');
    })->name('admin.users');

    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('admin.settings');
});