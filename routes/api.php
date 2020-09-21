<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('cities','Api\CityController@getCities');
Route::get('city_show/{id}','Api\CityController@show');
Route::get('companies','Api\CompanyController@getCompanies');
Route::get('company_show/{company_id}','Api\CompanyController@show');
Route::get('getByCity/{city_id}','Api\JobController@getJobByCity');
Route::get('getDetailes/{id}','Api\JobController@getDetailes');
Route::get('getCompanies/{city_id}/{job_id}','Api\JobController@getCompanies');
Route::get('getByJob/{job_id}','Api\CityController@getByJob');
Route::get('getImage/{job_id}','Api\CityController@getImage');
Route::get('jobs','Api\JobController@getJobs');
Route::get('show_job/{job_id}','Api\JobController@show');
Route::get('getByCompany/{company_id}','Api\JobController@getByCompany');
