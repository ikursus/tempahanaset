<?php


Route::get('/', function () {
    return view('welcome');
})->name('homepage');

# Berkongsi prefix users
Route::group(['prefix' => 'users'], function () {

    # Route untuk paparan senarai users
    Route::get('/', function () {

        $page_title = '<h1>Senarai Users</h1>';

        $senarai_users = [
            ['id' => '1', 'name' => 'Ali Baba', 'email' => 'ali@baba.com'],
            ['id' => '2', 'name' => 'Ahmad Albab', 'email' => 'ahmad@albab.com'],
            ['id' => '3', 'name' => 'Upin Ipin', 'email' => 'upin@ipin.com'],
            ['id' => '4', 'name' => 'France Menang', 'email' => 'france@menang.com']
        ];

        return view('users.template_users', compact('page_title', 'senarai_users'));

    })->name('users.index');

    # Route untuk paparan borang tambah user baru
    Route::get('/add', function () {
        return view('users.template_tambah');
    })->name('users.create');

    # Route untuk edit user berdasarkan username (optional)
    Route::get('/kemaskini/{id?}', function ($id = null) {
        return 'ID anda adalah: '. $id;
    })->where('id', '[0-9]+');
});


Route::get('maklumat/profile/ahmad', function () {
    return 'ini adalah profile ahmad';
})->name('profile_ahmad');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
