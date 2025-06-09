<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Debt;
use Illuminate\Http\Request;

class DebtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $debts = Debt::all();
        return view('owner.debt', compact('debts'));
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
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:tunai,DP',
        ]);

        $debt = Debt::findOrFail($id);
        $transaksi = $debt->transaksi;

        if ($validated['status'] === 'tunai') {
            // Ubah status transaksi ke tunai
            $transaksi->jenis_pembayaran = 'tunai';
            $transaksi->save();

            // Hapus data debt terkait
            $debt->delete();

            return redirect()->back()->with('success', 'Status diubah menjadi tunai dan tanggungan dihapus.');
        } else {
            // Jika diubah ke DP, pastikan debt tetap ada
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
