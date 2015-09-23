<?php

Route::group(['prefix' => 'client', 'namespace' => 'Modules\Client\Http\Controllers'], function()
{
	Route::get('/', ['as' => 'client.index', 'uses' => 'ClientController@index']);
	Route::get('/create', ['as' => 'client.create', 'uses' => 'ClientController@create']);
    Route::post('/', ['as' => 'client.store', 'uses' => 'ClientController@store']);
    Route::get('/{client}/edit', ['as' => 'client.edit', 'uses' => 'ClientController@edit']);
    Route::put('/{client}', ['as' => 'client.update', 'uses' => 'ClientController@update']);
    Route::delete('/{client}', ['as' => 'client.destroy', 'uses' => 'ClientController@destroy']);
    Route::resource('seccional', 'SeccionalController');
    Route::get('/{show}', ['as' => 'client.show', 'uses' => 'ClientController@show']);
});