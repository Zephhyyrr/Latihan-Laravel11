@extends('dashboard.layouts.main')
@section('title', 'Dashboard Mahasiswa')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Masukkan Nama Kategori</h1>
    </div>
    {{-- <a href="/dashboard-prodi/create" class="btn btn-primary mb-3">Create Prodi</a> --}}

    <form action="/dashboard-kategori" method="POST">
        @csrf

        <div class="mb-3">
            <label for="inputNamaKategori" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                value="{{ old('nama') }}">
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@endsection
