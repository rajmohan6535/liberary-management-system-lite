<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('search', 'SearchBookController@search')->name('search');

Route::group(['middleware' => ['member', 'auth']], function () {

    Route::post('lend', 'LendController@lend')->name('lend');
    Route::get('my-lends', 'LendController@myLends')->name('myLends');
});

Route::redirect('/home', '/');


Route::group(['prefix' => 'admin'], function () {
    Route::get('login', 'Auth\AdminAuthController@showLoginForm')->name('admin.login.form');
    Route::post('login', 'Auth\AdminAuthController@login')->name('admin.login');

    Route::group(['middleware' => 'admin'], function () {

        Route::post('logout', 'Auth\AdminAuthController@logout')->name('admin.logout');

        Route::get('/', function () {
            return view('admin.dashboard');
        });

        Route::get('lends-action-summary/{action}/{lend_id}', 'LendController@lendActionSummary')->name('lend.actions.summary');
        Route::post('lends-action/{action}/{lend_id}', 'LendController@lendActions')->name('lend.actions');
        Route::resource('lends', 'LendController');
        Route::resource('books', 'BookController');
    });
});

