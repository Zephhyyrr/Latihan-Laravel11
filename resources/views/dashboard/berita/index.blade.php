@extends('dashboard.layouts.main')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Berita</h1>
</div>
@if (session()->has('pesan'))
    <div class="alert alert-primary" role="alert">
        {{ session('pesan') }}
    </div>
@endif
<a href="{{ route('dashboard-berita.create') }}" class="btn btn-primary mb-3">Create Berita</a>

<table class="table table-bordered table-striped">
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Nama Pembuat</th>
        <th>Kategori</th>
        <th>Gambar</th>
        <th>Excerpt</th>
        <th>Body</th>
        <th>Action</th>
    </tr>
    @foreach ($beritas as $berita)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$berita->title}}</td>
            <td>{{$berita->user->name}}</td>
            <td>{{$berita->kategori->nama}}</td>
            <td><img src="{{ asset('images/' . $berita->file_upload) }}" alt="Image" style="width: 200px;"></td>
            <td>{{$berita->excerpt}}</td>
            <td>{{$berita->body}}</td>
            <td>
                <a href="{{ route('dashboard-berita.edit', $berita->id) }}" class="btn btn-success btn-sm">Edit</a>
                <form action="{{ route('dashboard-berita.destroy', $berita->id) }}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm d-inline" onclick="return confirm('Yakin akan menghapus data')">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
{{ $beritas->links() }}
@endsection
