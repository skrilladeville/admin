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

    //catalog category
    Route::get('catalog/category/all', 'Catalog\CategoryController@index');
    Route::get('catalog/category/getParent', 'Catalog\CategoryController@getParentCategory');
    Route::post('catalog/category/create', 'Catalog\CategoryController@store');
    Route::get('catalog/category/view/{id}', 'Catalog\CategoryController@show');
    Route::post('catalog/category/update/{id}', 'Catalog\CategoryController@update');
    Route::post('catalog/category/delete/{id}', 'Catalog\CategoryController@delete');

    //catalog vendor
    Route::get('catalog/vendor', 'Catalog\VendorController@index');
    Route::post('catalog/vendor/create', 'Catalog\VendorController@store');
    Route::get('catalog/vendor/view/{id}', 'Catalog\VendorController@show');
    Route::post('catalog/vendor/update/{id}', 'Catalog\VendorController@update');
    Route::post('catalog/vendor/delete/{id}', 'Catalog\VendorController@delete');

    
    //catalog lab
    Route::post('catalog/lab/create','Catalog\LabController@store');
    Route::get('catalog/lab','Catalog\LabController@index');




    //catalog price Preset
    Route::post('catalog/pricePreset/create','Catalog\PricePresetController@store');
    Route::get('catalog/pricePreset/all','Catalog\PricePresetController@index');
    Route::get('catalog/pricePreset/getPrices/{id}','Catalog\PricePresetController@getPrices');
    Route::post('catalog/pricePreset/delete/{id}','Catalog\PricePresetController@destroy');
    Route::post('catalog/prices/create','Catalog\PriceController@store');
    


    //profile doctor
    Route::get('users/profileDoctors', 'Users\ProfileDoctorController@index');


    //user patient 
    Route::get('users/profilePatients', 'Users\ProfilePatientController@index');



//Route::group(['middleware' => 'jwt.auth'], function () {
    /* User */
    Route::get('user', 'Users\UserController@show');
    Route::post('user/profile/update', 'Users\UserController@updateProfile');
    Route::post('user/password/update', 'Users\UserController@updatePassword');
    Route::post('user/create-role', 'Users\RoleController@createRole');

    /* Roles and Permissions */
    Route::get('roles/get-roles', 'Users\RoleController@getRoles');

    /* Feedback and Survey */
    Route::get('cms/feedback', 'ContinuousCare\FeedbackController@index');
    Route::get('cms/feedback/view/{id}', 'ContinuousCare\FeedbackController@show');
    Route::post('cms/feedback/create', 'ContinuousCare\FeedbackController@create');
    Route::post('cms/feedback/update/{id}', 'ContinuousCare\FeedbackController@update');
    Route::post('cms/feedback/delete/{id}', 'ContinuousCare\FeedbackController@delete');

    Route::get('cms/survey', 'ContinuousCare\SurveyController@index');
    Route::get('cms/survey/view/{id}', 'ContinuousCare\FeedbackController@show');
    Route::post('cms/survey/create', 'ContinuousCare\FeedbackController@create');
    Route::post('cms/survey/update/{id}', 'ContinuousCare\FeedbackController@update');
    Route::post('cms/survey/delete/{id}', 'ContinuousCare\FeedbackController@delete');
//});
