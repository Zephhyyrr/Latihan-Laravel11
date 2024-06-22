@extends('layouts.main')
@section('content')
    <div class="row justify-content-center">
        <div class="col-5">
            <main class="form-signin w-100 m-auto">
                <form class="mt-5" method="POST" action="/register">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal">Register Here!</h1>

                    <div class="form-floating">
                        <input type="name" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="floatingInput" placeholder="name@example.com" value="{{ old('name') }}">
                        <label for="floatingInput">Username</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}">
                        <label for="floatingInput">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">Password</label>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control" name="password_confirmation" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword"> Confirm Password</label>
                    </div>

                    <img src="{{ captcha_src('math') }}" alt="captcha">
                    <div class="form-floating">
                        <input type="text" name="captcha" class="form-control mt-3 @error('captcha') is-invalid @enderror"
                            id="floatingCaptcha" placeholder="Please Insert Captcha">
                        <label for="floatingCaptcha">Captcha</label>
                        @error('captcha')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register</button>
                </form>
                <p class="mt-5 mb-3 text-body-secondary text-center mt-3">Have an account?<a href="/login">Please Login</a>
                </p>
                <p class="mt-5 mb-3 text-body-secondary text-center">&copy; {{ date('Y') }}</p>
            </main>
        </div>
    </div>
@endsection
