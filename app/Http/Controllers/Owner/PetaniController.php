<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use App\Models\Mitra;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Alamat;
use Illuminate\Http\Request;

class PetaniController extends Controller
{
    public function index()
    {
        $mitra = Mitra::where('jenis_mitra', 'petani')->get();

        $kabupatens = Kabupaten::orderBy('nama_kabupaten')->get();

        return view('owner.petani.index', compact('mitra', 'kabupatens'));
    }


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
                'jenis_mitra' => 'petani',
                'status_mitra' => '1'
            ]);

            return redirect()->route('owner.petani.index')
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
        $petani = Mitra::findOrFail($id);
        $petani->update(['status_mitra' => $request->status]);
        return redirect()->back();
    }

    public function getKecamatan($id_kabupaten)
    {
        $kecamatan = Kecamatan::where('id_kabupaten', $id_kabupaten)->get();
        return response()->json($kecamatan);
    }
}
