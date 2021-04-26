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
    return redirect()->route('home-locale', app()->getLocale());
})->name('home');

Route::group(['prefix' => '{locale}', 'where' => ['locale' => '[a-zA-Z]{2}']], function () {
    Route::get('/', 'HomeController@index')->name('home-locale');

});


Auth::routes(['register' => false]);

Route::redirect('/home', '/');

Route::group(['middleware' => ['auth']], function () {

    Route::resource('employee', 'EmployeeController');
    Route::resource('company', 'CompanyController');


});
