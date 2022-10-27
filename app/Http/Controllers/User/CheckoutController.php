<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\OrderItem;
use App\Models\Orders;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
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
        if ($err) {
            dump($err);
        } else {
            $get = json_decode($response, true);
        }
        return view('pages.user.checkout.main', compact('get', 'carts'));
    }

    public function store(Request $request)
    {
        // foreach(){
            $carts = Cart::where('user_id', Auth::user()->id)->orderBy('penjual_id', 'ASC')->get();
            $order = new Orders;
            $order->user_id = Auth::user()->id;
            $order->resi = null;
            $order->gambar_resi = null;
            $order->province = $request->provinsi;
            $order->regency = $request->kabupaten;
            $order->courier = $request->kurir;
            $order->courier_service = null;
            $order->order_number = $request->kurir;
            $order->order_status = 'pending';
            $order->pesanan_status = 0;
            $order->order_date = now();
            $order->ongkir = $request->pilih_ongkir;
            $order->total_price = $request->total_input;
            $order->total_items = $carts->count();
            $delivery_data = ['user' => ['nama_lengkap' => Auth::user()->nama_lengkap, 'notelp' => Auth::user()->notelp, 'alamat' => $request->alamat], 'note' => $request->note];
            $order->delivery_data = json_encode($delivery_data);
            $order->order_number = $this->create_order_number();
            $order->save();
            foreach ($carts as $i => $items) {
                
                $item = new OrderItem;
                $item->order_id = $order->id;
                $item->produk_id = $items->product_id;
                $item->order_qty = $items->qty;
                $item->order_price = $items->produk->harga * $items->qty;
                $item->created_at = date('Y-m-d H:i:s');
                $item->updated_at = date('Y-m-d H:i:s');
                $item->save();
                $produk = Produk::where('id', $items->product_id)->first();
                $produk->kuantitas -= $items->qty;
                $produk->update();
                // if (is_array($items['conditions']) && !empty($items['conditions'])) {
                //     $temp = [];
                //     // get the subtotal with conditions applied
                //     $item['price_sum'] = $item->getPriceSumWithConditions();

                //     foreach ($item['conditions'] as $key => $value) {
                //         $temp[] = [
                //             'name' => $value->getName(),
                //             'value' => $value->getValue(),
                //         ];
                //     }

                //     $item['_conditions'] = $temp;
                // }
                // $item->price;
                // $item->quantity; // the quantity
                // $item->attributes; // the attributes
            }
            Cart::where('user_id', Auth::user()->id)->delete();
            $message = "Halo, nama saya " . Auth::user()->nama_lengkap . ", saya membeli produk dengan nomor order : " . $order->order_number . " dengan total harga : " . $order->total_price . " dengan kurir : " . $order->courier . " dengan ongkir : " . $order->ongkir;
            // make return redirect to whatsapp
        return redirect('https://api.whatsapp.com/send?phone=6281362926803&text=' . $message)->with('success', 'Order Berhasil Ditambahkan');
        // }
    }

    public function create_order_number()
    {
        //Random 3 letter . Date . Month . Year . Quantity . User ID . Coupon Used . Numeric
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 3; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString . date('dmy') . rand(0, 9999) . Auth::user()->id;
    }
}
