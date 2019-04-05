<?php
/**
 * Samplefive
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {

    Route::group( ['namespace' => 'Samplefive'], function () {
        Route::resource('samplefives', 'SamplefivesController');
        //For Datatable
        Route::post('samplefives/get', 'SamplefivesTableController')->name('samplefives.get');
    });

});