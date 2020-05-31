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
    route::get('/propositioncinema','firstcontroller@propositioncinema');
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Route::get('/fiche/{id}', 'fichecontroller@show')->where('id', '[0-9]+');
    Route::get('/form/fiche','fichecontroller@create');
    Route::post('/form/addfiche','fichecontroller@store');
    Route::get('/fiche/edit/{id}','fichecontroller@edit')->where('id', '[0-9]+');
    Route::post('/fiche/update/{id}','fichecontroller@update')->where('id', '[0-9]+');
    route::get('/fiche/destroy/{id}','fichecontroller@destroy')->where('id', '[0-9]+');
    route::post('/fiche/addfavoris','fichecontroller@addfavoris')->where('id', '[0-9]+');
    route::get('/fiche/destroyfavori/{id}','fichecontroller@destroyfavori')->where('id', '[0-9]+');
    route::get('/fiche/confirmer/{id}','fichecontroller@confirmfiche')->where('id', '[0-9]+');

    route::get('/defi/{id}','deficontroller@show')->where('id', '[0-9]+');
    route::post('/form/addDefis','deficontroller@store');
    route::get('/defi/edit/{id}','deficontroller@edit')->where('id', '[0-9]+');
    route::post('/defi/update/{id}','deficontroller@update')->where('id', '[0-9]+');
    route::get('/defi/destroy/{id}','deficontroller@destroy')->where('id', '[0-9]+');
    route::post('/defi/confirm','deficontroller@confirm');
    route::post('/defi/deconfirm','deficontroller@deconfirm');
    route::get('/defi/confirmer/{id}','deficontroller@confirmdefi')->where('id', '[0-9]+');

    route::get('/success/{id}','successcontroller@show')->where('id', '[0-9]+');
    route::post('/form/addsuccess','successcontroller@store');
    route::get('/success/edit/{id}','successcontroller@edit')->where('id', '[0-9]+');
    route::post('/success/update/{id}','successcontroller@update')->where('id', '[0-9]+');
    route::get('/success/destroy/{id}','successcontroller@destroy')->where('id', '[0-9]+');
    route::post('success/confirm','firstcontroller@confirmsucces');
    route::post('success/deconfirm','firstcontroller@deconfirmsucces');
    route::get('/success/confirmer/{id}','successcontroller@confirmsucces')->where('id', '[0-9]+');

    route::get('/profil/{id}','profilcontroller@show')->where('id', '[0-9]+');
    Route::post('/profil/update/{id}','profilcontroller@update')->where('id', '[0-9]+');
    Route::get('/profil/edit/{id}','profilcontroller@edit')->where('id', '[0-9]+');
    route::get('/profil/destroy/{id}','profilcontroller@destroy')->where('id', '[0-9]+');

    route::get('profil/allami','amicontroller@index');
    route::post('profil/addami','amicontroller@store');
    route::get('profil/updateami','amicontroller@update');
    route::get('profil/deleteami','amicontroller@destroy');

    Route::get('/admin/fiches','admincontroller@fiche');
    Route::get('/admin/defis','admincontroller@defi');
    Route::get('/admin/profils','admincontroller@profil');
    Route::get('/admin/success','admincontroller@succes');


});

