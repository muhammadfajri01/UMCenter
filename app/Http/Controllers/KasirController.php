<?php

namespace App\Http\Controllers;

use App\Models\konsultasi;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        $data = konsultasi::all();
        return view('dashboard.kasir.index', compact('data'));
    }

    public function bayar($id)
    {
        $data = konsultasi::findOrFail($id);
        return view('dashboard.kasir.bayar', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pembayaran' => 'required',
            'biaya' => 'required',
        ]);

        $konsultasi = konsultasi::findOrFail($id);
        $konsultasi->pembayaran = (string) $request->pembayaran;
        $konsultasi->biaya = $request->biaya;
        $konsultasi->save();

        return redirect()->route('kasir.index')->with('success', 'Data pasien berhasil diperbarui');
    }

    public function rekapitulasi(Request $request)
    {
        if ($request->has('start') && $request->has('end')) {
            $start = date('Y-m-d', strtotime(request('start')));
            $end = date('Y-m-d', strtotime(request('end')));
            $data = konsultasi::where('pembayaran', 'selesai')
                ->whereBetween('created_at', [$start, $end])
                ->get();
            $data2 = konsultasi::where('pembayaran', 'selesai')
                ->where('biaya', 'gratis')
                ->whereBetween('created_at', [$start, $end])
                ->get();
            $data3 = konsultasi::where('pembayaran', 'selesai')
                ->where('biaya', '!=', 'gratis')
                ->whereBetween('created_at', [$start, $end])
                ->get();
        } else {
            $data = konsultasi::where('pembayaran', 'selesai')->get();
            $data2 = konsultasi::where('pembayaran', 'selesai')->where('biaya', 'gratis')->get();
            $data3 = konsultasi::where('pembayaran', 'selesai')->where('biaya', '!=', 'gratis')->get();
        }
        return view('dashboard.kasir.rekapitulasi', compact('data', 'data2', 'data3'));
    }
}
