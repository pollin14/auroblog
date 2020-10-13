<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/home', HomeController::class.'@index')->name('home');

Route::resource('posts', PostController::class);
