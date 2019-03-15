<?php
/**
 * Sampleone
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Sampleone'], function () {
        Route::resource('sampleones', 'SampleonesController');
        //For Datatable
        Route::post('sampleones/get', 'SampleonesTableController')->name('sampleones.get');
    });
    
});