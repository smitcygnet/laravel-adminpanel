<?php
/**
 * Lives
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Life'], function () {
        Route::resource('lives', 'LivesController');
        //For Datatable
        Route::post('lives/get', 'LivesTableController')->name('lives.get');
    });
    
});