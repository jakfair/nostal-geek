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


route::get('/register','RegisterController@_construct');


Auth::routes();
Route::group(['middleware' => ['auth']], function() {

    Route::get('/', 'firstcontroller@index');
    Route::get('/search','firstcontroller@search');
    route::get('/propositionjeu','firstcontroller@propositionjeu');
    route::get('/propositionanime','firstcontroller@propositionanime');
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Route::get('/fiche/{id}', 'fichecontroller@show')->where('id', '[0-9]+');
    Route::get('/form/fiche','fichecontroller@create');
    Route::post('/form/addfiche','fichecontroller@store');
    Route::get('/fiche/edit/{id}','fichecontroller@edit')->where('id', '[0-9]+');
    Route::post('/fiche/update/{id}','fichecontroller@update')->where('id', '[0-9]+');
    route::post('/fiche/destroy/{id}','fichecontroller@destroy')->where('id', '[0-9]+');

    route::get('/defi/{id}','deficontroller@show')->where('id', '[0-9]+');
    route::post('/form/addDefis','deficontroller@store');
    route::get('/defi/edit/{id}','deficontroller@edit')->where('id', '[0-9]+');
    route::post('/defi/update/{id}','deficontroller@update')->where('id', '[0-9]+');
    route::post('/defi/destroy/{id}','deficontroller@destroy')->where('id', '[0-9]+');

    route::get('/profil/{id}','profilcontroller@show')->where('id', '[0-9]+');
    Route::post('/profil/update/{id}','profilcontroller@update')->where('id', '[0-9]+');
    Route::get('/profil/edit/{id}','profilcontroller@edit')->where('id', '[0-9]+');
    route::post('/profil/destroy/{id}','profilcontroller@destroy')->where('id', '[0-9]+');

    route::get('profil/allami','amicontroller@index');
    route::post('profil/addami','amicontroller@store');
    route::get('profil/updateami','amicontroller@update');
    route::get('profil/deleteami','amicontroller@destroy');

    Route::get('/admin/fiches','admincontroller@fiche');
    Route::get('/admin/defis','admincontroller@defi');
    Route::get('/admin/profils','admincontroller@profil');


});

