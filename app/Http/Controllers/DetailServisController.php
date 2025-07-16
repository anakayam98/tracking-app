<?php

namespace App\Http\Controllers;

use App\Models\DetailServis;
use Illuminate\Http\Request;

class DetailServisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = DetailServis::with(['barang', 'jasa', 'servis', 'pelanggan']);
        if (request()->filled('search')) {
            $search = request('search');
            $query->where(function($q) use ($search) {
                $q->where('kode_Tracking', 'like', "%$search%")
                  ->orWhere('harga', 'like', "%$search%")
                  ->orWhere('jumlah', 'like', "%$search%")
                  ->orWhere('status', 'like', "%$search%")
                  ->orWhereHas('barang', function($q2) use ($search) {
                      $q2->where('nama', 'like', "%$search%") ;
                  })
                  ->orWhereHas('jasa', function($q2) use ($search) {
                      $q2->where('nama', 'like', "%$search%") ;
                  })
                  ->orWhereHas('servis', function($q2) use ($search) {
                      $q2->where('no_nota', 'like', "%$search%") ;
                  })
                  ->orWhereHas('pelanggan', function($q2) use ($search) {
                      $q2->where('nama', 'like', "%$search%") ;
                  });
            });
        }
        $details = $query->get();
        return view('detailservis.index', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs = \App\Models\Barang::all();
        $jasas = \App\Models\Jasa::all();
        $servis = \App\Models\Servis::all();
        $pelanggans = \App\Models\Pelanggan::all();
        return view('detailservis.create', compact('barangs', 'jasas', 'servis', 'pelanggans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_Tracking' => 'nullable|integer',
            'id_barang' => 'nullable|exists:barangs,id',
            'id_jasa' => 'nullable|exists:jasas,id',
            'id_servis' => 'required|exists:servis,id',
            'id_pelanggan' => 'nullable|exists:pelanggans,id',
            'harga' => 'nullable|numeric',
            'jumlah' => 'nullable|integer',
            'status' => 'nullable|string|max:45',
            'tgl_servis_mulai' => 'nullable|date',
            'tgl_servis_selesai' => 'nullable|date',
            'bukti' => 'nullable|string',
            'catatan' => 'nullable|string',
            
        ]);
        DetailServis::create($request->all());
        return redirect()->route('detailservis.index')->with('success', 'Detail servis berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailServis $detailServis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailServis $detailServis)
    {
        $barangs = \App\Models\Barang::all();
        $jasas = \App\Models\Jasa::all();
        $servis = \App\Models\Servis::all();
        $pelanggans = \App\Models\Pelanggan::all();
        return view('detailservis.edit', compact('detailServis', 'barangs', 'jasas', 'servis', 'pelanggans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailServis $detailServis)
    {
        $request->validate([
            'kode_Tracking' => 'nullable|integer',
            'id_barang' => 'nullable|exists:barangs,id',
            'id_jasa' => 'nullable|exists:jasas,id',
            'id_servis' => 'required|exists:servis,id',
            'id_pelanggan' => 'nullable|exists:pelanggans,id',
            'harga' => 'nullable|numeric',
            'jumlah' => 'nullable|integer',
            'status' => 'nullable|string|max:45',
            'tgl_servis_mulai' => 'nullable|date',
            'tgl_servis_selesai' => 'nullable|date',
            'bukti' => 'nullable|string',
            'catatan' => 'nullable|string',
            
        ]);
        $detailServis->update($request->all());
        return redirect()->route('detailservis.index')->with('success', 'Detail servis berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailServis $detailServis)
    {
        $detailServis->delete();
        return redirect()->route('detailservis.index')->with('success', 'Detail servis berhasil dihapus.');
    }
}
