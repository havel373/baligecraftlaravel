<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index($id){
        $id = $id;
        $cart_order = $id;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key:8b9e257a5e4d134dc057a4f7f2ee799b"
            ),
        ));
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if($err){
            dump($err);
        }else{
            $get = json_decode($response, true);
        }
        return view('pages.user.checkout.main', compact('cart_order','get','id'));
    }

    public function store(Request $request,$id){
        $carts = \Cart::getContent();
        dd($carts->count());
        $order = new Orders;
        $order->user_id = Auth::user()->id;
        $order->resi = null;
        $order->gambar_resi = null;
        $order->province = $request->provinsi;
        $order->regency = $request->kabupaten;
        $order->courier = $request->kurir;
        $order->courier_service = null;
        $order->order_number = $request->kurir;
        $order->order_status = $request->kurir;
        $order->pesanan_status = $request->kurir;
        $order->order_date = date('Y-m-d');
        $order->ongkir = $request->pilih_ongkir;
        $order->total_price = $request->total_input;
        $order->total_items = $carts->count();
        // $order->payment_method = $request->total_input;
        // $order->payment_method = $request->total_input;
        // $order->delivery_data = $request->total_input;
        // $order->link_pay = $request->total_input;
        $order->save();
        $item = new OrderItem;
        foreach($carts as $i => $data){
            $item->order_id = $order->id;
            $item->produk_id = $data->id;
            $item->order_qty = $data->quantity;
            $item->order_price = $data->price * $data->quantity;
            $item->created_at = date('Y-m-d');
            $item->updated_at = date('Y-m-d');
            $item->save();
        }
        return redirect()->route('home');
    }

    public function create_order_number(){
        $this->load->helper('string');

        $alpha = strtoupper(random_string('alpha', 3));
        $num = random_string('numeric', 3);
        $count_qty = count($quantity);


        $number = $alpha . date('j') . date('n') . date('y') . $count_qty . $user_id . $coupon_id . $num;
        //Random 3 letter . Date . Month . Year . Quantity . User ID . Coupon Used . Numeric

        return $number;
    }
}
