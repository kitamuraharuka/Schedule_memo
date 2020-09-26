<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*Route::get('/', function () {
    return view('welcome');
});*/



//★トップ画面ルーティング//
Route::get('/','TopController@index')->name('home');

//★スケジュールルーティング
Route::group(['prefix' => 'schedule'], function() {
     
     //新規作成画面　
     Route::get('register','ScheduleController@add' );
     Route::post('register','ScheduleController@create');
     
     //編集画面
     Route::get('edit','ScheduleController@edit' );
     Route::post('edit','ScheduleController@update' );
     
     //削除動作
     Route::get('delete','ScheduleController@delete');
     
});

//★日記ルーティング
Route::group(['prefix' => 'diary'], function() {
     
     //新規作成画面
     Route::get('register','DiaryController@add' );
     Route::post('register','DiaryController@create' );
     
     //編集画面
     Route::get('edit','DiaryController@edit' );
     Route::post('edit','DiaryController@update');
     
    //削除動作
     Route::get('delete','DiaryController@delete');
});





     

