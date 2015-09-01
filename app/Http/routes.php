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

Route::get('/', 'PlayersController@index');

Route::get('player/find', 'PlayersController@find');

Route::post('player/find', 'PlayersController@findDates');

Route::get('player/expiring', 'PlayersController@expiring');

Route::delete('team/{id}',array('uses' => 'TeamsController@destroy', 'as' => 'My.route'));

Route::resource('player', 'PlayersController');

Route::resource('team', 'TeamsController');

