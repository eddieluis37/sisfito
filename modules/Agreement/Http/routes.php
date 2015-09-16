<?php


Route::group(['prefix' => 'agreement', 'namespace' => 'Modules\Agreement\Http\Controllers'], function()
{
    Route::get('/', ['as' => 'agreement.index', 'uses' => 'AgreementController@index']);
    Route::get('/create', ['as' => 'agreement.create', 'uses' => 'AgreementController@create']);
    Route::post('/', ['as' => 'agreement.store', 'uses' => 'AgreementController@store']);
    Route::get('/{agreement}/edit', ['as' => 'agreement.edit', 'uses' => 'AgreementController@edit']);
    Route::put('/{agreement}', ['as' => 'agreement.update', 'uses' => 'AgreementController@update']);
    Route::delete('/{agreement}', ['as' => 'agreement.destroy', 'uses' => 'AgreementController@destroy']);

    Route::get('/{agreement}/download-pdf', ['as' => 'agreement.pdf', 'uses' => 'AgreementController@printPdf']);

    Route::resource('status', 'AgreementStatusController');
});

