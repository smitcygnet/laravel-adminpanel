<?php
/**
 * Tempone
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Tempone'], function () {
        Route::resource('tempones', 'TemponesController');
        //For Datatable
        Route::post('tempones/get', 'TemponesTableController')->name('tempones.get');
    });
    
});