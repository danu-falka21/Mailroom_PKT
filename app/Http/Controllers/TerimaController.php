<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Kurir;
use Carbon\Carbon;

use Illuminate\Http\Request;

class TerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $kurir = Kurir::all();
        $terima = Transaksi::where('status_transaksi',1)->get();
        //dd($terima);
        return view('terima.index', compact('terima','user','kurir'));
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
        
        
        //dd($date);
        $this->validate($request,[
            
            //'terima_mailroom' => 'required',
            'id_kurir' => 'required',
            'no_resi' => 'required',
            'id_user1' => 'required',
            'nama_guest' => 'required',
            'alamat_guest' => 'required',
            'kota_guest' => 'required',
            'tipe_barang' => 'required',
            

        ]);
        if($request->terima_mailroom != null){
           $date = Carbon::parse($request->terima_mailroom)->format('Y-m-d H:i:s');
            $terima_data = [
                'status_transaksi' => 1,
                'terima_mailroom' => $date,
                'no_resi' => $request->no_resi,
                'id_kurir' => $request->id_kurir,
                'id_user1' => $request->id_user1,
                'nama_guest' => $request->nama_guest,
                'alamat_guest' => $request->alamat_guest,
                'kota_guest' => $request->kota_guest,
                'tipe_barang' => $request->tipe_barang,
            ];
//test
        } 
        else{
            $terima_data = [
                'status_transaksi' => 1,
                'no_resi' => $request->no_resi,
                'id_kurir' => $request->id_kurir,
                'id_user1' => $request->id_user1,
                'nama_guest' => $request->nama_guest,
                'alamat_guest' => $request->alamat_guest,
                'kota_guest' => $request->kota_guest,
                'tipe_barang' => $request->tipe_barang,
            ];
        }

        

        $terima = Transaksi::create($terima_data);
        return redirect()->back()->with('status','Data Terima Berhasil Ditambahkan');
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
        $user = User::all();
        $kurir = Kurir::all();
        $terima = Transaksi::findorfail($id);
        return view('terima.edit', compact('terima','kurir','user'));
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
        $date = Carbon::parse($request->terima_mailroom)->format('Y-m-d H:i:s');
        $date1 = Carbon::parse($request->user)->format('Y-m-d H:i:s');
        $this->validate($request, [
            'terima_mailroom' => 'required',
            'id_kurir' => 'required',
            'no_resi' => 'required',
            'id_user1' => 'required',
            'nama_guest' => 'required',
            'alamat_guest' => 'required',
            'kota_guest' => 'required',
            'tipe_barang' => 'required',
        ]);
        $terima_data = [
            'terima_mailroom' => $date,
            'no_resi' => $request->no_resi,
            'id_kurir' => $request->id_kurir,
            'id_user1' => $request->id_user1,
            'nama_guest' => $request->nama_guest,
            'alamat_guest' => $request->alamat_guest,
            'kota_guest' => $request->kota_guest,
            'tipe_barang' => $request->tipe_barang,
            'terima_user' => $date1,
            'id_user3' => $request->id_user3,
        ];

        Transaksi::whereid($id)->update($terima_data);

     
        return redirect()->route('terima.index')->with('status','terima Berhasil di Update');
    }
    public function updateview($id)
    {
        $user = User::all();
        $terima = Transaksi::findorfail($id);
        return view('terima.updateview', compact('terima','user'));
    }
    public function updateterima(Request $request, $id)
    {
        $date = Carbon::parse($request->terima_mailroom)->format('Y-m-d H:i:s');
        $date1 = Carbon::parse($request->terima_user)->format('Y-m-d H:i:s');
        
        $terima_data = [
            'terima_mailroom' => $date,
            'terima_user' => $date1,
            'id_user3' => $request->id_user3,
        ];

        Transaksi::whereid($id)->update($terima_data);

        return redirect()->route('terima.index')->with('status','terima Berhasil di Update');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $terima = Transaksi::findorfail($id);
        $terima->delete();

        return redirect()->back()->with('status','Transaksi Berhasil Dihapus');
    }
}
