<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartList()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->orderBy('penjual_id', 'ASC')->get();
        return view('pages.user.cart.index', compact('carts'));
    }


    public function addToCart(Request $request)
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
                    $data->save();
                }
            } else {
                $data = new Cart;
                $data->user_id = Auth::user()->id;
                $data->penjual_id = $request->penjual;
                $data->product_id = $request->produk_id;
                $data->qty = $request->qty;
                $data->save();
            }
            session()->flash('success', 'Berhasil Menambahkan Ke Keranjang');
            return redirect()->route('cart.list')->with('success', 'Berhasil Menambahkan Ke Keranjang');
        }
    }

    public function updateCart(Request $request)
    {
        $produk = Produk::where('id', $request->produk_id)->first();
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        if ($produk->kuantitas < $request->kuantitas) {
            session()->flash('error', 'Gagal Menambahkan Ke Keranjang, Stok Tidak Cukup');
            return redirect()->back()->with('error', 'Gagal Menambahkan Ke Keranjang, Stok Tidak Cukup');
        } else {
            if ($cart) {
                $cartProduk = Cart::where('product_id', $request->produk_id)->where('user_id', Auth::user()->id)->first();
                if ($cartProduk) {
                    if ($cartProduk->qty > $produk->kuantitas) {
                        session()->flash('error', 'Gagal Menambahkan Ke Keranjang, Stok Tidak Cukup');
                        return redirect()->back()->with('error', 'Gagal Menambahkan Ke Keranjang, Stok Tidak Cukup');
                    } else {
                        $cartProduk->qty = $request->kuantitas;
                        $cartProduk->update();
                    }
                } else {
                    $data = new Cart;
                    $data->user_id = Auth::user()->id;
                    $data->penjual_id = $request->penjual;
                    $data->product_id = $request->produk_id;
                    $data->qty = $request->qty;
                    $data->save();
                }
            } else {
                $data = new Cart;
                $data->user_id = Auth::user()->id;
                $data->penjual_id = $request->penjual;
                $data->product_id = $request->produk_id;
                $data->qty = $request->qty;
                $data->save();
            }
            session()->flash('success', 'Berhasil Menambahkan Ke Keranjang');
            return redirect()->route('cart.list')->with('success', 'Berhasil Menambahkan Ke Keranjang');
        }
    }

    public function removeCart(Request $request)
    {
        $carts = Cart::where('id', $request->id)->first();
        $carts->delete();
        session()->flash('success', 'Item Cart Remove Successfully !');
        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        foreach ($carts as $cart) {
            $cart->delete();
        }
        session()->flash('success', 'All Item Cart Clear Successfully !');
        return redirect()->route('cart.list');
    }
}
