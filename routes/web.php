<?php

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'RootController@index')->name('index');
    Route::resource('projects', 'ProjectsController');

    Route::prefix('settings')->namespace('Settings')->group(function () {
        //Route::resource('users', 'UsersController');
        //Route::resource('projects', 'ProjectsController');
    });

    Route::any('tools/upload', 'ToolsController@upload')->name('tools.upload');
});