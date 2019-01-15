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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', 'EventController@index')->name('events.index');

Route::get('events', 'EventController@index')->name('events.index');
//Route::post('events', 'EventController@addEvent')->name('events.add');

Route::post('add', 'EventController@addEvent')->name('events.add');
Route::post('/admin/add', 'HomeController@addEvent')->name('events.add2');

Route::put('update/{id}', 'HomeController@updateEvent')->name('events.update');

/* Route::get('add', function () {
    return view('add');
}); */

Route::get('edit/{id}', 'HomeController@edit');
/* Route::get('edit/{event}/edit', 'HomeController@update'); */
Route::get('show/{event}', 'EventController@show');
Route::get('modal/{event}', 'EventController@modal');

Route::get('date-formate', function () {



    Date::setLocale('th');

    $date = Date::parse('2015-02-01 01:01:10')->format('l j F Y');
    dd($date);

});

/* route::get('fuck', function (){
    return view('fullcalendar');
}); */

Route::get('fuck/{event}', 'EventController@fuck');
Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

/* Route::get('/list', 'ListController@index')->name('list'); */

Route::get('check/{id}', 'ListController@check');
Route::get('uncheck/{id}', 'ListController@uncheck');
Route::resource('list','ListController');
