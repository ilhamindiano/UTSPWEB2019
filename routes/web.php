<?php

use App\Http\Controllers\NotesController;
//use Auth;

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

Route::get('/', 'PagesController@index');


Auth::routes();

Route::get('/X{url}','NotesController@edit');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/admin', 'HomeController@admin')->name('admin');
Route::post('updateTitle/','NotesController@updateTitle');
Route::post('/refresh','NotesController@get');
Route::post('/update','NotesController@updateBody');
Route::post('/lock','NotesController@lock');
Route::post('/search', 'NotesController@search');

Route::resource('notes', 'NotesController')->only([
    'index', 'show', 'store', 'create','destroy'
]);
