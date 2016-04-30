<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'ItemsController@magickingdom');

Route::get('404', [
    'as' => '404', 'uses' => 'ItemsController@magickingdom'
]);

Route::get('magic-kingdom/{category?}/{area?}', [
    'as' => 'mk', 'uses' => 'ItemsController@magickingdom'
    ]);

Route::get('epcot/{category?}/{area?}', [
    'as' => 'epcot', 'uses' => 'ItemsController@epcot'
    ]);

Route::get('hollywood-studios/{category?}/{area?}', [
    'as' => 'hs', 'uses' => 'ItemsController@hollywoodstudios'
    ]);

Route::get('animal-kingdom/{category?}/{area?}', [
    'as' => 'ak', 'uses' => 'ItemsController@animalkingdom'
    ]);

Route::get('characters', [
    'as' => 'characters', 'uses' => 'ItemsController@characters'
    ]);

Route::get('resorts/{category?}/{area?}', [
    'as' => 'resorts', 'uses' => 'ItemsController@resorts'
    ]);

Route::get('items/{item}', [
    'as' => 'item', 'uses' => 'ItemsController@show'
    ]);

// Route::get('login', [
//     'as' => 'login', 'uses' => 'AuthController@login'
//     ]);
Route::auth();

Route::get('/home', 'HomeController@index');