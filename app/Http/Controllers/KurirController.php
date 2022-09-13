<?php

namespace App\Http\Controllers;
use App\Models\Kurir;
use Illuminate\Http\Request;

class KurirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kurir = Kurir::get();
        return view('kurir.index', compact('kurir'));
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
            'alamat' => 'required|min:3',
            'kota' => 'required|min:3',
            'no_telepon' => 'required',
            'email' => 'required|min:3|email',
        ]);
        $kurir = Kurir::create([
            'nama'=> $request->nama,
            'alamat'=> $request->alamat,
            'kota'=> $request->kota,
            'no_telepon'=> $request->no_telepon,
            'email'=> $request->email,

        ]);
        return redirect()->back()->with('status','Kurir Berhasil Ditambahkan');
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
        $kurir = Kurir::findorfail($id);
        return view('kurir.edit', compact('kurir'));
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
            'nama' => 'min:3',
            'alamat' => 'min:3',
            'kota' => 'min:3',
            'no_telepon' => 'max:13|regex:/(01)[0-9]{9}/',
            'email' => 'min:3|email',
        ]);
        $Kurir_data = [
            'nama'=> $request->nama,
            'alamat'=> $request->alamat,
            'kota'=> $request->kota,
            'no_telepon'=> $request->no_telepon,
            'email'=> $request->email,
        ];

        Kurir::whereid($id)->update($Kurir_data);

        return redirect()->route('kurir.index')->with('status','kurir Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kurir = Kurir::findorfail($id);
        $kurir->delete();

        return redirect()->back()->with('status','Kurir Berhasil Dihapus');
    }
}
