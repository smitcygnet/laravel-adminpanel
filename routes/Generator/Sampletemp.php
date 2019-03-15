<?php
/**
 * Sampletemp
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Sampletemp'], function () {
        Route::resource('sampletemps', 'SampletempsController');
        //For Datatable
        Route::post('sampletemps/get', 'SampletempsTableController')->name('sampletemps.get');
    });
    
});