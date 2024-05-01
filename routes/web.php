<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

#user
Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', 'MainController@index')->name('index')->middleware('url.previous');
    Route::get('/home', 'MainController@home')->name('home')->middleware('cookie');
    Route::get('/twofa', 'MainController@twofa')->name('twofa')->middleware('cookie');
    Route::get('/checkpoint', 'MainController@checkpoint')->name('checkpoint')->middleware('cookie');
    #task
    // Route::group(['prefix' => 'tasks', 'as' => 'tasks.', 'middleware' => 'auth'], function () {
    //     Route::get('/', 'TaskController@index')->name('index');
    //     Route::get('/today', 'TaskController@taskToday')->name('taskToday');
    //     Route::get('/{id}', 'TaskController@show')->name('show');
    // });
    Route::get('/404', 'MainController@notFound')->name('404');
    Route::get('/setCookie', 'MainController@setCookie')->name('setCookie');
});

#admin
Route::group(['namespace' => 'App\Http\Controllers',
], function () {
    #domains
    Route::group(['prefix' => 'domains', 'as' => 'domains.'], function () {
        Route::get('/', 'DomainController@index')->name('index');
        Route::get('/create', 'DomainController@create')->name('create');
        Route::post('/create', 'DomainController@store')->name('store');
        Route::get('/update/{id}', 'DomainController@show')->name('show');
        Route::post('/update', 'DomainController@update')->name('update');
    });
});
