<?php

Route::group(['prefix' => 'car', 'namespace' => 'Modules\Car\Http\Controllers'], function()
{
    Route::get('/', ['as' => 'car.index', 'uses' => 'CarController@index']);
    Route::get('/create', ['as' => 'car.create', 'uses' => 'CarController@create']);
    Route::post('/', ['as' => 'car.store', 'uses' => 'CarController@store']);
    Route::get('/{car}/edit', ['as' => 'car.edit', 'uses' => 'CarController@edit']);
    Route::put('/{car}', ['as' => 'car.update', 'uses' => 'CarController@update']);
    Route::delete('/{car}', ['as' => 'car.destroy', 'uses' => 'CarController@destroy']);

    Route::resource('color', 'ColorController');
    Route::resource('brand', 'BrandController');
    Route::resource('model', 'PrototypeController');
    Route::resource('condition', 'ConditionController');
});