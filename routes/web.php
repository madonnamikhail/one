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

// Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin' , 'namespace'=> 'admin'], function () {
    Route::get('/admin','LoginController@dashboard')->middleware('auth:admin')->name('admin.Dashboard');
    Route::get('/login','LoginController@getLogin')->name('admin.get.login');
    Route::post('/logged-in','LoginController@Loggedin')->name('admin.login');
    Route::post('/logout','LoginController@logout')->name('admin.logout');

});
Route::group(['prefix' => 'admin' , 'namespace'=> 'user'], function () {
    Route::get('create','UserController@create')->name('add.user');
    Route::post('store','UserController@store')->name('create.user');
});

Route::group(['prefix' => 'user' , 'namespace'=> 'user'], function () {
    Route::get('/','UserController@index')->name('user.index');
    // Route::domain('{subdomain}.'.config('app.short_url'))->group(function(){
        Route::get('/user_location','UserController@showLocation')->name('show.location');
    // });
});



