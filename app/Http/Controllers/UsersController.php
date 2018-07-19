<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use DataTables;

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
        # $senarai_users = User::paginate(5);

        return view('users.template_users', compact('page_title'));

    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatables()
    {
        # Dapatkan rekod data users dari table users
        $query = User::select('id', 'name', 'email');
        # Beri respon datatables
        # Sediakan variable bernama $user yang mewakili foreach ($query as $user)
        return Datatables::of($query)
        ->addColumn('tindakan', function ($user) {
            return '

            <a href="' . route('users.show', ['id' => $user->id]) .'" class="btn btn-sm btn-primary">Show</a>

            <a href="' . route('users.edit', ['id' => $user->id]) .'" class="btn btn-sm btn-info">Edit</a>

            <!-- Button trigger modal delete -->
            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-'. $user->id .'">
                Delete
            </button>

            <!-- Modal -->
            <form action="'. route('users.destroy', ['id' => $user->id]) .'" method="POST">
                ' . csrf_field() . '
                <input type="hidden" name="_method" value="delete">

                <div class="modal fade" id="modal-delete-'. $user->id .'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <p>Adakah anda bersetuju untuk menghapuskan rekod data ini?</p>
                    <ul>
                        <li>ID: ' . $user->id .'</li>
                    </ul>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
                </div>
                </div>
                </div>
                </div>
            </form>

            ';
        })
        ->rawColumns(['tindakan'])
        ->make(true);
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
