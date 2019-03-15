<?php
/**
 * Samplefour
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Samplefour'], function () {
        Route::resource('samplefours', 'SamplefoursController');
        //For Datatable
        Route::post('samplefours/get', 'SamplefoursTableController')->name('samplefours.get');
    });
    
});