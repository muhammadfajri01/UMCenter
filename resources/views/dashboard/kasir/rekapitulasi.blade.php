@extends('template.main')

@section('title')
    Halaman Laporan Rekapitulasi
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row border-bottom">
                <div class="col">
                    <h2 class="mb-0">Laporan Rekapitulasi</h2>
                </div>
                <div class="col d-flex justify-content-lg-between">
                    <form action="{{ route('kasir.rekapitulasi') }}" method="GET" class="d-flex" style="max-width: 300px">
                        <label for="start" class="me-2 m-2">Start</label>
                        <input type="date" name="start" value="{{ request()->query('start') ?? date('Y-m-d') }}" class="form-control me-2" width="50">
                        <label for="end" class="me-2 m-2">End</label>
                        <input type="date" name="end" value="{{ request()->query('end') ?? date('Y-m-d') }}" class="form-control me-2">
                        <button type="submit" class="btn btn-primary mx-2">Cari</button>
                    </form>
                    <a href="javascript:void(0);" class="btn btn-primary" onclick="printPage()">Cetak</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-auto">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">jumlah Transaksi</h5>
                            <h1 class="display-4 text-primary">{{ $data->count() }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah transaksi Gratis</h5>
                            <h1 class="display-4 text-success">{{ $data2->count() }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah transaksi Berbayar</h5>
                            <h1 class="display-4 text-danger">{{ $data3->count() }}</h1>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <h5 class="mt-4">Data Transaksi</h5>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Konsultasi</th>
                        <th>ID Pasien</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Biaya</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->idkonsultasi }}</td>
                            <td>{{ $p->pasien->idpasien }}</td>
                            <td>{{ $p->pasien->nama }}</td>
                            <td>{{ $p->pasien->status }}</td>
                            <td>{{ $p->biaya }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Data Kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function printPage() {
        window.print();
    }
</script>
@endpush
