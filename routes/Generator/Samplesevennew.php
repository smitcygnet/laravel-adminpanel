<?php
/**
 * Samplesevennew
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Samplesevennew'], function () {
        Route::resource('samplesevennews', 'SamplesevennewsController');
        //For Datatable
        Route::post('samplesevennews/get', 'SamplesevennewsTableController')->name('samplesevennews.get');
    });
    
});