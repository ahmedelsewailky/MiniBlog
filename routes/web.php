<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;

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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [WebsiteController::class, 'index'])->name('website');

Route::get('/post/{slug}', [WebsiteController::class, 'post'])->name('post');

Route::get('/category/{slug}', [WebsiteController::class, 'category']);

Route::get('/search//', [WebsiteController::class, 'search']);