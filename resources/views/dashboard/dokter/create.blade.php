@extends('template.main')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title">tambah Data Konsultasi</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dokter.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="pasien_id" class="form-label">Pasien</label>
                    <select class="form-control" name="pasien_id" id="pasien_id" required>
                        @foreach ($data as $d)
                            <option value="{{ $d->id }}">{{($d->idpasien) ." : ". ($d->nama)}}</option>
                        @endforeach
                    </select>
                    @error('pasien_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal Konsultasi</label>
                    <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                    @error('tanggal')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="hasil_analisa_dokter" class="form-label">Hasil Analisa Dokter</label>
                    <input type="text" class="form-control" name="hasil_analisa_dokter" id="hasil_analisa_dokter" placeholder="Masukkan Hasil Analisa Dokter" required>
                    @error('hasil_analisa_dokter')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="resep_obat" class="form-label">resep obat</label>
                    <textarea class="form-control" name="resep_obat" id="resep_obat" placeholder="Masukkan resep obat" required></textarea>
                    @error('resep_obat')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                <a href="{{ route('admin.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
