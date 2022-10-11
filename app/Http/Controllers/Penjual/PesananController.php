<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Orders;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax() ){
            $orders = Orders::paginate(10);
            return view('pages.penjual.dashboard.pesanan.list', compact('orders'));
        }
        return view('pages.penjual.dashboard.pesanan.main');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $pesanan)
    {
        $items = OrderItem::where('order_id', $pesanan->id)
        ->groupBy('produk_id')
        ->get();    
        $delivery_data = Orders::where('id',$pesanan->id)
        ->pluck('delivery_data')
        ->first();
        return view('pages.penjual.dashboard.pesanan.show', ['data' => $pesanan, 'items' => $items, 'delivery_data' => json_decode($delivery_data)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $pesanan)
    {
        $pesanan->order_status = 'settlement';
        $pesanan->pesanan_status = 4;
        $pesanan->update();
        return response()->json([
            'alert'=>'success',
            'message'=>'Produk Berhasil Di konfirmasi',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $pesanan)
    {
        //
    }
}
