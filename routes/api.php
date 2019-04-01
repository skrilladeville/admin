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

php artisan make:controller ControllerName

@see https://laravel.com/docs/5.8/controllers
*/

Route::post('authenticate', 'Auth\AuthController@authenticate');

    //catalog category
    Route::get('catalog/category/all', 'Catalog\CategoryController@index');
    Route::get('catalog/category/getParent', 'Catalog\CategoryController@getParentCategory');
    Route::post('catalog/category/create', 'Catalog\CategoryController@store');
    Route::get('catalog/category/view/{id}', 'Catalog\CategoryController@show');
    Route::post('catalog/category/update/{id}', 'Catalog\CategoryController@update');
    Route::post('catalog/category/delete/{id}', 'Catalog\CategoryController@destroy');

    //catalog checkin product
    Route::get('catalog/product/checkin/all', 'Catalog\CheckInProductController@index');
    Route::post('catalog/product/checkin/create', 'Catalog\CheckInProductController@store');

        //catalog checkin product
    Route::get('catalog/product/checkinpayment/all', 'Catalog\CheckInProductPaymentController@index');
    Route::post('catalog/product/checkinpayment/create', 'Catalog\CheckInProductPaymentController@store');

    //catalog checkin inventory
    Route::post('catalog/product/inventory/create', 'Catalog\InventoryController@store');
    Route::post('catalog/product/inventory/update/{pid}/{bid}', 'Catalog\InventoryController@updateBranchAndProduct');
    Route::get('catalog/product/inventory/get/{pid}/{bid}', 'Catalog\InventoryController@getBranchAndProduct');
    Route::get('catalog/product/inventory/view/{id}', 'Catalog\InventoryController@show');
  
  //branch
  Route::get('user/branch/all', 'Users\BranchController@index');
  Route::get('user/branch/view/{id}', 'Users\BranchController@show');
  



    Route::post('catalog/tags/create', 'Catalog\TagController@store');
    Route::post('catalog/labResult/create', 'Catalog\LabResultController@store');
    Route::post('catalog/weedMapPrice/create', 'Catalog\WeedMapPriceController@store');
    
   //catalog vendor
    Route::get('catalog/vendor', 'Catalog\VendorController@index');
    Route::post('catalog/vendor/create', 'Catalog\VendorController@store');
    Route::get('catalog/vendor/view/{id}', 'Catalog\VendorController@show');
    Route::post('catalog/vendor/update/{id}', 'Catalog\VendorController@update');
    Route::post('catalog/vendor/delete/{id}', 'Catalog\VendorController@destroy');
    Route::post('catalog/vendor/archieve/{id}', 'Catalog\VendorController@archieve');
    Route::post('catalog/vendor/unarchieve/{id}', 'Catalog\VendorController@unarchieve');


    //catalog lab
    Route::post('catalog/lab/create', 'Catalog\LabController@store');
    Route::post('catalog/lab/update/{id}', 'Catalog\LabController@update');
    Route::get('catalog/lab', 'Catalog\LabController@index');
    Route::get('catalog/lab/view/{id}', 'Catalog\LabController@show');
    Route::post('catalog/lab/delete/{id}', 'Catalog\LabController@destroy');
    Route::post('catalog/lab/archieve/{id}', 'Catalog\LabController@archieve');
    Route::post('catalog/lab/unarchieve/{id}', 'Catalog\LabController@unarchieve');


    //product catalog
    Route::post('catalog/product/barcode/create', 'Catalog\ProductItemBarcodeController@store');
    Route::get('catalog/product/barcode/all', 'Catalog\ProductItemBarcodeController@index');
    Route::post('catalog/product/create', 'Catalog\ProductController@store');
    Route::post('catalog/product/upload', 'Catalog\ProductController@upload');
    Route::get('catalog/product', 'Catalog\ProductController@index');
    Route::get('catalog/product/view/{id}', 'Catalog\ProductController@show');
    Route::get('reports/{role}/{pagename}','Reports\ReporterController@index');
    
    //pos register
    Route::get('pos/register/all','pos\PosRegisterController@index');

    // GCCv1 pages and files
    Route::get('gccv1/{role}/{pagename}','GCCv1\PageController@gccPage');
    Route::any('gccv1/src/{role}/{pagename}.{ext}','GCCv1\FileController@index');
    
    //catalog price Preset
    Route::post('catalog/pricePreset/create', 'Catalog\PricePresetController@store');
    Route::get('catalog/pricePreset', 'Catalog\PricePresetController@index');
    Route::get('catalog/pricePreset/getPrices/{id}', 'Catalog\PricePresetController@getPrices');
    Route::get('catalog/pricePreset/view/{id}', 'Catalog\PricePresetController@view');
    Route::post('catalog/pricePreset/delete/{id}', 'Catalog\PricePresetController@destroy');
    Route::post('catalog/prices/create', 'Catalog\PriceController@store');


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

    // patient v2
    Route::get('patient/profiles', 'Patients\PatientProfilesController@data');

