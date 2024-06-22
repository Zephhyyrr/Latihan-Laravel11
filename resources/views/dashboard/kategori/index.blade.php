@extends('dashboard.layouts.main')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Kategori</h1>
</div>
@if (session()->has('pesan'))
    <div class="alert alert-primary" role="alert">
        {{session('pesan')}}
    </div>
@endif

<a href="/dashboard-kategori/create" class="btn btn-primary mb-3"><i class="bi bi-person-fill-add"></i>Create Kategori</a>

<table class="table table-bordered table-striped">
    <tr>
        <th>No</th>
        <th>Nama Kategori</th>
        <th>Action</th>
    </tr>
    @foreach ($kategoris as $kategori)
        <tr>
            <td>{{ $kategoris->firstItem() + $loop->index }}</td>
            <td>{{ $kategori->nama }}</td>
            <td>
                <a href="/dashboard-kategori/{{$kategori->id}}/edit" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i>Edit</a>
                {{-- <a href="" class="btn btn-danger btn-sm">Hapus</a> --}}
                <form action="dashboard-kategori/{{$kategori->id}}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm d-inline" onclick="return confirm('Yakin akan menghapus data')"><i class="bi bi-trash3-fill"></i>Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
{{ $kategoris->links() }}
@endsection
