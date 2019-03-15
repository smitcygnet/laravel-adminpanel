<?php
/**
 * Visions
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Vision'], function () {
        Route::resource('visions', 'VisionsController');
        //For Datatable
        Route::post('visions/get', 'VisionsTableController')->name('visions.get');
    });
    
});