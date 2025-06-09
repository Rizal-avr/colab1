<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\transaksi;
use App\Models\Debt;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class OwnerDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getSummary(Request $request)
    {
        $month = $request->month ?? Carbon::now()->month;
        $year = $request->year ?? Carbon::now()->year;

        $penjualan = Transaksi::where('jenis_transaksi', 'penjualan')
            ->whereMonth('date', $month)
            ->whereYear('date', $year)
            ->sum('total_transaksi');

        $totalPembelian = Transaksi::where('jenis_transaksi', 'pembelian')
            ->whereMonth('date', $month)
            ->whereYear('date', $year)
            ->sum('total_transaksi');

        $debt = Debt::whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('jumlah');

        $penghasilan = $penjualan - $debt;
        $totalPenjualan = $penjualan - $totalPembelian;

        return response()->json([
            'total_penjualan' => $totalPenjualan,
            'total_pembelian' => $totalPembelian,
            'debt' => $debt,
            'penghasilan' => $penghasilan,
        ]);
    }

    public function index(Request $request)
    {
        $tanggal = $request->input('tanggal'); // contoh: 2025-06-06
        // $bulanIni = Carbon::parse($tanggal ?? now())->month;
        // $tahunIni = Carbon::parse($tanggal ?? now())->year;

        $bulanIni = $request->bulan ?? Carbon::now()->month;
        $tahunIni = $request->tahun ?? Carbon::now()->year;


        $penjualan = transaksi::where('jenis_transaksi', 'penjualan')
            ->when($tanggal, function ($q) use ($tanggal) {
                $q->whereDate('date', $tanggal);
            }, function ($q) use ($bulanIni, $tahunIni) {
                $q->whereMonth('date', $bulanIni)->whereYear('date', $tahunIni);
            })
            ->sum('total_transaksi');

        $totalPembelian = transaksi::where('jenis_transaksi', 'pembelian')
            ->when($tanggal, function ($q) use ($tanggal) {
                $q->whereDate('date', $tanggal);
            }, function ($q) use ($bulanIni, $tahunIni) {
                $q->whereMonth('date', $bulanIni)->whereYear('date', $tahunIni);
            })
            ->sum('total_transaksi');

        $debt = Debt::whereHas('transaksi', function ($q) use ($tanggal, $bulanIni, $tahunIni) {
            $q->where('jenis_transaksi', 'penjualan')
                ->where('jenis_pembayaran', 'DP')
                ->when($tanggal, function ($q) use ($tanggal) {
                    $q->whereDate('date', $tanggal);
                }, function ($q) use ($bulanIni, $tahunIni) {
                    $q->whereMonth('date', $bulanIni)->whereYear('date', $tahunIni);
                });
        })->sum('jumlah');

        $penghasilan = $penjualan - $debt;
        $totalPenjualan = $penjualan - $totalPembelian;

        return view('owner.dashboard', compact('totalPembelian', 'totalPenjualan', 'debt', 'penghasilan', 'bulanIni', 'tahunIni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
