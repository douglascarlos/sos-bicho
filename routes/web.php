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
    return view('welcome');
});

Route::get('/lista', function () {
    dump(
        \SOSBicho\Models\Animal::all(),
        \SOSBicho\Models\Especie::all(),
        \SOSBicho\Models\Porte::all(),
        \SOSBicho\Models\Raca::all(),
        \SOSBicho\Models\User::all()
    );
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'animais'], function () {
        Route::get('', 'AnimalController@index')->name('animal-index');
        Route::get('create', 'AnimalController@create')->name('animal-create');
        Route::post('', 'AnimalController@save')->name('animal-save');
        Route::get('{id}', 'AnimalController@edit')->name('animal-edit');
    });

});
