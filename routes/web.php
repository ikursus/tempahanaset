<?php


Route::get('/', function () {
    return view('welcome');
})->name('homepage');

# Berkongsi prefix users
Route::group(['prefix' => 'users'], function () {

    # Route untuk paparan senarai users
    Route::get('/', 'UsersController@index')->name('users.index');

    # Route untuk paparan borang tambah user baru
    Route::get('/add', 'UsersController@create')->name('users.create');

    # Route untuk simpan rekod user baru
    Route::post('/add', 'UsersController@store')->name('users.store');

    # Route untuk edit user berdasarkan id
    Route::get('/{id}/edit', 'UsersController@edit')->name('users.edit');

    # Route untuk papar borang kemaskini rekod user berdasrakan id
    Route::patch('/{id}/edit', 'UsersController@update')->name('users.update');

    # Route untuk papar borang kemaskini rekod user berdasrakan id
    Route::delete('/{id}', 'UsersController@destroy')->name('users.destroy');

});


Route::get('maklumat/profile/ahmad', function () {
    return 'ini adalah profile ahmad';
})->name('profile_ahmad');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
