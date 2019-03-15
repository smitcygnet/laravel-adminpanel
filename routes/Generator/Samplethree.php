<?php
/**
 * Samplethree
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Samplethree'], function () {
        Route::resource('samplethrees', 'SamplethreesController');
        //For Datatable
        Route::post('samplethrees/get', 'SamplethreesTableController')->name('samplethrees.get');
    });
    
});