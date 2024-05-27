@extends('layouts.main')

@section('content')
    <h1>Daftar Dosen</h1>
    <table class="table table-boreder table-striped">
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Prodi</th>
            <th>Alamat</th>
        </tr>
        @foreach ($dsn as $dosen)
            <tr>
                <td>{{ $dsn->firstItem() + $loop->index }}</td>
                <td>{{$dosen->nik}}</td>
                <td>{{$dosen->nama_lengkap}}</td>
                <td>{{$dosen->email}}</td>
                <td>{{$dosen->prodi->nama_prodi}}</td>
                <td>{{$dosen->alamat}}</td>
            </tr>

        @endforeach
    </table>
{{ $dsn->links() }}
@endsection
