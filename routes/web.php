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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::namespace('Home')->group(function(){
    Route::get('/', 'IndexController@index')->name('/');
    Route::get('web_website','WebSiteController@web_website')->name('web.website');
    Route::get('case_info','CaseInfoController@index')->name('case.info');
    Route::get('news','NewsController@index')->name('news');
    Route::get('news_info','NewsController@newsInfo')->name('news.info');
    Route::get('contact','ContactController@index')->name('contact');
});

