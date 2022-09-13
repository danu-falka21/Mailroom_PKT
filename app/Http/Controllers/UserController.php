<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UnitKerja;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit_kerja = UnitKerja::all();
        $user = User::get();
        //dd($user);
        return view('user.index', compact('user','unit_kerja'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'name' => 'required|min:3|max:99',
            'email' => 'required|email|unique:users',
            'rfid' => 'required',
            'npk' => 'required',
            'posisi' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'no_telepon' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'id_unit_kerja' => 'required',
            'role' => 'required',
            'password' => 'required|min:6',

        ]);

        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'rfid' => $request->rfid,
            'npk' => $request->npk,
            'posisi' => $request->posisi,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'no_telepon' => $request->no_telepon,
            'id_unit_kerja' => $request->id_unit_kerja,
            'role'=> $request->role,
            'password'=>bcrypt($request->password),

        ]);
        return redirect()->back()->with('status','User Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit_kerja = UnitKerja::all();
        $user = User::findorfail($id);
        return view('user.edit', compact('user','unit_kerja'));
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
            'name' => 'min:3|max:99',
            'email' => 'email',
            'no_telepon' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            
        ]);
        $user_data = [
            'name'=> $request->name,
            'email'=> $request->email,
            'rfid' => $request->rfid,
            'npk' => $request->npk,
            'posisi' => $request->posisi,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'no_telepon' => $request->no_telepon,
            'id_unit_kerja' => $request->id_unit_kerja,
            'role'=> $request->role,
            'password'=>bcrypt($request->password),
        ];

        User::whereid($id)->update($user_data);

        return redirect()->route('user.index')->with('status','Unit Kerja Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user->delete();

        return redirect()->back()->with('status','User Berhasil Dihapus');
    }
}
