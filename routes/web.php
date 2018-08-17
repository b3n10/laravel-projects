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

Auth::routes();

Route::get('/', function() {
	return redirect('/chat');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/chat', 'Chat\ChatController@index')->name('chat');

Route::get('/chat/message', 'Chat\ChatMessageController@index');
Route::post('/chat/message', 'Chat\ChatMessageController@store');
