<?php

namespace App\Http\Controllers;

use App\Models\konsultasi;
use App\Models\pasien;

use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $data = konsultasi::all();
        return view('dashboard.dokter.index', compact('data'));
    }

    public function create()
    {
        $data = pasien::all();
        return view('dashboard.dokter.create', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required',
            'tanggal' => 'required|date',
            'hasil_analisa_dokter' => 'required|string',
            'resep_obat' => 'required|string',
        ]);

        $konsultasi = new konsultasi();
        $lastId = konsultasi::orderBy('id', 'desc')->value('id');
        $konsultasi->idkonsultasi = str_pad($lastId + 1, 8, '0', STR_PAD_LEFT);
        $konsultasi->pasien_id = $request->pasien_id;
        $konsultasi->tanggal = $request->tanggal;
        $konsultasi->hasil_analisa_dokter = $request->hasil_analisa_dokter;
        $konsultasi->resep_obat = $request->resep_obat;
        $konsultasi->save();

        return redirect()->route('dokter.index')->with('success', 'Data pasien berhasil ditambahkan');
    }
}
