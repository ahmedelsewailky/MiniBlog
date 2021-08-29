<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register dashboard routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "dashboard" middleware group. Now create something great!
|
*/
Auth::routes();

Route::group([
    'prefix' => 'panel',
    'namespace' => 'App\Http\Controllers'
], function(){

    // Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');

    // Users
    Route::resource('/users', 'UserController');
});

