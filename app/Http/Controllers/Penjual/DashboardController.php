<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dataproduk(Request $request){
        if($request->ajax() ){
            $produk = Produk::paginate(5);
            return view('pages.penjual.dashboard.produk.list', compact('produk'));
        }
        return view('pages.penjual.dashboard.produk.main');
    }
    
    public function datapembayaran(){
        return view('pages.penjual.dashboard.datapembayaran');
    }
}
