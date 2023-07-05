<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransaksisExport;
use App\Exports\TransaksiDescriptionsExport;
use App\Models\TransaksiDescription;
use RealRashid\SweetAlert\Facades\Alert;

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
                ->addColumn('action', function ($row) {
                    $btn =
                        '
                            <a href="transaksis/'.$row->id .'" class="btn btn-primary" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                <style>svg{fill:#ffffff}</style>
                                <path d="M358.4 3.2L320 48 265.6 3.2a15.9 15.9 0 0 0-19.2 0L192 48 137.6 3.2a15.9 15.9 0 0 0-19.2 0L64 48 25.6 3.2C15-4.7 0 2.8 0 16v480c0 13.2 15 20.7 25.6 12.8L64 464l54.4 44.8a15.9 15.9 0 0 0 19.2 0L192 464l54.4 44.8a15.9 15.9 0 0 0 19.2 0L320 464l38.4 44.8c10.5 7.9 25.6.4 25.6-12.8V16c0-13.2-15-20.7-25.6-12.8zM320 360c0 4.4-3.6 8-8 8H72c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h240c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H72c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h240c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H72c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h240c4.4 0 8 3.6 8 8v16z"/>
                            </svg>
                            </a>
                        ';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('transaksis.index');
    }

    public function exportExcel()
    {
        return Excel::download(new TransaksisExport(), 'Laporan Transaksi.xlsx');
    }

    public function exportPDF()
    {
        return Excel::download(new TransaksisExport(), 'Laporan Transaksi.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }

    public function exportDetailExcel($id)
    {
        return Excel::download(new TransaksiDescriptionsExport($id), 'Laporan Transaksi Detail.xlsx');
    }

    public function exportDetailPDF($id)
    {
        return Excel::download(new TransaksiDescriptionsExport($id), 'Laporan Transaksi Detail.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($transaksi)
    {
        $trans = Transaksi::where('id', $transaksi)->groupBy('nama_barang')->get();
        $desc = TransaksiDescription::where('id', $transaksi)->first();
        return view('carts.view', compact('trans', 'desc'));
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

        Alert::toast('Data Berhasil Di Hapus!', 'success');
        return redirect()->route('transaksis.index');
    }

    public function cart()
    {
        $barangs = Barang::all();
        $cartItems = Cart::getContent();

        return view('carts.index', compact('barangs', 'cartItems'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function addToCart(Request $request)
    {
        $stok = Barang::select('stok')
            ->where('nama_barang', $request->name)
            ->first();
        if ($stok->stok < 1) {
            Alert::toast('Stok Tidak Memadai!', 'error');
            return redirect()->back();
        }

        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        Alert::toast('Barang Berhasil Dimasukkan ke Keranjang!', 'success');
        return redirect()->route('cart.items');
    }

    public function updateCart(Request $request)
    {
        $stok = Barang::select('stok')
            ->where('id', $request->id)
            ->first();
        // dd($stok);
        if ($stok->stok < $request->quantity) {
            Alert::toast('Stok Tidak Memadai!', 'error');
            return redirect()->back();
        } else {
            Cart::update($request->id, [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity,
                ],
            ]);

            Alert::toast('Jumlah Barang Berhasil Di Ubah!', 'success');
            return redirect()->route('cart.items');
        }
    }

    public function updateAllCart(Request $request)
    {
        foreach ($request->id as $id) {
            $stok = Barang::select('stok')
                ->where('id', $id)
                ->get();
            if ($stok->stok < $request->quantity) {
                Alert::toast('Stok Tidak Memadai!', 'error');
                return redirect()->back();
            } else {
                Cart::update($id, [
                    'quantity' => [
                        'relative' => false,
                        'value' => $request->quantity,
                    ],
                ]);
            }
        }

        Alert::toast('Jumlah Barang Berhasil Di Ubah!', 'success');
        return redirect()->route('cart.items');
    }

    public function removeCart(Request $request)
    {
        Cart::remove($request->id);

        Alert::toast('Barang Berhasil Di Hapus!', 'success');

        return redirect()->route('cart.items');
    }

    public function clearAllCart()
    {
        Cart::clear();

        Alert::toast('Keranjang Berhasil Dikosongkan!', 'success');

        return redirect()->route('cart.items');
    }

    public function payCart(Request $request)
    {
        $cartItems = Cart::getContent();
        
        $request->validate([
            'total_bayar' => 'required',
        ]);
        
        if (Cart::getTotal() > $request->total_bayar) {
            Alert::toast('Saldo Kurang!', 'error');
            return redirect()->back();
        }
        
        foreach ($cartItems as $item) {
            $stok = Barang::select('stok')
            ->where('nama_barang', '=', $item->name)
                ->first();
            if ($stok->stok < $item->quantity) {
                Alert::toast('Stok Tidak Memadai!', 'error');
                return redirect()->back();
            }
        }

        $kembalian = $request->total_bayar - Cart::getTotal();

        $desc = new TransaksiDescription();
        $desc->total_barang = Cart::getTotalQuantity();
        $desc->total_harga = Cart::getTotal();
        $desc->total_bayar = $request->total_bayar;
        $desc->kembalian = $kembalian;
        $desc->tgl_beli = date('Y-m-d');
        $desc->petugas = auth()->user()->name;
        $desc->save();

        foreach ($cartItems as $item) {
            Transaksi::create([
                'id' => $desc->id,
                'nama_barang' => $item->name,
                'harga_barang' => $item->price,
                'total_barang' => $item->quantity,
                'tgl_beli' => date('Y-m-d'),
                'petugas' => auth()->user()->name,
            ]);
        }

        foreach ($cartItems as $item) {
            Barang::where('nama_barang', $item->name)->decrement('stok', $item->quantity);
        }

        Cart::clear();

        Alert::toast('Transaksi Sukses!', 'success');

        return redirect()->route('cart.items');
    }

    public function getHarga(Request $request)
    {
        $hargas['nama_barang'] = Barang::where('nama_barang', $request->nama_barang)->first();

        return response()->json([
            'hargas' => $hargas,
        ]);
    }
}
