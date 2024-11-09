@extends('template.main')

@section('title')
    Selamat datang di halaman Admin
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Daftar Data Pasien</h5>
        </div>
        <div class="card-body">
            <a href="{{ route('admin.create') }}" class="btn btn-primary my-1">TAMBAH</a>
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>idpasien</th>
                        <th>nik</th>
                        <th>nama</th>
                        <th>tempat & tanggal lahir</th>
                        <th>alamat</th>
                        <th>nohp</th>
                        <th>status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->idpasien }}</td>
                            <td>{{ $p->nik }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->tempat_lahir }}, {{ $p->tanggal_lahir }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->nohp }}</td>
                            <td>{{ $p->status }}</td>
                            <td>
                                {{-- <a href="{{ route('', $p->id) }}" class="btn btn-primary">Edit</a> --}}
                                {{-- <form action="{{ route('juduldelete', $p->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form> --}}
                                sdas
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Data Kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection


@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true,
            });
        });
</script>
@endpush