//Route::group(['middleware' => 'jwt.auth'], function () {
    /* User */
    Route::get('user', 'Users\UserController@show');
    Route::get('users/all', 'Users\UserController@viewAll');
    Route::post('user/profile/update', 'Users\UserController@updateProfile');
    Route::post('user/password/update', 'Users\UserController@updatePassword');
    Route::post('user/create-role', 'Users\RoleController@createRole');

    /* Roles and Permissions */
    Route::get('roles/get-roles', 'Users\RoleController@getRoles');
    Route::get('roles/get-admin-permission', 'Users\PermissionController@getAdminPermission');
    Route::get('roles/get-branch-admin-permission', 'Users\PermissionController@getBranchAdminPermission');
    Route::get('roles/get-doctor-permission', 'Users\PermissionController@getDoctorPermission');
    Route::get('roles/get-patient-permission', 'Users\PermissionController@getPatientPermission');

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

    /*Sales*/
    Route::post('sales/sales', 'Sales\SalesController@index');
    Route::post('sales/orders', 'Sales\OrderController@filter');
    Route::post('sales/order/create', 'sales\OrderController@store');
    Route::post('sales/orderItem/create', 'sales\OrderItemController@store');
    Route::get('sales/orderItem/byOrder/{id}', 'sales\OrderItemController@showbyOrderId');
    Route::post('sales/orderItem/delete/{id}', 'sales\OrderItemController@destroy');
    
    Route::get('sales/orders', 'Sales\OrderController@index');
    Route::get('sales/order/{order_id}', 'Sales\OrderController@show');
    Route::get('sales/order/show/{id}', 'Sales\OrderController@showOrder');
    Route::post('sales/order/void/{id}', 'Sales\OrderController@voidOrder');
    Route::get('sales/transactions', 'Sales\TransactionController@index');
    Route::get('sales/transaction/show/{id}', 'Sales\TransactionController@show');
    Route::post('sales/transaction/void/{id}', 'Sales\TransactionController@voidTransaction');
    Route::post('sales/transaction/create', 'Sales\TransactionController@store');
    Route::get('sales/transactions/{filter}', 'Sales\TransactionController@show');
    Route::get('sales/shipments', 'Sales\ShipmentController@index');
    Route::put('sales/shipment/cancel/{shipment_id}', 'Sales\ShipmentController@update');
    Route::get('sales/shipmentMethods', 'Sales\ShipmentController@shipmentMethods');
    Route::get('sales/shipmentMethod/{id}', 'Sales\ShipmentController@show');
    Route::post('sales/shipmentMethod/new', 'Sales\ShipmentController@store');
    Route::put('sales/shipmentMethod/edit/{id}', 'Sales\ShipmentController@updateShipmentMethod');
    Route::delete('sales/shipmentMethod/delete/{id}', 'Sales\ShipmentController@deleteShipmentMethod');
    Route::put('sales/shipmentMethod/is_active/{id}', 'Sales\ShipmentController@updateIsActive');
    Route::get('sales/tax', 'Sales\TaxController@index');
    
    /* Doctors*/
    //Route::apiResource('doctorlists', 'DoctorlistsController');
    Route::group(['prefix' => '/v1', 'middleware' => ['auth:api'], 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    //Route::post('change-password', 'ChangePasswordController@changePassword')->name('auth.change_password');
    //Route::apiResource('rules', 'RulesController', ['only' => ['index']]);
    //Route::apiResource('permissions', 'PermissionsController');
    //Route::apiResource('roles', 'RolesController');
    //Route::apiResource('users', 'UsersController');
    Route::apiResource('doctorlists', 'DoctorlistsController');
});