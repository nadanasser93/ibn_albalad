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
Route::get('profile','Customer\CustomerController@profile')->middleware('auth');
Route::post('profile_store','Customer\CustomerController@store')->name('profile')->middleware('auth');
