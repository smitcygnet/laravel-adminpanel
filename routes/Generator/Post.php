<?php
/**
 * Post
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Post'], function () {
        Route::resource('posts', 'PostsController');
        //For Datatable
        Route::post('posts/get', 'PostsTableController')->name('posts.get');
    });
    
});