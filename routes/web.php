<?php

//

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


Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'UserController');

Route::group(['middleware' => 'auth'], function() {
    //Home

    Route::get('/', 'HomeController@index')->name('home2');
    //Users
    Route::resource('users', 'UserController');
    Route::group(['prefix' => 'users/ajax/'], function() {
        Route::get('select2', 'UserController@searchSelect')->name('users.ajax.select2');
    });
    //Projects
    Route::resource('projects', 'ProjectController');
    Route::group(['prefix' => 'projects/{project}'], function() {
        Route::resource('tasks', 'TaskController');
    });
    //Companies
    Route::group(['prefix' => 'companies/ajax/'], function() {
        Route::get('select2', 'CompanyController@searchSelect')->name('companies.ajax.select2');
    });
});
