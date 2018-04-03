<?php

Route::get('/', function () {
    return redirect()->route('animal-index');
})->name('sosbicho');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'animais'], function () {
        Route::get('', 'AnimalController@index')->name('animal-index');
        Route::get('create', 'AnimalController@create')->name('animal-create');
        Route::post('', 'AnimalController@save')->name('animal-save');
        Route::get('{id}', 'AnimalController@edit')->name('animal-edit');
        Route::get('{id}/marcar-interesse', 'AnimalController@marcarInteresse')->name('animal-marcar-interrese');
        Route::get('{id}/remover-interesse', 'AnimalController@removerInteresse')->name('animal-remover-interrese');
    });

    Route::get('users', 'UserController@index')->name('user-index');

});
