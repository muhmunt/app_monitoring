<?php

Route::get('/', 'PageController@index')->name('index');
Route::get('/search', 'PageController@search')->name('search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/create/event','EventController@createEvent')->name('create.event');
Route::get('/delete/event/{id}','EventController@deleteEvent')->name('delete.event');

Route::get('event/list/{id}/{slug}','StudentListController@detail')->name('list');
Route::get('list/{id}/{slug}','StudentListController@jsonDetail')->name('detailList');
Route::get('list/{id}/{slug}/search', 'StudentListController@search')->name('search.list');
Route::post('event/list/student','StudentListController@store')->name('studentList.store');

Route::middleware('auth')->group(function(){
    Route::prefix('admin')->middleware('admin')->group(function(){
        
        Route::get('/', 'PageController@admin')->name('dashboard');

        // qrcode
        Route::post('/student/print/qr-code/{nis}/{nama}/{jk}','StudentController@generate')->name('generate');

        // crud student
        Route::resource('student', 'StudentController')->except([
            'destroy','show','update'
        ]);
        Route::get('/student/destroy/{id}','StudentController@destroy')->name('student.destroy');
        Route::post('/student/{id}/update','StudentController@update')->name('student.update');

        Route::get('/student/export_excel','StudentController@export_excel')->name('export_excel');
        Route::post('/student/import_excel','StudentController@import_excel')->name('import_excel');
        Route::get('/student/import',function(){
            return view('layouts.pages.app');
        });
        // crud events
        Route::resource('events', 'EventController')->except([
            'show','destroy','update']); 
        Route::post('/events/update','EventController@update')->name('events.update');
        Route::get('/events/destroy/{id}','EventController@destroy')->name('events.destroy');
        
        // crud rayon
        Route::resource('rayons', 'RayonController')->except([
            'show','destroy','update']);
        ROUTE::post('/rayons/update','RayonController@update')->name('rayons.update');
        Route::get('/rayons/destroy/{id}','RayonController@destroy')->name('rayons.destroy');

        // crud rombel
        Route::resource('rombels', 'RombelController')->except([
            'show','destroy','update']);
        ROUTE::post('/rombels/update','RombelController@update')->name('rombels.update');
        Route::get('/rombels/destroy/{id}','RombelController@destroy')->name('rombels.destroy');
            
        // student list
        Route::get('event/list/{id}/{slug}','StudentListController@adminDetail')->name('adminList');
        Route::get('student/list/delete/{id}','StudentListController@destroy')->name('adminStudentList.destroy');
    });
});