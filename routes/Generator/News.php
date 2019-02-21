<?php
/**
 * News
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'News'], function () {
        Route::resource('news', 'NewsController');
        //For Datatable
        Route::post('news/get', 'NewsTableController')->name('news.get');
    });
    
});