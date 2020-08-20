<?php

namespace App\Http\Controllers;

use DB;

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
        // $jumlah = 0;
        $user = DB::table('member')->count();
        $peminjam = DB::table('peminjaman')->where('keadaan', '=', 'Belum Dikembalikan')->count();
        $buku = DB::table('buku')->get();
        $tot_buku = DB::table('buku')->count();
        return view('home', ['var_user' => $user, 'var_peminjam' => $peminjam, 'var_buku' => $buku, 'var_tot' => $tot_buku]);
    }
}