<?php
/**
 * Routes for : Testnew
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
	
	Route::group( ['namespace' => 'Testnew'], function () {
	    Route::get('testnews', 'TestnewsController@index')->name('testnews.index');
	    
	    
	    
	    //For Datatable
	    Route::post('testnews/get', 'TestnewsTableController')->name('testnews.get');
	});
	
});