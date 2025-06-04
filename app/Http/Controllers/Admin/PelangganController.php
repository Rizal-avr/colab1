<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Mitra;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Alamat;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mitra = Mitra::where('jenis_mitra', 'pelanggan')->get();
        
        $kabupatens = Kabupaten::orderBy('nama_kabupaten')->get();

        return view('admin.pelanggan.index', compact('mitra', 'kabupatens'));
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
        $validated = $request->validate([
            'nama_mitra' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20|regex:/^[0-9]+$/',
            'id_kecamatan' => 'required|exists:kecamatan,id_kecamatan',
            'detail_alamat' => 'required|string|max:500',
        ]);

        try {
            $alamat = Alamat::create([
                'id_kecamatan' => $request->id_kecamatan,
                'detail_alamat' => $request->detail_alamat,
            ]);

            Mitra::create([
                'nama_mitra' => $request->nama_mitra,
                'id_alamat' => $alamat->id_alamat,
                'no_hp' => $request->no_hp,
                'jenis_mitra' => 'pelanggan',
                'status_mitra' => '1'
            ]);

            return redirect()->route('admin.petani.index')
                ->with('success', 'Data petani berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Gagal menyimpan: ' . $e->getMessage());
        }
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:0,1'
        ]);
        $pelanggan = Mitra::findOrFail($id);
        $pelanggan->update(['status_mitra' => $request->status]);
        return redirect()->back();
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getKecamatan($id_kabupaten)
    {
        $kecamatan = Kecamatan::where('id_kabupaten', $id_kabupaten)->get();
        return response()->json($kecamatan);
    }
}
