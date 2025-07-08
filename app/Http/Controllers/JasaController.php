<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use Illuminate\Http\Request;

class JasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Jasa::query();

    if ($request->filled('search')) {
        $query->where('nama', 'like', '%' . $request->search . '%');
    }

    $jasas = $query->get();
    return view('jasa.index', compact('jasas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jasa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nama' => 'required',
        'harga' => 'required|numeric',
        'keterangan' => 'required',
    ]);

    Jasa::create($request->only([
        'nama', 'harga', 'keterangan'
    ]));

    return redirect()->route('jasa.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jasa $jasa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jasa $jasa)
    {
        return view('jasa.edit', compact('jasa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jasa $jasa)
    {
        $request->validate([
        'nama' => 'required',
        'harga' => 'required|numeric',
        'keterangan' => 'required',
    ]);

    $jasa->update($request->only([
        'nama', 'harga', 'keterangan'
    ]));

    return redirect()->route('jasa.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jasa $jasa)
    {
        $jasa->delete();
    return redirect()->route('jasa.index')->with('success', 'Data berhasil dihapus.');
    }
}
