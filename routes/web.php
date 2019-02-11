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



Route::group(['middleware' => 'auth'], function() {
    //Home
    Route::get('/home', 'HomeController@index')->name('home');
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
        Route::post('task/update/', 'TaskController@update')->name('task.project.update');
    });
    Route::get('projects/search/select2', 'ProjectController@select2')->name('projects.search.select2');
    //Companies
    Route::resource('companies', 'CompanyController');
    Route::group(['prefix' => 'companies/ajax/'], function() {
        Route::get('select2', 'CompanyController@searchSelect')->name('companies.ajax.select2');
    });
    //Tasks
    Route::group(['prefix' => 'tasks'], function() {
        Route::post('/ajax/get', 'TaskController@getAjaxTask')->name('tasks.ajax.get');
        Route::get('/', 'HomeController@allTasks')->name('home.alltasks');
        Route::post('/update', 'TaskController@update')->name('tasks.aux.update');
    });

    Route::get('settings', 'SettingsController@create')->name('settings.create');
    Route::post('settings', 'SettingsController@store')->name('settings.store');
});