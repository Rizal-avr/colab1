<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\transaksi;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{

      public function index()
    {
        $penjualan = transaksi::where('jenis_transaksi', 'penjualan')->get();
        

        return view('admin.penjualan.index', compact('penjualan'));
    }

    

}
