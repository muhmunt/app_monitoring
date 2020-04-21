<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'v1'], function () {
    
    Route::post('register','Api\UserController@register');
    Route::post('login','Api\UserController@login');
    Route::post('list','Api\StudentListController@action');
    Route::get('event','Api\EventController@event');
    
});
