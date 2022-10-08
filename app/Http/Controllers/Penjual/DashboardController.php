<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dataproduk(){
        return view('pages.penjual.dashboard.dataproduk');
    }
    
    public function datapesanan(){
        return view('pages.penjual.dashboard.datapesanan');
    }
    
    public function datapembayaran(){
        return view('pages.penjual.dashboard.datapembayaran');
    }
}
