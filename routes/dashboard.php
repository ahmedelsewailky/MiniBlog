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
    'namespace' => 'App\Http\Controllers',
    // 'middleware' => ['auth'],
], function(){

    // Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');

    // Users
    Route::resource('users', 'UserController');

    // Subscribers
    Route::get('subscribers', 'DashboardController@subscribers');
    Route::post('subscribers', 'DashboardController@addSubscriber')->name('subscriber.add');

    // Posts
    Route::resource('post', 'PostController');

    // Categories
    Route::resource('categories', 'CategoryController');

    // Tags
    Route::resource('tags', 'TagController');

    // Roles
    Route::resource('roles', 'RoleController');

    // Permissions
    Route::resource('permissions', 'PermissionController');

    // Mark all notification as read
    Route::get('/markall', 'NotificationController@markAll');

    // Mark select notification as read
    Route::get('/mark/{post_id}', 'NotificationController@markAsRead');

    // Display all notifications
    Route::get('/notifications', 'NotificationController@index')->name('notifications');
});

