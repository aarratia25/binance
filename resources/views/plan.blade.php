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
                        Datos del Pago
                    </h3>
                </div>
                <div class="block-content">
                    <p>Red: Tron (TRC20)</p>
                    <p>Dirección: TUjEQd5tVvDFFrJrEaN3V9Javb9k8vzALp</p>
                    <img src="/web/assets/img/qr.jpg" class="img-fluid mx-auto d-block" style="width: 50%;">
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-7">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        Notificar Pago
                    </h3>
                </div>
                <div class="block-content">
                    <form action="{{ route('plan', $plan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4 form-group">
                            <div>Comprobante</div>
                            <small>Permitidos: jpeg,bmp,png,gif,svg,pdf</small>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 form-group">
                            <label>Comentario</label>
                            <textarea name="message" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mb-4">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


