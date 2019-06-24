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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/signup','vendor_controll@signup');
Route::get('/edit_profile','vendor_controll@edit_profile');
Route::post('edit','vendor_controll@edit');
Route::get('logout','vendor_controll@logout');

Route::get('/signin',function()
{
	return redirect('/');
});

Route::get('register/verify/{token}','Auth\RegisterController@verify'); 

Route::get('/changePassword','HomeController@showChangePasswordForm');
//Route::get('login', function () {
  //  return view('auth.login');

