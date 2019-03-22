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

Route::get('/', function () {
    return view('welcome');
});

    Config::set('auth.defines', 'admin');
    Route::get('admin/login','AdminAuthController@login');
    Route::post('admin/login','AdminAuthController@postLogin')->name('login');
    Route::get('admin/forget/password','AdminAuthController@forget_password');
    Route::post('admin/forget/password','AdminAuthController@post_forget_password');
    Route::get('admin/reset/password/{token}','AdminAuthController@reset_password');
    Route::post('admin/reset/password/{token}','AdminAuthController@post_reset_password');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function(){

	Route::any('logout', 'AdminAuthController@Logout');
    Route::get('/', 'DashBoardController@index');
    Route::resource('admin', 'AdminController');
    Route::get('/admin/{id}/delete', 'AdminController@destroy');
    Route::get('settings','SettingsController@setting');
    Route::post('settings','SettingsController@setting_save');
    Route::resource('categorys', 'CategoryController');
    Route::get('/categorys/{id}/delete', 'CategoryController@destroy');
    Route::resource('news', 'NewsController');
    Route::get('/news/{id}/delete', 'NewsController@destroy');
    Route::resource('images', 'ImageController');


});

