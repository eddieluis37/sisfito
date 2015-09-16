<?php

Route::group(['prefix' => 'predio', 'namespace' => 'Modules\Predio\Http\Controllers'], function()
{
	Route::get('/', 'PredioController@index');
});