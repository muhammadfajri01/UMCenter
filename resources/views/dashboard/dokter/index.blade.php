@extends('template.main')

@section('title')
    Selamat datang di halaman Dokter
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Daftar Data Konsultasi</h5>
        </div>
        <div class="card-body">
            <a href="{{ route('dokter.create') }}" class="btn btn-primary my-1">TAMBAH</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Konsultasi</th>
                        <th>Tanggal</th>
                        <th>ID Pasien</th>
                        <th>nik</th>
                        <th>nama</th>
                        <th>nohp</th>
                        <th>Status Keterangan</th>
                        <th>Hasil Analisa</th>
                        <th>Resep Obat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->idkonsultasi }}</td>
                            <td>{{ $p->tanggal }}</td>
                            <td>{{ $p->pasien->idpasien }}</td>
                            <td>{{ $p->pasien->nik }}</td>
                            <td>{{ $p->pasien->nama }}</td>
                            <td>{{ $p->pasien->nohp }}</td>
                            <td>{{ $p->pasien->status }}</td>
                            <td>{{ $p->hasil_analisa_dokter }}</td>
                            <td>{{ $p->resep_obat }}</td>
                            <td>
                                {{-- <a href="{{ route('', $p->id) }}" class="btn btn-primary">Edit</a> --}}
                                {{-- <form action="{{ route('juduldelete', $p->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form> --}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>Data Kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
