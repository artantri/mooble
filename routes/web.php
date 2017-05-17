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

// Route::get('/', function () {
//     return view('login_dokter');
// });

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post('/stafflogin', 'StaffAuth\LoginController@login');

Route::resource('patient.report', 'PatientReportController');
Route::resource('patient.diagnosis', 'PatientDiagnosisController');
Route::resource('patient.sensor', 'PatientSensorController');


//untuk semua route yang perlu auth (harus login)
Route::group(['middleware' => 'auth'], function () {

	Route::get('/', function () {
    	return view('pasien_search');
	});

	Route::get('diagnosis/filter', 'DiagnosisController@filter');
	Route::resource('diagnosis', 'DiagnosisController');
		
	Route::get('patient/filter', 'PatientController@filter');
	Route::resource('patient', 'PatientController');

	Route::get('report/filter', 'HealthReportController@filter');
	Route::resource('report', 'HealthReportController');
	
	Route::get('staff', 'StaffController@index');
	Route::get('staff/filter', 'StaffController@filter');
	Route::get('staff/{id}/approve', 'StaffController@approve');
	Route::get('staff/{id}/disapprove', 'StaffController@disapprove');
	//Route::resource('staff', 'StaffController');

	Route::get('profile', 'ProfileController@show');
	Route::get('profile/edit', 'ProfileController@edit');
	Route::match(['put', 'patch'], 'profile/edit', 'ProfileController@update');

});

//buat staff

Route::get('staff_register', 'StaffAuth\RegisterController@showRegistrationForm');
Route::post('staff_register', 'StaffAuth\RegisterController@register');
Route::get('staff_login', 'StaffAuth\LoginController@showLoginForm');
Route::post('staff_login', 'StaffAuth\LoginController@login');


Route::group(['middleware' => 'staff_auth'], function () {

	Route::post('staff_logout', 'StaffAuth\LoginController@logout');
	Route::get('/staff_home', function(){
	  return view('staff.auth.home');
	});


});