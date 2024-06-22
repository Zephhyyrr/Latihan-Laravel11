@extends('dashboard.layouts.main')
@section('title', 'Dashboard Mahasiswa')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit User</h1>
    </div>
    <div class="col-lg-8">
        <form action="/dashboard-user/{{ $users->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-2">
                <label for="inputNamaUser" class="form-label">Nama User</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name', $users->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="editNamaUser" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email', $users->email) }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">New Password (Optional)</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                    value="{{ old('password') }}">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="floatingPassword"> Confirm Password (Optional)</label>
                <input type="password" class="form-control" name="password_confirmation" id="floatingPassword">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
@endsection
