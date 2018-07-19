<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Asset;
use App\Models\Tempahan;
use DB;
use DataTables;

class TempahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # Dapatkan rekod senarai tempahan
        # $senarai_tempahan = Tempahan::paginate(10);
        # Beri respon papar template_index

        # Join Table menerusi Query Builder
        // $senarai_tempahan = DB::table('tempahan')
        // ->join('users', 'tempahan.user_id', '=', 'users.id')
        // ->join('assets', 'tempahan.asset_id', '=', 'assets.id')
        // ->select('tempahan.*', 'users.name as nama_pengguna', 'assets.nama as nama_asset')
        // ->paginate(10);

        #return view('tempahan/template_index', compact('senarai_tempahan'));
        return view('tempahan/template_index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatables()
    {
        # Dapatkan rekod data tempahan dari table tempahan
        # Sertakan sekali relationships dari table tempahan - users - assets
        $query = Tempahan::with('dataPengguna')
        ->with('dataAsset')
        ->select('tempahan.*');

        # Beri respon datatables
        # Sediakan variable bernama $user yang mewakili foreach ($query as $user)
        return Datatables::of($query)
        ->addColumn('tindakan', function ($tempahan) {
            return '
            <a href="' . route('tempahan.edit', ['id' => $tempahan->id]) .'" class="btn btn-sm btn-info">Edit</a>

            <!-- Button trigger modal delete -->
            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-'. $tempahan->id .'">
                Delete
            </button>

            <!-- Modal -->
            <form action="'. route('tempahan.destroy', ['id' => $tempahan->id]) .'" method="POST">
                ' . csrf_field() . '
                <input type="hidden" name="_method" value="delete">

                <div class="modal fade" id="modal-delete-'. $tempahan->id .'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <li>ID: ' . $tempahan->id .'</li>
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        # Dapatkan data drop down senarai assets
        # $select_users = User::select('id', 'name')->get();
        $select_users = User::pluck('name', 'id');
        # Dapatkan data drop down senarai assets
        # $select_assets = Asset::select('id', 'nama')->get();
        $select_assets = Asset::pluck('nama', 'id');
        # Beri respon papar template borang tempahan
        return view('tempahan/template_tambah', compact('select_assets', 'select_users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # Validation
        $request->validate([
            'user_id' => 'required|integer',
            'asset_id' => 'required|integer',
            'tarikh_pinjam' => 'required',
        ]);

        # Dapatkan semua data
        $data = $request->all();

        # Simpan data ke dalam table tempahan
        Tempahan::create($data);

        # Beri respon kembali ke halaman utama senarai tempahan
        return redirect()->route('tempahan.index')->with('alert-success', 'Rekod baru berjaya ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        # Dapatkan data drop down senarai assets
        # $select_users = User::select('id', 'name')->get();
        $select_users = User::pluck('name', 'id');
        # Dapatkan data drop down senarai assets
        # $select_assets = Asset::select('id', 'nama')->get();
        $select_assets = Asset::pluck('nama', 'id');
        # Dapatkan data tempahan berdasarkan id
        $tempahan = Tempahan::find($id);
        # Beri respon papar template borang tempahan
        return view('tempahan/template_edit', compact('select_assets', 'select_users', 'tempahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        # Validation
        $request->validate([
            'user_id' => 'required|integer',
            'asset_id' => 'required|integer',
            'tarikh_pinjam' => 'required',
        ]);

        # Dapatkan semua data
        $data = $request->all();

        # Dapatkan data tempahan berdasarkan id dan update
        $tempahan = Tempahan::find($id);
        $tempahan->update($data);

        # Beri respon kembali ke senarai tempahan
        return redirect()->route('tempahan.index')->with('alert-success', 'Rekod telah berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        # Dapatkan data tempahan berdasarkan id dan delete
        $tempahan = Tempahan::find($id);
        $tempahan->delete();

        # Beri respon kembali ke senarai tempahan
        return redirect()->route('tempahan.index')->with('alert-success', 'Rekod telah berjaya dihapuskan');
    }
}
