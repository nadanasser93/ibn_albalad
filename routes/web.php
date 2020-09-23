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
    //$exitCode = Artisan::call('storage:link');

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
Route::group(['prefix' => 'customer', 'namespace' => 'Customer','middleware'=>'customer'], function () {
    Route::get('profile', 'CustomerController@profile');
    Route::post('profile_store', 'CustomerController@store')->name('profile');

    Route::get('homes', 'HomeController@index')->name('homes.index');
    Route::get('/homes/create', 'HomeController@create')->name('homes.create');
    Route::post('/homes/store', 'HomeController@store')->name('homes.store');
    Route::get('/homes/edit/{id}', 'HomeController@edit')->name('homes.edit');
    Route::post('/homes/update/{id}', 'HomeController@update')->name('homes.update');
    Route::get('/homes/destroy/{id}', 'HomeController@destroy')->name('homes.destroy');

    Route::get('companies', 'CompanyController@index')->name('companies.index');
    Route::get('/companies/create', 'CompanyController@create')->name('companies.create');
    Route::post('/companies/store', 'CompanyController@store')->name('companies.store');
    Route::get('/companies/edit/{id}', 'CompanyController@edit')->name('companies.edit');
    Route::post('/companies/update/{id}', 'CompanyController@update')->name('companies.update');
    Route::get('/companies/destroy/{id}', 'CompanyController@destroy')->name('companies.destroy');
});
