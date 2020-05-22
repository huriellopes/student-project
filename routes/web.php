<?php

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

Route::get('/', 'Web\Site\SiteController@index')->name('site');

Auth::routes();

Route::get('/home', 'Web\Admin\HomeController@index')->name('home');
Route::group([
    'prefix' => '/users'
], function () {
    Route::get('/', 'Web\Admin\HomeController@users')->name('users');
});

Route::group([
    'prefix' => '/posts'
], function () {
    Route::get('/', 'Web\Admin\HomeController@posts')->name('posts');
    Route::get('/create', 'Web\Admin\HomeController@postCreate')->name('posts/create');

    Route::group([
        'prefix' => '/api'
    ], function () {
        Route::get('/lista', 'Api\Admin\AdminController@listPosts');
    });
});

