<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UsersController extends Controller
{
    public function index()
    {

        $page_title = '<h1>Senarai Users</h1>';

        // $senarai_users = [
        //     ['id' => '1', 'name' => 'Ali Baba', 'email' => 'ali@baba.com'],
        //     ['id' => '2', 'name' => 'Ahmad Albab', 'email' => 'ahmad@albab.com'],
        //     ['id' => '3', 'name' => 'Upin Ipin', 'email' => 'upin@ipin.com'],
        //     ['id' => '4', 'name' => 'France Menang', 'email' => 'france@menang.com']
        // ];
        # Panggil data users dari table users
        # $senarai_users = DB::table('users')->get();
        # Panggil data users dari table users dan limit 1 orang 1 page
        # $senarai_users = DB::table('users')->paginate(1);
        # Panggil data users dari table users dan limit 1 orang 1 page, sort id asc
        $senarai_users = DB::table('users')
        #->where('role', '=', 'admin')
        ->select('id', 'name', 'email')
        ->orderBy('id', 'desc')
        ->paginate(1);

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

        return redirect()->route('users.index')->with('alert-success', 'Rekod telah berjaya disimpan.');
    }

    public function edit($id)
    {
        return view('users.template_edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email'
        ]);

        return redirect()->back()->with('alert-success', 'Rekod telah berjaya dikemaskini.');
    }

    public function destroy($id)
    {
        return redirect()->route('users.index')->with('alert-success', 'Rekod telah berjaya dihapuskan.');
    }

}
