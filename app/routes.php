<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'redirectSimulation', 'uses' => 'HomeController@redirectSimulation'));
Route::get('/simular-eventos', array('as' => 'showSimulation', 'uses' => 'SimulationController@showSimulation'));
Route::post('/simular-eventos', array('as' => 'simulationPost', 'uses' => 'SimulationController@simulationPost'));
Route::get('/resultados', array('as' => 'showResults', 'uses' => 'SimulationController@showResults'));

// chart routes
Route::group(array('prefix'=>'/chart'),function(){
	Route::get('/', array('as' => 'chartResults', 'uses' => 'SimulationController@chartResults'));
	Route::post('/server1', 'SimulationController@server1');
	Route::post('/server2', 'SimulationController@server2');
	Route::post('/req_col_1', 'SimulationController@req_col_1');
	Route::post('/req_col_2', 'SimulationController@req_col_2');
	Route::post('/system', 'SimulationController@system');
});
