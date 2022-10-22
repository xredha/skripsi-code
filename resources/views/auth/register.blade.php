@extends('layouts.master')

@section('content')
  <div id="auth">
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-sm-12 mx-auto">
          <div class="card pt-4">
            <div class="card-body">
              <div class="text-center mb-5">
                <img src="{{ asset('images/icon-saham.png') }}" alt="Logo Saham" width="120px" class="mb-3">
                <h3>Register</h3>
                <p>Silahkan Registrasi untuk melanjutkan ke aplikasi.</p>
              </div>
              <form action="{{ route('register') }}" method="POST">
                @csrf
                <div>
                  <label for="name">Nama</label>
                  <div class="form-group position-relative has-icon-left">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                      name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <div class="form-control-icon">
                      <i data-feather="user"></i>
                    </div>
                  </div>
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div>
                  <label for="email">E-Mail</label>
                  <div class="form-group position-relative has-icon-left">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                      name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <div class="form-control-icon">
                      <i data-feather="mail"></i>
                    </div>
                  </div>
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div>
                  <label for="password">Password</label>
                  <div class="form-group position-relative has-icon-left">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                      name="password" required autocomplete="current-password">
                    <div class="form-control-icon">
                      <i data-feather="lock"></i>
                    </div>
                  </div>
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div>
                  <label for="password-confirm">Confirm Password</label>
                  <div class="form-group position-relative has-icon-left">
                    <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror"
                      name="password_confirmation" required autocomplete="new-password">
                    <div class="form-control-icon">
                      <i data-feather="lock"></i>
                    </div>
                  </div>
                </div>

                <div class='form-check clearfix my-4'>
                  <div class="float-end">
                    <a href="{{ route('login') }}">Punya Akun? Login</a>
                  </div>
                </div>
                <div class="clearfix">
                  <button class="btn btn-primary float-end">Register</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Register') }}</div>

          <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
              @csrf

              <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                <div class="col-md-6">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                <div class="col-md-6">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email">

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                <div class="col-md-6">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="password-confirm"
                  class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
                </div>
              </div>

              <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
@endsection
