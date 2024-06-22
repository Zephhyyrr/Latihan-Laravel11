@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Inputkan User Baru</h1>
    </div>
    {{-- <a href="/dashboard-prodi/create" class="btn btn-primary mb-3">Create Prodi</a> --}}

    <form action="/dashboard-user" method="POST">
        @csrf

        <div class="mb-3">
            <label for="inputNamaUser" class="form-label">Nama User</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputEmailUser" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="floatingPassword">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                id="floatingPassword">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="floatingPassword"> Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" id="floatingPassword">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
