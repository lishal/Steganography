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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::GET('admin/home','AdminController@index');

Route::GET('admin' ,'Admin\LoginController@showLoginForm')->name('admin.login');
Route::POST('admin','Admin\LoginController@login');
Route::POST('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::GET('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::POST('admin-password/reset','Admin\ResetPasswordController@reset');
Route::GET('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

//Verify Email
Route::get('verifyEmailFirst','Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');
Route::get('verify/{email}/{verifyToken}','Auth\RegisterController@sendEmailDone')->name('sendEmailDone');

//Logout
Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

//Admin User
Route::GET('/userlist' ,'AdminController@userlist');
Route::GET('/deleteuser/{id}','AdminController@delete');

//Users
Route::GET('/individualuser/{id}' ,'Usercontroller@index');
Route::POST('/sendimage/{senderId}/{receiverId}','Usercontroller@save');
Route::GET('/inbox' ,'Usercontroller@inbox');
Route::GET('/decryptmessage/{id}' ,'Usercontroller@decryptmessage');

Route::POST('/credentials/{id}','Usercontroller@credentials');

Route::GET('/contactus', function () {
    $current_user = auth()->user();

    // return($current_user);
    return view('contactus',['current_user'=>$current_user]);
});
