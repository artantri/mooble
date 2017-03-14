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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('diagnosis/filter', 'DiagnosisController@filter');
Route::resource('diagnosis', 'DiagnosisController');
	
Route::get('patient/filter', 'PatientController@filter');
Route::resource('patient', 'PatientController');
	

Route::get('report/filter', 'HealthReportController@filter');
Route::resource('report', 'HealthReportController');

Route::resource('patient.report', 'PatientReportController');
Route::resource('patient.diagnosis', 'PatientDiagnosisController');
Route::resource('patient.sensor', 'PatientSensorController');

Route::get('staff/filter', 'StaffController@filter');
Route::resource('staff', 'StaffController');

	