<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

/* Route::get('/', function() {
  return View::make('hello');
  }); */

/*
  |--------------------------------------------------------------------------
  | authentication Routes
  |--------------------------------------------------------------------------
 */

//include 'routes/auth.php';

/*
  |--------------------------------------------------------------------------
  | Contact Routes
  |--------------------------------------------------------------------------
 */

//include 'routes/contact.php';


Route::group(array('prefix' => '/api'), function() {
    Route::post('login/auth', 'AuthController@Login');
    Route::get('login/destroy', 'AuthController@Logout');
    Route::resource('contacts', 'ContactController');
});

Route::get('/', function() {
    return View::make('index');
});
