@extends('dashboard.layouts.main')
@section('title','Dashboard Mahasiswa')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Prodi</h1>
</div>
<div class="col-lg-8">
<form action="/dashboard-prodi/{{$prd->id}}" method="POST">
    @method('PUT')
    @csrf
    <div class="mb-2">
      <label for="inputNamaProdi" class="form-label">Nama Prodi</label>
      <input type="text" class="form-control @error('nama_prodi') is-invalid @enderror" name="nama_prodi" value="{{old('nama_prodi',$prd->nama_prodi)}}">
      @error('nama_prodi')
          <div class="invalid-feedback">
            {{$message}}
          </div>
      @enderror
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
  </form>
</div>
@endsection
