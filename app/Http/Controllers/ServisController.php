<?php

namespace App\Http\Controllers;

use App\Models\Servis;
use Illuminate\Http\Request;
use App\Models\Pelanggan;

class ServisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Servis::with('pelanggan');
        if (request()->filled('search')) {
            $search = request('search');
            $query->where(function($q) use ($search) {
                $q->where('no_nota', 'like', "%$search%")
                  ->orWhere('unit', 'like', "%$search%")
                  ->orWhere('no_seri', 'like', "%$search%")
                  ->orWhere('keluhan', 'like', "%$search%")
                  ->orWhereHas('pelanggan', function($q2) use ($search) {
                      $q2->where('nama', 'like', "%$search%")
                         ->orWhere('no_hp', 'like', "%$search%")
                         ->orWhere('email', 'like', "%$search%")
                         ->orWhere('alamat', 'like', "%$search%") ;
                  });
            });
        }
        $servis = $query->get();
        return view('servis.index', compact('servis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pelanggans = Pelanggan::all();
        // Generate no_nota default (SRVDDMMYYYY + urutan 001)
        $tgl = date('Y-m-d');
        $tglObj = date_create($tgl);
        $dd = date_format($tglObj, 'd');
        $mm = date_format($tglObj, 'm');
        $yyyy = date_format($tglObj, 'Y');
        $count = Servis::where('tgl_servis', $tgl)->count() + 1;
        $no_nota = 'SRVJ' . $dd . $mm . $yyyy . str_pad($count, 3, '0', STR_PAD_LEFT);
        return view('servis.create', compact('pelanggans', 'no_nota'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tgl_servis' => 'required|date',
            'id_pelanggan' => 'required|exists:pelanggans,id',
            'unit' => 'required',
            'no_seri' => 'required',
            'keluhan' => 'required',
            'kelengkapan' => 'required',
            'pin_passcode' => 'nullable',
            'estimasi_biaya' => 'nullable|numeric',
        ]);

        // Generate no_nota otomatis: SRVDDMMYYYY + urutan servis pada tanggal tsb
        $tgl = $request->tgl_servis;
        $tglObj = date_create($tgl);
        $dd = date_format($tglObj, 'd');
        $mm = date_format($tglObj, 'm');
        $yyyy = date_format($tglObj, 'Y');
        // Hitung jumlah servis pada tanggal yang sama
        $count = Servis::where('tgl_servis', $tgl)->count() + 1;
        $no_nota = 'SRVJ' . $dd . $mm . $yyyy . str_pad($count, 3, '0', STR_PAD_LEFT);

        Servis::create([
            'no_nota' => $no_nota,
            'tgl_servis' => $request->tgl_servis,
            'id_pelanggan' => $request->id_pelanggan,
            'unit' => $request->unit,
            'no_seri' => $request->no_seri,
            'keluhan' => $request->keluhan,
            'kelengkapan' => $request->kelengkapan,
            'pin_passcode' => $request->pin_passcode,
            'estimasi_biaya' => $request->estimasi_biaya,
        ]);
        return redirect()->route('servis.index')->with('success', 'Data servis berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Servis $servis)
    {
        return view('servis.view', compact('servis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servis $servis)
    {
        $pelanggans = Pelanggan::all();
        return view('servis.edit', compact('servis', 'pelanggans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servis $servis)
    {
        $request->validate([
            'no_nota' => 'required',
            'tgl_servis' => 'required|date',
            'id_pelanggan' => 'required|exists:pelanggans,id',
            'unit' => 'required',
            'no_seri' => 'required',
            'keluhan' => 'required',
            'kelengkapan' => 'required',
            'pin_passcode' => 'nullable',
            'estimasi_biaya' => 'nullable|numeric',
        ]);

        $servis->update($request->only([
            'no_nota',
            'tgl_servis',
            'id_pelanggan',
            'unit',
            'no_seri',
            'keluhan',
            'kelengkapan',
            'pin_passcode',
            'estimasi_biaya',
        ]));
        return redirect()->route('servis.index')->with('success', 'Data servis berhasil diperbarui');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servis $servis)
    {
        $servis->delete();
        return redirect()->route('servis.index')->with('success', 'Data servis berhasil dihapus');
    }
}
