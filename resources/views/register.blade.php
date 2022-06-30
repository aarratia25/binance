@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="bg-image" style="background-image: url('/web/assets/img/photo12@2x.jpg');">
<div class="row g-0 justify-content-center bg-black-75">
    <!-- Main Section -->
    <div class="hero-static col-md-6 d-flex align-items-center bg-body-extra-light">
    <div class="p-3 w-100">
        <!-- Header -->
        <div class="mb-3 text-center">
        <a class="link-fx fw-bold fs-1" href="/">
           {{ config('app.name') }}
        </a>
        <p class="text-uppercase fw-bold fs-sm text-muted">Crea una Cuenta</p>
        </div>
        <!-- END Header -->

        <div class="row g-0 justify-content-center">
        <div class="col-sm-8 col-xl-6">
            <form class="js-validation-signup" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="py-3">
                <div class="mb-4">
                    <input type="text" class="form-control form-control-lg form-control-alt" name="id" placeholder="Código de Referido">
                </div>
                <div class="mb-4">
                    <input type="text" class="form-control form-control-lg form-control-alt @error('name') is-invalid @enderror" name="name" placeholder="Nombre">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="text" class="form-control form-control-lg form-control-alt @error('lastname') is-invalid @enderror" name="lastname" placeholder="Apellido">
                    @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="email" class="form-control form-control-lg form-control-alt @error('email') is-invalid @enderror" name="email" placeholder="Correo">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="password" class="form-control form-control-lg form-control-alt @error('password') is-invalid @enderror" name="password" placeholder="Contraseña">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="mb-4">
                    <input type="password" class="form-control form-control-lg form-control-alt @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Confirmar Contraseña">
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="mb-4">
                <button type="submit" class="btn w-100 btn-lg btn-hero btn-primary">
                    <i class="fa fa-fw fa-plus opacity-50 me-1"></i> Registro
                </button>
                <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1" href="{{ route('login') }}">
                    <i class="fa fa-sign-in-alt opacity-50 me-1"></i> Inicio de sesión
                </a>
                </p>
            </div>
            </form>
        </div>
        </div>
        <!-- END Sign Up Form -->
    </div>
    </div>
    <!-- END Main Section -->
</div>
</div>
<!-- END Page Content -->
@endsection
