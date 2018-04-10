<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('project', 'ProjectController@index')->name('project-list');
    Route::get('project/add', 'ProjectController@add')->name('project-add');
    Route::post('project/add', 'ProjectController@store')->name('project-save');
    Route::get('project/view/{id}', 'ProjectController@view')->name('project-view');

    Route::post('app/create', 'AppController@store')->name('app-create');
});

//Route::get('temp', function () {
//    $string = "~/.composer/vendor/bin/envoy run connect --server=optimus";
//    $directory = base_path();
//    echo $directory . PHP_EOL;
//    $process = new Process($string);
//    $process->setWorkingDirectory($directory);
//    try {
//        $process->mustRun();
//        print $process->getOutput();
//    } catch (ProcessFailedException $e) {
//        print $e->getMessage();
//    }
//    echo 'Done';
//});
