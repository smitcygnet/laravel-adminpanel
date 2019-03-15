<?php
/**
 * Sampleseven
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Sampleseven'], function () {
        Route::resource('samplesevens', 'SamplesevensController');
        //For Datatable
        Route::post('samplesevens/get', 'SamplesevensTableController')->name('samplesevens.get');
    });
    
});