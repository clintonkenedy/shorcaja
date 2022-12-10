@extends('layouts.app')

@section('content')
<div class="container-fluid h-custom">
    <div class="row justify-content-center align-items-center" style="height:80vh">
        <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
              class="img-fluid" alt="Munipuno">
          </div>
        <div class="col-md-8 col-lg-4 col-xl-4 offset-xl-1">
            <div class="card text-white" style="background-color: #0093FF">
                <div class="card-body">
                    <h1 class="text-center mb-4">CACHIMBEADA 2022 - II</h1>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Usuario') }}</label>

                            <div class="col-md-7">
                                <input id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordar sesión') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-outline-light">
                                    {{ __('Ingresar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div
class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
<!-- Copyright -->
<div class="text-white mb-3 mb-md-0">
    Copyright © Diciembre-2022 All rights reserved
</div>
<!-- Copyright -->

<!-- Right -->
<div>
  <a href="#!" class="text-white me-4">
    <i class="fab fa-facebook-f"></i>
  </a>
  <a href="#!" class="text-white me-4">
    <i class="fab fa-twitter"></i>
  </a>
  <a href="#!" class="text-white me-4">
    <i class="fab fa-google"></i>
  </a>
  <a href="#!" class="text-white">
    <i class="fab fa-linkedin-in"></i>
  </a>
</div>
<!-- Right -->
</div>
@endsection
