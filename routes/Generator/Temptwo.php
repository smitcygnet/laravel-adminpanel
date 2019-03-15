<?php
/**
 * Temptwo
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Temptwo'], function () {
        Route::resource('temptwos', 'TemptwosController');
        //For Datatable
        Route::post('temptwos/get', 'TemptwosTableController')->name('temptwos.get');
    });
    
});