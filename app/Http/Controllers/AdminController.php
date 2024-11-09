<?php

namespace App\Http\Controllers;

use App\Models\pasien;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index()
    {
        $data = pasien::all();
        return view('dashboard.admin.index', compact('data'));
    }

    public function create()
    {
        return view('dashboard.admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|integer',
            'nama' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'nohp' => 'required',
            'status' => 'required|in:dosen,karyawan,mahasiswa,umum',
        ]);

        $pasien = new pasien();
        $lastId = pasien::orderBy('id', 'desc')->value('id');
        $pasien->idpasien = str_pad($lastId + 1, 8, '0', STR_PAD_LEFT);
        $pasien->nik = $request->nik;
        $pasien->nama = $request->nama;
        $pasien->tempat_lahir = $request->tempat_lahir;
        $pasien->tanggal_lahir = $request->tanggal_lahir;
        $pasien->alamat = $request->alamat;
        $pasien->nohp = $request->nohp;
        $pasien->status = $request->status;
        $pasien->save();

        return redirect()->route('admin.index')->with('success', 'Data pasien berhasil ditambahkan');
    }
}
