<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\transaksi;
use App\Models\Mitra;
use App\Models\Debt;
use App\Models\sayur;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{

    public function index()
    {
        $penjualan = transaksi::where('jenis_transaksi', 'penjualan')->get();
        $mitra = Mitra::where('jenis_mitra', 'pelanggan')->get();
        $sayur = sayur::all();


        return view('admin.penjualan.index', compact('penjualan', 'mitra', 'sayur'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_mitra' => 'required|exists:mitra,id_mitra',
            'date' => 'required|date',
            'id_sayur' => 'required|exists:sayur,id_sayur',
            'kuantitas' => 'required|numeric|min:0.1',
            'price' => 'required|numeric|min:0',
            'jenis_pembayaran' => 'required|in:tunai,DP',
        ]);

        try {
            $total = $request->kuantitas * $request->price;

            // Simpan transaksi terlebih dahulu
            $transaksi = transaksi::create([
                'user_id' => auth()->id(),
                'id_mitra' => $request->id_mitra,
                'date' => $request->date,
                'jenis_transaksi' => 'penjualan',
                'id_sayur' => $request->id_sayur,
                'kuantitas' => $request->kuantitas,
                'price' => $request->price,
                'total_transaksi' => $total,
                'jenis_pembayaran' => $request->jenis_pembayaran,
            ]);

            // Jika jenis pembayaran adalah DP, simpan ke tabel Debt
            if ($request->jenis_pembayaran === 'DP') {
                $hutang = 0.9 * $total; // 90% dari total
                
                // dd($transaksi);
                Debt::create([
                    'id_transaksi' => $transaksi->id_transaksi, // asumsi foreign key
                    'jumlah' => $hutang,
                ]);
            }

            return redirect()->route('penjualan.index')
                ->with('success', 'Transaksi berhasil ditambahkan.');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Gagal menyimpan transaksi: ' . $e->getMessage());
        }
    }
}
