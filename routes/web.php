<?php

Route::get('/', 'ContentsController@home');

Route::get('/clients', 'ClientController@index');
Route::get('/clients/new', 'ClientController@newClient');
Route::post('/clients/new', 'ClientController@create');
Route::get('/clients/{id}', 'ClientController@show');
Route::post('/clients/{id}', 'ClientController@modify');

Route::get('/reservations/{id}', 'RoomsController@checkAvailableRooms');
Route::post('/reservations/{id}', 'RoomsController@checkAvailableRooms');

Route::get('/book/room/{id}/{room}/{date_in}/{date_out}', 'ReservationsController@bookRoom');
