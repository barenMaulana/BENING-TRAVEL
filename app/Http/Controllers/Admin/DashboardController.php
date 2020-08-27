<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\travelPackages;
use App\Transaction;

class DashboardController extends Controller
{
    public function index(Request $request){
        return view('pages.admin.dashboard', [
            // kita akan menggunakan static method untuk memanggil value, sebelum
            // itu kamu harus use atau panggil terlebih dahulu
            'travel_packages' => travelPackages::count(),
            'transaction' => Transaction::count(),
            // beri kondisi dimana untuk mencari isi recordnya
            'transaction_pending' => Transaction::where('transaction_status', 'PENDING')->count(),
            'transaction_success' => Transaction::where('transaction_status', 'SUCCESS')->count()
        ]);
    }
}
