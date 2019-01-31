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
    Route::post('catalog/category/create', 'Catalog\CategoryController@create');
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
    Route::get('catalog/pricePreset','Catalog\PricePresetController@index');
    Route::post('catalog/pricePreset/delete/{id}','Catalog\PricePresetController@destroy');
    Route::post('catalog/prices/create','Catalog\PriceController@store');


    //profile doctor
    Route::get('users/profileDoctors', 'Users\ProfileDoctorController@index');
    Route::put('users/profileDoctor/{user_id}', 'Users\ProfileDoctorController@update');
    Route::get('users/profileDoctor/{user_id}', 'Users\ProfileDoctorController@show');

    //user patient 
    Route::get('users/profilePatients', 'Users\ProfilePatientController@index');
    Route::get('users/profilePatient/{user_id}', 'Users\ProfilePatientController@show');
    Route::put('users/profilePatient/{user_id}', 'Users\ProfilePatientController@update');
    Route::get('users/patients/{doctor_id}', 'Users\ProfilePatientController@patients');
    Route::get('users/patientsCount/{doctor_id}', 'Users\ProfilePatientController@patientsCount');
    Route::resource('users', 'Users\ProfilePatientController');

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
    
    /*Bookings*/
    Route::get('bookings/{user_id}', 'Booking\BookingController@show');
    Route::get('bookings/showAllByPatient/{patient_id}', 'Booking\BookingController@showAllByPatient');
    Route::get('bookings/showAllByDoctor/{doctor_id}', 'Booking\BookingController@showAllByDoctor');
    Route::get('bookings/patientRecentBooking/{patient_id}', 'Booking\BookingController@patientRecentBooking');
    Route::get('bookings/doctorRecentBooking/{doctor_id}', 'Booking\BookingController@doctorRecentBooking');
    Route::get('bookings/bookingsCount/{doctor_id}', 'Booking\BookingController@bookingsCount');

    /*Prescription*/
    Route::get('prescription/{patient_id}', 'Prescription\PrescriptionController@show');

    /*Contact*/
    Route::post('contact/create', 'Contact\ContactController@store');

//});
