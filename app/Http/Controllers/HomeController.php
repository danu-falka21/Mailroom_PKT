<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Transaksi;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function dashboard()
    {
        $user = User::all();
        $userCount = count($user);
        $kirim = Transaksi::where('status_transaksi',0)->count();
        $terima = Transaksi::where('status_transaksi',1)->count();

        return view('dashboard', compact('kirim','userCount','terima'));
    }
}
