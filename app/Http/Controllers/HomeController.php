<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Distributor;
use App\Models\Merek;
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
        $mereks = Merek::select('nama_merek')
                ->distinct('nama_merek')
                ->count('nama_merek');
        $distributors = Distributor::select('nama_distributor')
                ->distinct('nama_distributor')
                ->count('nama_distributor');
        $barangs = Barang::select('nama_barang')
                ->distinct('nama_barang')
                ->count('nama_barang');
        $transaksis = Transaksi::select('total_barang')
                ->distinct('total_barang')
                ->count('total_barang');
        return view('home', compact('mereks', 'distributors', 'barangs', 'transaksis'));
    }
}
