@extends('dashboard.layouts.main')
@section('title','Dashboard Mahasiswa')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Masukkan Data Mahasiswa</h1>
</div>
<a href="/dashboard-mahasiswa/create" class="btn btn-primary mb-3">Create Mahasiswa</a>

<form action="/dashboard-mahasiswa" method="POST">
    @csrf

    <div class="mb-3">
      <label for="inputNIM" class="form-label">NIM</label>
      <input type="number" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{old('nim')}}">
      @error('nim')
          <div class="invalid-feedback">
            {{$message}}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="inputNamaLengkap" class="form-label">Nama prodi</label>
      <input type="text" class="form-control @error('nama_prdoi') is-invalid @enderror" name="nama_prodi" value="{{old('nama_prodi')}}">
      @error('nama_lengkap')
          <div class="invalid-feedback">
            {{$message}}
          </div>
      @enderror
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>

@endsection
