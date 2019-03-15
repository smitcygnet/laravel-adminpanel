<?php
/**
 * Sampletwo
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Sampletwo'], function () {
        Route::resource('sampletwos', 'SampletwosController');
        //For Datatable
        Route::post('sampletwos/get', 'SampletwosTableController')->name('sampletwos.get');
    });
    
});