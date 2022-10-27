<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Models;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_ulos = Produk::select('produk.*')
            ->join('kategori', 'kategori.id', '=', 'produk.kategori')
            ->where('kategori.kategori_nama', 'Ulos')
            ->where('produk.status', 1)
            ->get();
        return view('pages.user.ulos', compact('list_ulos'));
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

    public function get_harga_model(Request $request){
        if($request->id == null){
            $list = "";
            $list.="<option value='0'>0</option>";
            echo $list;
        }else{
            $model = Models::where('id', $request->id)->first();
            $list = "";
            $list.="<option value='$model->harga_model'>(+$model->harga_model)</option>";
            echo $list;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produk = Produk::where('id', $request->produk_id)->first();
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        if ($produk->kuantitas < $request->qty) {
            session()->flash('error', 'Gagal Menambahkan Ke Keranjang, Stok Tidak Cukup');
            return redirect()->back()->with('error', 'Gagal Menambahkan Ke Keranjang, Stok Tidak Cukup');
        } else {
            if ($cart) {
                $cartProduk = Cart::where('product_id', $request->produk_id)->where('user_id', Auth::user()->id)->first();
                if ($cartProduk) {
                    if ($cartProduk->qty + $request->qty > $produk->kuantitas) {
                        session()->flash('error', 'Gagal Menambahkan Ke Keranjang, Stok Tidak Cukup');
                        return redirect()->back()->with('error', 'Gagal Menambahkan Ke Keranjang, Stok Tidak Cukup');
                    } else {
                        $cartProduk->qty += $request->qty;
                        $cartProduk->update();
                    }
                } else {
                    $data = new Cart;
                    $data->user_id = Auth::user()->id;
                    $data->penjual_id = $request->penjual;
                    $data->product_id = $request->produk_id;
                    $data->qty = $request->qty;
                    $data->total_harga = ($request->qty * $request->harga_akhir);
                    $data->save();
                }
            } else {
                $data = new Cart;
                $data->user_id = Auth::user()->id;
                $data->penjual_id = $request->penjual;
                $data->product_id = $request->produk_id;
                $data->qty = $request->qty;
                $data->total_harga = ($request->qty * $request->harga_akhir);
                $data->save();
            }
            session()->flash('success', 'Berhasil Menambahkan Ke Keranjang');
            return redirect()->route('cart.list')->with('success', 'Berhasil Menambahkan Ke Keranjang');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $ulo)
    {
        $models = Models::get();
        $produk = Produk::where('id',$ulo->id)->first();
        return view('pages.user.ulos.show', compact('produk','models'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $ulo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $ulo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $ulo)
    {
        //
    }
}
