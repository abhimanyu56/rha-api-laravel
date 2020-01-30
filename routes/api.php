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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::post('questions', array('middleware' => 'cors', 'uses' => 'QuestionController@createQuestion'));


Route::get('questions/{user_id}/{name}/{content}', array('middleware' => 'HandleCors', 'uses' => 'QuestionController@createGetQuestion'));

Route::get('questions/{user_id}', array('middleware' => 'HandleCors', 'uses' => 'QuestionController@questionListing'));


Route::get('likes/{id}', array('middleware' => 'HandleCors', 'uses' => 'LikeController@getLike'));

Route::get('likes/{user}/{name}/{question}', array('middleware' => 'HandleCors', 'uses' => 'LikeController@createLike'));

Route::get('unlike/{user}/{question}', array('middleware' => 'HandleCors', 'uses' => 'LikeController@deleteLike'));

//Route::delete('likes',   array('middleware' => 'HandleCors', 'uses' => 'LikeController@deleteLike'));
