<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Asset;
use App\Models\Tempahan;
use DB;

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
        $senarai_tempahan = Tempahan::paginate(10);
        # Beri respon papar template_index

        # Join Table menerusi Query Builder
        // $senarai_tempahan = DB::table('tempahan')
        // ->join('users', 'tempahan.user_id', '=', 'users.id')
        // ->join('assets', 'tempahan.asset_id', '=', 'assets.id')
        // ->select('tempahan.*', 'users.name as nama_pengguna', 'assets.nama as nama_asset')
        // ->paginate(10);

        return view('tempahan/template_index', compact('senarai_tempahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        # Dapatkan data drop down senarai assets
        $select_users = User::select('id', 'name')->get();
        # Dapatkan data drop down senarai assets
        $select_assets = Asset::select('id', 'nama')->get();
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
        $select_users = User::select('id', 'name')->get();
        # Dapatkan data drop down senarai assets
        $select_assets = Asset::select('id', 'nama')->get();
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
