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



   /* $jsonurl = "https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json";
    $json = file_get_contents($jsonurl);
    echo '<pre>';
    echo '<pre>';
    var_dump(json_decode($json));*/
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/course', 'HomeController@course')->name('course');
Route::get('/bank', 'HomeController@bank')->name('bank');
//Route::get('/debt', 'HomeController@debt')->name('debt');
Route::get('/category', 'HomeController@category')->name('category');
Route::get('/converter', 'HomeController@getConverter')->name('get.converter');


Route::resource('category_income', 'CategoryIncomeController');
Route::resource('category_spend', 'CategorySpendController');
Route::resource('income', 'IncomeController');
Route::resource('spend', 'SpendController');
