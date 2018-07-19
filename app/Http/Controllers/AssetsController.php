<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Asset;

class AssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # Dapatkan senarai assets menggunakan query builder
        # $senarai_assets = DB::table('assets')->get();
        $senarai_assets = Asset::all();

        # Bagi respon papar template senarai assets
        return view('assets/template_index', compact('senarai_assets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assets/template_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'barcode' => 'required'
        ]);

        # Dapatkan data dari borang
        $data = $request->all();
        # Simpan data ke dalam table assets
        # DB::table('assets')->insert($data);
        Asset::create($data);

        # Beri respon kembali ke senarai assets
        return redirect()->route('assets.index')->with('alert-success', 'Rekod telah berjaya ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        # Dapatkan maklumat asset berdasrakan ID
        $asset = Asset::find($id);
        # Beri respon paparkan template_show.blade.php
        return view('assets/template_show', compact('asset'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        # Dapatkan data berdasarkan ID
        # $asset = DB::table('assets')->where('id', $id)->first();
        # $asset = Asset::where('id', $id)->first();
        $asset = Asset::find($id);

        return view('assets/template_edit', compact('asset'));
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
        $request->validate([
            'nama' => 'required',
            'barcode' => 'required'
        ]);

        # Dapatkan data dari borang
        $data = $request->all();
        # Simpan data ke dalam table assets
        // DB::table('assets')
        // ->where('id', $id)
        // ->update($data);
        $asset = Asset::find($id);
        $asset->update($data);

        return redirect()->route('assets.index')->with('alert-success', 'Rekod telah berjaya dikemaskini.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        # Dapatkan rekod data dan hapuskan ia
        // DB::table('assets')
        // ->where('id', $id)
        // ->delete();
        $asset = Asset::find($id);
        $asset->delete();

        return redirect()->route('assets.index')->with('alert-success', 'Rekod telah berjaya dihapuskan.');
    }
}
