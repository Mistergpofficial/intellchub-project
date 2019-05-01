<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', 'SigningController@showLogin');
//Route::post("/post-login", 'SigningController@postLogin');
Route::post('login', 'Auth\LoginController@login');

// Registration Routes...
Route::get('account/register', 'SignupController@showRegister');
Route::post('register', 'Auth\RegisterController@register');
//Route::post('account/post-register', 'SignupController@postRegister');

Route::get('doctor-register/werbrtyrsequew/ntui', 'DoctorController@admin_reg')->name('auth.admin-register');
Route::post('doctor-register/post-werbrtyrsequew/ntui', 'DoctorController@p_admin_reg')->name('auth.a_register');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('user/dashboard', 'HomeController@welcome');
Route::get('user/departments', 'DepartmentController@departments');
Route::get('user/add-departments', 'DepartmentController@addDepartment');
Route::post('user/post-add-departments', 'DepartmentController@postDepartment');
Route::get('user/schedule', 'ScheduleController@schedule');
Route::get('user/add-schedule', 'ScheduleController@addSchedule');
Route::post('user/post-add-schedule', 'ScheduleController@postSchedule');
Route::get('user/appointment', 'AppointmentController@appoint');
Route::get('user/add-appointment', 'AppointmentController@addAppointment');
Route::post('user/post-add-appointment', 'AppointmentController@postAppointment');




Route::get('login', ['as' => 'login', 'uses' => function() {
    return redirect()->to(url('/'));
}]);
Route::get('register', function () {
    return redirect()->to(url('/'));
});


