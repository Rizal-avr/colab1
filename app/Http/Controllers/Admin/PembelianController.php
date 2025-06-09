<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\transaksi;
use App\Models\Mitra;
use App\Models\sayur;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelian = transaksi::where('jenis_transaksi', 'pembelian')->get();
        $mitra = Mitra::where('jenis_mitra', 'petani')->get();
        $sayur = sayur::all();


        return view('admin.pembelian.index', compact('pembelian', 'mitra', 'sayur'));
    }

    public function store(Request $request)
    {


        $validated = $request->validate([
            'id_mitra' => 'required|exists:mitra,id_mitra',
            'date' => 'required|date',
            'id_sayur' => 'required|exists:sayur,id_sayur',
            'kuantitas' => 'required|numeric|min:0.1',
            'price' => 'required|numeric|min:0',
            'jenis_pembayaran' => 'required|in:tunai,hutang',
        ]);

        try {
            // Cari mitra berdasarkan nam

            $total = $request->kuantitas * $request->price;

            Transaksi::create([
                'user_id' => auth()->id(),
                'id_mitra' => $request->id_mitra,
                'date' => $request->date,
                'jenis_transaksi' => 'pembelian',
                'id_sayur' => $request->id_sayur,
                'kuantitas' => $request->kuantitas,
                'price' => $request->price,
                'total_transaksi' => $total,
                'jenis_pembayaran' => $request->jenis_pembayaran,
            ]);

            return redirect()->route('pembelian.index')
                ->with('success', 'Transaksi berhasil ditambahkan.');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Gagal menyimpan transaksi: ' . $e->getMessage());
        }
    }
}
