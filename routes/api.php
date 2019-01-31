<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('list', [
    'uses' =>'Package\ContentController@api_Content'
]);
Route::post('/user/register', [
    'uses' => 'AuthController@register'
]);
Route::post('/user/login', [
    'uses' => 'AuthController@signin'
]);

//content
Route::get('/content/list', 'Package\ContentController@api_Content');