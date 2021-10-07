<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome', ['title' => 'Belajar Laravel']);
});

Route::get('home', function () {
    return view('home');
});


//add
Route::get('edulevels', 'EdulevelController@data');

Route::get('edulevels/add', 'EdulevelController@add'); //@add jadi nanti method nya namanya add maka nanti di edulevelecontroller kita membuat function dengan nama add

Route::post('edulevels', 'EdulevelController@addProcess'); //kita bikin lagi di controller function addProcess

// edit
Route::get('edulevels/edit/{id}', 'EdulevelController@edit');
Route::patch('edulevels/{id}', 'EdulevelController@editProcess'); //patch atau juga bisa pake put bisa juga pakai post tetapi perlu menambahkan input type hidden di id nya
Route::delete('edulevels/{id}', 'EdulevelController@delete');

// Login
Auth::routes();
Route::get('/logout', 'HomeController@doLogout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');