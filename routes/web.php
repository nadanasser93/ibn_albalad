<?php

use Illuminate\Support\Facades\Route;

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
Route::get('cache',function()
{
    //  $exitCode = Artisan::call('storage:link');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('storage:link');

});
Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'dashboard', 'namespace' => 'Admin','middleware'=>'admin'], function () {
    Route::get('periods', 'PeriodController@index')->name('periods.index');
    Route::get('/periods/create', 'PeriodController@create')->name('periods.create');
    Route::post('/periods/store', 'PeriodController@store')->name('periods.store');
    Route::get('/periods/edit/{id}', 'PeriodController@edit')->name('periods.edit');
    Route::post('/periods/update/{id}', 'PeriodController@update')->name('periods.update');
    Route::get('/periods/destroy/{id}', 'PeriodController@destroy')->name('periods.destroy');

    Route::get('subscriptions', 'SubscriptionController@index')->name('subscriptions.index');
    Route::get('/subscriptions/create', 'SubscriptionController@create')->name('subscriptions.create');
    Route::post('/subscriptions/store', 'SubscriptionController@store')->name('subscriptions.store');
    Route::get('/subscriptions/edit/{id}', 'SubscriptionController@edit')->name('subscriptions.edit');
    Route::post('/subscriptions/update/{id}', 'SubscriptionController@update')->name('subscriptions.update');
    Route::get('/subscriptions/destroy/{id}', 'SubscriptionController@destroy')->name('subscriptions.destroy');
});
Auth::routes();
Route::name('webhooks.mollie')->post('webhooks/mollie', 'MollieWebhookController@handle');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('profile', 'Customer\CustomerController@profile')->name('profile');
Route::post('profile_store', 'Customer\CustomerController@store')->name('profile_store');

Route::group(['prefix' => 'customer', 'namespace' => 'Customer'], function () {


    Route::get('/getAll', 'CustomerController@getAll')->name('getAll');

    Route::get('homes', 'HomeController@index')->name('homes.index');
    Route::get('/homes/create', 'HomeController@create')->name('homes.create');
    Route::post('/homes/store/{home_id}', 'HomeController@store')->name('homes.store');
    Route::get('/homes/edit/{id}', 'HomeController@edit')->name('homes.edit');
    Route::post('/homes/update/{id}', 'HomeController@update')->name('homes.update');
    Route::get('/homes/destroy/{id}', 'HomeController@destroy')->name('homes.destroy');
    Route::post('/homes/upload_image/{id}', 'HomeController@uploadMainImage')->name('homes.upload');
    Route::post('/homes/upload_others/{id}', 'HomeController@uploadOtherImage')->name('homes.upload_others');

    Route::get('employees', 'EmployeeController@index')->name('employees.index');
    Route::get('/employees/create/', 'EmployeeController@create')->name('employees.create');
    Route::post('/employees/store/{employee_id}', 'EmployeeController@store')->name('employees.store');
    Route::get('/employees/edit/{id}', 'EmployeeController@edit')->name('employees.edit');
    Route::post('/employees/update/{id}', 'EmployeeController@update')->name('employees.update');
    Route::get('/employees/destroy/{id}', 'EmployeeController@destroy')->name('employees.destroy');
    Route::post('/employees/upload_image/{id}', 'EmployeeController@uploadMainImage')->name('employees.upload');


    Route::get('companies', 'CompanyController@index')->name('companies.index');
    Route::get('/companies/create', 'CompanyController@create')->name('companies.create');
    Route::post('/companies/store/{company_id}', 'CompanyController@store')->name('companies.store');
    Route::get('/companies/edit/{id}', 'CompanyController@edit')->name('companies.edit');
    Route::post('/companies/update/{id}', 'CompanyController@update')->name('companies.update');
    Route::get('/companies/destroy/{id}', 'CompanyController@destroy')->name('companies.destroy');
    Route::get('/address/destroy/{id}', 'CompanyController@destroyAddress')->name('address.destroy');
    Route::post('/companies/upload_image/{id}', 'CompanyController@uploadMainImage')->name('companies.upload');
    Route::post('/companies/upload_others/{id}', 'CompanyController@uploadOtherImage')->name('companies.upload_others');
    Route::get('/companies/deleteImage/{id}', 'CompanyController@deleteImage')->name('companies.deleteImage');
    Route::post('/updateImage/{id}', 'CompanyController@updateImage')->name('companies.updateImage');
});
