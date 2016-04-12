<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


  Route::get('/profil', 'Profil2Controller@profil');
  Route::post('/hasil', 'Profil2Controller@hasil');
  Route::post('', 'Profil2Controller@hasil');

Route::group(['prefix' => 'formproduct'], function(){
  Route::get('/', 'Profil2Controller@create');
  Route::post('ajax_validate', 'Profil2Controller@ajax_validate');
});

//Route::get('/profil', function () {
//    return view('profil');
//});

/*Route::get('/', 'LatihanController@index');

Route::get('/portofolio', 'LatihanController@porto');

Route::get('/about', 'LatihanController@about');*/
