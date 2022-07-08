@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-6 col-xl-5">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        Datos del Usuario
                    </h3>
                </div>
                <div class="block-content">
                    <p>Referido por: {{ $user->referred->name }}</p>
                    <p>Plan: {{ $user->plan->name }}</p>
                    <p>Nombre: {{ $user->name }}</p>
                    <p>Apellido: {{ $user->lastname }}</p>
                    <p>Correo: {{ $user->email  }}</p>
                    <p>Wallet: {{ $user->wallet  }}</p>
                    <p>Red: {{ $user->network  }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-7">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        Modificar Datos
                    </h3>
                </div>
                <div class="block-content">
                    <form action="{{ route('update.profile', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4 form-group">
                            <label>Nombre</label>
                            <input type="text" value="{{ $user->name }}" name="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4 form-group">
                            <label>Apellido</label>
                            <input type="text" value="{{ $user->lastname }}" name="lastname" class="form-control @error('lastname') is-invalid @enderror">
                            @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4 form-group">
                            <label>Contraseña</label>
                            <input type="text" name="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4 form-group">
                            <label>Confirmar Contraseña</label>
                            <input type="text" name="password_confirmation" class="form-control @error('lastname') is-invalid @enderror">
                            @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4 form-group">
                            <label>Correo</label>
                            <input type="text" value="{{ $user->email }}" name="email" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4 form-group">
                            <label>Red</label>
                            <input type="text" value="{{ $user->network }}" name="network" class="form-control @error('network') is-invalid @enderror">
                            @error('network')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="mb-4 form-group">
                            <label>Wallet</label>
                            <input type="text" value="{{ $user->wallet }}" name="wallet" class="form-control @error('wallet') is-invalid @enderror">
                            @error('wallet')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mb-4">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
