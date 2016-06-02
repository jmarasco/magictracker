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

Route::get('/', [
    'as' => 'splash', function() {
        return view('splash', ['pageType' => '']);
    }
]);

Route::get('404', [
    'as' => '404', 'uses' => 'ItemsController@magickingdom'
]);

// Item Pages
Route::get('magic-kingdom/{area?}', [
    'as' => 'mk', 'uses' => 'ItemsController@magickingdom'
]);

Route::get('epcot/{area?}', [
    'as' => 'epcot', 'uses' => 'ItemsController@epcot'
]);

Route::get('hollywood-studios/{area?}', [
    'as' => 'hs', 'uses' => 'ItemsController@hollywoodstudios'
]);

Route::get('animal-kingdom/{area?}', [
    'as' => 'ak', 'uses' => 'ItemsController@animalkingdom'
]);

Route::get('characters', [
    'as' => 'characters', 'uses' => 'ItemsController@characters'
]);

Route::get('resorts/{category?}', [
    'as' => 'resorts', 'uses' => 'ItemsController@resorts'
]);

Route::get('items/{item}', [
    'as' => 'item', 'uses' => 'ItemsController@show'
]);

// Auth Routes
Route::auth();

Route::get('/home', [
    'as' => 'home', 'uses' => 'ItemsController@magickingdom'
]);

// Item action routes
Route::post('/itemactions/check', [
    'as' => 'check', 
    'middleware' => 'auth',
    'uses' => 'ChecksController@checkUncheck'
]);