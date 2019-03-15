<?php
/**
 * Samplesix
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Samplesix'], function () {
        Route::resource('samplesixes', 'SamplesixesController');
        //For Datatable
        Route::post('samplesixes/get', 'SamplesixesTableController')->name('samplesixes.get');
    });
    
});