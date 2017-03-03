<?php

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

Route::get('/', function () {
    return view('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('patient.report', 'PatientReportController');
Route::resource('patient.diagnosis', 'PatientDiagnosisController');
Route::resource('patient.sensor', 'PatientSensorController');


//untuk semua route yang perlu auth (harus login)
Route::group(['middleware' => 'auth'], function () {

	Route::get('diagnosis/filter', 'DiagnosisController@filter');
	Route::resource('diagnosis', 'DiagnosisController');
		
	Route::get('patient/filter', 'PatientController@filter');
	Route::resource('patient', 'PatientController');

	Route::get('report/filter', 'HealthReportController@filter');
	Route::resource('report', 'HealthReportController');
	
	Route::get('staff/filter', 'StaffController@filter');
	Route::resource('staff', 'StaffController');

	Route::get('profile', 'ProfileController@show');
	Route::get('profile/edit', 'ProfileController@edit');
	Route::match(['put', 'patch'], 'profile/edit', 'ProfileController@update');

});