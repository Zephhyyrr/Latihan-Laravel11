@extends('dashboard.layouts.main')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Dosen</h1>
</div>
@if (session()->has('pesan'))
    <div class="alert alert-primary" role="alert">
        {{session('pesan')}}
    </div>
@endif
<a href="/dashboard-dosen/create" class="btn btn-primary mb-3">Create Dosen</a>

    <table class="table table-boreder table-striped">
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Prodi</th>
            <th>Action</th>
        </tr>
        @foreach ($dsn as $dosen)
            <tr>
                <td>{{ $dsn->firstItem() + $loop->index }}</td>
                <td>{{$dosen->nik}}</td>
                <td>{{$dosen->nama_lengkap}}</td>
                <td>{{$dosen->email}}</td>
                <td>{{$dosen->prodi->nama_prodi}}</td>
                <td>
                    <a href="/dashboard-dosen/{{$dosen->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                    {{-- <a href="" class="btn btn-danger btn-sm">Hapus</a> --}}
                    <form action="dashboard-dosen/{{$dosen->id}}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm d-inline" onclick="return confirm('Yakin akan menghapus data')">Hapus</button>
                    </form>
                </td>
            </tr>

        @endforeach
    </table>
{{ $dsn->links() }}
@endsection
