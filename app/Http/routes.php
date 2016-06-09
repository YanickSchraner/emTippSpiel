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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/teams', 'TeamsController@index');
Route::get('/teams/{team}', ['uses' =>'TeamsController@getTeam']);

Route::get('/groups', 'GroupsController@index');

Route::get('/schedule', 'ScheduleController@index');
Route::post('/schedule', 'ScheduleController@placeBet');