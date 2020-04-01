<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'v1'], function () {
    
    Route::post('register','Api\RegisterController@action');
    Route::post('login','Api\LoginController@action');
    Route::post('list','Api\StudentListController@action');
    Route::get('event','Api\EventController@event');
    
});
