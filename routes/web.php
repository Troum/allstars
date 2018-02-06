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

use App\Http\Middleware\CreatePastEvent;

Auth::routes();

Route::get('/', 'IndexController@index');

Route::get('/en', 'IndexController@indexEn');

Route::get('/events/{event}', 'IndexController@event');

Route::get('/en/events/{event}', 'IndexController@eventEn');

Route::get('/about', 'IndexController@about');

Route::get('/en/about', 'IndexController@aboutEn');

Route::get('home/create', 'HomeController@create')->name('create');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/home', 'HomeController@store')->name('store');

Route::get('/home/edit', 'HomeController@edit')->name('edit');

Route::get('/home/send', 'HomeController@send')->name('send');

Route::post('/home/send/add', 'HomeController@add');

Route::post('/home/send/mail', 'HomeController@mail');

Route::get('/home/edit/{event}', 'HomeController@show');

Route::post('/home/edit/{event}/add', 'AdditionalController@store');

Route::post('/home/edit/{event}/links', 'AdditionalController@links');

Route::post('/home/edit/{event}/photo', 'AdditionalController@photo');

Route::post('/home/edit/{event}/info', 'AdditionalController@info');

Route::get('/home/edit/{event}/delete', 'AdditionalController@delete');

Route::post('/home/edit/{event}/update-info', 'AdditionalController@updateInfo');

Route::post('/home/edit/{event}/update', 'AdditionalController@updateEvent');

Route::get('/{additional}/{dirname}', 'IndexController@archive');

Route::get('/en/{additional}/{dirname}', 'IndexController@archiveEn');

Route::post('/home/edit/date/{event}/gallery', 'AdditionalController@gallery');

Route::post('/home/edit/date/{event}/gallery-update', 'AdditionalController@updateGallery');

Route::post('/home/edit/date/{additional}/update', 'AdditionalController@updateDate');

Route::post('/home/edit/date/{additional}/delete-photo', 'AdditionalController@deletePhoto');

Route::get('/home/edit/date/{additional}', 'AdditionalController@edit')->middleware(CreatePastEvent::class);

Route::get('/home/edit/date/{additional}/{event}', 'AdditionalController@editEvent');

Route::post('/subscribe', 'IndexController@subscribe');

Route::post('/delete-template', 'HomeController@delete');

Route::post('/send-mail', 'HomeController@sendmail');

Route::get('/get-cards', 'IndexController@getCards');

Route::get('/get-cover', 'IndexController@getCover');





