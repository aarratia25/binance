@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="bg-image" style="background-image: url('assets/media/photos/photo22@2x.jpg');">
    <div class="row g-0 bg-primary-op">
      <!-- Main Section -->
      <div class="hero-static col-md-6 d-flex align-items-center bg-body-extra-light">
        <div class="p-3 w-100">
          <!-- Header -->
          <div class="mb-3 text-center">
            <a class="link-fx fw-bold fs-1" href="index.html">
              <span class="text-dark">Dash</span><span class="text-primary">mix</span>
            </a>
            <p class="text-uppercase fw-bold fs-sm text-muted">Sign In</p>
          </div>
          <!-- END Header -->

          <!-- Sign In Form -->
          <div class="row g-0 justify-content-center">
            <div class="col-sm-8 col-xl-6">
              <form class="js-validation-signin" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="py-3">
                  <div class="mb-4">
                    <input type="email" placeholder="Email" class="form-control form-control-lg form-control-alt @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                  <div class="mb-4">
                    <input type="password" placeholder="Password" class="form-control form-control-lg form-control-alt @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div>
                <div class="mb-4">
                  <button type="submit" class="btn w-100 btn-lg btn-hero btn-primary">
                    <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i> Login
                  </button>
                  <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                    <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1" href="{{ route('password.request') }}">
                      <i class="fa fa-exclamation-triangle opacity-50 me-1"></i> Forgot Password
                    </a>
                  </p>
                </div>
              </form>
            </div>
          </div>
          <!-- END Sign In Form -->
        </div>
      </div>
      <!-- END Main Section -->

      <!-- Meta Info Section -->
      <div class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center">
        <div class="p-3">
          <p class="display-4 fw-bold text-white mb-3">
            Welcome to the future
          </p>
          <p class="fs-lg fw-semibold text-white-75 mb-0">
            Copyright &copy; <span data-toggle="year-copy"></span>
          </p>
        </div>
      </div>
      <!-- END Meta Info Section -->
    </div>
  </div>
  <!-- END Page Content -->
@endsection
