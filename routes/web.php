<?php


Route::get('/', function () {
    return view('welcome');
})->name('homepage');

# Berkongsi prefix users
Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {

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

    # Route untuk edit user berdasarkan id
    Route::get('/{id}/show', 'UsersController@show')->name('users.show');

    # Route untuk papar borang kemaskini rekod user berdasrakan id
    Route::delete('/{id}', 'UsersController@destroy')->name('users.destroy');

});

# Berkongsi prefix assets
Route::group(['prefix' => 'assets', 'middleware' => 'auth'], function () {

    # Route untuk paparan senarai assets
    Route::get('/', 'AssetsController@index')->name('assets.index');

    # Route untuk paparan borang tambah assets baru
    Route::get('/add', 'AssetsController@create')->name('assets.create');

    # Route untuk simpan rekod assets baru
    Route::post('/add', 'AssetsController@store')->name('assets.store');

    # Route untuk edit assets berdasarkan id
    Route::get('/{id}/edit', 'AssetsController@edit')->name('assets.edit');

    # Route untuk papar borang kemaskini rekod assets berdasarkan id
    Route::patch('/{id}/edit', 'AssetsController@update')->name('assets.update');

    # Route untuk papar borang kemaskini rekod assets berdasarkan id
    Route::delete('/{id}', 'AssetsController@destroy')->name('assets.destroy');

});

# Berkongsi prefix tempahan
Route::group(['prefix' => 'tempahan', 'middleware' => 'auth'], function () {

    # Route untuk paparan senarai tempahan
    Route::get('/', 'TempahanController@index')->name('tempahan.index');

    # Route untuk paparan borang tambah tempahan baru
    Route::get('/add', 'TempahanController@create')->name('tempahan.create');

    # Route untuk simpan rekod tempahan baru
    Route::post('/add', 'TempahanController@store')->name('tempahan.store');

    # Route untuk edit tempahan berdasarkan id
    Route::get('/{id}/edit', 'TempahanController@edit')->name('tempahan.edit');

    # Route untuk papar borang kemaskini rekod tempahan berdasarkan id
    Route::patch('/{id}/edit', 'TempahanController@update')->name('tempahan.update');

    # Route untuk papar borang kemaskini rekod tempahan berdasarkan id
    Route::delete('/{id}', 'TempahanController@destroy')->name('tempahan.destroy');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
