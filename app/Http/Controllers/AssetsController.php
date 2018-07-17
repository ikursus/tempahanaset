<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $senarai_assets = [
            ['id' => '1', 'nama' => 'LAPTOP DELL', 'barcode' => 'ABC123', 'tarikh_beli' => '2018-01-01', 'harga_pasaran' => '5000.00'],
            ['id' => '2', 'nama' => 'PROJECTOR HITACHI', 'barcode' => 'CAD123', 'tarikh_beli' => '2018-01-01', 'harga_pasaran' => '3000.00'],
            ['id' => '3', 'nama' => 'KAMERA CANON', 'barcode' => 'ABC123', 'tarikh_beli' => '2018-01-01', 'harga_pasaran' => '2000.00']
        ];

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
        return view('assets/template_edit', compact('id'));
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
        //
    }
}
