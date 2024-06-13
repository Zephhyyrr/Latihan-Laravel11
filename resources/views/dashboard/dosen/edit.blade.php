@extends('dashboard.layouts.main')
@section('title', 'Dashboard Dosen')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create Dosen</h1>
    </div>
    <div class="col-lg-8">
        <form action="/dashboard-dosen/{{ $dosen->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="inputNIK" class="form-label">NIK</label>
                <input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik"
                    value="{{ old('nik', $dosen->nik) }}" readonly>
                @error('nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputNamaLengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap"
                    value="{{ old('nama_lengkap', $dosen->nama_lengkap) }}">
                @error('nama_lengkap')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email', $dosen->email) }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputNOTELP" class="form-label">Nomor Telepon</label>
                <input type="number" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp"
                    value="{{ old('no_telp', $dosen->no_telp) }}" readonly>
                @error('no_telp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputProdi" class="form-label">Prodi</label>
                <select name="prodi_id" class="form-select @error('prodi_id') is-invalid @enderror">
                    <option value="">--Pilih Prodi--</option>
                    @foreach ($prodis as $prodi)
                        @if (old('prodi_id', $dosen->prodi_id) == $prodi->id)
                            <option value="{{ $prodi->id }}" selected>{{ $prodi->nama_prodi }}</option>
                        @else
                            <option value="{{ $prodi->id }}"> {{ $prodi->nama_prodi }}</option>
                        @endif
                    @endforeach
                </select>
                @error('prodi_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputAlamat" class="form-label">Alamat</label>
                <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" rows="3" name="alamat">{{ old('alamat', $dosen->alamat) }}</textarea>
                @error('alamat')
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
