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
      <label for="inputNamaLengkap" class="form-label">Nama Lengkap</label>
      <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{old('nama_lengkap')}}">
      @error('nama_lengkap')
          <div class="invalid-feedback">
            {{$message}}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="inputTempatLahir" class="form-label">Tempat Lahir</label>
      <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{old('tempat_lahir')}}">
      @error('tempat_lahir')
          <div class="invalid-feedback">
            {{$message}}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="inputTanggalLahir" class="form-label">Tanggal Lahir</label>
      <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tgl_lahir" value="{{old('tgl_lahir')}}">
      @error('tgl_lahir')
          <div class="invalid-feedback">
            {{$message}}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="inputEmail" class="form-label">Email</label>
      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">
      @error('email')
          <div class="invalid-feedback">
            {{$message}}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="inputProdi" class="form-label">Prodi</label>
        <select name="prodi_id" class="form-select @error('prodi_id') is-invalid @enderror">
            <option value="">--Pilih Prodi--</option>
            @foreach ($prodis as $prodi)
                <option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
            @endforeach
        </select>
        @error('prodi_id')
          <div class="invalid-feedback">
            {{$message}}
          </div>
      @enderror
    </div>
    <div class="mb-3">
        <label for="inputAlamat" class="form-label">Alamat</label>
        <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" rows="3" name="alamat" value="{{old('alamat')}}"></textarea>
        @error('alamat')
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
