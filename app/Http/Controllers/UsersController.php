<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {

        $page_title = '<h1>Senarai Users</h1>';

        $senarai_users = [
            ['id' => '1', 'name' => 'Ali Baba', 'email' => 'ali@baba.com'],
            ['id' => '2', 'name' => 'Ahmad Albab', 'email' => 'ahmad@albab.com'],
            ['id' => '3', 'name' => 'Upin Ipin', 'email' => 'upin@ipin.com'],
            ['id' => '4', 'name' => 'France Menang', 'email' => 'france@menang.com']
        ];

        return view('users.template_users', compact('page_title', 'senarai_users'));

    }

    public function create()
    {
        return view('users.template_tambah');
    }

    public function store(Request $request)
    {
        # Kaedah validation 1
        // $this->validate($request, [
        //     'name' => 'required'
        // ]);

        # Kaedah validation 2
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email'
        ]);

        # Dapatkan semua data dari bornag
        # $data = $request->all();
        # Dapatkan nama dan emel sahaja
        # $data = $request->only('name', 'email');
        # Dapatkan SEMUA data KECUALI yang dinyatakan
        $data = $request->except('name', 'email');

        return $data;
    }

    public function edit($id)
    {
        return view('users.template_edit', compact('id'));
    }

    public function update($id)
    {
        return 'Data telah berjaya dikemaskini.';
    }

    public function destroy($id)
    {
        return 'Data telah berjaya dihapuskan.';
    }

}
