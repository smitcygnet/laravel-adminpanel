<?php
/**
 * Comment
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Comment'], function () {
        Route::resource('comments', 'CommentsController');
        //For Datatable
        Route::post('comments/get', 'CommentsTableController')->name('comments.get');
    });
    
});