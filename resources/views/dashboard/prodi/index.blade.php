@extends('dashboard.layouts.main')
@section('title','Dashboard Mahasiswa')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Prodi</h1>
</div>
@if (session()->has('pesan'))
    <div class="alert alert-primary" role="alert">
        {{session('pesan')}}
    </div>
@endif

<a href="/dashboard-prodi/create" class="btn btn-primary mb-3"><i class="bi bi-person-fill-add"></i>Create Prodi</a>

<table class="table table-bordered table-striped">
    <tr>
        <th>No</th>
        <th>Nama Prodi</th>
        <th>Action</th>
    </tr>
    @foreach ($prd as $prodi)
        <tr>
            <td>{{ $prd->firstItem() + $loop->index }}</td>
            <td>{{ $prodi->nama_prodi }}</td>
            <td>
                <a href="/dashboard-prodi/{{$prodi->id}}/edit" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i>Edit</a>
                {{-- <a href="" class="btn btn-danger btn-sm">Hapus</a> --}}
                <form action="dashboard-prodi/{{$prodi->id}}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm d-inline" onclick="return confirm('Yakin akan menghapus data')"><i class="bi bi-trash3-fill"></i>Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
{{ $prd->links() }}
@endsection
