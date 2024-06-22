@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Kategori</h1>
    </div>
    <div class="col-lg-8">
        <form action="/dashboard-kategori/{{ $kategoris->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-2">
                <label for="editKategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                    value="{{ old('nama', $kategoris->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
@endsection
