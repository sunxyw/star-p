<?php

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'RootController@index')->name('index');
    Route::resource('projects', 'ProjectsController');
    Route::resource('users', 'UsersController');

    Route::any('tools/upload', 'ToolsController@upload')->name('tools.upload');
});