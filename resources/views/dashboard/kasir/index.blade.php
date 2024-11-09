@extends('template.main')

@section('title')
    Selamat datang di halaman Kasir
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Daftar Data transaksi</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Konsultasi</th>
                        <th>ID Pasien</th>
                        <th>Tanggal</th>
                        <th>Pembayaran</th>
                        <th>Biaya</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->idkonsultasi }}</td>
                            <td>{{ $p->pasien->idpasien }}</td>
                            <td>{{ $p->tanggal }}</td>
                            <td>{{ $p->pembayaran }}</td>
                            <td>{{ $p->biaya }}</td>
                            <td>
                                @if ($p->pembayaran == 'belum')
                                    <a href="{{ route('kasir.bayar', $p->id) }}" class="btn btn-primary">Bayar</a>
                                @endif


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
