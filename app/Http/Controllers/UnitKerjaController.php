<?php

namespace App\Http\Controllers;
use App\Models\UnitKerja;

use Illuminate\Http\Request;

class UnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit_kerja = UnitKerja::get();
        return view('unit_kerja.index', compact('unit_kerja'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|min:3',
            'kompartemen' => 'required|min:3'
        ]);
        $category = UnitKerja::create([
            'nama'=> $request->nama,
            'kompartemen'=> $request->kompartemen,

        ]);
        return redirect()->back()->with('status','Unit Kerja Berhasil Ditambahkan');
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
        $unit_kerja = UnitKerja::findorfail($id);
        return view('unit_kerja.edit', compact('unit_kerja'));
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
        $this->validate($request, [
            'nama' => 'required|min:3',
            'kompartemen' => 'required|min:3'
        ]);
        $unitkerja_data = [
            'nama'=> $request->nama,
            'kompartemen'=> $request->kompartemen,
        ];

        UnitKerja::whereid($id)->update($unitkerja_data);

        return redirect()->route('unit-kerja.index')->with('status','Unit Kerja Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit_kerja = UnitKerja::findorfail($id);
        $unit_kerja->delete();

        return redirect()->back()->with('status','Unit Kerja Berhasil Dihapus');
    }
}
