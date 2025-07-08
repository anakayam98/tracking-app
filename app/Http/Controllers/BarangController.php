<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Barang::query();

    if ($request->filled('search')) {
        $query->where('nama', 'like', '%' . $request->search . '%');
    }

    $barangs = $query->get();
    return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nama' => 'required',
        'harga_beli' => 'required|numeric',
        'harga_jual' => 'required|numeric',
        'keterangan' => 'required',
    ]);

    Barang::create($request->only([
        'nama', 'harga_beli', 'harga_jual', 'keterangan'
    ]));

    return redirect()->route('barang.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
        'nama' => 'required',
        'harga-beli' => 'required|numeric',
        'harga-jual' => 'required|numeric',
        'keterangan' => 'required',
    ]);

    $barang->update($request->only([
        'nama', 'harga-beli', 'harga_jual', 'keterangan'
    ]));

    return redirect()->route('barang.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
    return redirect()->route('barang.index')->with('success', 'Data berhasil dihapus.');
    }
}
