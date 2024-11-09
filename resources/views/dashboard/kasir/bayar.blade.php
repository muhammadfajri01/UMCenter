@extends('template.main')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title">Halaman Pembayaran</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('kasir.bayar.post', $data->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <p class="bold">ID Konsultasi : {{ $data->idkonsultasi }}</p>
                    <p class="bold">ID Pasien : {{ $data->pasien->idpasien }}</p>
                    <p class="bold">Nama Pasien : {{ $data->pasien->nama }}</p>
                    <p class="bold">Tanggal Konsultasi : {{ $data->tanggal }}</p>
                    <p class="bold">Hasil Analisa Dokter : {{ $data->hasil_analisa_dokter }}</p>
                    <p class="bold">Resep Obat : {{ $data->resep_obat }}</p>
                    <p class="bold">Status : {{ $data->pasien->status }}</p>
                </div>
                <div class="mb-3">
                    <label for="pembayaran" class="form-label">Pembayaran</label>
                    <select class="form-control" name="pembayaran" id="pembayaran" required>
                        <option value="selesai">Selesai</option>
                        <option value="belum" selected>Belum</option>
                    </select>
                    @error('pembayaran')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="biaya" class="form-label">Biaya</label>
                    @if ($data->pasien->status == 'dosen' || $data->pasien->status == 'karyawan')
                        <input type="text" class="form-control" name="biaya" id="biaya" value="gratis" readonly>
                    @else
                        <input type="text" class="form-control" name="biaya" id="biaya" placeholder="Masukkan Biaya">
                    @endif
                    @error('biaya')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                <a href="{{ route('admin.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
