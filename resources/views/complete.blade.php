@extends('layouts.app')

@section('content')
<div class="content">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-6 col-xl-5">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        Datos Actuales
                    </h3>
                </div>
                <div class="block-content">
                    <p>Nombre: {{ auth()->user()->name }}</p>
                    <p>Email: {{ auth()->user()->email }}</p>
                    @if (auth()->user()->referred)
                        <p>Referido: {{ auth()->user()->referred }}</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-7">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        Actualizar Datos
                    </h3>
                </div>
                <div class="block-content">
                    <form action="{{ route('complete') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4 form-group">
                            <div>QR</div>
                            <input type="file" name="qr" class="form-control @error('qr') is-invalid @enderror">
                            @error('qr')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 form-group">
                            <div>Red</div>
                            <input type="text" name="network" class="form-control @error('network') is-invalid @enderror">
                            @error('network')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 form-group">
                            <div>Wallet</div>
                            <input type="text" name="wallet" class="form-control @error('wallet') is-invalid @enderror">
                            @error('wallet')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mb-4">Aceptar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
