<?php
use \Illuminate\Support\Facades\Route;

Route::group(['prefix'=>config('space.space_route_prefix')],function(){
    Route::get('/','SpaceController@index')->name('space.search'); // Search
    Route::get('/rent','SpaceController@search_rent')->name('space.search_rent'); // Search
    Route::get('/sale','SpaceController@search_sale')->name('space.search_sale'); // Search
    Route::get('/sold','SpaceController@search_sold')->name('space.search_sold'); // Search
    Route::get('/{slug}','SpaceController@detail')->name('space.detail');// Detail
    Route::get('/download_excel/{id}','SpaceController@download_excel')->name('space.download_excel');
    Route::get('/compare_properties/{id}','SpaceController@compare_properties')->name('space.compare_properties');
    Route::get('/remove_compareitem/{id}','SpaceController@remove_compareitem')->name('space.remove_compareitem');
    Route::get('/remove_allcompare/{id}','SpaceController@remove_allcompare')->name('space.remove_allcompare');

});


Route::group(['prefix'=>'user/'.config('space.space_route_prefix'),'middleware' => ['auth','verified']],function(){
    Route::get('/','ManageSpaceController@manageSpace')->name('space.vendor.index');
    Route::get('/create','ManageSpaceController@createSpace')->name('space.vendor.create');
    Route::get('/edit/{id}','ManageSpaceController@editSpace')->name('space.vendor.edit');
    Route::get('/del/{id}','ManageSpaceController@deleteSpace')->name('space.vendor.delete');
    Route::post('/store/{id}','ManageSpaceController@store')->name('space.vendor.store');
    Route::get('bulkEdit/{id}','ManageSpaceController@bulkEditSpace')->name("space.vendor.bulk_edit");
    Route::get('/booking-report/bulkEdit/{id}','ManageSpaceController@bookingReportBulkEdit')->name("space.vendor.booking_report.bulk_edit");
	Route::get('clone/{id}','ManageSpaceController@cloneSpace')->name("space.vendor.clone");
    Route::get('/recovery','ManageSpaceController@recovery')->name('space.vendor.recovery');
    Route::get('/restore/{id}','ManageSpaceController@restore')->name('space.vendor.restore');
});

Route::group(['prefix'=>'user/'.config('space.space_route_prefix')],function(){
    Route::group(['prefix'=>'availability'],function(){
        Route::get('/','AvailabilityController@index')->name('space.vendor.availability.index');
        Route::get('/loadDates','AvailabilityController@loadDates')->name('space.vendor.availability.loadDates');
        Route::post('/store','AvailabilityController@store')->name('space.vendor.availability.store');
    });
});
