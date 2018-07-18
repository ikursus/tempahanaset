<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $senarai_assets = DB::table('assets')->get();

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
        $data = $request->except('_token');
        # Simpan data ke dalam table assets
        DB::table('assets')->insert($data);

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
        # Dapatkan data berdasarkan ID
        $asset = DB::table('assets')->where('id', $id)->first();

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
        $data = $request->except('_token', '_method');
        # Simpan data ke dalam table assets
        DB::table('assets')
        ->where('id', $id)
        ->update($data);

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
        DB::table('assets')
        ->where('id', $id)
        ->delete();

        return redirect()->route('assets.index')->with('alert-success', 'Rekod telah berjaya dihapuskan.');
    }
}
