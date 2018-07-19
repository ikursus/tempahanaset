<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;

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
        // $senarai_users = DB::table('users')
        // #->where('role', '=', 'admin')
        // ->select('id', 'name', 'email')
        // ->orderBy('id', 'desc')
        // ->paginate(5);
        $senarai_users = User::paginate(5);

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
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'password' => 'required|min:3'
        ]);

        # Dapatkan semua data dari bornag
        # $data = $request->all();
        # Dapatkan nama dan emel sahaja
        $data = $request->only('name', 'email', 'phone', 'role', 'address', 'ic');
        # Attach $data password yang diencrypt
        $data['password'] = bcrypt($request->input('password'));
        # Dapatkan SEMUA data KECUALI yang dinyatakan
        # $data = $request->except('name', 'email');
        # Simpan data ke dalam Table Users
        DB::table('users')->insert($data);
        # Bagi respon redirect ke halaman senarai users
        return redirect()->route('users.index')->with('alert-success', 'Rekod telah berjaya disimpan.');
    }

    public function edit($id)
    {
        # Panggil data user berdasarkan ID
        # $user = DB::table('users')->where('id', '=', $id)->first();
        $user = User::find($id);
        # Bagi respon papar template edit dan attach sekali $variable $user
        return view('users.template_edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        # Kaedah validation 2
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required'
        ]);

        # Dapatkan nama dan emel sahaja
        $data = $request->except('password');
        # Sekiranya wujud data pada input password,
        # Attach $data password untuk diencrypt
        if ( !empty($request->input('password')) )
        {
            $data['password'] = bcrypt($request->input('password'));
        }
        # Simpan data ke dalam Table Users
        $user = User::find($id);
        $user->update($data);

        return redirect()->back()->with('alert-success', 'Rekod telah berjaya dikemaskini.');
    }

    public function show($id)
    {
        # Panggil data user berdasarkan ID
        $user = User::find($id);
        # Akses direct ke table tempahan
        # $tempahan = Tempahan::where('user_id', '=', $id)->get();

        # Bagi respon papar template edit dan attach sekali $variable $user
        return view('users.template_show', compact('user'));
    }

    public function destroy($id)
    {
        # Panggil data user berdasarkan ID dan hapuskan ia
        DB::table('users')->where('id', '=', $id)->delete();
        # Bagi respon redirect ke halaman senarai users
        return redirect()->route('users.index')->with('alert-success', 'Rekod telah berjaya dihapuskan.');
    }

}
