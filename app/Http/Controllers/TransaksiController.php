<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;


class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Transaksi::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                        $btn = '
                        <form onsubmit="return confirm(\'Apakah anda yakin ingin menghapus '.$row->name.' ?\');"  action="users/'.$row->id.'" method="POST">

                            '.csrf_field().'
                            '.method_field("DELETE").'

                            <button type="submit" class="btn btn-danger">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </button>
                        </form>
                        ';

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('transaksis.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangs = Barang::all();
        return view('transaksis.create', compact('barangs'));
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
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'total_barang' => 'required',
            'total_bayar' => 'required',
        ]);

        if(($request->total_bayar - ($request->harga_barang * $request->total_barang)) < 0) {
            return redirect()->back()->withErrors(['msg' => 'Saldo anda kurang!']);
        }else {
            Transaksi::create([
                'nama_barang' => $request->nama_barang,
                'harga_barang' => $request->harga_barang,
                'total_barang' => $request->total_barang,
                'total_harga' => $request->harga_barang * $request->total_barang,
                'total_bayar' => $request->total_bayar,
                'kembalian' =>  $request->total_bayar - ($request->harga_barang * $request->total_barang),
                'tgl_beli' => date('Y-m-d')
                    ]);

            return redirect()->route('transaksis.index');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        $barangs = Barang::all();
        return view('transaksis.edit', compact('barangs', 'transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        // dd($request->all());
        $request->validate([
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'total_barang' => 'required',
            'total_bayar' => 'required',
        ]);

        if(($request->total_bayar - ($request->harga_barang * $request->total_barang)) < 0) {
            return redirect()->back()->withErrors(['msg' => 'Saldo anda kurang!']);
        }else {
            $transaksi->update([
                'nama_barang' => $request->nama_barang,
                'harga_barang' => $request->harga_barang,
                'total_barang' => $request->total_barang,
                'total_harga' => $request->harga_barang * $request->total_barang,
                'total_bayar' => $request->total_bayar,
                'kembalian' =>  $request->total_bayar - ($request->harga_barang * $request->total_barang),
            ]);    

            return redirect()->route('transaksis.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()->route('transaksis.index');
    }

    public function cart()
    {
        $barangs = Barang::all();
        $cartItems = Cart::getContent();

        return view('carts.index', compact('barangs', 'cartItems'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function addToCart(Request $request)
    {
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.items');
    }

    public function updateCart(Request $request)
    {
        Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.items');
    }

    public function removeCart(Request $request)
    {
        Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.items');
    }

    public function clearAllCart()
    {
        Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.items');
    }

    public function payCart(Request $request)
    {
        $cartItems = Cart::getContent();

        $request->validate([
            'total_bayar' => 'required'
        ]);

        if (Cart::getTotal() > $request->total_bayar) {
            return redirect()->back()->withErrors(['msg' => 'Saldo anda kurang!']);
        }

        foreach ($cartItems as $item) {
            if (!Barang::select('stok')->where('nama_barang', $item->name)) {
                return redirect()->back()->withErrors(['msg' => 'Stok tidak memadai!']);
            }
        }

        $kembalian = $request->total_bayar - Cart::getTotal();

        Transaksi::create([
            'total_barang' => Cart::getTotalQuantity(),
            'total_harga' => Cart::getTotal(),
            'total_bayar' => $request->total_bayar,
            'kembalian' => $kembalian,
            'tgl_beli' => date('Y-m-d')
        ]);

        foreach ($cartItems as $item) {
            Barang::where('nama_barang', $item->name)->decrement('stok', $item->quantity);
        }

        Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.items');
    }

    public function getHarga(Request $request)
    {
        $hargas['nama_barang'] = Barang::where('nama_barang', $request->nama_barang)
                                ->first();

        return response()->json([
            'hargas' => $hargas,
        ]);
    }
}
