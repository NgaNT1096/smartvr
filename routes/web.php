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
Route::group(['prefix' => 'admin'], function(){
    Route::group(['prefix' => 'content'], function (){
		//admin/content/them
		Route::get('them', 'Package\ContentController@getLinkContent');
        Route::post('them','Package\ContentController@addNewContent');
        Route::get('list', 'Package\ContentController@downloadContent');
 
    });
    Route::group(['prefix' => 'oculus'], function (){
		//admin/oculus/them
		Route::get('them', 'Package\OculusController@getOculus');
        Route::post('them','Package\OculusController@addNewOculus');
        Route::get('list', 'Package\OculusController@index');
 
    });
    Route::group(['prefix' => 'theme'], function (){
        Route::get('them', 'Package\ThemeController@getLinkTheme');
        Route::post('them','Package\ThemeController@addNewTheme');
        Route::get('list', 'Package\ThemeController@index');
    });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');