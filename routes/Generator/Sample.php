<?php
/**
 * Sample
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Sample'], function () {
        Route::resource('samples', 'SamplesController');
        //For Datatable
        Route::post('samples/get', 'SamplesTableController')->name('samples.get');
    });
    
});