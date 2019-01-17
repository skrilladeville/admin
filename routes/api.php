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

Route::post('authenticate', 'Auth\AuthController@authenticate');

    Route::get('cms/feedback/all', 'ContinuousCare\FeedbackController@all');
    Route::post('cms/feedback/create', 'ContinuousCare\FeedbackController@store');

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user', 'Users\UserController@show');
    Route::post('user/profile/update', 'Users\UserController@updateProfile');
    Route::post('user/password/update', 'Users\UserController@updatePassword');

    /* Roles and Permissions */
    Route::post('user/create-role', 'Users\RoleController@createRole');

    /* Feedback and Survey */
    //Route::get('cms/feedback', 'ContinuousCare\FeedbackController@index');
    // Route::get('cms/feedback/view/{id}', 'ContinuousCare\FeedbackController@show');
     //Route::post('cms/feedback/create', 'ContinuousCare\FeedbackController@store');
     //Route::get('cms/feedback/all', 'ContinuousCare\FeedbackController@all');
    // Route::post('cms/feedback/update/{id}', 'ContinuousCare\FeedbackController@update');
    // Route::post('cms/feedback/delete/{id}', 'ContinuousCare\FeedbackController@destroy');

    // Route::get('cms/survey', 'ContinuousCare\SurveyController@index');
});

