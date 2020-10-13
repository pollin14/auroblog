<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['as' => 'posts.'], function () {
    Route::get('/', PostController::class.'@index')
        ->name('index');
    Route::get('/posts/{post:slug}', PostController::class.'@show')
        ->name('show');
});

Route::group(['namespace' => 'App\\Http\\Controllers\\'], function () {
    Auth::routes(['register' => false]);
});
